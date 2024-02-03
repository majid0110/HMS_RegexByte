<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'labtest';
    protected $primaryKey = 'test_id';
    protected $allowedFields = ['testTypeId', 'fee', 'userId', 'businessId', 'hospitalCharges', 'clientId', 'appointmentId', 'CreatedAT'];



        
        public function saveTest($responseData)
    {
        //$this->db->table('labtest')->insert($data);

           $this->insert($responseData);
           return $this->db->insertID();
    }

    
    public function getTestsWithDetails()
    {
        return $this->db->table('labtest')
            ->join('client', 'client.idClient = labtest.clientId')
            ->join('users', 'users.ID = labtest.userId')
            ->select('labtest.*, client.client as clientName, users.fName as userName')
            ->get()
            ->getResultArray();
    }

}