<?php
$dbc = mysqli_connect("localhost", "root", "", "heroku_07c44eac08d0ae1")
OR die('Could not connect to MySQL: ' . mysqli_connect_error());



?>
<?php 
$id=$_REQUEST['emp_no'];
// echo $id;
// $io = $_REQUEST['organization'];
// echo $io;
$ii = $_REQUEST['first_name'];
// echo $ii;
$ie =$_REQUEST['last_name'];

$if =$_REQUEST['gender'];

$ig = $_REQUEST['birth_date'];
$ih = $_REQUEST['hire_date'];



// $query = "UPDATE   my_event  SET promo_picture='$io' WHERE id=$id"; 

//  mysqli_query($dbc,$query) or die ( mysqli_error());
$cc = "UPDATE employees  SET  first_name = '$ii' WHERE emp_no  = $id";
mysqli_query($dbc,$cc) or die ( mysqli_error());
$ce = "UPDATE employees SET last_name = '$ie' WHERE emp_no = $id";
mysqli_query($dbc,$ce) or die ( mysqli_error());
$cf = "UPDATE employees SET gender = '$if' WHERE emp_no = $id";
mysqli_query($dbc,$cf) or die ( mysqli_error());
$cg = "UPDATE employees SET birth_date = '$ig' WHERE emp_no  = $id";
mysqli_query($dbc,$cg) or die ( mysqli_error());
$ch = "UPDATE employees SET hire_date = '$ih' WHERE emp_no  = $id";
mysqli_query($dbc,$ch) or die ( mysqli_error());
header("Location: updatepagefinale.php"); 

?>

