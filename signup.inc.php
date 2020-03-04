<?php

if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$name = $_POST['name'];
	$matric = $_POST['matric'];
	$pwd = $_POST['pwd'];
	$ic = $_POST['ic'];
	$studies = $_POST['studies'];
	$acc = $_POST['acc'];
	$accname = $_POST['accname'];
	$research = $_POST['research'];
	$sv = $_POST['sv'];
	$faculty = $_POST['faculty'];

	/*$name = mysqli_real_escape_string($conn, $_POST['name']);
	$matric = mysqli_real_escape_string($conn, $_POST['matric']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$ic = mysqli_real_escape_string($conn, $_POST['ic']);
	$studies = mysqli_real_escape_string($conn, $_POST['studies']);
	$acc = mysqli_real_escape_string($conn, $_POST['acc']);
	$accname = mysqli_real_escape_string($conn, $_POST['accname']);
	$research = mysqli_real_escape_string($conn, $_POST['research']);
	$sv = mysqli_real_escape_string($conn, $_POST['sv']);
	$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
	*/

	//Error handlers
	//Check for empty fields
	if (empty($name) || empty($matric) || empty($pwd) || empty($ic) || empty($studies) || empty($acc) || empty($accname) || empty($research) || empty($sv) || empty($faculty)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	}	else {
			$sql = "SELECT * FROM users WHERE user_matric='$matric'";
			$result = mysqli_query ($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header("Location: ../signup.php?signup=usertaken");
				exit();
			} else {
				//Hashing the password
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				//Insert the user into the database
				$sql = "INSERT INTO users (user_name, user_matric, user_pwd, user_ic, user_studies, user_acc, user_accname, user_research, user_sv, user_faculty) VALUES ('$name', '$matric', '$hashedPwd', '$ic', '$studies', '$acc', '$accname', '$research', '$sv', '$faculty');";
				mysqli_query($conn, $sql);
				header("Location: ../pick.php");
				exit();
			}
	}

}	else {
		header("Location: ../signup.php");
		exit();
}
?>