
<html>
<head>
    <title>Customers List</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
    <body>
    <a href="..\Home.php">HOME</a>
    <center>
        <h1>Customers List With Details Of Purchase</h1>
        <?php 
        $conn = mysqli_connect('127.0.0.1','root','','project1');    
        if(!$conn)  
        {
            die("Connection Failed: ".mysqli_connect_error());
        } 
        $search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : ''; 

        $sql = "SELECT
                    c.customerID AS id,
                    c.fname AS fname,
                    c.lname AS lname,
                    s.purchasedate AS pdate,
                    p.brandID AS b,
                    b.name as bname
                FROM
                    customer c
                JOIN
                    sell s ON c.customerID = s.customerID
                JOIN
                    product p ON s.productID = p.productID
                JOIN
                    brand b ON p.brandID = b.brandID
                WHERE
                    c.fname LIKE '$search%'";  
                $cus = mysqli_query($conn,$sql);


        ?>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Enter name">
            <input type="submit" name="submit" value="Search">
        </form>
        <table border = 1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Date Of Purchase</th>
            </tr>
                <?php 
                while($result = mysqli_fetch_array($cus))
                { ?>
                <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['fname'] ?>  <?php echo $result['lname'] ?></td>
                <td><?php echo $result['bname'] ?></td>
                <td><?php echo $result['pdate'] ?></td>
                <?php } ?>
            </tr>
        </table>


    </center>    
    </body>
</html>