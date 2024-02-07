<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\LabModel;
use App\Models\DoctorModel;
use App\Models\ClientModel;
use App\Models\AppointmentModel;
use App\Models\TestModel;
use App\Models\LabtestdetailsModel;


class LabController extends Controller
{


    public function labServices_form()
    {
        //$Model = new DoctorModel();
        //$data['specializations'] = $Model->getSpecializations();


        return view('LabServices_form.php');
    }

     public function labtest_table()
    {
        $Model = new TestModel();
        $data['Tests'] = $Model->getTestsWithDetails(); 
        return view('labtest_table.php',$data);
    }

    public function viewTestDetails($testId)
    {
    $model = new LabtestdetailsModel();
    $data['testDetails'] = $model->getTestDetails($testId);
    return view('test_details', $data);
    }

    public function labtest_form()
    {
        $clientModel = new ClientModel();
        $data['client_names'] = $clientModel->getClientNames();

        $labmodel = new LabModel();
        $data['test_types'] = $labmodel->getTestType();

        $appointmentModel = new AppointmentModel();
        $data['appointments'] = $appointmentModel->getAppointments();

        return view('labtest_form.php',$data);
    }


    public function saveLabService()
    {
    $request = \Config\Services::request();
    $session = \Config\Services::session();
    $businessID = $session->get('businessID');
    $UserID = $session->get('ID');


    $data = [
        'title' => $request->getPost('ls_name'),
        'description' => $request->getPost('ls_description'),
        'test_fee' => $request->getPost('ls_fee'),
        'userID' => $UserID, 
        'businessID' => $businessID,
    ];

    $model = new LabModel();
    $model->saveLabService($data);

    session()->setFlashdata('success', 'Service Added..!!');

    return redirect()->to(base_url("/labServices_form"));

    }

public function addTest()
{
    $testModel = new TestModel();

    if ($this->request->getMethod() === 'post') {
        // Retrieve form data
        $clientId = $this->request->getPost('clientId');
        $appointmentId = $this->request->getPost('appointmentId');

        // Iterate through the added tests
        $tests = $this->request->getPost('tests');

        if (!empty($tests)) {
            foreach ($tests as $test) {
                $data = [
                    'testTypeId' => $test['testTypeId'],
                    'fee' => $test['testFee'],
                    'userId' => 1, 
                    'businessId' => 1, 
                    'hospitalCharges' => $this->request->getPost('hospitalCharges'),
                    'clientId' => $clientId,
                    'appointmentId' => $appointmentId,
                ];

                // Save data to the database
                $testModel->saveTest($data);
            }
        }

        // Flash message for success
        session()->setFlashdata('success', 'Tests added successfully.');

        // Redirect to the page where you want to go after adding the tests
        return redirect()->to(base_url()); // Replace with your desired URL
    }

    // Fetch necessary data to populate dropdowns or other form elements
    $data['testTypes'] = []; // Replace with the actual data for test types

    return view('add_test_form', $data);
}

public function getTestTypePrice($testTypeId)
{
    $labModel = new LabModel();
    $testType = $labModel->find($testTypeId);

    if ($testType) {
        return $this->response->setJSON($testType);
    } else {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Test type not found.']);
    }
}

public function getAppointmentsForClient()
{
    try {
        $clientId = $this->request->getPost('clientId');
        log_message('info', 'Client ID: ' . $clientId);

        if (empty($clientId)) {
            throw new \Exception('Invalid client ID.');
        }

        $appointmentModel = new AppointmentModel();
        $appointments = $appointmentModel->getAppointmentsForClient($clientId);

        return $this->response->setJSON(['success' => true, 'appointments' => $appointments]);
    } catch (\Exception $e) {
        log_message('error', 'Error: ' . $e->getMessage()); 
        return $this->response->setJSON(['error' => $e->getMessage()]);
    }
}


// public function submitTests()
// {
//     try {

//         $clientId = $this->request->getPost('clientId');
//         $appointmentId = $this->request->getPost('appointmentId');
//         $totalFee = $this->request->getPost('totalFee');


//         $session = \Config\Services::session();
//         $businessID = $session->get('businessID');
//         $UserID = $session->get('ID');
//         $hospitalcharges= $session->get('hospitalcharges');
       


//             $data = [
//             'testTypeId' => 2,
//             'fee' => $totalFee,
//             'userId' => $UserID,
//             'businessId' => $businessID,
//             'hospitalCharges' => $hospitalcharges,
//             'clientId' => $clientId, 
//             'appointmentId'=>11,
//               ];
      

//         $labModel = new TestModel();
//         $labModel->saveTest($data);
//           return $this->response->setJSON(['success' => true, $data]);
       
//     } catch (\Exception $e) {
//         // log_message('error', 'Error retrieving data: ' . $e->getMessage());
//         // return $this->response->setJSON(['error' => 'Error retrieving data.',  $e->getMessage()]);

//         echo('Error' .$e->getMassage());
//     }
// }
public function getTestTypeId()
{
    try {
        $testType = $this->request->getPost('testType');
        $labModel = new LabModel();
        $testTypeInfo = $labModel->where('title', $testType)->first();

        if ($testTypeInfo) {
            return $this->response->setJSON(['testTypeId' => $testTypeInfo['testTypeId']]);
        } else {
            return $this->response->setJSON(['error' => 'Test type not found.']);
        }
    } catch (\Exception $e) {
        log_message('error', 'Error retrieving test type ID: ' . $e->getMessage());
        return $this->response->setJSON(['error' => 'Error retrieving test type ID.', 'message' => $e->getMessage()]);
    }
}

// public function getTestTypeId()
// {
//     $testType = $this->request->getPost('testType');
//     $testTypeModel = new TestModel();
//     $testTypeInfo = $testTypeModel->where('title', $testType)->first();

//     if ($testTypeInfo) {
//         return $this->response->setJSON(['testTypeId' => $testTypeInfo['testTypeId']]);
//     } else {
//         return $this->response->setJSON(['error' => 'Test type not found.']);
//     }
// }

public function getAppointmentTypeName($appointmentId)
{
    $appointmentModel = new AppointmentModel();
    $appointmentType = $appointmentModel->getAppointmentTypeName($appointmentId);

    if ($appointmentType) {
        return $this->response->setJSON(['appointmentTypeName' => $appointmentType]);
    } else {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Appointment type not found.']);
    }
}


// public function submitTests()
// {
//         try{
//         $clientId = $this->request->getPost('clientId');
//         $appointmentId = $this->request->getPost('appointmentId');
//        // $totalFee = $this->request->getPost('totalFee');
//         $tests = $this->request->getPost('tests');


//         $session = \Config\Services::session();
//         $businessID = $session->get('businessID');
//         $UserID = $session->get('ID');
//         $hospitalcharges= $session->get('hospitalcharges');

//         $totalFee = 0;
//             foreach ($tests as $test) {
//              $totalFee += $test['fee'];
//             }

//             $data = [
//             'testTypeId' => 0,
//             'fee' => $totalFee,
//             'userId' => $UserID,
//             'businessId' => $businessID,
//             'hospitalCharges' => $hospitalcharges,
//             'clientId' => $clientId, 
//             'appointmentId'=>$appointmentId,
//               ];


//          $labModel = new TestModel();
//         $labtestId= $labModel->saveTest($data);


//         $detailsModel = new LabtestdetailsModel();
//         foreach ($tests as $test) {
//             $detailsModel->insert([
//                 'labTestID' => $labtestId,
//                 'testTypeID' => $test['testTypeId'],

//                 'fee' => $test['fee'],
//             ]);
//        }

//     return $this->response->setJSON(['status' => 'success', 'message' => 'Data inserted successfully']);
//     }catch (\Exception $e) {
//          log_message('error', 'Error retrieving data: ' . $e->getMessage());
//          return $this->response->setJSON(['error' => 'Error retrieving data.',  $e->getMessage()]);

//         echo('Error' .$e->getMassage());
//     }
// }

public function submitTests()
{
    $db = \Config\Database::connect();

    try {
        $clientId = $this->request->getPost('clientId');
        $appointmentId = $this->request->getPost('appointmentId');
        $tests = $this->request->getPost('tests');

        $session = \Config\Services::session();
        $businessID = $session->get('businessID');
        $UserID = $session->get('ID');
        $hospitalcharges = $session->get('hospitalcharges');

        $totalFee = 0;
        foreach ($tests as $test) {
            $totalFee += $test['fee'];
        }
        // Start the transaction
        $db->transBegin();

        $data = [
            'testTypeId' => 0,
            'fee' => $totalFee,
            'userId' => $UserID,
            'businessId' => $businessID,
            'hospitalCharges' => $hospitalcharges,
            'clientId' => $clientId, 
            'appointmentId' => $appointmentId,
        ];

        $labModel = new TestModel();
        $labtestId = $labModel->saveTest($data);

        $detailsModel = new LabtestdetailsModel();
        foreach ($tests as $test) {
            $detailsModel->insert([
                'labTestID' => $labtestId,
                'testTypeID' => $test['testTypeId'],
                'fee' => $test['fee'],
            ]);
        }

        // Commit the transaction
        $db->transCommit();
        
        

        return $this->response->setJSON(['status' => 'success', 'message' => 'Data inserted successfully']);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an exception
        $db->transRollback();

        log_message('error', 'Error retrieving data: ' . $e->getMessage());
        return $this->response->setJSON(['error' => 'Error retrieving data.',  $e->getMessage()]);
    }
}

}