<html>
    <head>
        <title>

        </title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Payment Installment Details</h1>
            <?php 
            $conn = mysqli_connect('127.0.0.1','root','','project1');    
            if(!$conn)  
            {
                die("Connection Failed: ".mysqli_connect_error());
            }
            $sql = "SELECT 
                    c.fname,
                    c.lname,
                    p.paymentdate,
                    p.amount
                    FROM
                    customer c 
                    JOIN
                    payment p ON c.customerID = p.customerID";
            
            $result = mysqli_query($conn, $sql);
            ?>

            <table border = 1>
                <tr>
                    <th>Customer Name</th>
                    <th>Payment Amount</th>
                    <th>Payment Date</th>
                </tr>
                <tr>
                    <?php 
                    while($row = mysqli_fetch_array($result))
                    {?>
                    <tr>
                        <td><?php echo $row['fname']?> <?php echo $row['lname']?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><?php echo $row['paymentdate']?></td>
                    </tr>
                    <?php }?>
                </tr>
                </tr>
            </table>
    </body>
</html>