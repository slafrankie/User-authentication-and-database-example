<?php
/* 
    Stephen LaFrankie
 * Lab2
 * 4/24/2019
 */
/* filters the errors reported so that only 'E_NOTICE' is reported as an error */
error_reporting(E_NOTICE);
/* begins or resumes current session, identifiers passed via GET, POST, or cookies */
session_start();

/* variable chkUser will filter listed external variables*/
/*FILTER_SANITIZE_STRING will strip any characters that are symbols and not letters*/
$chkUser = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);

/*Assigns a new SESSSION (memory variable), associated with 'username', variable to chkUser*/
$_SESSION["username"] = $chkUser;

/* variable connecting the PHP code with the MySQL database */
/* created with parameters showing the location of the database and the credentials */
$mysqli = new mysqli("localhost", "slafrankie", "change", "inventory");

/* check connection to database, if failure occurrs the user is notified */
if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
}

/* retrieve user data and rows from table */
$sqlStatement = "SELECT username, firstname, lastname, logged_in FROM inventory.users WHERE username = '" .$chkUser. "'";
$redirectPage = false;

/* query performed on the database is assigned to the $result variable using the */
/* data retrieved in the $sqlStatement variable */
$result = $mysqli->query($sqlStatement);

/* if $result, which is now valued using the number rows of the database, is more than 0 */
/* $page is set to the inventory page and $redirectPage will be true when it is passed to the next if statement */
if($result->num_rows > 0){
    
    $page = "inventory.php";
    $redirectPage = true;
    
    $result->close();
}

/* close connection */
$mysqli->close();

/* if $redirectPage was true, the browser is redirected to $page (inventory.php) */
if($redirectPage){
    header("Location:".$page); /* redirect browser */
    exit();
}
/* if $redirectPage is false, the error message will display and will prompt for a re-loggin */
else{
    header("Location: index.php?errors=".htmlspecialchars("Invalid User Name or Password"));
    exit();
}
?>