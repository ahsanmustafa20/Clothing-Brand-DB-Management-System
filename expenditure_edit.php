<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>

            <?php

            $sid = $_GET['id'];
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if( !$conn)
            {
                die("Connection Failed: ".mysqli_connect_error());
            }

            $sql = "SELECT * FROM expenditure WHERE expenditureID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>remarks</th>
                </tr>
                <tr>
                    <form action="expenditure_update.php" method="post">
                        <td><input type="number" name = "expenditureID" readonly value= "<?php echo $result['expenditureID'] ?>"></td>
                        <td><input type="date" name = "exdate" value= "<?php echo $result['exdate'] ?>"></td>
                        <td><input type="number" name = "amount" value= "<?php echo $result['amount'] ?>"></td>
                        <td><input type="text" name = "remarks" value= "<?php echo $result['remarks'] ?>"></td>
                        
                </tr>
                <tr>
                    <td colspan="8" align="center"><input type="submit" name="save" value="Save" /></td>
                    </form> 
                </tr>
            </table>
            <?php mysqli_close($conn); ?>
        </center>
    </body>
</html>