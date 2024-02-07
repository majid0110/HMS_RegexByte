<?php
namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table = 'artmenu'; 
    protected $primaryKey = 'idArtMenu'; 

    protected $allowedFields = [
        'Code',
        'Name',
        'Price',
        'Promotional_Price',
        'idCatArt',
        'Image',
        'Notes',
        'idBusiness',
        'idUnit',
        'Cost',
        'Product_mix',
        'idTVSH',
        'status',
        'isService',
        'Barcode',
        'characteristic1',
        'characteristic2',
        'noTvshType',
        'idPoint_of_sale',
    ];

    public function getUnits()
    {
        return $this->db->table('units')
            ->select('idUnit, name')
            ->get()
            ->getResultArray();
    }

    public function getCategories()
    {
        return $this->db->table('catart')
            ->select('idCatArt, name')
            ->get()
            ->getResultArray();
    }

    public function getTaxes()
    {
        return $this->db->table('taxtype')
            ->select('tax_id, value')
            ->get()
            ->getResultArray();
    }
}
