<?php
@session_start();
require_once("../FrameWork/Mysqli_model.php");

class getUsers {
    
    private $dBManager;
    
    public function __construct() {
        $this->dBManager = new Mysqli_model();
    }
    
    
    private function getReferralRep($ReferralRepID){
        $R_queryje = "SELECT * FROM `referralreps` WHERE ReferralRepID =".$ReferralRepID;
        $R_result = $this->dBManager->getRow($R_queryje);
        if($R_result){
            return $R_result["FirstName"]. " ".$R_result["LastName"];
        }else{
            return "---";
        }
    }
 
    
    private function getSalesRep($SalesRepID){
        $R_queryje = "SELECT * FROM `salesreps` WHERE SalesRepID =".$SalesRepID;
        $R_result = $this->dBManager->getRow($R_queryje);
        if($R_result){
            return $R_result["FirstName"]. " ".$R_result["LastName"];
        }else{
            return "---";
        }
    }    
    
    
    public function get($from,$to){   

        $jsonObj = array();
        
        $queryje = "SELECT * FROM `logins` ORDER BY ID DESC LIMIT ".$from.",".$to;
        $result = $this->dBManager->run($queryje);


        if($result){
           $counter = $from + 1; 


           while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

               $jsonRow = array();
               $jsonRow[] = $counter;
               $jsonRow[] = $row["Username"];
               $jsonRow[] = $row["Password"];
               $jsonRow[] = $row["AccessLevel"];
               $jsonRow[] = $this->getSalesRep($row["SalesRepID"]);
               $jsonRow[] = $this->getReferralRep($row["ReferralRepID"]);
               $jsonRow[] = $row["Workgroup"];

               $jsonObj[] =  $jsonRow;

               $counter ++;
           } 
        }

        return $jsonObj;
    }
}
