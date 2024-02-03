<?php

namespace App\Models;

use CodeIgniter\Model;

class LabtestdetailsModel extends Model
{
    protected $table = 'labtestdetails';
    protected $primaryKey = 'labtest_id';
    protected $allowedFields = ['labTestID', 'testTypeID', 'fee','createdAT'];

    // public function savedetails($responseData)
    // {
    //     //$this->db->table('labtest')->insert($data);
    //     return $this->insert($responseData);
    // }

    public function getTestDetails($testId)
{
    return $this->db->table('labtestdetails')
        ->join('test_type', 'test_type.testTypeId = labtestdetails.testTypeID')
        ->where('labTestID', $testId)
        ->select('labtestdetails.*, test_type.title as testTypeName')
        ->get()
        ->getResultArray();
}

}