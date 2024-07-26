<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Current Account Value</h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');

            if( !$conn )
            {
                die("Connnettion Failed:" .mysqli_connect_error());
            }

            $sql1 = "SELECT SUM(amount) AS expen FROM expenditure";
            $sql2 = "SELECT SUM(sellingprice) AS sale FROM sell";
            $sql3 = "SELECT SUM(amountPaid) AS purchase FROM purchase";
            $result1 = mysqli_query($conn,"$sql1");
            $result2 = mysqli_query($conn,"$sql2");
            $result3 = mysqli_query($conn,"$sql3");
            $ex = mysqli_fetch_assoc($result1);
            $sal = mysqli_fetch_assoc($result2);
            $pur = mysqli_fetch_assoc($result3);
            ?>
            <table border = 1>
                <tr>
                    <th>Total Sale</th>
                    <th>Total Expenditure</th>
                    <th>Total Purchase</th>
                    <th>Current Account Value</th>
                </tr>
                <tr>
                    <td><?php echo $sal['sale'] ?></td>
                    <td><?php echo $ex['expen'] ?></td>
                    <td><?php echo $pur['purchase'] ?></td>
                    <td><?php echo ($sal['sale'] - ($ex['expen'] + $pur['purchase'])) ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>