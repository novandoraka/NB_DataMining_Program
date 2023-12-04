<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTampil2 extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'data_transfomasi';
    protected $primaryKey       = 'no';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'no', 'pengelolahan', 'jenis', 'tenagakerja', 'bangunan', 'pendapatan', 'berdiri', 'kep'
    ];

    public function add2($datakedua)
    {
        $this->db->table('data_transfomasi')->insert($datakedua);
    }

    public function cekData2($olah2)
    {
        return $this->db->table('data_transfomasi')
            ->where('pengelolahan', $olah2)
            ->get()->getRowArray();
    }
}
