<?php require_once('inc/connection.php'); ?>
<?php



 $first_name = 'Dileep';
 $last_name  = 'Kariyawasam';
 $email      = 'academy@bestjobslk.com';
 $password   = 'mypassword';
 $is_deleted = 0;

 $hashed_password = sha1($password); 
 //echo "Hashed password: {$hashed_password}";

 $query = "INSERT INTO * FROM user (first_name, last_name, email, password, is_deleted) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$hashed_password}', {$is_deleted})";

$result = mysqli_query($connection, $query);
if ($result){
	echo "1 recode add";
} else { 
	echo "databse failed"; 
}


 //echo "hashed_password: {$hashed_password}";
?>
<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="UTS-8">
	<title>Insert query</title>
</head>
<body>

</body>
</html>
<?php mysqli_close($connection); ?>