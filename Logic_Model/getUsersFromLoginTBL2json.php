<?php
require_once("../FrameWork/Mysqli_model.php");


class getUsers {
    
    private $dBManager;
    
    public function __construct() {
		$this->getSalesRepS = array();
		$this->getRefferalRepS = array();
        $this->dBManager = new Mysqli_model();
    }
    
    
    private function getReferralRep($ReferralRepID){
		/*
		 * speeder ini 2 Read from Array
		 */ 
			if(array_key_exists($ReferralRepID,$this->getRefferalRepS)){
				$rr =  $this->getRefferalRepS[$ReferralRepID];
				return $rr[0]. "  ". $rr[1];
			}
		/*
		 * speeder end
		 */ 
		
        $R_queryje = "SELECT * FROM `referralreps` WHERE ReferralRepID =".$ReferralRepID;
        $R_result = $this->dBManager->getRow($R_queryje);
        if($R_result){
			// - speeder add to Array ini
			$this->getRefferalRepS[$ReferralRepID] = array($R_result["FirstName"],$R_result["LastName"]);
            // - speeder add end
            return $R_result["FirstName"]. " ".$R_result["LastName"];
        }else{
			$this->getRefferalRepS[$ReferralRepID] = array("--","--");
            return "---";
        }
    }
 
    
    private function getSalesRep($SalesRepID){
		/*
		 * speeder ini 2 Read from Array
		 */ 
			if(array_key_exists(SalesRepID,$this->getSalesRepS)){
				$ri =  $this->getSalesRepS[$SalesRepID];
				return $ri[0]. "  ". $ri[1];
			}
		/*
		 * speeder end
		 */ 
        $R_queryje = "SELECT * FROM `salesreps` WHERE SalesRepID =".$SalesRepID;
        $R_result = $this->dBManager->getRow($R_queryje);
        if($R_result){
			// - speeder add to Array ini
			$this->getSalesRepS[$SalesRepID] = array($R_result["FirstName"],$R_result["LastName"]);
            // - speeder add end
            return $R_result["FirstName"]. " ".$R_result["LastName"];
        }else{
			$this->getSalesRepS[$SalesRepID] = array("--","--");
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
