<?php
require_once("../FrameWork/Mysqli_model.php");


class getReferralReps {
    
    private $dBManager;
    
    public function __construct() {
        $this->dBManager = new Mysqli_model();
    }
    
    public function get($from,$to){   

        $jsonObj = array();
        
        $queryje = "SELECT * FROM `referralreps` ORDER BY ReferralRepID ASC LIMIT ".$from.",".$to;
        $result = $this->dBManager->run($queryje);


        if($result){

           while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

               $jsonRow = array();
               $jsonRow[] = $row["ReferralRepID"];
               $jsonRow[] = $row["FirstName"];
               $jsonRow[] = $row["LastName"];
               $jsonRow[] = $row["Workgroup"];

               $jsonObj[] =  $jsonRow;

           } 
        }

        return $jsonObj;
    }
}
