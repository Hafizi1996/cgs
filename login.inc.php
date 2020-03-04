<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$matric = mysqli_real_escape_string($conn, $_POST['matric']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($matric) || empty($pwd)) {
			header("Location: ../index.php?login=empty ");
			exit();	
		} else {
		$sql = "SELECT * FROM users WHERE user_matric='$matric'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assos($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_name'] = $row['user_name'];
					$_SESSION['u_matric'] = $row['user_matric'];
					$_SESSION['u_ic'] = $row['user_ic'];
					$_SESSION['u_studies'] = $row['user_studies'];
					$_SESSION['u_level'] = $row['user_level'];
					$_SESSION['u_phone'] = $row['user_phone'];
					$_SESSION['u_acc'] = $row['user_acc'];
					$_SESSION['u_accname'] = $row['user_accname'];
					$_SESSION['u_research'] = $row['user_research'];
					$_SESSION['u_sv'] = $row['user_sv'];
					$_SESSION['u_faculty'] = $row['user_faculty'];
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}