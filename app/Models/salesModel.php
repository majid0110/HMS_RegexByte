<?php
namespace App\Models;

use CodeIgniter\Model;

class salesModel extends Model
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

    public function getpayment()
    {
        return $this->db->table('paymentmethods')
            ->select('idPaymentMethods, Method')
            ->get()
            ->getResultArray();
    }

    public function getCurrancy()
    {
        return $this->db->table('currency')
            ->select('id, Currency')
            ->get()
            ->getResultArray();
    }



    public function getServices()
    {
        return $this->db->table('artmenu')
            ->select('idArtMenu, Name, Price')
            ->get()
            ->getResultArray();
    }

    public function getCategories()
    {
        return $this->db->table('catart')
            ->select('idCatArt, name, idSector')
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
