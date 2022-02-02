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
<div class="container">
    <div class="card-header mt-5 bg-secondary text-light">
      <b>  EHR System </b>
      <a href ="addPatient.php" class="btn btn-light ml-5 float-center">Add Record</a>
    </div>
    <div class="card bg-light  ">
        <div class="card-body">
        <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
     
    </tr>
  


  <?php
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
       
       $sql = "SELECT * FROM patients";
       //echo "sql      :     ". $sql;
       $result = $conn->query($sql);
       
       if ($result != null) {
         // output data of each row
         foreach ($result as $value)
         {
             echo
             '
             <tr>
             <th scope="row">'.$value['id'].'</th>
             <td>'.$value['name'].'</td>
             <td>'.$value['age'].'</td>
             <td>'.$value['gender'].'</td>
             <td>'.$value['address'].'</td>
             <td><a href="home.php?id='.$value['id'].'" class="btn btn-primary">View</a>&nbsp<a href="udpatient.php?id='.$value['id'].'" class="btn btn-warning"> Edit / Delete</a></td>
           </tr>
             ';
           
         }
       } else {
         echo "0 results";
       }
       $conn->close();

  ?>
  
   
   
  </tbody>
</table>
        </div>
    </div>
    </div>
</body>
</html>