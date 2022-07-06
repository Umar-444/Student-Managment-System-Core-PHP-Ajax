<?php

function myClean($string){
	return htmlentities($string);
}

function redirect($location){
	return header("location: {$location}");
}


function errorMessage($errorMessage){

   //  $errorMessage = <<<DELIMITER
   //  <div class="alert alert-danger bg-danger text-white mx-auto col-md-12 alert-dismissable">
  	// 			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  	// 				<strong>Error!</strong> $errorMessage
			// </div>
			// DELIMITER;
	return $errorMessage;
}





function successMessage($successMessage){

 //    $successMessage = <<<DELIMITER
 //  		<div class="alert alert alert-success bg-success text-white col-sm-12 alert-dismissable mx-auto">
 //  			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 //  				<strong>Success!</strong> $successMessage
	// 	</div>
	// DELIMITER;

return $successMessage;
}




function studentCnicExist($cNic){
			$sql = "SELECT * FROM studentdata WHERE CNIC = '{$cNic}'";
			$result = myQuery($sql);
			if (myNumRowsCount($result) > 0 ){
				return true;
		}else{
			return false;
		}
	}



function addRecord(){
		if(isset($_POST['cnic'])){
			$regError=[];

			$cNic   	= myClean($_POST['cnic']);
			$fName  	= myClean($_POST['firstName']);
			$lName  	= myClean($_POST['lastName']);
			$sDob		= myClean($_POST['dob']);
			$sAddress	= myClean($_POST['address']);
			$sCity		= myClean($_POST['city']);
			$dProgram	= myClean($_POST['degreeProgram']);
			$sSex		= myClean($_POST['sex']);
			$sEmail		= myClean($_POST['email']);
			$sMobile	= myClean($_POST['mobile']);


			if (studentCnicExist($cNic)) {
				$regError[]="Cnic Already Registered.";
			}

		
			if (!empty($regError)) {
				foreach ($regError as $regError) {
					echo errorMessage($regError);
				}
			}
			else {
				$sql = "INSERT INTO studentdata(CNIC, FName, LName, DOB, Address, City, DProgram, Sex, Email, Mobile)";
            	$sql .= "VALUES('{$cNic}','{$fName}','{$lName}','{$sDob}','{$sAddress}','{$sCity}','{$dProgram}','{$sSex}','{$sEmail}','{$sMobile}')";

            	$result = myQuery($sql);
            	
            	if ($result) {
            		echo successMessage("Record Added");
            	}else{
            		echo errorMessage("Error While Updating.");
            	}
			}

	}
}


function updateRecord(){
		if(isset($_POST['upcnic'])){
			$regError=[];

			$myUpdateId = $_POST['updateGetId'];

			$upCnic   	= myClean($_POST['upcnic']);
			$upFname  	= myClean($_POST['upfirstName']);
			$upLname  	= myClean($_POST['uplastName']);
			$upDob		= myClean($_POST['updob']);
			$upAddress	= myClean($_POST['upaddress']);
			$upCity		= myClean($_POST['upcity']);
			$upDProgram	= myClean($_POST['updegreeProgram']);
			$upSex		= myClean($_POST['upsex']);
			$upEmail	= myClean($_POST['upemail']);
			$upMobile	= myClean($_POST['upmobile']);
		
			if (!empty($regError)) {
				foreach ($regError as $regError) {
					echo errorMessage($regError);
				}
			}
			else {
				$sql = "UPDATE studentdata SET CNIC = '$upCnic', FName = '$upFname', LName = '$upLname', DOB ='$upDob', Address = '$upAddress', City = '$upCity', DProgram = '$upDProgram', Sex = '$upSex', Email = '$upEmail', Mobile = '$upMobile' WHERE ID = '$myUpdateId' ";

            	$result = myQuery($sql);
            	
            	if ($result) {
            		echo successMessage("Record Updated.");
            	}else{
            		echo errorMessage("Error While Updating.");
            	}
			}

	}
}




function delete(){
  
  if (isset($_POST['deleteRecord'])) {
  		$deleteId = $_POST['id'];
            $sql  = "DELETE FROM studentdata WHERE ID = '{$deleteId}'";
            $result = myQuery($sql);
            if ($result) {
              $successMessage="Record Has Been Deleted.";
              echo successMessage($successMessage);
            }
              
        }
}









?>