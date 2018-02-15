<?php
#redirects after 6 seconds
header("refresh:6;url=index.html");

#adds users to the db
#general connection(not sure if works)
$db = resource pg_connect ("host=localhost port=5432 dbname=user user=admin password=lizA098");

#insert query
$insertQuery = ("INSERT INTO users VALUES '$_POST[uName]', '$_POST[email]', '$_POST[sNum]', '$_POST[sName]', '$_POST[city]', '$_POST[province]', '$_POST[pCode]', '$_POST[pNum]', '$_POST[bio]' ");

#executes
$result = pg_query($insertQuery); 

if(!result){
echo "INSERT FAILED!!!";
}
else
echo "INSERT SUCCESSFUL!!!";
?>
