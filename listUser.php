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
            table, td, tr{
            	border: 1px solid black;
            	width:500px;
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

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>User List</h2>
                    <h3>A List of Users is Below</h3>
 				<table>                   
                <?php
                    //database connection
                    $db = pg_connect("host=127.0.0.1 port=5432 dbname=ssd1 user=ssdselect password=Wier~723") or die ("connection refused");
                    $result = pg_query($db, 'SELECT * FROM users');
                    
					echo"<tr>";
					echo "<td><h4> User ID </h4></td>";
					echo "<td><h4> username </h4></td>";
					echo "<td><h4> email </h4></td>";
					echo "<td><h4> house number </h4></td>";
					echo "<td><h4> Street Name </h4></td>";
					echo "<td><h4> City </h4></td>";
					echo "<td><h4> Province </h4></td>";
					echo "<td><h4> Postal Code </h4></td>";
					echo "<td><h4> Phone Number </h4></td>";
					echo "<td><h4> Bio </h4></td>";
					echo "</tr>";  
					
					
					while ($row = ph_fetch_assoc($result)){
						echo"tr";
						echo "<td><h5> $row['uid']</h5></td>";
						echo "<td><h5> $row['uname']</h5></td>";
						echo "<td><h5> $row['email']</h5></td>";
						echo "<td><h5> $row['snum']</h5></td>";
						echo "<td><h5> $row['sname']</h5></td>";
						echo "<td><h5> $row['city']</h5></td>";
						echo "<td><h5> $row['province']</h5></td>";
						echo "<td><h5> $row['pcode']</h5></td>";
						echo "<td><h5> $row['pnum']</h5></td>";
						echo "<td><h5> $row['bio']</h5></td>";
						echo"/tr";
					
						
					}                 
                   /*while ($row = pg_fetch_assoc($result)) {
                        print "User ID:      " . $row['uid'] . "<br> ";
                        print "Username:     " . $row['uname'] . " <br>";
                        print "Email:        " . $row['email'] . "<br> ";
                        print "Address:      " . $row['snum'] . " " . $row['sname'] . "<br> ";
                        print "City:         " . $row['city'] . ", " . $row['province'] . " <br>";
                        print "Postal Code:  " . $row['pcode'] . "<br> ";
                        print "Phone Number: " . $row['pnum'] . "<br> ";
                        print "Bio           " . $row['bio'] . "<br>";
                        print "<br>";
                    }//while loop */                  
                    ?>
                    </table>

                    <br>
                </div>
                <hr>

                <footer>
                    <p><a class="btn btn-default" href="index.html" role="button">Back &raquo;</a></p>
                    <p>&copy; D'AngeloTrudge 2018</p>
                </footer>
            </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

            <script src="js/vendor/bootstrap.min.js"></script>

            <script src="js/main.js"></script>
    </body>
</html>
