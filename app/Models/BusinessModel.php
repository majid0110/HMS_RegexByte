<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessModel extends Model
{
    protected $table = 'business';
    protected $primaryKey = 'ID'; 
    protected $allowedFields = ['businessName', 'regName', 'businessType', 'address', 'phone', 'email', 'logo'];
}
