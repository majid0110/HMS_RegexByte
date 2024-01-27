<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\LabModel;
use App\Models\DoctorModel;
use App\Models\ClientModel;
use App\Models\AppointmentModel;


class LabController extends Controller
{


       public function labServices_form()
    {
        //$Model = new DoctorModel();
        //$data['specializations'] = $Model->getSpecializations();

        return view('LabServices_form.php');
    }

     public function labtest_form()
    {
        //$Model = new DoctorModel();
        //$data['specializations'] = $Model->getSpecializations();

        return view('labtest_form.php');
    }


    public function saveLabService()
    {
    $request = \Config\Services::request();
    $session = \Config\Services::session();
    $businessID = $session->get('ID');
    $UserID = $session->get('businessID');


    $data = [
        'title' => $request->getPost('ls_name'),
        'description' => $request->getPost('ls_description'),
        'test_fee' => $request->getPost('ls_fee'),
        // There Is an issue, Hammad stored userID in BusinessID and BusinessID in userID
        'userID' => $businessID, 
        'businessID' => $UserID,
    ];

    $model = new LabModel();
    $model->saveLabService($data);

    session()->setFlashdata('success', 'Service Added..!!');

    return redirect()->to(base_url("/labServices_form"));

    }
}