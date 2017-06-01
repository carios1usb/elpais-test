<?php 

include './core/patient.php';

// Extended Patient Model
class my_patient extends patient
{

	public function __construct()
    {
        parent::__construct();
    }


    /*
     * Get all patients
     * @return <array>
     */
    public function getAllPatient()
    {
       return $this->list_all();
    }


    /*
     * Get patients by age
     * @param {int} $age
     * @return <array>
     */
    public function getPatientByAge($age){
    	if ($age) {
    		$value = array('list' => $this->filterby("patient_age",$age), 'isList'=> true);
    	}else{
			$value = array('list' => $this->filterby("patient_age",$age), 'isList'=> false);
    	}
    	return $value;
    }

    /*
     * Get count by age
     * @return <array>
     */
    public function getCountByAge(){
    	return $this->groupByAge();
    }
	
}