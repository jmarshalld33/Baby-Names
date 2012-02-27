<?php

# This file is the front page that links to the two files, signup.php and matches.php.  


include("common.php");
top();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	?>
	<form action="signup.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>New User Signup:</legend>
			<div>
				<strong>Name:</strong>
				<input type="text" name="name" size="16" />
			</div>
			
			<div>
				<strong>Gender</strong>
				<label><input type="radio" name="gender" value="Male" /> Male</label>
				<label><input type="radio" name="gender" value="Female" checked="checked"/> Female</label>
			</div>
			
			<div>
				<strong>Age:</strong>
				<input type="text" name="age" size="5" maxlength="2" />
			</div>
			
			<div>
				<strong>Personality type:</strong>
				<input type="text" name="personality" size="5" maxlength="8"/> (<a href=" http://www.humanmetrics.com/cgi-win/JTypes2.asp" >Don't know your type?</a>)
			</div>
			
			<div>
				<strong>Favorite OS:</strong>
				<select name="OS">
					<option selected="selected">Windows</option>
					<option>Mac OS X</option>
					<option>Linux</option>
				</select>
			</div>
			
			<div>
				<strong>Seeking age:</strong>
				<input type="text" name="ageBegin" size="5" maxlength="2" /> to <input type="text" name="ageEnd" size="5" maxlength="2" />
			</div>
			
			<div>
				<input type="submit" value="Sign Up" />
			</div>
		</fieldset>
	</form>
	<?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$gender = substr($_POST['gender'], 0, 1);
	$age = $_POST['age'];
	$personality = $_POST['personality'];
	$OS = $_POST['OS'];
	$ageBegin = $_POST['ageBegin'];
	$ageEnd = $_POST['ageEnd'];
	$info = $name . ',' . $gender . ',' . $age . ',' . $personality . ',' . $OS . ',' . $ageBegin . ',' . $ageEnd;
	

	file_put_contents('singles.txt', "\n" . $info, FILE_APPEND);
	
	?>
	<h3>Thank you!</h3>
	
	<p>Welcome to NerdLuv, <?= $name ?></p>
	
	<p>Now <a href="matches.php">log in to see your matches</a></p>
	<?php
}
?>
<?php
bottom();
?>
