<html>
    <head>
        <title>
            Saved
        </title>
    </head>
    <body>
        <?php  
        
        $conn = mysqli_connect('127.0.0.1','root','','project1');

        if( !$conn)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }

        $sid = mysqli_real_escape_string($conn, $_POST['sellID']);
        $id = mysqli_real_escape_string($conn, $_POST['productID']);
        $cid = mysqli_real_escape_string($conn, $_POST['customerID']);
        $sell = mysqli_real_escape_string($conn, $_POST['sellingprice']);
        $date = mysqli_real_escape_string($conn, $_POST['purchasedate']);

        $insert = "INSERT INTO sell (sellID, customerID, productID, sellingprice, purchasedate)
         VALUES ('$sid', '$cid', '$id', '$sell','$date')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: sell_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>