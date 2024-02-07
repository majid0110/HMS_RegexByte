<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\LabModel;
use App\Models\DoctorModel;
use App\Models\ClientModel;
use App\Models\AppointmentModel;
use App\Models\TestModel;
use App\Models\LabtestdetailsModel;
use App\Models\ServicesModel;
use App\Models\salesModel;

class SalesController extends Controller
{

    //-------------------------------------------------------------------------------------------------------------------------
//                                                 Returning Views
//-------------------------------------------------------------------------------------------------------------------------

    public function sales_form()
    {
        $clientModel = new ClientModel();
        $data['client_names'] = $clientModel->getClientNames();


        $sales = new salesModel();
        $data['payments'] = $sales->getpayment();
        $data['currencies'] = $sales->getCurrancy();
        $data['services'] = $sales->getServices();
        $data['categories'] = $sales->getCategories();

        return view('sales_form.php', $data);
    }


    //-------------------------------------------------------------------------------------------------------------------------
//                                                 Main Logic
//-------------------------------------------------------------------------------------------------------------------------

    public function submitServices()
    {
        try {
            $clientId = $this->request->getPost('clientId');
            $paymentMethod = $this->request->getPost('appointmentId');
            $currency = $this->request->getPost('clientId');
            $exchange = $this->request->getPost('appointmentId');
            // $totalFee = $this->request->getPost('totalFee');
            $tests = $this->request->getPost('tests');


            $session = \Config\Services::session();
            $businessID = $session->get('businessID');
            $UserID = $session->get('ID');
            $hospitalcharges = $session->get('hospitalcharges');

            $totalFee = 0;
            foreach ($tests as $test) {
                $totalFee += $test['fee'];
            }

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

            return $this->response->setJSON(['status' => 'success', 'message' => 'Data inserted successfully']);
        } catch (\Exception $e) {
            log_message('error', 'Error retrieving data: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Error retrieving data.', $e->getMessage()]);

            echo ('Error' . $e->getMassage());
        }
    }

}