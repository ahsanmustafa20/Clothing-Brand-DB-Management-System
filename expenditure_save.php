<html>
    <head>
        <title>

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

        $insert = "INSERT INTO expenditure (expenditureID,exdate, amount, remarks)
        VALUES ('$id', '$date', '$amount', '$remarks')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: expenditure_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>