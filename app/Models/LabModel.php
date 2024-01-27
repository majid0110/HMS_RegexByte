<?php

namespace App\Models;

use CodeIgniter\Model;

class LabModel extends Model
{
    protected $table = 'test_type';
    protected $primaryKey = 'testTypeId';
    protected $allowedFields = ['title', 'description', 'test_fee', 'userID', 'businessID', 'createdAt'];

    public function saveLabService($data)
    {
        return $this->insert($data);
    }

}