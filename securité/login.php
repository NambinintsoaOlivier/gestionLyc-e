<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        color: red;
    }
    </style>
</head>

<body>
    <?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../index.php?error=Completer votre nom d'utilisateur");
	    exit();
	}else if(empty($pass)){
        header("Location: ../index.php?error=Completer votre mot de passe");
	    exit();
	}else{

	require("db_conn.php");
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		$resultat = $connection->query($sql);
		if ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
			// $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ../Acceuil.php");
		        exit();
            }else{
				header("Location: ../index.php?error=Incorrect! veuillez verifier votre mot de passe");
		        exit();
			}
		}else{
			header("Location: ../index.php?error=Incorrect veuillez verifier votre mot de passe");
	        exit();
		}
	}
}else{
	header("Location: ../index.php");
	exit();
}
?>
</body>

</html>