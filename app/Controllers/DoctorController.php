<?php

namespace App\Controllers;

use CodeIgniter\Controller;


use App\Models\DoctorModel;
use App\Models\ClientModel;

use App\Models\AppointmentModel;


class DoctorController extends Controller
{

//-------------------------------------------------------------------------------------------------------------------------
//                                                  Returning Basic Views
//-------------------------------------------------------------------------------------------------------------------------

    public function doctors_form()
    {
        $Model = new DoctorModel();
        $data['specializations'] = $Model->getSpecializations();

        return view('doctors_form.php', $data);
    }

    public function editDoctor($doctorID)
    {
        $model = new DoctorModel();
        $data['specializations'] = $model->getSpecializations();
        $data['doctorDetails'] = $model->getDoctorByID($doctorID);
        return view('edit_doctor.php', $data);
    }

    public function deleteDoctor($doctorID)
    {
        $model = new DoctorModel();
        $model->deleteDoctor($doctorID);

        return redirect()->to(base_url("/doctors_table.php"));
    }

    public function doctors_table()
    {
        $Model = new DoctorModel();
        $data['doctorDetails'] = $Model->getdoctorprofile();
        return view('doctors_table.php', $data);
    }

    public function doctors_fee()
    {
        $model = new DoctorModel();
        $data['doctor_names'] = $model->getDoctorNames();
        $data['fee_types'] = $model->getFeeTypes();
        $data['doctorFees'] = $model->getDoctorFees();
        $data['doctor_names'] = $model->getDoctorNames();
        $data['fee_types'] = $model->getFeeTypes();
        return view('doctors_fee.php', $data);
    }

    public function editDoctorFee($df_id)
    {
        $model = new DoctorModel();
        $data['doctor_names'] = $model->getDoctorNames();
        $data['fee_types'] = $model->getFeeTypes();
        $data['editDoctorFee'] = $model->getDoctorFeeByID($df_id);
        return view('edit_fee', $data);
    }

    public function appointments_form()
    {
        $model = new DoctorModel();
        $data['doctor_names'] = $model->getDoctorNames();
        $data['fee_types'] = $model->getFeeTypes();
        $data['doctorFees'] = $model->getDoctorFees();
        $data['doctor_names'] = $model->getDoctorNames();

        $data['fee_types'] = $model->getFeeTypes();
        $appmodel = new AppointmentModel();
        $data['appointment_types'] = $appmodel->getAppointments();
        $clientModel = new ClientModel();
        $data['client_names'] = $clientModel->getClientNames();


        return view('appointments_form.php', $data);
    }

    public function getDoctors()
    {
        $model = new DoctorModel();
        $doctors = $model->getAllDoctors();

        return $this->response->setJSON(['doctors' => $doctors]);
    }

    public function fetchDoctorFee()
    {
    $doctorID = $this->request->getPost('doctorID');
    $feeTypeID = $this->request->getPost('feeTypeID');

    $model = new DoctorModel();
    $doctorFee = $model->getDoctorFee($doctorID, $feeTypeID);

    return $this->response->setJSON(['fee' => $doctorFee['Fee'] ?? '']);
    }


//-------------------------------------------------------------------------------------------------------------------------
//                                                  Main Fuctions
//-------------------------------------------------------------------------------------------------------------------------

    public function saveDoctorProfile()
    {
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $businessID = $session->get('businessID');

        var_dump($_FILES);
        $profileImage = $request->getFile('profile');
        $ProfileImageName = $profileImage->getName();
        $profileImage->move(FCPATH . 'login_ci4/uploads/', $ProfileImageName);

        $data = [
            'FirstName' => $request->getPost('fName'),
            'LastName' => $request->getPost('lName'),
            'Gender' => $request->getPost('gender'),
            'DateOfBirth' => $request->getPost('dob'),
            'ContactNumber' => $request->getPost('phone'),
            'Email' => $request->getPost('email'),
            'Specialization' => $request->getPost('specialization'),
            'MedicalLicenseNumber' => $request->getPost('MLN'),
            'ClinicAddress' => $request->getPost('address'),
            'HospitalAffiliation' => $request->getPost('hos_af'),
            'Education' => $request->getPost('education'),
            'ExperienceYears' => $request->getPost('experience'),
            'Certification' => $request->getPost('certificate'),
            // 'ProfileImageURL' => $request->getPost('profile'),
            'ProfileImageURL' => $ProfileImageName,
            'BusinessID' => $businessID,
        ];

        $Model = new DoctorModel();
        $Model->saveDoctorProfile($data);

        session()->setFlashdata('success', 'Doctor Added Sucessfully..!!');

        return redirect()->to(base_url("/doctors_form"));
    }



    public function updateDoctor()
    {
        $request = \Config\Services::request();

        $data = [
            'FirstName' => $request->getPost('fName'),
            'LastName' => $request->getPost('lName'),
            'Gender' => $request->getPost('gender'),
            'DateOfBirth' => $request->getPost('dob'),
            'ContactNumber' => $request->getPost('phone'),
            'Email' => $request->getPost('email'),
            'Specialization' => $request->getPost('specialization'),
            'MedicalLicenseNumber' => $request->getPost('MLN'),
            'ClinicAddress' => $request->getPost('address'),
            'HospitalAffiliation' => $request->getPost('hos_af'),
            'Education' => $request->getPost('education'),
            'ExperienceYears' => $request->getPost('experience'),
            'Certification' => $request->getPost('certificate'),
            'ProfileImageURL' => $request->getPost('profile'),
            // 'ProfileImageURL' => $businessImageName,
            'BusinessID' => $request->getPost('bid'),
        ];

        $model = new DoctorModel();
        $model->updateDoctor($request->getPost('DoctorID'), $data);

        return redirect()->to(base_url("/doctors_table"));
    }


    public function Savedoctorsfee()
    {
        $Model = new DoctorModel();

        $data = [
            'Fee' => $this->request->getPost('fee'),
            'FeeTypeId' => $this->request->getPost('fee_type_id'),
            'doctorId' => $this->request->getPost('doctor_id'),
        ];

        $Model->insertDoctorFee($data);

        return redirect()->to(base_url("/doctors_fee"));
    }

    public function updateDoctorFee($df_id)
    {
        $model = new DoctorModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'Fee' => $this->request->getPost('fee'),
                'FeeTypeId' => $this->request->getPost('fee_type_id'),
                'doctorId' => $this->request->getPost('doctor_id'),
            ];

            $model->updateDoctorFee($df_id, $data);

            return redirect()->to(base_url('/doctors_fee'));
        }
    }
}
