<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Sign up</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="name" placeholder="Full Name" required>
			<input type="text" name="matric" placeholder="Matric No." required>
			<input type="password" name="pwd" placeholder="Password" required>
			<input type="text" name="ic" placeholder="IC Number/Pasport(Country)" required>
			<input type="text" name="studies" placeholder="Program of Studies" required>
			<input type="text" name="level" placeholder="Master's Degree/Phd/SPADA" required>
			<input type="text" name="phone" placeholder="Phone No." required>
			<input type="text" name="acc" placeholder="Account No." required>
			<input type="text" name="accname" placeholder="Account Name" required>
			<input type="text" name="research" placeholder="Title of Research Project" required>
			<input type="text" name="sv" placeholder="Name of Supervisor" required>
			<input type="text" name="faculty" placeholder="Faculty/CoE"  required>		
			<button type="submit" name="submit" href="pick.php" action="upload.signup.php" method="POST" enctype="multipart/form-data">Sign Up</button>
		</form>
	</div>
</section>



<?php
	include_once 'footer.php';
?> 