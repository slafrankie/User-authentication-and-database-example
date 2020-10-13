<!DOCTYPE html>
<!--
    Stephen LaFrankie 
    Index page for Lab2-->
<html>
  <head>
    <!-- metadata will not show up on the physical page, but is parsed by the machine, it is pure data (information) about data (the HTML document) -->
    <meta charset="UTF-8"/><!-- sets character encoding for HTML doc -->
    <meta name="description" content="Inventory of Parts"/> <!-- Describes the web page -->
    <meta name="keywords" content="Inventory, Planes, Trains, Automobiles, Parts"/> <!-- Keyword for search engines -->
    <meta name="author" content="Stephen LaFrankie"/> <!-- Author of the page -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!-- Sets the viewing for all devices -->
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/inventory.css"/><!-- links the index page to a css page (href = "css/inventory.css") with a relation of "stylesheet" and a description as text/css document-->
    <script type="text/javascript" src="js/inventory.js"></script><!-- points to the external Javascript file 'inventory.js' -->
  </head>
  <body onload = "clearErrorMessage()"> <!-- upon page load, activates Javascript function clearErrorMessage(), which closes any previous error messages being displayed-->
    <div class="content">
      <div class="header">
        <p class="welcome">Welcome to My Inventory</p>
        <p class="please">Please login</p>
      </div>
      <div class="login">
          <!-- the form will collect the user info -->
          <!-- method = "post" will send the data collected as an 'HTTP post transaction' -->
          <!-- action = "checkAccess.php" will direct the information sent to the php document 'checkAccess' to be verified -->
          <form method="post" action="checkAccess.php">
          <div class="formcontainer"> <!-- creates div element named formcontainer to hold login prompts, inputs, and buttons --> 
            <label>User Name:</label> <!-- displays user name on the input box -->
            <input type="text" placeholder="Enter Username" name="uname" required><!-- creates input box including a text box, a prompt saying 'Enter Username', and makes it required... also named uname -->
            <label>Password:</label><!-- i might be lazy but it's the same as the username label -->
            <input type="password" placeholder="Enter Password" name="upwd"> <!-- also the same concept as username password, it's just not required -->
            <button type ="submit">Login</button><!-- creates a button labeled login which submits the inputs on click -->
            <button type="reset">Clear Info</button><!-- the reset button clears any data currently input by the user -->
          </div>
        </form>
      </div>
      <div class="footer"><!-- creates div element named footer containing a php statement for displaying the errors -->
        <span id="errorMessage" class="errors"> <!-- the span element allows usage of Javascript and will lead to displaying an error message if necessary -->
          <?php 
          /* isset will return true if 'GET' returns with errors, echo will print the errors */
              if (isset($_GET["errors"])) {
                echo $_GET["errors"]; 
            }
          ?>
        </span>
      </div>
    </div> 
  </body>
</html>