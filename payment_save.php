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

        $id = mysqli_real_escape_string($conn, $_POST['paymentID']);
        $cid = mysqli_real_escape_string($conn, $_POST['customerID']);
        $date = mysqli_real_escape_string($conn, $_POST['paymentdate']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);

        $insert = "INSERT INTO payment (paymentID, customerID, paymentdate, amount) 
        VALUES ('$id', '$cid', '$date', '$amount')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: payment_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>