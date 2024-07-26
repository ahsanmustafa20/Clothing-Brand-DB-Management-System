<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>List Of Customers With Remaining Amounts</h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if(!$conn)
            {
                die("Connection Failed:".mysqli_connect_error());
            }
            $search = '';
            $search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : ''; 

            $sql = "SELECT 
            c.customerID AS id,
            c.fname, 
            c.lname,  
            COALESCE(s.total_amount, 0) AS total_amount, 
            COALESCE(p.total_paid, 0) AS total_paid 
            FROM 
            customer c 
             JOIN 
            (SELECT customerID, SUM(sellingPrice) AS total_amount 
             FROM sell 
             GROUP BY customerID) s ON c.customerID = s.customerID 
            LEFT JOIN 
            (SELECT customerID, SUM(amount) AS total_paid 
             FROM payment 
             GROUP BY customerID) p ON c.customerID = p.customerID 
             WHERE c.fname  LIKE '$search%'
            GROUP BY 
            c.customerID";
            $result = mysqli_query($conn, $sql);
            ?>
            <form action="" method="post">
                <input type="text" name="search" placeholder="Enter name">
                <input type="submit" name="submit" value="Search">
            </form>
            <table border=1>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Total Paid</th>
                    <th>Remaining Amount</th>
                </tr>
                <tr>
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['fname'] ?>  <?php $row['lname']?></td>
                    <td><?php  echo $row['total_amount']?></td>
                    <td><?php  echo $row['total_paid']?></td>
                    <?php $remaining = $row['total_amount'] - $row['total_paid'] ?>
                    <td><?php echo $remaining ?></td>
                    </tr>
                    <?php } ?>
            </table>
        </center>
    </body>
</html>