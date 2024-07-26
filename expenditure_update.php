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

        $id = mysqli_real_escape_string($conn, $_POST['expenditureID']);
        $date = mysqli_real_escape_string($conn, $_POST['exdate']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

        $sql = "UPDATE expenditure SET exdate = '$date', amount = '$amount', remarks = '$remarks' WHERE expenditureID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: expenditure_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>