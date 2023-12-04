<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNBcadangan extends Model
{
    public function jumlahDataTraining()
    {
        // global $con;
        // return (int) mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM data_umkm"))[0];
        $training = $this->db->query("SELECT COUNT(*) as jumlah from data_transfomasi")->getRow();
        // array_push($this->panggil, (array)$training);
        return $training;
    }

    public function jumlahDataKelas()
    {
        // global $con;
        // $queryy = "SELECT COUNT(*) FROM data_umkm WHERE keputusan=";

        // $jumlahUMKM['Layak'] = (int) mysqli_fetch_row(mysqli_query($con, $queryy . "'Layak'"))[0];
        // $jumlahUMKM['Tidak Layak'] =  (int) mysqli_fetch_row(mysqli_query($con, $queryy . "'Tidak Layak'"))[0];
        // return $jumlahUMKM;
        $variabel = $this->db->query("SELECT COUNT(kep) as jumlah from data_transfomasi where kep='Layak'")->getRow();
        $variabel2 = $this->db->query("SELECT COUNT(kep) as jumlah from data_transfomasi where kep='Tidak Layak'")->getRow();
        $jumlahKelas['Layak'] = $variabel->jumlah;
        $jumlahKelas['Tidak_Layak'] = $variabel2->jumlah;
        // array_push($this->panggil, $jumlahKelas);

        return $jumlahKelas;
    }

    public function ProbabilitasKelas()
    {
        // $kelas['ya'] = $this->jumlahDataKelas()['Layak'] / $this->totalDataTraining();
        // $kelas['Tidak Layak'] = $this->jumlahDataKelas()['Tidak Layak'] / $this->totalDataTraining();
        // return $kelas;
        $totalData = $this->jumlahDataTraining();
        $totalKelas = $this->jumlahDataKelas();
        $kelas['Layak'] = $totalKelas['Layak'] / $totalData->jumlah;
        $kelas['Tidak Layak'] = $totalKelas['Tidak_Layak'] / $totalData->jumlah;
        // array_push($this->panggil, $kelas);

        return $kelas;
    }

    public function conditionalProbability($namaKolom, $nilai)
    {
        // global $con;
        $jmlDataKelas = $this->jumlahDataKelas();
        $queryy = "SELECT COUNT($namaKolom) as jumlah FROM data_transfomasi WHERE $namaKolom = '$nilai' AND kep=";
        $layak = $this->db->query($queryy . "'Layak'")->getRow();
        $tdkLayak = $this->db->query($queryy . "'Tidak Layak'")->getRow();
        $conditionalProbability['Layak'] = intval($layak->jumlah) / intval($jmlDataKelas['Layak']);
        $conditionalProbability['Tidak_Layak'] = intval($tdkLayak->jumlah) / intval($jmlDataKelas['Tidak_Layak']);
        // array_push($this->panggil, $conditionalProbability);
        // $this->panggil['conProb'] = $conditionalProbability;
        // dd($this->panggil);
        return $conditionalProbability;
        // $hitung = $this->db->query("SELECT COUNT ($namaKolom) from data_umkm where keputusan = $nilai");

    }

    public function posteriorProbability($data)
    {
        $atribut['pengelolahan'] = $this->conditionalProbability('pengelolahan', $data['pengelolahan']);
        $atribut['jenis'] = $this->conditionalProbability('jenis', $data['jenis']);
        $atribut['tenagakerja'] = $this->conditionalProbability('tenagakerja', $data['tenagakerja']);
        $atribut['bangunan'] = $this->conditionalProbability('bangunan', $data['bangunan']);
        $atribut['pendapatan'] = $this->conditionalProbability('pendapatan', $data['pendapatan']);
        $atribut['berdiri'] = $this->conditionalProbability('berdiri', $data['berdiri']);

        // $this->atribut = $atribut;

        $probabilitas['Layak'] = $atribut['pengelolahan']['Layak'] * $atribut['jenis']['Layak'] * $atribut['tenagakerja']['Layak'] * $atribut['bangunan']['Layak'] * $atribut['pendapatan']['Layak'] * $atribut['berdiri']['Layak'];
        $probabilitas['Tidak_Layak'] = $atribut['pengelolahan']['Tidak_Layak'] * $atribut['jenis']['Tidak_Layak'] * $atribut['tenagakerja']['Tidak_Layak'] * $atribut['bangunan']['Tidak_Layak'] * $atribut['pendapatan']['Tidak_Layak'] * $atribut['berdiri']['Tidak_Layak'];

        // $this->prob1 = $probabilitas['Layak'];
        // dd($this->prob);
        // $this->prob2 = $probabilitas['Tidak_Layak'];
        // dd($this->prob);

        if ($probabilitas['Layak'] > $probabilitas['Tidak_Layak']) {
            return 'Layak';
        } else if ($probabilitas['Layak'] < $probabilitas['Tidak_Layak']) {
            return 'Tidak Layak';
        }
    }
}
