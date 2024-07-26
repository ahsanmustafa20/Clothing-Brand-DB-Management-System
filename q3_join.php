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


    $sql = "SELECT 
        c.fname, 
        c.lname, 
        COALESCE(s.count_suits, 0) AS count_suits, 
        COALESCE(s.total_amount, 0) AS total_amount, 
        COALESCE(p.total_paid, 0) AS total_paid 
    FROM 
        customer c 
    LEFT JOIN 
        (SELECT customerID, COUNT(sellID) AS count_suits, SUM(sellingPrice) AS total_amount 
         FROM sell 
         GROUP BY customerID) s ON c.customerID = s.customerID 
    LEFT JOIN 
        (SELECT customerID, SUM(amount) AS total_paid 
         FROM payment 
         GROUP BY customerID) p ON c.customerID = p.customerID 
    WHERE 
        c.fname LIKE '$search%'
    GROUP BY 
        c.customerID";
    
    $customer = mysqli_query($conn, $sql);
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
        <?php
        while($result = mysqli_fetch_array($customer))
        {
            $remaining_amount = $result['total_amount'] - $result['total_paid'];
        ?>
        <tr>
            <td><?php echo $result['fname'] . ' ' . $result['lname']; ?></td>
            <td><?php echo $result['count_suits']; ?></td>
            <td><?php echo $result['total_amount']; ?></td>
            <td><?php echo $result['total_paid']; ?></td>
            <td><?php echo $remaining_amount; ?></td>
        </tr>
        <?php } ?>
    </table>
</center>    
</body>
</html>
