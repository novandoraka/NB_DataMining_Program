<?php

namespace App\Models;

use CodeIgniter\Model;

class modelPerforma extends Model
{
    public function totaldataset()
    {
        return $this->db->query("SELECT * FROM data_umkm LIMIT='364'")->getRow();
    }
}
