<!DOCTYPE html>
<!--
    Stephen LaFrankie
    Inventory HTML for Lab2
-->
<html>
    <head>
        <!-- metadata will not show up on the physical page, but is parsed by the machine, it is pure data (information) about data (the HTML document) -->
        <meta charset="UTF-8"><!-- sets character encoding for HTML doc -->
        <title>Best Buds Inventory</title>
        <meta name="author" content="Stephen LaFrankie"/><!-- Author of page -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!-- Sets viewing for all technological devices -->
        <link rel="stylesheet" type="text/css"
              href="css/inventory.css"><!-- links the index page to a css page (href = "css/inventory.css") with a relation of "stylesheet" and a description as text/css document-->
        <script type="text/javascript" src="js/inventor.js"></script><!-- points to the external Javascript file 'inventory.js' -->
    </head>
    
        <!-- stores information that can be used across multiple pages in a php session, without storing on a user's computer -->
        <!-- once stored, can be used again later -->
        <?php session_start(); ?>
        <!-- div element to hold the informative statement -->
        <div class = "content"><!-- creates div element named content to hold all information pertaining to the webpage -->
            <p class="welcome">Welcome <?php echo $_SESSION["username"]; ?></p> <!-- displays 'Welcome' followed by an echo of the $_SESSION variable containing whatever 'username' is -->
            <p class ="date">Time and Date: <?php date_default_timezone_set('EST')?><?php echo date('l jS \of F Y h:i:s A')?></p><!-- time and date -->
            <p class="welcome">Current Inventory</p>
                <!-- Table holding part data -->
             <div class ="inventory">
                <table>
                    <th>Part#</th><th>Manufacture</th><th>Description</th><th>In Stock</th><th>Buy Price</th><th>Sell Price</th><!-- displays the the table headers -->
                    <?php
                        
                        /* $connectHandle is assigned to a new mysql connection under the current php session */
                        $connectionHandle = mysqli_connect("localhost", "slafrankie", "change", "inventory"); 
                                
                        /*check connection, if mysqli_connect_errno() is true, the error message will be displayed*/
                        if(mysqli_connect_errno()){
                            printf("Connect failed: %s\n", mysqli_connect_error());
                            exit();
                        }
                        
                        /*sqlStatement is assigned a query selecting the rows of the database*/
                        $sqlStatement = "SELECT part_number,manufacturer,description,instock,buy_price,sell_price FROM inventory.parts";/*sqlStatement is assigned a query selecting the rows of the database*/
                        if ($result = mysqli_query($connectionHandle, $sqlStatement)){ /* sends a mysqli query with parameters $connectionHandle, $sqlStatement stored in $result, if successful continues to while loop */
                            while($row = mysqli_fetch_assoc($result)){ /* retrieves the database 'result rows' as a connected array */
                                echo '<tr>'.
                                        /* shows the table data as rows pertaining to the corresponding parameters */
                                        '<td>'.$row['part_number'].'</td>'. 
                                        '<td>'.$row['manufacturer'].'</td>'.
                                        '<td>'.$row['description'].'</td>'.
                                        '<td>'.$row['instock'].'</td>'.
                                        '<td>'.$row['buy_price'].'</td>'.
                                        '<td>'.$row['sell_price'].'</td>'.
                                     '</tr>';
                            }
                            /*frees memory associated with 'result' in order to prevent overuse of memory from the return of large result set/*/
                            mysqli_free_result($result);
                        }
                        /*terminate the current connection to the database*/
                        mysqli_close($connectionHandle);
                    ?>
                </table>
              </div>
            </div>
    
</html>