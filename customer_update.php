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

        $id = mysqli_real_escape_string($conn, $_POST['customerID']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $add = mysqli_real_escape_string($conn, $_POST['address']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $date = mysqli_real_escape_string($conn, $_POST['datejoined']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

        $sql = "UPDATE customer SET fname = '$fname', lname = '$lname',
        email = '$email', phone = '$phone', address = '$add',
        gender = '$gender', datejoined = '$date', remarks = '$remarks' WHERE customerID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: customer_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>