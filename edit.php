<?php

    //php navbar calling
    require 'partials/navbar.php';

    //for connecting the database
    require_once("partials/_dbConnect.php");

    $searchQueryParameter= $_GET["id"];
    global $connectingDb;

$sql="SELECT * FROM newproject WHERE id='$searchQueryParameter'";

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
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo $name; ?>">
  </div>
  <div class="form-row text-primary font-weight-bold">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" class="form-control" id="email" placeholder="somebody@1234" value="<?php echo $email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter a password" value="<?php echo $password; ?>">
    </div>
  </div>
  <div class="form-group text-primary font-weight-bold">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="enter your full adress" value="<?php echo $address; ?>">
  </div>
  <div class="form-row text-primary font-weight-bold">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city" value="<?php echo $city; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" value="<?php echo $state; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="pin">Pin</label>
      <input type="text" name="pin" class="form-control" id="inputZip" placeholder="enter pin" value="<?php echo $pin; ?>">
    </div>
  </div>
   <div class="form-group">
 
  <input type="submit" class="btn btn-primary" name="submit" value="Update data">
</form>
</div>


<?php 

require_once("function.php");

?>
<?php

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $adddress = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pin = $_POST['pin'];

  $sql ="UPDATE newproject SET id='$id', name='$name', email='$email', password='$password', address='$adddress', city='$city', state='$state', pin='$pin' WHERE id = '$id'";

  $result=$connectingDb->query($sql);

  Redirect_to("login.php");
  

  if($result){
    echo "
    <script>
        alert('record updated')
    </script>";
  }
  else{
    echo "<script>
       alert('Failed update record');
    </script>";
  }
}
?>


  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>