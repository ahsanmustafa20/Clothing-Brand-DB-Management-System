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
            $sql = "SELECT SUM(amountPaid) AS amount
            FROM purchase";

            $result = mysqli_query($conn,"$sql");
            $x = mysqli_fetch_assoc($result);
            ?>

            <table border = 1>
                <tr>
                    <th align=center>Total Purchase Amount</th>
                </tr>
                <tr>
                    <td align=center><?php echo $x['amount'] ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>