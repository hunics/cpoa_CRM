<?php

if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])
        or preg_match('/(?i)rekonq/',$_SERVER['HTTP_USER_AGENT']) ){

    echo "The version of your internet explorer is not valid. ";
    echo "For reasons of safety, we are pleased to use other browser or IE9 or higher.";
    exit;

}
    $title = "jpCRM_CPOA";
    
    define("TIMEZONE_IDENTIFIER", "UTC") ;
    define("fROOT",$_SERVER['DOCUMENT_ROOT']."/cpoa" ); 
    define("hROOT", "/cpoa") ;
    
    /*
     * 
     *  grids rows. - This value must be equal 
     *  to  GRID_ROW_NUMBERS value in the main.js
     * 
     */
    define("GRID_ROW_NUMBERS",22) ;
    
    date_default_timezone_set (TIMEZONE_IDENTIFIER);
    ini_set('display_errors', 1);
    
    class connectionData{
        
        public $DB_HOST;
        public $DB_user;
        public $DB_password;
        public $DB_Name;
        
        
        public function __construct() {

            /*
            * 
            * majs legalab codebase64-be kell tenni !!!!
            * 
            */            
            
            $this->DB_HOST = "65.182.103.7" ;
            $this->DB_user = "system";//peticom_cpoa" ;
            $this->DB_password = "rakoczi20" ;
            $this->DB_Name = "cpoa_dbo";//peticom_CPOA" ;
        }
    }    
    
?>
