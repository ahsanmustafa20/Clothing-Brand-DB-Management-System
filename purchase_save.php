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

        $id = mysqli_real_escape_string($conn, $_POST['purchaseID']);
        $bid = mysqli_real_escape_string($conn, $_POST['brandID']);
        $sid = mysqli_real_escape_string($conn, $_POST['supplierID']);
        $suits = mysqli_real_escape_string($conn, $_POST['suits']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $pdate = mysqli_real_escape_string($conn, $_POST['pdate']);

        $insert = "INSERT INTO purchase (purchaseID, brandID, supplierID, NoOfSuits, amountPaid, purchaseDate)
         VALUES ('$id', '$bid', '$sid','$suits', '$amount', '$pdate')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: purchase_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>