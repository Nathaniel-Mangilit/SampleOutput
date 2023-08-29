<script>
	   function create(){
         var files = document.getElementById("file").files;
         var formData = new FormData(form_event);
          formData.append("file", files[0]);

         var xhttp = new XMLHttpRequest();
          xhttp.open("POST", "data.php?action=add", true);
          xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               var response = JSON.parse(this.responseText);
               if(response.code == 0){
                 alertSuccess();
                  document.getElementById("form_event").reset();
                  myModal.hide();
                 table.ajax.reload();
               }else{
                  alertFail(response.description);
               }
             }
          };
          xhttp.send(formData);
       }


</script>