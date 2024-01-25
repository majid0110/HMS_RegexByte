<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigureModel extends Model
{

    protected $table;
    protected $primaryKey;
    protected $allowedFields;

    public function __construct(string $tableName)
    {
        parent::__construct();
    
   
        if ($tableName === "business") {
            $this->table = "business";
            $this->primaryKey = 'ID';
            $this->allowedFields = ['ID', 'businessName', 'regName', 'businessTypeID', 'address', 'phone', 'email', 'logo','charges'];
        } 
        elseif ($tableName === "role_permissions") {
            $this->table = "role_permissions";
            $this->primaryKey = 'ID';
            $this->allowedFields = ['ID','roleID','moduleID','can_view','can_insert','can_update','can_delete'];
        }

        elseif ($tableName === "businesstype") {
            $this->table = "businesstype";
            $this->primaryKey = 'ID';
            $this->allowedFields = ['ID','businessType'];
        }
        
    }




    public function getBusinessTypes()
    {
        return $this->db->table('businesstype')->get()->getResultArray();
    }

    public function getBusinessData($businessID)
    {
        return $this->db->table('business')->where('ID', $businessID)->get()->getRowArray();
    }
    public function updateBusinessData($businessID, $data)
    {
        $this->db->table('business')->where('ID', $businessID)->update($data);
    

    }

    public function updateBusinessImage($businessID, $imageName)
    {
        return $this->db->table('business')->where('ID', $businessID)->update(['logo' => $imageName]);

    }
    // Add a method to update business data if needed
}


