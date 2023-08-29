<?php 
	require_once 'connection.php';

	$action = $_GET['action'];
	
	if($action == "add"){
		if(isset($_FILES['file']['name'])){
		   // file name
		   $filename   = "img-".uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
		   // Location
		   $location = 'C:/xampp/htdocs/SampleOutput/img/'.$filename;

		   // file extension
		   $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		   $file_extension = strtolower($file_extension);

		   // Valid extensions
		   $valid_ext = array("pdf","doc","docx","jpg","png","jpeg","jfif");

		   $img = $location.".".$file_extension;

		   $imgName = $filename.".".$file_extension;

		   $response = 0;
		   if(in_array($file_extension,$valid_ext)){

		   	  // Upload file
		      if(move_uploaded_file($_FILES['file']['tmp_name'],$img)){		    

				$sql = "INSERT INTO `vending_machine`(
				`product`, 
				`unit`, 
				`price`, 
				`expire_date`, 
				`qty`, 
				`img`) 

				VALUES (
				'".$_POST['product']."',				
				'".$_POST['unit']."',
				'".$_POST['price']."',
				'".$_POST['date']."',
				'".$_POST['qty']."',
				'".$imgName."')";

				if ($conn->query($sql) === TRUE) {
				   $row_array['code'] = "0";
				   $row_array['description'] = "Success";
				} else {
				   $row_array['code'] = "-1";
				   $row_array['description'] = "Error: " . $conn->error;
				}
				
		      }
		   }
		   echo json_encode($row_array);
		}

}else if ($action === "delete") {
	
		// sql to delete a record
		$sql  = "DELETE from `vending_machine` where `id`=".$_GET['id'];
		if ($conn->query($sql) === TRUE) {
		   $row_array['code'] = "0";
		   $row_array['description'] = "Success";
		} else {
		   $row_array['code'] = "-1";
		   $row_array['description'] = "Error: " . $conn->error;
		}
		 echo json_encode($row_array);
}else if ($action === "retrieveID") {
	$id = $_GET['id'];
	$sql = "SELECT * FROM `vending_machine` WHERE id = ".$id;
	$return_arr = array();
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
	    $row_array['id'] = $row['id'];
	    $row_array['product'] = $row['product'];
	    $row_array['unit'] = $row['unit'];
	    $row_array['expire_date'] = $row['expire_date'];
	    $row_array['qty'] = $row['qty'];
	    $row_array['img'] = $row['img'];
	}

	echo json_encode($row_array); 
}


 ?>