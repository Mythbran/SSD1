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
 *	INSERT UPDATE DELETE		      		  * 
 * Strip any # and -- character sequence      * 
 * Pass should request and store info 	      *  
 * ****************************************** -->
<?php 
	if($_POST){
		//Validation things 


		$errors = array(); // array to hold errors

		//username validation 
		if(empty($_POST['uName'])){
			$errors['uname001'] = "Username is required";
		}
	# uName validation = ereg("[A-Za-z]{1,25}")
		if(!preg_match("/^[a-zA-Z]{1,25}$/", $_POST["uName"])){
			$errors['uname002'] = "Only letters are allowed. Max 25 characters";
		}

		//STILL NEEDS REMOVAL OF WHITESPACE - SANITATION 


		//email validation
		if(empty($_POST['email'])){
			$errors['email001'] = "Email is requred";
		}
              
        //Email Formatting Validation
		if(!preg_match("/^([A-Za-z0-9\.\-]{1,64})[@]([A-Za-z0-9\-]{1,188}\.)([A-Za-z\.]{1,9})$/", $_POST["email"])){
			$errors['email002'] = "Valid email is required";
		}

       

		//Street Number Validation 
		if(empty($_POST['sNum'])){//if empty
			$errors['snum001'] = "Street Number is requred";
		}


		//Street Name Validation 
		if(empty($_POST['sName'])){//if empty
			$errors['sname001'] = "Street Name is requred";
		}

		
               /* 
                if(preg_match("[A-Za-z\s]{1,25}", ($_POST['sName']), $matches)){//added white spaces
			$errors['sname002'] = "Street name must be between 1-25 characters and contain only alphabetic characters";
		}*/
	
		//City Validation 
		if(empty($_POST['city'])){
			$errors['city001'] = "City is requred";
		}
                
                //not too sure bout this. you said u might make a whitelist???

		//Province Validation NOT WORKING MIGHT MAKE A WHITELIST 
		if(empty($_POST['province'])){
			$errors['province001'] = "Province is requred";
		}

		if(!preg_match("/^(AB|BC|MN|NB|NF|NT|NS|NV|ON|PI|QB|SK|YK|0)$/" ,$_POST['province'])){
			$errors[] = "Province error";
		}

		//Postal Code Validation 
		if(empty($_POST['pCode'])){
			$errors['pcode001'] = "Postal Code is requred";
		}

		//Postal Code Check 
		if(!preg_match("/^[a-zA-Z][0-9][a-zA-Z][\s]?[0-9][a-zA-Z][0-9]$/", $_POST['pCode'])){
			$errors['pcode002'] = "Enter a valid postal code";
		}

		//Phone Number Validation 
		if(empty($_POST['pNum'])){
			$errors['pnum001'] = "Phone Number is requred";
		}

		if(!preg_match("/^\(?[0-9]{3}[\.\-\)]?[\s]?[0-9]{3}[\.\-]?[0-9]{4}$/", $_POST['pNum'])){
			$errors['pnum002'] = "Enter a valid Canadian phone number";
		}

		
 		//bio validation
                $temp = $_POST['bio'];
                $temp = stripslashes($temp);//going to strip html regardless
	    	$temp = htmlspecialchars($temp);
	    	$temp = trim($temp);
                    
                if(preg_match("(?i)select|delete|insert", $temp, $matches)){//removes SQL operations
                   $temp = str_replace($matches, "", $temp);//replaces with null
		}
                $_POST['bio'] = $temp;//posts back to bio
                
		if(count($errors) == 0){
			header("Location: /SSD1/userAdded.php");
			exit();
		}
	
	}
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

	<!-- User Form --> 
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="uform">
		<!-- Username Form --> 
		<p>
		<label for="uName">Username: </label>
		<input type="text" name="uName" id="uName" value="<?php if(isset($_POST['uName'])); echo $_POST['uName']; ?>"/>

		<!-- Username Validation -->
		<span class="errors"> * <?php
			if(isset($errors['uname001'])) echo $errors['uname001'];#empty

			if(isset($errors['uname002'])) echo $errors['uname002'];#A-Za-z 1-25 length

                        #shud strip of slashes & tags
                        


		?></span>

		<!-- email Form -->
		<label for="email"> eMail: </label>
		<input type="text" name="email" id="email"value="<?php if(isset($_POST['email'])); echo $_POST['email']?>"/>
		<span class="errors"> * <?php
			if(isset($errors['email001'])){
            	echo $errors['email001'];#empty
            }
                        
            if(isset($errors['email002'])){
            	echo $errors['email002'];#invalid
            }
		?></span>
		</p>	

		<p> 
		<!-- Street Number Form --> 
		<label for="sNum"> Street Number: </label>
		<input type="text" name="sNum" id="sNum"value="<?php if(isset($_POST['sNum'])); echo $_POST['sNum']?>"/>

		<span class="errors"> * <?php
			if(isset($errors['snum001'])) echo $errors['snum001'];#empty



		?></span>


		<!-- Street Name Form --> 
		<label for="sName"> Street Name: </label>
		<input type="text" name="sName" id="sName"value="<?php if(isset($_POST['sName'])); echo $_POST['sName']?>"/>

		<span class="errors"> * <?php
			if(isset($errors['sname001'])) echo $errors['sname001'];#empty



		?></span>
		</p> 

		<p> 
		<!-- City Form --> 
		<label for="city"> City: </label>
		<input type="text" name="city" id="city"value="<?php if(isset($_POST['city'])); echo $_POST['city']?>"/>
		<span class="errors"> * <?php
			if(isset($errors['city001'])) echo $errors['city001'];#empty



		?></span>


		<!-- Province Form -->

		<label for="province"> Province: </label>
		<select name="province" id="province" form="uform">
		<option value=''>--Select--</option>
		<option value='AB'>Alberta</option>
		<option value='BC'>British Columbia</option>
		<option value='MN'>Manitoba</option>
		<option value='NB'>New Brunswick</option>
		<option value='NF'>Newfoundland & labrador</option>
		<option value='NT'>Northwest Territories</option>
		<option value='NS'>Nova Scotia</option>
		<option value='NV'>Nunavut</option>
		<option value='ON'>Ontario</option>
		<option value='PI'>Prince Edward Island</option>
		<option value='QB'>Quebec</option>
		<option value='SK'>Saskatchewan</option>
		<option value='YK'>Yukon</option>
		</select>	
		<span class="errors"> * <?php
			if(isset($errors['province001'])) echo $errors['province001'];#empty
			if(isset($errors['province002'])) echo $errors['province002'];



		?></span>


		</p> 

		<p> 
		<!-- Postal Code Form --> 

		<label for="pCode"> Postal Code: </label>
		<input type="text" name="pCode" id="pCode" value="<?php if(isset($_POST['pCode'])); echo $_POST['pCode']?>">

		<span class="errors"> * <?php
			if(isset($errors['pcode001'])) echo $errors['pcode001'];#empty
			if(isset($errors['pcode002'])) echo $errors['pcode002'];#validation check



		?></span>



		<!-- Phone Number Form --> 

		<label for="pNum"> Phone Number: </label>
		<input type="text" name="pNum" id="pNum"value="<?php if(isset($_POST['pNum'])); echo $_POST['pNum']?>"/>


		<span class="errors">* <?php
			if(isset($errors['pnum001'])) echo $errors['pnum001'];#empty
			if(isset($errors['pnum002'])) echo $errors['pnum002'];#Valid


		?></span>
		</p> 

		<p>
		<label for="bio"> Bio: </label> 
		<textarea name="bio" rows="5" cols="20"></textarea>
		

		</p>

		
		<input type="submit" value="submit"/>
		<input type="reset" value="reset"/>
	</form>



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
