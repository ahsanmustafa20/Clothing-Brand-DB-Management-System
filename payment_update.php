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

        $sql = "UPDATE payment SET customerID = '$cid', paymentdate = '$date', amount = '$amount' WHERE paymentID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: payment_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>