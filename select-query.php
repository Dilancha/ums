<?php require_once('inc/connection.php'); ?>

<?php
   $query = "SELECT first_name, last_name, email FROM user";
    $result_set = mysqli_query($connection, $query);
if ($result_set) {
	//echo "Query succesful";
echo mysqli_num_rows($result_set) . "Records found.<hr>";
$table = '<table>';
$table .= '<tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>';



while ($record = mysqli_fetch_assoc($result_set)) {
	$table .= '<tr>';
    $table .= '<tb>'. $record['first_name'] . '</td>';
    $table .= '<tb>'. $record['last_name'] . '</td>';
    $table .= '<tb>'. $record['email'] . '</td>';
    $table .= '</tr>';

}

$table .='</table>';
}

?>

<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="UTS-8">
	<title>Document</title>
</head>
<body>

 <?php echo $table; ?>
</body>
</html>
<?php mysqli_close($connection); ?>