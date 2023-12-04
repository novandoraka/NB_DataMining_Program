<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJumlah extends Model
{
    public function tot_jum()
    {
        return $this->db->table('data_umkm')->countAll();
    }

    public function tot_tes20()
    {
        return $this->db->query("SELECT COUNT(*) FROM data_testing where id > 364")->getRow();
    }
}
