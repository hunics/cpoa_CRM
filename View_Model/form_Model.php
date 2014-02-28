<?php


ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);


class form{
    
    public function __construct($title,$formID) {

        $this->tblIni = '<table class ="userTbl"><tr>';
        $this->tblIni.= '<td colspan="2" class ="usersFormHeaderTD">';
        $this->tblIni.= $title.'</td></tr>';
        $this->fieldIDNumber = 0;
        $this->formID = $formID;
        $this->submiter = true;
                
    }
    
    public function rowGenerator($rowparamsArray){
        $Frows = ""; 
        foreach($rowparamsArray as $key => $value){
            
            $label = trim($key); 
            $fieldType = $value;

        
                $Frows.= '<tr><td class="usersDataLabels">';
                $Frows.= $label.'</td><td class="usersInputs">';

                if($fieldType=="text"){
                    $Frows.= '<input id="'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="text" class ="inputFields">';
                }
                if($fieldType=="password"){
                    $Frows.= '<input id="'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="password" class ="inputFields">';
                }                
                if($fieldType=="longtext"){
                    $Frows.= '<input id="'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="text" class ="longinputFields">';
                }                
                if($fieldType=="textarea"){
                    $Frows.= '<textarea id="'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="textareaFields">Editor Modul Not Loaded</textarea>';
                }       

                if($fieldType=="select"){
                    $Frows.= '<select id="'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="selectFields"></select>';
                }
                if($fieldType=="YesNo"){
                    $Frows.= '<select id="'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="YesNoFields"><option value="FALSE">NO</option>';
                    $Frows.= '<option value="TRUE">YES</option></select>';
                }                
                if($fieldType=="datepicker"){
                    $Frows.= '<span>';
                    $Frows.= '<input id="year_'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="text" class ="datepicker" value="YYYY">';

                    $Frows.= '<select id="mm_'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">MM</option>';
                    for($m=1;$m<13;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 
                    
                    $Frows.= '<select id="dd'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">DD</option>';
                    for($m=1;$m<32;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 
                    $Frows.= '</span>';
                } 
                if($fieldType=="multi_datepicker"){
                    $Frows.= '<span>';
                    $Frows.= '<input id="number_of_'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="text" class ="datepicker" value="N°#">';
                    $Frows.= '<input id="year_'.$this->formID.$this->fieldIDNumber.'" ';
                    $Frows.= 'type="text" class ="datepicker" value="YYYY">';

                    $Frows.= '<select id="mm_'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">MM</option>';
                    for($m=1;$m<13;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 
                    
                    $Frows.= '<select id="dd'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">DD</option>';
                    for($m=1;$m<32;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 
                    $Frows.= '</span>';
                } 
                if($fieldType=="timepicker"){
                    $Frows.= '<span>';


                    $Frows.= '<select id="HH_'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">HH</option>';
                    $Frows.= '<option value="00">00</option>';
                    for($m=1;$m<13;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 
                    
                    $Frows.= '<select id="min'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="00">MIN</option>';
                    $Frows.= '<option value="00">00</option>';
                    for($m=1;$m<61;$m++){
                        if($m<10){
                            $m = "0".$m;
                        }
                        $Frows.= ' class ="datepicker"><option value="'.$m.'">'.$m.'</option>';
                    }    
                    $Frows.= '</select>'; 


                    $Frows.= '<select id="PMAM'.$this->formID.$this->fieldIDNumber.'"';
                    $Frows.= ' class ="datepicker"><option value="AM">AM</option>';
                    $Frows.= '<option value="PM">PM</option></select>';
                                    
                    $Frows.= '</span>';
                }                 
                
                
                
                if($fieldType=="checkbox"){
                    $v456 = $this->formID.$this->fieldIDNumber;
                    $Frows.= '<input id="'.$v456.'" value ="'.$v456.'" ';
                    $Frows.= 'type="checkbox" class ="checkboxFields">';
                }

        }
        $Frows.= '</tr>';
        $this->fieldIDNumber+=1;
        return $Frows;
    }
    
    public function formFotter(){
 
        if($this->submiter){
            $fotter = '     
               <tr>
                    <td align="right">
                        <input type="button" id ="reset" class="gomb2" value = " ReSet "> 
                    </td>    
                    <td align="left">
                        <input type="button" id ="goUserForm" class="gomb2" value = " >>> "> 
                    </td>          
                </tr> ';   
        }else{
           $fotter = ''; 
        }
       
        $fotter.="</table>";
       
        return $fotter;
        
    }
}