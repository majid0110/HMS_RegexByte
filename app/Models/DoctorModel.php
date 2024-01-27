<?php
namespace App\Models;

use CodeIgniter\Model;


class DoctorModel extends Model
{

    protected $table = "doctorprofile"; 
    protected $allowedFields = ['FirstName', 'LastName', 'Gender', 'DateOfBirth', 'ContactNumber', 'Email', 'Specialization', 'MedicalLicenseNumber', 'ClinicAddress', 'HospitalAffiliation', 'Education', 'ExperienceYears', 'Certification', 'ProfileImageURL', 'BusinessID'];

    public function saveDoctorProfile($data)
    {
        $this->db->table('doctorprofile')->insert($data);
    }

    public function getSpecializations()
    {
        return $this->db->table('specialization')->get()->getResultArray();
    }
    public function getAllDoctors()
    {
        return $this->select('DoctorID, FirstName, LastName')->findAll();
    }

    public function getdoctorprofile()
{
    return $this->db->table('doctorprofile')
        ->join('specialization', 'specialization.s_id = doctorprofile.Specialization')
        ->get()
        ->getResultArray();
}
public function deleteDoctor($doctorID)
    {
        // Delete the doctor record based on the given doctorID
        $this->db->table('doctorprofile')->where('DoctorID', $doctorID)->delete();
    }


    public function getDoctorByID($doctorID)
    {
        // Fetch and return the doctor details based on the given doctorID
        return $this->db->table('doctorprofile')->where('DoctorID', $doctorID)->get()->getRowArray();
    }

    public function updateDoctor($doctorID, $data)
    {
        // Update the doctor details based on the given doctorID
        $this->db->table('doctorprofile')->where('DoctorID', $doctorID)->update($data);
    }

    public function getDoctorNames()
    {
        $query = $this->select('DoctorID, FirstName, LastName')->findAll();
        return $query;
    }

    public function getFeeTypes()
    {
        // Assuming you have a 'fee_type' table in your database
        $query = $this->db->table('fee_type')
            ->select('f_id, FeeType, Description')
            ->get()
            ->getResult();

        return $query;
    }

    public function insertDoctorFee($data)
    {
        $this->db->table('doctor_fee')->insert($data);
    }

    public function getDoctorFees()
{
    return $this->db->table('doctor_fee')
        ->join('doctorprofile', 'doctorprofile.DoctorID = doctor_fee.doctorId')
        ->join('fee_type', 'fee_type.f_id = doctor_fee.FeeTypeId')
        ->select('doctor_fee.df_id, doctorprofile.FirstName, doctorprofile.LastName, fee_type.FeeType, doctor_fee.Fee')
        ->get()
        ->getResultArray();
}

public function getDoctorFeeByID($df_id)
{
    return $this->db->table('doctor_fee')
        ->where('df_id', $df_id)
        ->get()
        ->getRowArray();
}

public function updateDoctorFee($df_id, $data)
{
    $this->db->table('doctor_fee')
        ->where('df_id', $df_id)
        ->update($data);
}

public function getDoctorNamesWithSpecialization()
{
    $doctors = $this->db->table('doctorprofile')->select('DoctorID, FirstName, LastName, Specialization')->get()->getResultArray();

    foreach ($doctors as &$doctor) {
        $specializationDetails = $this->db->table('specialization')->where('s_id', $doctor['Specialization'])->get()->getResultArray();
        $doctor['specializationDetails'] = $specializationDetails;
    }

    return $doctors;
}

public function getDoctorFeeByDoctorAndType($doctorID, $feeTypeID)
{
    return $this->db->table('doctor_fee')
        ->where(['doctorId' => $doctorID, 'FeeTypeId' => $feeTypeID])
        ->get()
        ->getRowArray();
}

public function getDoctorFee($doctorID, $feeTypeID)
{
    return $this->db->table('doctor_fee')
        ->where('doctorId', $doctorID)
        ->where('FeeTypeId', $feeTypeID)
        ->get()
        ->getRowArray();
}

}

