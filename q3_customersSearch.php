
<html>
<head>
    <title>Customers List</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<a href="..\Home.php">HOME</a>
    <center>
        <h1>Customer Detailed List</h1>
    <?php 
    $conn = mysqli_connect('127.0.0.1','root','','project1');    
    if(!$conn)  
    {
        die("Connection Failed: ".mysqli_connect_error());
    } 
    $search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : ''; 

    $sql = "SELECT * FROM customer WHERE fname LIKE '$search%'";
    $customer = mysqli_query($conn,"$sql");
    
    ?>

    <form action="q3_customersSearch.php" method="post">
        <input type="text" name="search" placeholder="Enter name">
        <input type="submit" name="submit" value="Search">
    </form>
    <table border = 1>
        <tr>
            <th>Customer Name</th>
            <th>Number Of Suits</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Remaining Amount</th>
        </tr>
        <tr>
            <?php
            while($result = mysqli_fetch_array($customer))
            {
            $id = $result['customerID'];
            $count = mysqli_query($conn, "SELECT COUNT(*) AS coun FROM sell WHERE customerID = $id");
            $x = mysqli_fetch_assoc($count);
            $counts = $x['coun'];

            $sql_payment = mysqli_query($conn, "SELECT SUM(sellingPrice) AS sum FROM sell WHERE customerID = $id");
            $y = mysqli_fetch_assoc($sql_payment);

            $sql_total = mysqli_query($conn, "SELECT SUM(amount) AS total FROM payment WHERE customerID = $id");
            $z = mysqli_fetch_assoc($sql_total);
            ?>
            <tr>
            <td><?php echo $result['fname']?> <?php $result['lname'] ?></td>
            <td><?php echo $counts?></td>
            <td><?php echo $y['sum'] ?></td>
            <td><?php echo $z['total']?></td>
            <td><?php echo $y['sum'] - $z['total']?></td>
            </tr>
            <?php } ?>
    </table>


</center>    
</body>
</html>