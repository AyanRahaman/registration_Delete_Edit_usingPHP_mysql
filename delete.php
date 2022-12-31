<?php


global $connectingDb;

require_once("partials/_dbConnect.php");
require_once("function.php");

$id=$_GET['id'];
"<br>";

//echo $id;


$sql = "DELETE FROM newproject WHERE id = '$id'";

 $result=$connectingDb->query($sql);

 Redirect_to("Register.php");

 

if($result){
    echo " succesfully deleted";
}
else{
    echo "not deleted";
}

?>