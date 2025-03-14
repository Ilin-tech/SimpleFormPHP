

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Assigment2</title>

	<style type="text/css">

		.container{

			border: solid;
			margin: 10px ;
			background-color: teal;
			height: 710px;
			width: 2000px;

		}
	
		
	</style>
      
</head>
<body>

<div class="container">
	<div class="col">
		<ins style="font-family: cursive; font-size: 20px;" >Formularu pentru baza de date</ins>
		<br><br>
		<form action="" name="form1" method="post">

			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" class="control" id="firstname" placeholder="Enter first name" required >				
			</div>
			<br>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" class="control" id="lastname" placeholder="Enter last name "required>
				
			</div>
			<br>
			<div class="form-group">
				<label for="contatc">Contact</label>
				<input type="text" name="contact" class="control" id="contact" placeholder="Number" >
				
			</div>
			<br>
			<button type="submit" name = "select" class="btn" >Select</button>
			<button type="submit" name = "insert" class="btn" >Insert</button>
			<button type="submit" name="delete" class="btn" >Delete</button>
		</form>
</div>	
      <br>
  <div id="table" >
	<table >

		<ins>Baza de datea</ins><br><br>	
	<tbody>
		<?php	
		//--------------------- Atentie! -------- Doar pentru a expune datele din baza
		/*$link =mysqli_connect("localhost","root","","users")or die (mysqli_error($link));
           $res = mysqli_query($link ,"SELECT * FROM `person`");
          if($res === false) {
           
                 die("Error.");
    
            } else {
    
              foreach($res as $row){
                  foreach($row as $key=> $value){
                echo ucfirst($key) . ": " . $value . "<br>";
                  }
                
                  echo "-------------------------------------<br>";
                 }
           }*/
		?>
	
	</tbody>	
	</table>
   </div>
</div>

<?php
 


 $link =mysqli_connect("localhost","root","","users")or die (mysqli_error($link));
 $msg= "";
if (!isset($_POST['insert'])) {
	    
      $firstname= $_POST["firstname"];
      $lastname= $_POST["lastname"];
      $contact=$_POST["contact"];
 
 /// Butonul Insert
      $data= mysqli_query($link,"INSERT INTO `person` VALUES(null,'$firstname','$lastname','$contact')");   
      
      if ($data) {
      	
      	$msg="Your data inserted successfully.";
      }else{
      	$msg= "Try after som time!";
      }
      ?>
	      <script type="text/javascript">
	      window.location.href=window.location.href;
	      </script>	       
	     <?php

   }
//----------------------------- Butonul delete
    if (isset($_POST['delete'])) {
    	mysqli_query($link," DELETE  FROM  `person` WHERE first_name = '".$_POST["firstname"]."'")or die (mysqli_error($link)); 


    	?>
	      <script type="text/javascript">
	      window.location.href=window.location.href;
	      </script>	       
	     <?php
    }
 //------------------------- Butonul de selectarea utilizatorului dupa nume.
   if(isset($_POST['select'])){

   	$res = mysqli_query($link ,"SELECT * FROM `person` WHERE first_name ='".$_POST["firstname"]."'" ) or die (mysqli_error($link));
             
         if($res === false) {
           
                 die("Error.");
    
            } else {
    
              foreach($res as $row){
                  foreach($row as $key=> $value){
                echo ucfirst($key) . ": " . $value . "<br>";
                  }
                
                  echo "----------------------------------<br>";
                 }
           }
   }   


 ?>

        	
</body>
 </html>
