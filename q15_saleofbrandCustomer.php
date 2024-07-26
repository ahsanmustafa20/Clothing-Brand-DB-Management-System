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
                if(!$conn)
                {
                    die("Connection Failed: ".mysqli_connect_error());
                }
                $sql1 = "SELECT
                        SUM(s.sellingprice) AS total_sale,
                        b.brandID AS id,
                        b.name AS name
                        FROM 
                        sell s
                        JOIN
                        product p ON s.productID = p.productID
                        JOIN brand b ON p.brandID = b.brandID
                        GROUP BY b.brandID";

                $brand = mysqli_query($conn, $sql1);
                
                ?>
                <h1>Total Sale For Each Brand</h1>
                <table border=1>
                    <tr>
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Total Sale</th>
                    </tr>
                    <tr>
                        <?php while($b = mysqli_fetch_array($brand) ) { ?>
                            <td><?php echo $b['id']?></td>
                            <td><?php echo $b['name']?></td>
                            <td><?php echo $b['total_sale']?></td>
                            </tr>
                        <?php } ?>
                </table>
                
                <?php
                $sql2 = "SELECT
                        c.customerID AS id,
                        SUM(s.sellingprice) AS sales,
                        c.fname AS  fname,
                        c.lname AS lname
                        FROM 
                        sell s
                        JOIN
                        customer c ON c.customerID = s.customerID
                        GROUP BY c.customerID";

                $customer = mysqli_query($conn, $sql2);
                
                ?>
                <h1>Total Sale For Each Customer</h1>
                <table border=1>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Total Sale</th>
                    </tr>
                    <tr>
                        <?php while($c = mysqli_fetch_array($customer) ) { ?>
                            <td><?php echo $c['id']?></td>
                            <td><?php echo $c['fname']?></td>
                            <td><?php echo $c['sales']?></td>
                            </tr>
                        <?php } ?>
                </table>
            </center>
        </body>
    </html>