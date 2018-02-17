<!-- **************************************** *
 * New User webpage on demo site 	      	  *
 * developed by Matthew D'Angelo 	          *
 * This is where someone will make a new user *
 * Users will enter uname, email, fAddr, pNum *
 * and bio All stripped for excess whitespace * 
 * Regex is used			                  *
 *  - uName most be composed of alphabetic    *
 *  - email is form username@domain.tld	      * 
 *  - username can contain alphanumeric dots  * 
 *       & Dashes. Domain must only contain   * 
 *      alphanumeric and dashes 	          * 
 *      tld must contain characters and dots  * 
 *  - Phone number must be a NA # with format * 
 *      1234567890, 123.456.7890, 	          *  
 *      123-456-7890(123) 456-7890. 10 # long * 
 *  - Postal code must be canadian style      * 
 *      A1B 2C3 & A1B2C3 		              * 
 * Using other validation techiques 	      * 
 *  - bio fields must be stripped of code     * 
 *	HTML CSS JS special characters            * 
 *  - bio field stripped of SQL keywords      * 
 *	INSERT UPDATE DELETE		              * 
 * Strip any # and -- character sequence      * 
 * Pass should request and store info 	      *  
 * ****************************************** -->
<?php
	print_r($_POST);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Assignment 1</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>New User Creation</h1>
        </div>
    </div>

	<?php 
	echo "&nbsp;&nbsp;<h1>Enter Your User Information</h1>";
	echo "<form form name= 'newUser' action='newuser.php' method='post'";
	echo "<br>";
	echo "<br>";
	echo "&nbsp;&nbsp; Username: <input type = 'text' id='uName'>";
	# uName validation = ereg("[A-Za-z]{1,25}")
	echo "&nbsp;&nbsp;Email Address: <input type = 'email' id='email'>";
	#Validation for email = ereg("[A-Za-z0-9\.\-]{1,64}+@[A-Za-z0-9\-]{1,188}+\.[A-Za-z\.]{1,9}")
	echo "<br>";
	echo "<br>";
	echo "&nbsp;&nbsp;Street Number: <input type = 'text' id='sNum'>";
	echo "&nbsp;&nbsp;Street Name: <input type = 'text' id='sName'>";
	echo "<br>";
	echo "<br>";
	echo "&nbsp;&nbsp;City: <input type = 'text' id='city'>";
	echo "&nbsp;&nbsp;Province: <select name='province' id='province'>
		<option value='0'>--Select--</option>
		<option value='Ontario'>Ontario</option>
		<option value='Quebec'>Quebec</option>
		</select>";
	echo "<br>";
	echo "<br>";	
	echo "&nbsp;&nbsp;Postal Code: <input type = 'text' id='pCode'>";
	echo "&nbsp;&nbsp;Phone Number: <input type = 'tel' id='pNum'>";
	#pNum validation = ereg ("\(?[0-9]{3}[\.\-\)]?[0-9]{3}[\.\-]?[0-9]{4}
	echo "<br>";
	echo "<br>";
	echo "&nbsp;&nbsp;Bio: <textarea name='bio' rows='5' cols='40'></textarea>";
	echo "<br>";
	echo "<br>";
	echo "&nbsp;&nbsp;<input type='submit' name='submit' value='Submit'>";
	echo "&nbsp;&nbsp;<input type='reset' name='reset' value='Reset'>";
	echo "</form>";
	
	?>

	



	


      <hr>

      <footer>
        <p>&copy; D'AngeloTrudge 2018</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
