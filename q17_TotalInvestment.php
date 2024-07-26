<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Total Investment Done Till Date</h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');

            if( !$conn )
            {
                die("Connnettion Failed:" .mysqli_connect_error());
            }

            $sql = "SELECT SUM(amountPaid) AS Amount FROM purchase";
            $result = mysqli_query($conn,"$sql");
            $x = mysqli_fetch_assoc($result);
            ?>
            <table border = 1>
                <tr>
                    <th>Total Investment</th>
                </tr>
                <tr>
                    <td><?php echo $x['Amount'] ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>