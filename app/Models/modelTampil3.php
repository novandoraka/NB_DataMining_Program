<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTampil3 extends Model
{
    protected $table            = 'data_testing';
    protected $primaryKey       = 'no';
    protected $allowedFields    = [
        'id', 'pengelolahan_testing', 'jenis_testing', 'karyawan_testing', 'bangunan_testing', 'omset_testing', 'tahun_testing', 'keputusan_testing', 'hasil_testing'
    ];

    public function add3($data)
    {
        $this->db->table('data_testing')->insert($data);
    }

    public function cekData($olah)
    {
        return $this->db->table('data_testing')
            ->where('pengelolahan_testing', $olah)
            ->get()->getRowArray();
    }
}
