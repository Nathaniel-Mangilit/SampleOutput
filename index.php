<!DOCTYPE html>
<html>
<head>
	<title>SampleOutput</title>
<?php 
	include 'common/header.php';?>
</head>
<body>


<div class="container fluid">
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

</script>
</html>