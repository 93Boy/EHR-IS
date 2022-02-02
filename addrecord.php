<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
     
     <div class="col-md-3 mt-5"></div>
     <div class="col-md-6">
     <form action="upload.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
         <div class="mt-5 card-header bg-secondary">
             Add New Patient
         </div>
         <div class="card-body border border-secondary">
           <div class="col-md-12">
               
               <span>Date</span>
               <input type="date" id="form3Example3" name="date" class="form-control form-control-lg" placeholder="Enter Date" />
               <span>Sick</span>
               <input type="text" id="form3Example3" name="sick" class="form-control form-control-lg" placeholder="Enter Sick" />
               <span>Medicine</span>
               <input type="text" id="form3Example3" name="medicine" class="form-control form-control-lg" placeholder="Enter Medicine" />
               <span>Address</span>
               <input type="text" id="form3Example3" name="address" class="form-control form-control-lg" placeholder="Enter Address" />
               <span>Scan Image</span>
               <input type="file" id="form3Example3" name="fileToUpload" class="form-control form-control-lg" placeholder="Enter Address" />
              
           </div>
         </div>
         <div class="card-footer bg-secondary">
             
          
               <button class="btn btn-light " type="submit" name="save">Save</button>
         
         </div>
     </div>
</form>
    
</body>
</html>