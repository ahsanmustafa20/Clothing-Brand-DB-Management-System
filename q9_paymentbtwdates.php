<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');

            if( !$conn )
            {
                die("Connnettion Failed:" .mysqli_connect_error());
            }
            
            $s = isset($_POST['sdate']) ? mysqli_real_escape_string($conn, $_POST['sdate']) : '';
            $l = isset($_POST['ldate']) ? mysqli_real_escape_string($conn, $_POST['ldate']) : '';

            $sql = "SELECT SUM(amount) AS amount
            FROM payment WHERE paymentdate BETWEEN '$s' AND '$l'";

            $result = mysqli_query($conn,"$sql");
            $x = mysqli_fetch_assoc($result);
            ?>
            <form action="" method="post">
                <label for="sdate">Starting Date: </label>
                <input type="date" name="sdate">

                <label for="ldate">Ending Date: </label>
                <input type="date" name="ldate">

                <input type="submit" name="submit" value="Submit">
            </form>
            <table border = 1>
                <tr>
                    <th>Total Sales Amount Between <?php echo $s ?> And <?php echo $l ?></th>
                </tr>
                <tr>
                    <td align=center><?php echo $x['amount'] ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>