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
        $cus = mysqli_real_escape_string($conn, $_POST['customerID']);
        $price = mysqli_real_escape_string($conn, $_POST['sellingprice']);
        $date = mysqli_real_escape_string($conn, $_POST['purchasedate']);

        $sql = "UPDATE sell SET productID = '$id', customerID = '$cus',
        sellingprice = '$price', purchasedate = '$date' WHERE sellID = '$sid'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: sell_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>