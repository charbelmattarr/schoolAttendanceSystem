<?php

  require_once "config.inc.php";
  
  $response = array();
  $student = array();
  $meeting_id= $_POST['meeting_id'];
  
  $sql = "select * from attendance where meeting_id='$meeting_id'";
  
  $query = mysqli_query($conn,$sql) or die(mysql_error());		
  
  if (mysqli_num_rows($query) > 0) {
 $response["student"] = array();
 while($row = mysqli_fetch_array($query)){
	 $student["enrollment_id"]= $row["enrollment_id"];
	 $student["attendance_id"]=$row["attendance_id"];
	 array_push($response["student"],$student);
 }
 
 $response["success"]=1;
 
// echo json_encode($json_data);
  echo json_encode($response);
  }else {
	  $response["success"]=0;
	  $response["message"]="no students found";
	   echo json_encode($response);
  }
   
?>