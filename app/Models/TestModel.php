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

    // public function submitTests()
    // {
    //     $clientId = $this->request->getPost('clientId');
    //     $appointmentId = $this->request->getPost('appointmentId');
    //     $tests = $this->request->getPost('tests');
    //     if ($tests === null || !is_array($tests)) {
    //         return $this->response->setJSON(['success' => false, 'error' => 'Invalid input. Tests must be an array.']);
    //     }
    //     $labModel = new LabModel();
    //     foreach ($tests as $test) {
    //         $labModel->insert($test);
    //     }
    //     return $this->response->setJSON(['success' => true]);
    // }
}