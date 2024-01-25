<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientModel;

class ClientController extends Controller
{
    //------------------------------------------- Returning View
    public function clients_form()
    {
        // $Model = new DoctorModel();
        // $data['specializations'] = $Model->getSpecializations();

        return view('clients_form.php');
    }

    public function clients_table()
    {
        $model = new ClientModel();
        $data['clientDetails'] = $model->getclientprofile(); 
        return view('clients_table.php', $data);
    }

    public function editClient($idClient)
    {
        $model = new ClientModel();
        // $data['specializations'] = $model->getSpecializations();
        // $data['doctorDetails'] = $model->getDoctorByID($doctorID);
        return view('edit_doctor.php', $data);
    }

    // public function deleteClient($idClient)
    // {
    //     $model = new ClientModel();
    //     $model->deleteClient($idClient);
    //     $model->deleteClient($idClient);

    //     return redirect()->to(base_url("/clients_table"));
    // }

    public function deleteClient($idClient)
{
    try {
        $model = new ClientModel();
        if ($model->hasBookings($idClient)) {
            throw new \Exception("This client has bookings. You cannot delete the client.");
        }
        $model->deleteClient($idClient);

        return redirect()->to(base_url("/clients_table"));
    } catch (\Exception $e) {
        echo '<script>alert("' . $e->getMessage() . '");</script>';
    }
}




    public function appointments_form($doctorID)
    {
        $model = new ClientModel();
        $data['doctorDetails'] = $model->getDoctorByID($doctorID);
    
        return view('appointments_form.php', $data);
    }
    
    
    // public function editClient($idClient)
    // {
    //     return redirect()->to(base_url("/clients_table"));
    // }

    //-------------------------------------------------------Main Functions


public function saveClientProfile()
{
    $request = \Config\Services::request();
    $session = \Config\Services::session();

    $model = new ClientModel();
    $businessID = $session->get('businessID');

    $mainClient = ($request->getPost('mclient') == 'on') ? 1 : 0;

    // If mainClient is checked, update existing mainClient clients to 0
    if ($request->getPost('mclient') == 1) {
        $model->resetMainClients();
    }

    $data = [
        'client' => $request->getPost('cName'),
        'contact' => $request->getPost('cphone'),
        'email' => $request->getPost('cemail'),
        'CNIC' => $request->getPost('CNIC'),
        'status' => $request->getPost('cstatus'),
        'Def' => $request->getPost('cdef'),
        'idBusiness' => $businessID, // Assigning the static value 34 to businessID
        'identification_type' => $request->getPost('idType'),
        'limitExpense' => $request->getPost('expense'),
        'discount' => $request->getPost('discount'),
        'mainClient' => $request->getPost('mclient'),
        'address' => $request->getPost('address'),
        'city' => $request->getPost('city'),
        'state' => $request->getPost('state'),
        'code' => $request->getPost('code'),
    ];

    $model->saveClient($data);

    session()->setFlashdata('success', 'Clinet Added..!!');

    return redirect()->to(base_url("/clients_form"));
}


}
