<?php 

include 'base.php';

// Patient Model
// Clase del Core
class patient extends base
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

    /*
     * SQL to get all patients
     * @return <array>
     */
    public function list_all()
    {
        $result_array = array();
        $result = $this->db->query('select * from patients');

        return parent::result_array($result);
    }

    /*
     * Get patients by specific age
     * @param {int} $age
     * @return <array>
     */
    public function filterby($field,$age)
    {
        $result_array = array();
        $result = $this->db->query('select * from patients where '.$field.' > '.$age.';');

        return parent::result_array($result);
    }


    /*
     * SQL to get count by age
     * @return <array>
     */
    public function groupByAge()
    {
        $result_array = array();
        $result = $this->db->query('SELECT patient_age,COUNT(patient_age) as quantity FROM patients Group BY patient_age');

        return parent::result_array($result);
    }
}