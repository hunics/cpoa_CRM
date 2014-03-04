<?php 
@session_start();
function get_ext($filenameM){
     $filje =  strrpos($filenameM, '.');
      if($filje == false){        
         $exten = "";
      }else{
         $exten = substr($filenameM, $filje + 1);
      }
	return strtoupper($exten);
}

function resizeImg($nvxv){
	include("imgReSizer.php");
	$image = new SizeImage();
	$image->load($nvxv); 
	$image->resizeToWidth((int)$_POST["imgWidth"]);
	$image->save($nvxv);	

}




	include("fb_set_oblig.php");
	if(!isset( $_max_file_size)){$_max_file_size = 1000000;}
	
	/*
		if an ARRAY of Numbers then viewing a selectBox for requested width selection ,
		if = false not resizing
		This option is ude of image file trasfer
	*/
	if(!isset( $_max_img_width_array)){$_max_img_width_array=false;} 
	
	if(!isset( $_upload_dir)){ $_upload_dir = "uploadedFiles";}
	if(!isset( $_img_id)){ $_img_id = "none";}
	if(!isset( $_permited_types)){ $_permited_types = array("jpg","bmp","png","jepg","gif");	}
	$_permited_types = array_map("strtoupper", $_permited_types);
	$bb0f = " style= 'padding:0px;'";



	if($_oblig && !empty($_FILES)){
		$_filename=trim($_FILES['file']['name']);
		$_size = $_FILES['file']['size'];
		$xNary = get_ext($_filename);
	
		if($_filename == "" || $_size > $_max_file_size  || !in_array( $xNary,$_permited_types)){
			$bb0f ="style='background-color:red; padding:0px;'";
			$vanHiba = true;
		}else{
			/*
				UPLOAD obligatorio
			*/		
			if($_POST["img_id"] !="none"){
				$nvxv = $_upload_dir."/".$_POST["img_id"];//.".".$xNary;
			}else{
				$nvxv =  $_upload_dir."/".(string)time()."_".(string)rand(1,1000)."_".$_filename;	
			}
			copy($_FILES['file']['tmp_name'], $nvxv);
			if( $_max_img_width_array){ resizeImg($nvxv);}
			
			// DBbe IRANDO INI -->
			//echo "Nome file originale: ".$_FILES['file']['name']."<br>"; 
			//echo "Nome file su server: ".$nvxv."<br>"; 
			//echo "Dimensione file: ".$_FILES['file']['size']."<br>"; 
			//echo "Tipo file: ".get_ext($_filename);
			// DBbe IRando END -->
		}

	}else {
		if(!empty($_FILES) && trim($_FILES['file']['name']) != ""){
			$bb0f = " style= 'padding:0px;'";
			$_size = $_FILES['file']['size'];
			$_filename=trim($_FILES['file']['name']);
			$xNary = get_ext($_filename);

			if($_size > $_max_file_size || !in_array($xNary,$_permited_types) ){
				$bb0f =" style='background-color:red; padding:0px;'";
				$vanHiba = true;	
			}	
			if($vanHiba == false){	
					/*
					UPLOAD non obligatorio
					*/
					if($_POST["img_id"] !="none"){
						$nvxv = $_upload_dir."/".$_POST["img_id"];//.".".$xNary;
					}else{
						$nvxv =  $_upload_dir."/".(string)time()."_".(string)rand(1,1000)."_".$_filename;	
					}
					copy($_FILES['file']['tmp_name'],$nvxv);
					if($_max_img_width_array ){ resizeImg($nvxv);}
					
					//DBbe IRANDO INI -->
					/*
					echo "Nome file originale: ".$_FILES['file']['name']."<br>"; 
					echo "Nome file su server: ".$nvxv."<br>"; 
					echo "Dimensione file: ".$_FILES['file']['size']."<br>"; 
					echo "Tipo file: ".get_ext($_filename);
					// DBbe IRando end -->*/

			}
		}			
	}
?>

<div class="fb_fieldset" <?php echo $bb0f; ?> >
	<label for="file" class="fb_fieldset_label">
		<?php echo $_fupd_Label;
			    echo $_oblig_setting; 
		?> <br><b class='obligatory'>Max.size:<?php echo $_max_file_size; ?> bytes.</b></label>	
	<div style="padding:3px; border-style:solid; border-color:gray; border-width:1px; float:left; margin-left:10px;">	
		<input type="file" id="file" name="file" class="fb_fieldset_file" style="float:left; border-width:0px; width:320px;" <?php if(isset($_thisDisabled) && $_thisDisabled){ echo " disabled ";} ?> 
			 <?php if($_max_img_width_array){?> 
			   onchange="javascript:document.getElementById('imgWidth').disabled=false;">
			<?php } ?>	
		<input type="hidden" value="<?php echo $_img_id;?>" id = "<?php echo $_img_id;?>" name="img_id">
	</div>
	<br>
</div>



<?php
				
	 if($_max_img_width_array){?>
		<div style="padding:5px; height:40px;">
			<label for="imgWidth" class="fb_fieldset_label"><b>IMG Width (px)</b></label>
			<select id="imgWidth" name="imgWidth" class="fb_fieldset_select_min" style="margin-left:5px;" disabled>
			<?php
				foreach( $_max_img_width_array as $vl){
					if(isset($_POST["imgWidth"]) && $_POST["imgWidth"] == $vl){
						$swl = " selected ";
					}else{
						$swl = "";
						
					}
					echo "<option value='".$vl."'".$swl.">".$vl."</option>";
				}
			?>	
			</select>
		</div>
			
<?php } ?>	

