<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <meta https-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
          				<a class="navbar-brand" href="/">Home</a>
          				<a class="navbar-brand" href="/SSD1">SSD1</a>
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

<table border="1">
	<?php
		session_start();
        $conn = pg_connect("host=127.0.0.1 port=5432 dbname=ssd1 user=ssdinsert password=Jxem877&")or die ("Connection Refused");

        //makes sure connection was successful
        if (!$conn) {	
            echo pg_last_error($conn);
			
        } else {

            $stmtVal = array("$_SESSION[uname]", "$_SESSION[email]", "$_SESSION[sname]", "$_SESSION[snum]", "$_SESSION[city]", "$_SESSION[province]", "$_SESSION[pcode]", "$_SESSION[pnum]", "$_SESSION[bio]");
            //prepared statement & query string
            
            
            $result = pg_prepare($conn, "INSERT", 'INSERT INTO users (uname, email, sname, snum, city, province, pcode, pnum, bio) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)');

            #input sanitization goes here 


            $rtn = pg_execute($conn, "INSERT", $stmtVal);

            //makes sure that the insert executed properly
            if (!$rtn) {
                echo pg_last_error($conn);
                #echo ("shit broke");
            } else {
		echo "The Following Information Was Added To The Database";
		echo "<br>";
		echo"<tr>";
		echo "<td> username </td>";
		echo "<td> email </td>";
		echo "<td> house number </td>";
		echo "<td> Street Name </td>";
		echo "<td> City </td>";
		echo "<td> Province </td>";
		echo "<td> Postal Code </td>";
		echo "<td> Phone Number </td>";
		echo "<td> Bio </td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>$_SESSION[uname]</td>";
		echo "<td>$_SESSION[email]</td>";
		echo "<td>$_SESSION[snum]</td>";
		echo "<td>$_SESSION[sname]</td>";
		echo "<td>$_SESSION[city]</td>";
		echo "<td>$_SESSION[province]</td>";
		echo "<td>$_SESSION[pcode]</td>";
		echo "<td>$_SESSION[pnum]</td>";
		echo "<td>$_SESSION[bio]</td>";
		echo "</tr>";
		
		
		
                $inLen = count($stmtVal); //counts length of the input array stmtVal
                //prints out the info that was just inserted
                for ($x = 0; $x < $inLen; $x++) {
                    echo $stmtVal[$x];
                    echo "<br>";
                }
            }//end of else

            pg_close($conn);
        }
        ?>
        </table>
        <footer>
            <p><a class="btn btn-default" href="index.html" role="button">Index &raquo;</a></p>
            <p><a class="btn btn-default" href="listUser.php" role="button">User List &raquo;</a></p>
            <p>&copy; D'AngeloTrudge 2018</p>
        </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
</body>
</html>
