<?php
# This file contains common code to be used by all of the other pages.
# The two functions provided are top() and bottom(), which print out a 
# shared header/footer HTML for all pages.

# Displays the common HTML at the top of each page.
function top() {
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>NerdLuv</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/nerdluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerarea">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/nerdluv.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>
<?php
}

# Outputs the common HTML at the bottom of each page.
function bottom() {
	?>
		<div>
			<p>
				This page is for single nerds to meet and date each other!  Type in your personal information and wait for the nerdly luv to begin!  Thank you for using our site.
			</p>
			
			<p>
				Results and page (C) Copyright 2010 NerdLuv Inc.
			</p>
			
			<ul>
				<li>
					<a href="index.php">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/back.gif" alt="icon" />
						Back to front page
					</a>
				</li>
			</ul>
		</div>

		<div id="w3c">
			<a href="https://webster.cs.washington.edu/validate.php">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/w3c-xhtml.png" alt="Valid XHTML 1.1" />
			</a>
			<a href="https://webster.cs.washington.edu/validate-css.php">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/10su/homework/4/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
<?php } ?>
