<?php
/*
 * 
 * Péter Jámbor 2014/01/14 - 18
 * jp.software.peticom@gmail.com
 * info@jp-software-solutions.com
 * http://www.jp-software-solutions.com
 * 
 * FaceBook Login and WebApplication-DB sync. solution
 * for College Prospects of America Inc. 
 * User Data read and Save from FaceBook
 * V.0.1 - Release Version
 * 
 * 
 * ############################################################
 * # Class and Object integration example for fbconnect.php:  #
 * #--------------------------------------------------------- #
 * #                                                          #
 * #  require_once('jp_DEV_01.php');                          # 
 * #	 $fbObj = new jpFaceBook;                             #
 * #	 $userDats = $fbObj->get_User_From_FB($user_profile); #
 * #                                                          #
 * #  if($userDats != "NULL"){                                #
 * #		// loged                                      #
 * #  }                                                       #
 * ############################################################
 * 
 * 
 */


require_once("../../admin/_includes/config.php");
require_once("../../admin/_includes/conn.php");
 
class jpFaceBook{
	
	private $logFile;
        private $fbD_Dir;
        private $fbFn;
        
	function __construct() {
		$this->logFile = dirname(__FILE__)."/fb_acces_log/fb_login.log";
                $this->fbD_Dir = dirname(__FILE__)."/fb_/";
                

	}
	
	private function update__jp_facebook_requests_TBL($user_prof,$scHTML,$acDateTime,$thisMember_ID){
        
                $uem = str_replace("@","_kkc_",$user_prof[email]);
                $uem = str_replace(".","_pnt_",$uem);
                $uem.= ".4inc2fb";
                $this->fBFn = $this->fbD_Dir.$uem;
                file_put_contents ( $this->fBFn, base64_encode($scHTML));  
		$user_prof = str_replace("'","`",$user_prof);

		if($thisMember_ID == false){
			$thisMember = "NON-registered";
			$uid = 0;
		}else{
			$thisMember = "OUR Client [#".(string)$thisMember_ID."]";
			$uid = $thisMember_ID;
		}
		$SQLm ="SELECT ClientID FROM jp_facebook_requests WHERE ClientID = ".$thisMember_ID;
		$restmp = mysql_query($SQLm);
		if( mysql_num_rows($restmp)>0){
			/*
			 * UPDATE OUR Client
			 */
			$SQLm = "UPDATE `jp_facebook_requests` SET ";
			$SQLm.= "`email` = '".$user_prof[email]."',";
			$SQLm.= "`first_name` = '".$user_prof[first_name]."',";
			$SQLm.= "`last_name` = '".$user_prof[last_name]."',";
			$SQLm.= "`this_member` = '".$thisMember."',";
			$SQLm.= "`last_request_server_time` = '".$acDateTime."',";
			$SQLm.= "`html_Tbl` = '".$uem."',";
                        $SQLm.= "`link` = '".$user_prof[link]."' WHERE `ClientID`=".(string)$uid.";";


		}else{
				/*
				* UPDATE OLD Facebook user 
				*/ 
				$SQLm ="SELECT `email` FROM `jp_facebook_requests` WHERE `email` = '".$user_prof[email]."';";
				$restmp = mysql_query($SQLm);
				if( mysql_num_rows($restmp)>0){
					$SQLm = "UPDATE `jp_facebook_requests` SET ";
					$SQLm.= "`first_name` = '".$user_prof[first_name]."',";
					$SQLm.= "`last_name` = '".$user_prof[last_name]."',";
					$SQLm.= "`this_member` = '".$thisMember."',";
					$SQLm.= "`last_request_server_time` = '".$acDateTime."',";
					$SQLm.= "`html_Tbl` = '".$uem."',";
					$SQLm.= "`link` = '".$user_prof[link]."' WHERE `email`='".$user_prof[email]."';";
				}else{
					/*
					* INSERT NEW Facebook user 
					*/ 
					$SQLm = "INSERT INTO `jp_facebook_requests` (`ID`, `email`, `first_name`,";
					$SQLm.= "`last_name`, `this_member`, `last_request_server_time`, `html_Tbl`,";
					$SQLm.= "`link`,`ClientID`) VALUES (NULL, '".$user_prof[email]."', '";
					$SQLm.= $user_prof[first_name]."', '".$user_prof[last_name]."', '".$thisMember."', '";
					$SQLm.= $acDateTime."','".$uem."',"."'";
					$SQLm.= $user_prof[link]."',".(string)$uid.");";
				}
		}
		$insertem = mysql_query($SQLm);
		if (!$insertem) {
                        die("Errore nella query : " . mysql_error());
		}
	}
	private function makeLink($values){
                         $values = "<a href=\"https://www.facebook.com/".(string)$values."\" target=\"_blank\"";
                         $values.= " title=\"Open in new window\">go to this FB Page</a>";
                         return $values;           
        }
        
	private function makeInfo($info,$internal){
			if($internal !=null){
				$html = "<table class=\"jpInternalTbl\">";
			}else{
				$html = "<table class=\"jpParentTbl\">";
			}
			 foreach($info as $keys=>$values){

				/*if($keys =="name" ){
					if($internal != null){
						if((string)$keys == "0"){
							$keys = "0";
						}else{
							$keys = "&nbsp;";
						}
					}
				}*/
                             if($keys =="id" && gettype($values) != "array"){
                                 $values = $this-> makeLink($values);
                             } 
				if($internal == null){
					$_row = "<tr><td class=\"tr\" valign=\"middle\" align=\"left\">";
					$_row.= strtoupper($keys).":</td><td align=\"left\">";
				}else{
					$_row = "<tr><td valign=\"middle\" align=\"left\">";
					$_row.= strtoupper($keys).":</td><td style=\"width:100%;\"  align=\"left\">";
				}
					if(gettype($values)=="array"){
						$_row.= $this->makeInfo($values,true);
					}else{
                                                
						if($keys=="email"){
							$values ="<a href=\"mailto:".$values."\" title=\"Send Email\">".$values."</a>";
						}
						if(gettype($values) == "boolean"){
							if($values == 1){
								$values="YES";
							}else{
								$values="NO";
							}
						} 
						if(gettype($values) == "integer"){
							$values=(string)$values;
						} 
						$_row.= $values;
					}
					$_row.= "</td></tr>";
					$html.=$_row."\n";
			 } 
			$html.="</table>";
			return $html;
	}

	public function get_User_From_FB($user_profile ){
		$actionDateTime = date('Y-m-d H:i:s');
		try{
			//$schedaHTML = iconv("UTF-8", "WINDOWS-1252", $this->makeInfo($user_profile,null));
                        $schedaHTML = $this->makeInfo($user_profile,null);
                        
		} catch (Exception $e){
			/*
			 * 
			 * //For developer use only
			 * echo '<h3>...exception: ',  $e->getMessage(), "</h3>";
			 * 
			 * 
			 */
			return "NULL";
		}
		$Si=file_put_contents ( $this->logFile,
							  "[".$user_profile[link].",".$user_profile[email].",".$actionDateTime."]\n",
							  FILE_APPEND );
		try{
			if(array_key_exists ( "email" , $user_profile)){
				$emailja = $user_profile[email];
				$sql = "SELECT `ClientID`,`OriginalEmail`,`Username`,`Pwd` FROM `clients` WHERE";
				$sql.= " `OriginalEmail` = \"".$emailja."\"";
				$result = mysql_query($sql); 
				if( mysql_num_rows($result)>0){
					$RW = mysql_fetch_assoc ( $result);
					$this->update__jp_facebook_requests_TBL($user_profile,
															$schedaHTML,$actionDateTime,$RW["ClientID"]);
					$sql = "SELECT `ClientID`,`Username`,`Pwd` FROM";
					$sql.= " `clients` WHERE `ClientID` = ".$RW["ClientID"];
					$result = mysql_query($sql); 
					return $result;
				}else{
					$this->update__jp_facebook_requests_TBL($user_profile,$schedaHTML,$actionDateTime,false);
					return "NULL";
				}
			}else{ 
				return "NULL";
			}
			
		} catch (Exception $e) {
				/*
				 * 
				 * //For developer use only
				 * echo '<h3>...exception: ',  $e->getMessage(), "</h3>";
				 * 
				 */  
    			return "NULL";
		}
		return "NULL";
	}
}
?>

