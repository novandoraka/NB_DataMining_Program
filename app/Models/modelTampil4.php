<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTampil4 extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'hasil_prediksi';
    protected $primaryKey       = 'no';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'no', 'pengelolahan', 'jenis', 'tenagakerja', 'bangunan', 'pendapatan', 'berdiri', 'hasil_uji'
    ];

    public function add4($dataempat)
    {
        $this->db->table('hasil_prediksi')->insert($dataempat);
    }

    public function cekData4($olah4)
    {
        return $this->db->table('hasil_prediksi')
            ->where('pengelolahan', $olah4)
            ->get()->getRowArray();
    }
}
