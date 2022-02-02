
<?php
$gender ="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
  <div class="row">
     
      <div class="col-md-3 mt-5"></div>
      <div class="col-md-6">
      <form method="post">
          <div class="mt-5 card-header bg-secondary">
              Add New Patient
          </div>
          <div class="card-body border border-secondary">
            <div class="col-md-12">
                <span>Name</span>
                <input type="text" id="form3Example3" name="name" class="form-control form-control-lg" placeholder="Enter Name" />
                <span>Age</span>
                <input type="text" id="form3Example3" name="age" class="form-control form-control-lg" placeholder="Enter Age" />
                <label for="gender">Choose gender:</label>
  <select id="gender" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
   
  </select>
                <span>Address</span>
                <input type="text" id="form3Example3" name="address" class="form-control form-control-lg" placeholder="Enter Address" />
               
            </div>
          </div>
          <div class="card-footer bg-secondary">
              
           
                <button class="btn btn-light " type="submit" name="save">Save</button>
          
          </div>
      </div>
</form>
  </div>
</body>
</html>



<?php

 if(isset($_POST['save'])) 
 {

    $name =$_POST["name"];
    $age =$_POST["age"];
    $gender =$_POST["gender"];
    $address =$_POST["address"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ehr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO patients (name, age, gender,address)
VALUES ('".$name."', '".$age."', '".$gender."','".$address."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  echo '<script>window.location="patient.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 }
?> 

