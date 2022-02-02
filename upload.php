
<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//echo'taerget      '.basename($_FILES["fileToUpload"]["name"]).'      ';

// Check if image file is a actual image or fake image
if(isset($_POST["save"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


  $date =$_POST["date"];
  $sick = $_POST["sick"];
  $medicine = $_POST["medicine"];
  $address = $_POST["address"];




 

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

$sql = "INSERT INTO records (date, patient, sick, medicine, report)
VALUES ('".$date."', ".$_GET['id'].", '".$sick."', '".$medicine."', '".basename($_FILES["fileToUpload"]["name"])."')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
echo '<script>window.location="patient.php"</script>';
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

   
$conn->close();



} catch(Exception $e)
{
echo $e;
}





}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>
