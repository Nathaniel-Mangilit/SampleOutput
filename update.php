<!DOCTYPE html>
<html>
<head>
	<title>SampleOutput</title>
<?php 
    require_once 'common/connection.php';

            $id=$_GET['updateid'];
            $sql = "SELECT * FROM `vending_machine` where id=".$id;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $product=$row['product'];
            $unit=$row['unit'];
            $price=$row['price'];
            $date=$row['expire_date'];
            $qty=$row['qty'];
            $img= $row['img'];

	include 'common/header.php';?>
</head>
<body>


<div class="container fluid">
         <div class="container-fluid pt-3 mb-5">
                        <form method="POST"  class="form-a">
                              <div class="row">
                                <div class="col-md- mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Product Name</label>
                                <input type="text" id="product" name="product" value="<?php echo $product ?>" class="form-control form-control-md form-control-a" placeholder="" required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Unit</label>
                                <input type="text" id="unit" name="unit" value="<?php echo $unit ?>" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Price</label>
                                <input type="number" step=".01" id="price" value="<?php echo $price ?>" name="price" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Date of Expiry</label>
                                <input type="date" id="date" name="date" value="<?php echo $date ?>" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Available Inventory</label>
                                <input type="number" id="qty" name="qty" value="<?php echo $qty ?>" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                </div>
                                <div class="col-md-12 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Image</label>
                                  <input type="file" id="file" value="<?php echo $img ?>" name="file" class="form-control form-control-a">
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <img src="" id="img" />
                                </div>

                                <div class="col-m3-5">
                                  <button type="submit" name="submit" id="submit" class="btn bg-success text-white btn-sm col-md-2">Submit</button>
                                </div>

                                 <div class="col-md-5">
                                
                                </div>
                                </div>
                        </form>
     </div>
	         <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="col-md-8 text-end mt-2">
                      <a data-bs-toggle="modal" data-bs-target="#newProduct" type="button" class="btn btn-success btn-xs">+ Add Product</a>
                </div>
                      <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">UNIT</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DATE OF EXPIRY</th>
                                <th scope="col">QTY</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col" class="text-center" style="max-width: 20px;text-align: center;"></th>
                              </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            
                            	require_once 'common/connection.php';

                            		$sql = "SELECT * from `vending_machine`";
                            		$result = mysqli_query($conn,$sql);
                            		if($result){
                            			while($row=mysqli_fetch_assoc($result)){
                            						$id=$row['id'];
                            						$product=$row['product'];
                            						$unit=$row['unit'];
                            						$price=$row['price'];
                            						$date=$row['expire_date'] = date("F d, Y", strtotime($row['expire_date']));;
                            						$qty=$row['qty'];
                            						$img=$row['img'];

                            						echo '<tr >
															                <td >'.$product.'</td>
															                <td >'.$unit.'</td>
															                <td >'.$price.'</td>
															                <td >'.$date.'</td>
															                <td >'.$qty.'</td>
															                <td class="img">'.'<img class="img-responsive"style="max-width:100px;" alt="" src="img/'.$img.'">'.'</td>
																	                <td>
																	            	<button class ="btn btn-success"><a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>
																	           <button class ="btn btn-danger"><a class="text-light" id="id" onclick="e_delete('.$id.')">Delete</a></button>
																	            	</td>
																	            	</tr>';								
                            			}
                            		} 	
               	 ?>
                            </tbody>
                           </table>
                        </div>
                  
                    </div> <!-- End of DataTales -->


</div>
<?php 
    require_once 'common/NewModal.php'; ?>

</body>
<?php
    include 'common/script.php';?>

    <script>

       function create(){
         var files = document.getElementById("file").files;
         var formData = new FormData(form_event);
          formData.append("file", files[0]);

         var xhttp = new XMLHttpRequest();
          xhttp.open("POST", "common/data.php?action=add", true);
          xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               var response = JSON.parse(this.responseText);
               if(response.code == 0){
                  document.getElementById("form_event").reset();              
                   location.reload();
               }else{
                  alertFail(response.description);
               }
             }
          };
          xhttp.send(formData);
       }
       function e_delete(id){
                  var xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "common/data.php?action=delete&id="+id, true);
                    xhttp.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                          var response = JSON.parse(this.responseText);
                           if(response.code == 0){
                             location.reload();
                           }else{
                              alertFail(response.description);
                           }
                       }
                    };

                    // Send request with data
                    xhttp.send();
            }
<?php 
  require_once 'common/connection.php';

    if(isset($_POST['submit'])){
          if(isset($_FILES['file']['name'])){
       // file name
       $filename   = "img-".uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
       // Location
       $location = 'C:/xampp/htdocs/SampleOutput/img/'.$filename;

       // file extension
       $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);

       // Valid extensions
       $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

       $img = $location.".".$file_extension;

       $imgName = $filename.".".$file_extension;

       $response = 0;
       if(in_array($file_extension,$valid_ext)){
          // Upload file
          if(move_uploaded_file($_FILES['file']['tmp_name'],$img)){
 
      $sql= "UPDATE `vending_machine` SET 
      
      `product`='".$_POST['product']."',
      `unit`='".$_POST['unit']."',
      `price`='".$_POST['price']."',
      `expire_date`='".$_POST['date']."',
      `qty`='".$_POST['qty']."',
      `img` = '".$imgName."' WHERE id = ".$_POST['id'];

        
      if ($conn->query($sql) === TRUE) {
         echo "Success";
         header("location:incdex.php");
        } else {
           $row_array['code'] = "-1";
           $row_array['description'] = "Error: " . $conn->error;
        }
    

      
    }
     echo json_encode($row_array);
}
}

    }

 ?>


</script>
</html>