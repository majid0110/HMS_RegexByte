<?php

namespace App\Models;

use CodeIgniter\Model;

class LabtestdetailsModel extends Model
{
    protected $table = 'labtestdetails';
    protected $primaryKey = 'labtestdetails_id';
    protected $allowedFields = ['labtest_id', 'labTestID', 'testTypeID', 'fee', 'createdAT'];

    // public function savedetails($responseData)
    // {
    //     //$this->db->table('labtest')->insert($data);
    //     return $this->insert($responseData);
    // }
}