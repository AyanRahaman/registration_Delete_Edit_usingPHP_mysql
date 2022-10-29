<?php

    //php navbar calling
    require 'partials/navbar.php';

    //for connecting the database
    require_once("partials/_dbConnect.php");
    

    if(isset($_POST["submit"])){

      if(!empty($_POST["name"]) && !empty($_POST["email"])) {

        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $address=$_POST["address"];
        $city=$_POST["city"];
        $state=$_POST["state"];
        $pin=$_POST["pin"];

        // echo $name . '</br>';
        // echo $email . '</br>';
        // echo $address . '</br>';

        // echo $city . '</br>';


        // echo $state . '</br>';

        // echo $pin . '</br>';

        global $connectingDb;

        $sql="INSERT INTO newproject(name,email,password,address,city,state,pin)
        VALUES(:Xname,:Xemail,:Xpassword,:Xaddress,:Xcity,:Xstate,:Xpin)";

        $stmt=$connectingDb->prepare($sql);

      //  return $stmt;

        $stmt->bindvalue(':Xname',$name);
        $stmt->bindvalue(':Xemail',$email);
        $stmt->bindvalue(':Xpassword',$password);
        $stmt->bindvalue(':Xaddress',$address);
        $stmt->bindvalue(':Xcity',$city);
        $stmt->bindvalue(':Xstate',$state);
        $stmt->bindvalue(':Xpin',$pin);

        $result=$stmt->execute();


        if($result){

          // echo '<span class="success">Great! Your Qurey Has Been Submitted</span>';
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>great! Your Query Has Been Submitted</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      
       } else{
          echo '<span class="success"> OOps! something went wrong<span>';
        }

      }
  


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login form creating part start</title>
  </head>
  <body>

<!--*****form making part start**********-->

<div class="container mt-5">
<form action="" method="post" enc-type="muti-part/form data">
<div class="form-group text-primary font-weight-bold">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
  </div>
  <div class="form-row text-primary font-weight-bold">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" class="form-control" id="email" placeholder="somebody@1234" required>
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter a password" required>
    </div>
  </div>
  <div class="form-group text-primary font-weight-bold">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="enter your full adress">
  </div>
  <div class="form-row text-primary font-weight-bold">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <input type="text" class="form-control" name="state" id="state" placeholder="Enter state">
    </div>
    <div class="form-group col-md-2">
      <label for="pin">Pin</label>
      <input type="text" name="pin" class="form-control" id="inputZip" placeholder="enter pin">
    </div>
  </div>
   <div class="form-group">
  <!--   -->
  <input type="submit" class="btn btn-primary" name="submit" value="Sign in">
</form>
</div>


<table class="table">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Pin</th>
      <th>Action</th>
       <th> Another Action </th>
    </tr>
  </thead>
  <tbody>


  <?php


      global $connectingDb;
      $sql="SELECT * FROM newproject ORDER BY id ASC";

      $stmt=$connectingDb->query($sql);


      while ($Data=$stmt->fetch()) {
     
        $id=$Data["id"]; 
        $name=$Data["name"];
        $email=$Data["email"];
        $password=$Data["password"];
        $address=$Data["address"];
        $city=$Data["city"];
        $state=$Data["state"];
        $pin=$Data["pin"];
  ?>
  <tr>
      
      <td><?php echo $id; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $password; ?></td>
      <td><?php echo $address; ?></td>
      <td><?php echo $city; ?></td>
      <td><?php echo $state; ?></td>
      <td><?php echo $pin; ?></td>
      <td><a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php } 

    
    
      // for read data ends here

    
    ?>
      </tbody>
      </table>

    
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>