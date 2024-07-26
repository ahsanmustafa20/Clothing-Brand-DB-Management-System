<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Total purchase made by each customer till now.</h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if(!$conn)
            {
                die("Connection Failed: ".mysqli_connect_error());
            }
            $sql = "SELECT
                    c.customerID AS id,
                    c.fname AS fname,
                    c.lname AS lname,
                    s.amount AS amt
                    
                    FROM
                    customer c
                    JOIN
                    (SELECT customerID, SUM(sellingprice) AS amount FROM sell
                    GROUP BY customerID) s ON s.customerID = c.customerID";
            $result = mysqli_query($conn, $sql);
            ?>
            <table border=1>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Total Purchase</th>
                </tr>
                <tr>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['fname']?> <?php echo $row['lname']?></td>
                    <td><?php echo $row['amt']?></td>
                </tr>
                <?php } ?>
            </table>
        </center>
    </body>
</html>