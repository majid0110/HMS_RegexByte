<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\DoctorModel; 
use App\Models\LoginModel;

use CodeIgniter\Controller;


class AppointmentController extends Controller
{


    
    //------------------------------------------------Main View 
    public function appointments_table()
    {
        $Model = new AppointmentModel();
        $data['Appointments'] = $Model->getAppointments(); 
        return view('appointments_table.php', $data);
    }

    public function fetchDoctorFee($doctorID, $feeTypeID)
    {
    $model = new DoctorModel();
    $doctorFee = $model->getDoctorFee($doctorID, $feeTypeID);

    return $this->response->setJSON(['fee' => $doctorFee['Fee'] ?? '']);
    }


    public function deleteAppointment($appointmentID)
    {
        $model = new AppointmentModel();
        $model->deleteAppointment($appointmentID);
        session()->setFlashdata('success', 'Appointment deleted...!!');

        return redirect()->to(base_url("/appointments_table"));
    }

    //------------------------------------------------Functions
    public function saveAppointment()
    {
        $appointmentModel = new AppointmentModel();
        $doctorModel = new DoctorModel();
        $businessModel = new LoginModel("business");

        $clientID = 10;
        $doctorID = $this->request->getPost('doctor_id');
        $appointmentDate = $this->request->getPost('appointmentDate');
        $appointmentTime = $this->request->getPost('appointmentTime');
        $appointmentType = $this->request->getPost('app_type_id');
        $selectedFeeTypeID = $this->request->getPost('fee_type_id');
        $doctorFee = $doctorModel->getDoctorFeeByDoctorAndType($doctorID, $selectedFeeTypeID);

        $businessID = session()->get('businessID');
        $charges = $businessModel->getBusinessCharges($businessID);
        $data = [
            'clientID' => $clientID,
            'doctorID' => $doctorID,
            'appointmentDate' => $appointmentDate,
            'appointmentTime' => $appointmentTime,
            'appointmentType' => $appointmentType,
            'appointmentFee' => $doctorFee ? $doctorFee['Fee'] : 100, 
            'hospitalCharges'=>$charges,
        ];

        $appointmentModel->saveAppointment($data);

        session()->setFlashdata('success', 'Appointment Booked ...!!');

        return redirect()->to(base_url("/appointments_table"));

    }

    // public function fetchDoctorFee($doctorID, $feeTypeID)
    // {
    //     $model = new DoctorModel();
    //     $doctorFee = $model->getDoctorFee($doctorID, $feeTypeID);
    //     return $this->response->setJSON(['fee' => $doctorFee['Fee'] ?? '']);
    // }

}
