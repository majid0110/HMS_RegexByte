<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table;
    protected $primaryKey;
    protected $allowedFields;

    public function __construct(string $tableName)
    {
        parent::__construct();
    
    $this->table = "license";
        
        if ($tableName === "users") {
            $this->table = "users";
            $this->primaryKey = 'ID'; 
            $this->allowedFields = ['ID', 'fName', 'lName', 'email', 'address', 'phone', 'password', 'businessID',  'profile', 'CNIC', 'CNIC_img'];
        } elseif ($tableName === "business") {
            $this->table = "business";
            $this->primaryKey = 'ID';
            $this->allowedFields = ['ID', 'businessName', 'regName', 'businessTypeID', 'address', 'phone', 'email', 'logo','charges'];
        } elseif ($tableName === "license") {
              $this->primaryKey = 'ID';
            $this->allowedFields = ['ID', 'license', 'businessID', 'created_at', 'updated_at'];
        }
        elseif ($tableName === "role") {
            $this->table = "role";
            $this->primaryKey = 'ID';
            $this->allowedFields = ['ID', 'role_name', 'role_description','businessID'];
        }
        elseif ($tableName === "modules") {
            $this->table = "modules";
            $this->primaryKey = 'id';
            $this->allowedFields = ['module_name'];
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
    

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }
    

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

   

    public function getAllBusinessTypes()
    {
        return $this->select('ID, businessType')->findAll();

    }

   
    public function saveBusiness($data)
    {
        $this->db->table('business')->insert($data);
       return $this->db->insertID();
    }

    public function saveUser($data)
    {
        $this->db->table('users')->insert($data);
    
    }

    public function saveLicense($data)
    {
        $this->db->table('license')->insert($data);
    
    }

   
    public function getBusinessData($businessID)
    {
        return $this->db->table('business')->where('ID', $businessID)->get()->getRowArray();
    }


    public function getBusinessTable()
    {
        $query = $this->select('business.*, businesstype.businessType')
            ->join('businesstype', 'businesstype.ID = business.businessTypeID')
            ->findAll();

        return $query;
    }

   
    public function getModuleNames()
    {
        return $this->select('ID, module_name')->findAll();
    }



    public function save_role($data)
    {
        $this->db->table('role')->insert($data);
       return $this->db->insertID();
    }

    public function saveRolePermissions($permissionsData)
    {
        $this->insertBatch($permissionsData);
    }

    public function getAllRoles()
    { 
        { 
            $session = \Config\Services::session();
            $businessID = $session->get('businessID');
            return  $this->select('ID, role_name')
            ->where('businessID', $businessID) 
            ->findAll();
           
        }
    }

  

    public function getRolePermissions($roleID)
    {
        return $this->where('roleID', $roleID)->findAll();
    }

    public function getModules()
    {
    
        $query = $this->db->table('modules')->get();
        return $query->getResultArray();
    }

    public function getBusinessCharges($businessID)
    {
        return $this->db->table($this->table)
            ->where('ID', $businessID)
            ->select('charges')
            ->get()
            ->getRowArray()['charges'] ?? null;
    }

    public function getuserprofile()
    {
        $session = \Config\Services::session();
        $businessID = $session->get('businessID');

        return $this->db->table('users')
        ->where('businessID', $businessID)
            ->get()
            ->getResultArray();
    }

    public function get_user_by_id($user_id)
    {
        return $this->find($user_id);
    }

    public function updateUserData($UserID, $data)
    {
        $this->db->table('users')->where('ID', $UserID)->update($data);

    }
    
}

