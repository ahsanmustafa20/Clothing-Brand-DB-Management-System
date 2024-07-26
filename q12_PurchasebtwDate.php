
<html>
<head>
    <title>Customers List</title><link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<a href="..\Home.php">HOME</a>
    <center>
        <h1>List Of All Purchases</h1>
    <?php 
    $conn = mysqli_connect('127.0.0.1','root','','project1');    
    if(!$conn)  
    {
        die("Connection Failed: ".mysqli_connect_error());
    }  
    $s = isset($_POST['sdate']) ? mysqli_real_escape_string($conn, $_POST['sdate']) : '';
    $l = isset($_POST['ldate']) ? mysqli_real_escape_string($conn, $_POST['ldate']) : '';

    $sql = "SELECT 
            p.purchaseID AS id,
            b.name AS bname,
            s.name AS sname,
            p.NoOfSuits AS num,
            p.amountPaid AS amount,
            p.purchaseDate AS pdate
            FROM 
            purchase p
            JOIN brand b ON p.brandID = b.brandID
            JOIN supplier s ON p.supplierID = s.supplierID
            WHERE p.purchaseDate BETWEEN '$s' AND '$l'";
    $purchase = mysqli_query($conn,"$sql");
    
    ?>
    <form action="" method="post">
        <label for="sdate">Starting Date: </label>
        <input type="date" name="sdate">

        <label for="ldate">Ending Date: </label>
        <input type="date" name="ldate">

        <input type="submit" name="submit" value="Submit">
    </form>
    <table border = 1>
        <tr>
            <th>Purchase ID</th>
            <th>Brand</th>
            <th>Supplier</th>
            <th>Number Of Suits</th>
            <th>Amount Paid</th>
            <th>Purchase Date</th>
        </tr>
        <tr>
            <?php while($row=mysqli_fetch_array($purchase)){ ?>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['bname'] ?></td>
            <td><?php echo $row['sname'] ?></td>
            <td><?php echo $row['num'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['pdate'] ?></td>
        </tr>
            <?php } ?>
    </table>


</center>    
</body>
</html>