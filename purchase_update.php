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
        $suits = mysqli_real_escape_string($conn, $_POST['quantity']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $pdate = mysqli_real_escape_string($conn, $_POST['pdate']);

        $sql = "UPDATE purchase SET brandID = '$bid',
        supplierID = '$sid', NoOfSuits = '$suits', amountPaid = '$amount',
        purchaseDate = '$pdate' WHERE purchaseID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: purchase_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>