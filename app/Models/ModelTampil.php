<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTampil extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'data_umkm';
    protected $primaryKey       = 'no';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'no', 'pengelolahanusaha', 'jenisusaha', 'jumlahtenagakerja', 'luasbangunan', 'omset', 'tahunberdiri', 'keputusan'
    ];

    public function add($data)
    {
        $this->db->table('data_umkm')->insert($data);
    }

    public function cekData($olah)
    {
        return $this->db->table('data_umkm')
            ->where('pengelolahanusaha', $olah)
            ->get()->getRowArray();
    }
}
