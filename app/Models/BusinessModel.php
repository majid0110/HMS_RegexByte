<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessModel extends Model
{
    protected $table = 'business';
    protected $primaryKey = 'ID'; 
    protected $allowedFields = ['businessName', 'regName', 'businessType', 'address', 'phone', 'email', 'logo'];

    public function getBusinessCharges($businessID)
    {
        $query = $this->db->table('business')
        ->select('charges') 
        ->where('BusinessID', $businessID)
        ->get()
        ->getRowArray();

        return $query['charges']; 
    }
//     public functiongetBusinessCharges($businessID)
// {
//     //$businessID = session()->get('businessID');
    
//     $query = $this->db->table('business')
//         ->select('charges') 
//         ->where('BusinessID', $businessID)
//         ->get()
//         ->getRowArray();

//   //  return $query['hospitalCharges'] ?? 0; 
// }
}
