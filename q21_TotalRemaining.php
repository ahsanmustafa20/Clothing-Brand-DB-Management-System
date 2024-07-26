<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Total Remaining Amount </h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');

            if( !$conn )
            {
                die("Connnettion Failed:" .mysqli_connect_error());
            }

            $sql2 = "SELECT SUM(sellingprice) AS sale FROM sell";
            $sql3 = "SELECT SUM(amount) AS paid FROM payment";
            $result2 = mysqli_query($conn,"$sql2");
            $result3 = mysqli_query($conn,"$sql3");

            $sal = mysqli_fetch_assoc($result2);
            $pay = mysqli_fetch_assoc($result3);
            ?>
            <table border = 1>
                <tr>
                    <th>Total Sale</th>
                    <th>Total Payment</th>
                    <th>Current Remaining Amount</th>
                </tr>
                <tr>
                    <td><?php echo $sal['sale'] ?></td>
                    <td><?php echo $pay['paid'] ?></td>
                    <td><?php echo ($sal['sale'] - $pay['paid']) ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>