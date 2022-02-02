


<?php



$id = $_GET['id'];
$name = $age = $address="";

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

$sql = "SELECT * FROM patients WHERE id =".$id;
//echo "sql      :     ". $sql;
$result = $conn->query($sql);

if ($result != null) {
  // output data of each row
  foreach ($result as $value)
  {
    $name = $value['name'];
    $gender = $value['gender'];
    $age = $value['age'];
    $address=$value['address'];
    // echo $value['id'];
  }
} else {
  echo "0 results";
}
$conn->close();


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
          <div class="mt-5 card-header text-light bg-secondary">
              Add New Patient
          </div>
          <div class="card-body border border-secondary">
            <div class="col-md-12">
                <span>Name</span>
                <input type="text" id="form3Example3" name="name"  value="<?php echo $name ?>" class="form-control form-control-lg" placeholder="Enter Name" />
                <span>Age</span>
                <input type="text" id="form3Example3" name="age"  value="<?php echo $age ?>" class="form-control form-control-lg" placeholder="Enter Age" />
                <span>Gender</span>
                <input type="text" id="form3Example3" name="gender" value="<?php echo $gender ?>" class="form-control form-control-lg" placeholder="Enter Gender" />
                <span>Address</span>
                <input type="text" id="form3Example3" name="address" value="<?php echo $address ?>" class="form-control form-control-lg" placeholder="Enter Address" />
               
            </div>
          </div>
          <div class="card-footer bg-secondary">
              
           
                <button class="btn btn-light " type="submit" name="save">Save</button>&nbsp;
                <button class="btn btn-danger " type="submit" name="delet">Delete</button>&nbsp;
          
          </div>
      </div>
</form>
  </div>
</body>
</html>


<?php
if(isset($_POST['save'])) 
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ehr";

    $name =$_POST["name"];
    $age =$_POST["age"];
    $gender =$_POST["gender"];
    $address =$_POST["address"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE patients SET name='".$name."', age='".$age."',gender='".$gender."',address='".$address."' WHERE id=".$_GET['id'];
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Record updated successfully');</script>";
      echo '<script>window.location="patient.php"</script>';
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();

}




if(isset($_POST['delet'])) 
{
    try{
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

// sql to delete a record
$sql = "DELETE FROM patients WHERE id=".$_GET['id'];

if ($conn->query($sql) === TRUE) {
 // echo "Record deleted successfully";
  echo "<script>alert('Record deleted successfully');</script>";
  echo '<script>window.location="patient.php"</script>';
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


} catch(Exception $e)
{
    echo $e;
}
}
?>


