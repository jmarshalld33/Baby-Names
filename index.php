<?php

# This file is the front page that links to the two files, signup.php and matches.php.

include("common.php");
top();
?>

<div>
	<h1>Welcome!</h1>

	<ul>
		<li>
			<a href="signup.php">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/signup.gif" alt="icon" />
				Sign up for a new account
			</a>
		</li>
		
		<li>
			<a href="matches.php">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/heartbig.gif" alt="icon" />
				Check your matches
			</a>
		</li>
	</ul>
</div>

<?php
bottom();
?>
