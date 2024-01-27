<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointment';
    protected $primaryKey = 'appointmentID';
    protected $allowedFields = ['clientID', 'doctorID', 'appointmentDate', 'appointmentTime', 'appointmentType', 'appointmentFee', 'createdAT', 'updatedAT'];

    public function saveAppointment($data)
    {
        return $this->insert($data);
    }


    public function getAppointments()
    {
        return $this->db->table('appointment')
            ->join('client', 'client.idClient = appointment.clientID')
            ->join('doctorprofile', 'doctorprofile.DoctorID = appointment.doctorID')
            ->join('fee_type', 'fee_type.f_id = appointment.appointmentType')
            ->select('appointment.*, client.client as clientName, doctorprofile.FirstName as doctorFirstName, doctorprofile.LastName as doctorLastName, fee_type.FeeType as appointmentTypeName')
            ->get()
            ->getResultArray();
    }

    public function getAppointmentTypes()
    {
    return $this->db->table('fee_type')->get()->getResultArray();
    }


    public function deleteAppointment($appointmentID)
    {
        return $this->where('appointmentID', $appointmentID)->delete();
    }



}
