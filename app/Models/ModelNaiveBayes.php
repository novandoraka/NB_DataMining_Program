<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNaiveBayes extends Model
{
    public $panggil = [];
    public $panggil2 = [];
    public $panggil3 = [];
    public $atribut = [];
    public $prob1 = [];
    public $prob2 = [];

    public function getAtribut()
    {
        return $this->atribut;
    }

    public function getProb()
    {
        return $this->prob1;
    }

    public function getProb2()
    {
        return $this->prob2;
    }

    public function tampilHitung()
    {
        $this->panggil['training'] = (array)$this->jumlahDataTraining();
        // dd($this->panggil);
        return $this->panggil;
    }

    public function tampilKelas()
    {
        $this->panggil2['jumKel'] = (array)$this->jumlahDataKelas();
        return $this->panggil2;
    }

    public function tampilProbab()
    {
        $this->panggil3['probKel'] = $this->ProbabilitasKelas();
        // dd($this->panggil3);
        return $this->panggil3;
    }

    public function jumlahDataTraining()
    {
        $training = $this->db->query("SELECT COUNT(*) as jumlah from data_transfomasi")->getRow();
        return $training;
    }

    public function jumlahDataKelas()
    {
        $variabel = $this->db->query("SELECT COUNT(kep) as jumlah from data_transfomasi where kep='Layak'")->getRow();
        $variabel2 = $this->db->query("SELECT COUNT(kep) as jumlah from data_transfomasi where kep='Tidak Layak'")->getRow();
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
        $queryy = "SELECT COUNT($namaKolom) as jumlah FROM data_transfomasi WHERE $namaKolom = '$nilai' AND kep=";
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

        $this->atribut = $atribut;

        $probabilitas['Layak'] = $atribut['pengelolahan']['Layak'] * $atribut['jenis']['Layak'] * $atribut['tenagakerja']['Layak'] * $atribut['bangunan']['Layak'] * $atribut['pendapatan']['Layak'] * $atribut['berdiri']['Layak'];
        $probabilitas['Tidak_Layak'] = $atribut['pengelolahan']['Tidak_Layak'] * $atribut['jenis']['Tidak_Layak'] * $atribut['tenagakerja']['Tidak_Layak'] * $atribut['bangunan']['Tidak_Layak'] * $atribut['pendapatan']['Tidak_Layak'] * $atribut['berdiri']['Tidak_Layak'];

        $this->prob1 = $probabilitas['Layak'];
        // dd($this->prob);
        $this->prob2 = $probabilitas['Tidak_Layak'];
        // dd($this->prob);

        if ($probabilitas['Layak'] > $probabilitas['Tidak_Layak']) {
            return 'Layak Menerima';
        } else if ($probabilitas['Layak'] < $probabilitas['Tidak_Layak']) {
            return 'Tidak Layak Menerima';
        }
    }
}
