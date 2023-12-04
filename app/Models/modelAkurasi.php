<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class modelAkurasi extends Model
{
    public function totTesting80()
    {
        $var = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where id > 364")->getRow();
        return $var;
    }

    public function uji80()
    {
        $tes = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Layak' and keputusan_testing='Layak' and id > 364)")->getRow();
        $tes2 = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Tidak Layak' and keputusan_testing='Tidak Layak' and id > 364)")->getRow();
        $totalAkurasi['totakurasi'] = $tes->jumlah + $tes2->jumlah;
        return $totalAkurasi;
    }

    public function ujihitung80()
    {
        $hasiltes = $this->totTesting80();
        $hasiltes2 = $this->uji80();
        $print['result'] = $hasiltes2['totakurasi'] / $hasiltes->jumlah * 100;
        return $print;
    }

    // data training 60%

    public function totTesting60()
    {
        $var = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where id > 273")->getRow();
        return $var;
    }

    public function uji60()
    {
        $tes = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Layak' and keputusan_testing='Layak' and id > 273)")->getRow();
        $tes2 = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Tidak Layak' and keputusan_testing='Tidak Layak' and id > 273)")->getRow();
        $totalAkurasi['totakurasi'] = $tes->jumlah + $tes2->jumlah;
        return $totalAkurasi;
    }

    public function ujihitung60()
    {
        $hasiltes = $this->totTesting60();
        $hasiltes2 = $this->uji60();
        $print['result'] = $hasiltes2['totakurasi'] / $hasiltes->jumlah * 100;
        return $print;
    }

    // data training 70%

    public function totTesting70()
    {
        $var = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where id > 318")->getRow();
        return $var;
    }

    public function uji70()
    {
        $tes = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Layak' and keputusan_testing='Layak' and id > 318)")->getRow();
        $tes2 = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Tidak Layak' and keputusan_testing='Tidak Layak' and id > 318)")->getRow();
        $totalAkurasi['totakurasi'] = $tes->jumlah + $tes2->jumlah;
        return $totalAkurasi;
    }

    public function ujihitung70()
    {
        $hasiltes = $this->totTesting70();
        $hasiltes2 = $this->uji70();
        $print['result'] = $hasiltes2['totakurasi'] / $hasiltes->jumlah * 100;
        return $print;
    }

    // data training 90%

    public function totTesting90()
    {
        $var = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where id > 409")->getRow();
        return $var;
    }

    public function uji90()
    {
        $tes = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Layak' and keputusan_testing='Layak' and id > 409)")->getRow();
        $tes2 = $this->db->query("SELECT COUNT(*) as jumlah from data_testing where (hasil_testing='Tidak Layak' and keputusan_testing='Tidak Layak' and id > 409)")->getRow();
        $totalAkurasi['totakurasi'] = $tes->jumlah + $tes2->jumlah;
        return $totalAkurasi;
    }

    public function ujihitung90()
    {
        $hasiltes = $this->totTesting90();
        $hasiltes2 = $this->uji90();
        $print['result'] = $hasiltes2['totakurasi'] / $hasiltes->jumlah * 100;
        return $print;
    }


    public function transport()
    {
        // $pindah = $this->db->query('SELECT * FROM training_k1 WHERE no > 265 or no < 286')->getResultObject();
        $pindah = $this->db->query('SELECT * FROM training_k1 WHERE no < 183')->getResultObject();
        foreach ($pindah as $key => $value) {
            $this->db->table('variasilatih_4')->insert([
                'pengelolahan' => $value->pengelolahan,
                'jenis' => $value->jenis,
                'tenagakerja' => $value->tenagakerja,
                'bangunan' => $value->bangunan,
                'pendapatan' => $value->pendapatan,
                'berdiri' => $value->berdiri,
                'kep' => $value->kep
            ]);
        }
    }

    public function totK1()
    {
        $var = $this->db->query("SELECT COUNT(*) as jumlah from variasiuji_4")->getRow();
        return $var;
    }

    public function jumlahSamaK1()
    {
        $tes = $this->db->query("SELECT COUNT(*) as jumlah from variasiuji_4 where (kep='Layak' and hasil_uji='Layak')")->getRow();
        $tes2 = $this->db->query("SELECT COUNT(*) as jumlah from variasiuji_4 where (kep='Tidak Layak' and hasil_uji='Tidak Layak')")->getRow();
        $totalAkurasi['totakurasi'] = $tes->jumlah + $tes2->jumlah;
        return $totalAkurasi;
    }

    public function ujihitungK1()
    {
        $hasiltes = $this->totK1();
        $hasiltes2 = $this->jumlahSamaK1();
        $print['result'] = $hasiltes2['totakurasi'] / $hasiltes->jumlah * 100;
        return $print;
    }
}
