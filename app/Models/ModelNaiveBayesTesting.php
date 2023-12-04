<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNaiveBayesTesting extends Model
{
    public function jumlahDataTraining()
    {
        $training = $this->db->query("SELECT COUNT(*) as jumlah from variasilatih_4")->getRow();
        return $training;
    }

    public function jumlahDataKelas()
    {
        $variabel = $this->db->query("SELECT COUNT(kep) as jumlah from variasilatih_4 where kep='Layak'")->getRow();
        $variabel2 = $this->db->query("SELECT COUNT(kep) as jumlah from variasilatih_4 where kep='Tidak Layak'")->getRow();
        $jumlahKelas['Layak'] = $variabel->jumlah;
        $jumlahKelas['Tidak_Layak'] = $variabel2->jumlah;

        return $jumlahKelas;
    }

    public function ProbabilitasKelas()
    {
        $totalData = $this->jumlahDataTraining();
        $totalKelas = $this->jumlahDataKelas();
        $kelas['Layak'] = $totalKelas['Layak'] / $totalData->jumlah;
        $kelas['Tidak Layak'] = $totalKelas['Tidak_Layak'] / $totalData->jumlah;

        return $kelas;
    }

    public function conditionalProbability($namaKolom, $nilai)
    {
        $jmlDataKelas = $this->jumlahDataKelas();
        $queryy = "SELECT COUNT($namaKolom) as jumlah FROM variasilatih_4 WHERE $namaKolom = '$nilai' AND kep=";
        $layak = $this->db->query($queryy . "'Layak'")->getRow();
        $tdkLayak = $this->db->query($queryy . "'Tidak Layak'")->getRow();
        $conditionalProbability['Layak'] = intval($layak->jumlah) / intval($jmlDataKelas['Layak']);
        $conditionalProbability['Tidak_Layak'] = intval($tdkLayak->jumlah) / intval($jmlDataKelas['Tidak_Layak']);
        return $conditionalProbability;
    }

    public function posteriorProbability($data)
    {

        $atribut['pengelolahan'] = $this->conditionalProbability('pengelolahan', $data['pengelolahan']);
        $atribut['jenis'] = $this->conditionalProbability('jenis', $data['jenis']);
        $atribut['tenagakerja'] = $this->conditionalProbability('tenagakerja', $data['tenagakerja']);
        $atribut['bangunan'] = $this->conditionalProbability('bangunan', $data['bangunan']);
        $atribut['pendapatan'] = $this->conditionalProbability('pendapatan', $data['pendapatan']);
        $atribut['berdiri'] = $this->conditionalProbability('berdiri', $data['berdiri']);


        $probabilitas['Layak'] = $atribut['pengelolahan']['Layak'] * $atribut['jenis']['Layak'] * $atribut['tenagakerja']['Layak'] * $atribut['bangunan']['Layak'] * $atribut['pendapatan']['Layak'] * $atribut['berdiri']['Layak'];
        $probabilitas['Tidak_Layak'] = $atribut['pengelolahan']['Tidak_Layak'] * $atribut['jenis']['Tidak_Layak'] * $atribut['tenagakerja']['Tidak_Layak'] * $atribut['bangunan']['Tidak_Layak'] * $atribut['pendapatan']['Tidak_Layak'] * $atribut['berdiri']['Tidak_Layak'];


        if ($probabilitas['Layak'] > $probabilitas['Tidak_Layak']) {
            return 'Layak';
        } else if ($probabilitas['Layak'] < $probabilitas['Tidak_Layak']) {
            return 'Tidak Layak';
        }
    }

    // public function getKfoldTraining()
    // {
    //     $data = $this->db->query('SELECT * FROM training_k1 WHERE no < 46 or no > 90')->getResultArray();
    //     dd($data);

    // $variabel2 = $this->db->query("SELECT COUNT(kep) as jumlah from uji_k11 where no < 10 AND kep='Layak' or no > 30 AND kep='Layak'")->getRow();
    // dd($variabel2);
    //     return $data;
    // }

    public function getTestingData()
    {
        $data = $this->db->query('SELECT * FROM variasiuji_4')->getResultArray();
        return $data;
    }
    public function kfoldOperation($data)
    {
        $result = $this->posteriorProbability($data);
        $id = $data['no'];
        return $this->db->query("UPDATE variasiuji_4 SET hasil_uji = '$result' WHERE no = $id");
    }
}
