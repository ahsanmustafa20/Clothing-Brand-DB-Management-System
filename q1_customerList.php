
<html>
<head>
    <title>Customers List</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<a href="..\Home.php">HOME</a>
    <center>
        <h1>Customers List</h1>
    
    <?php 
    $conn = mysqli_connect('127.0.0.1','root','','project1');    
    if(!$conn)  
    {
        die("Connection Failed: ".mysqli_connect_error());
    }  
    $sql = "SELECT * FROM customer";
    $customer = mysqli_query($conn,"SELECT * FROM customer");
    ?>
    <table border = 1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>City</th>
        </tr>
        <tr>
            <?php
            while($result = mysqli_fetch_array($customer))
            { ?>
            <tr>
                <td><?php echo $result['customerID'] ?></td>
                <td><?php echo $result['fname'] ?>  <?php echo $result['lname'] ?></td>
                <td><?php echo $result['phone'] ?></td>
                <td><?php echo $result['address'] ?></td>
            </tr>
            <?php }
           ?>
        </tr>
    </table>


</center>    
</body>
</html>