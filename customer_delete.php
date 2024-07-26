<html>
    <head>
        <title>
            Saved
        </title>
    </head>
    <body>
        <?php  
        
        $id = $_GET['id'];

        $conn = mysqli_connect('127.0.0.1','root','','project1');

        if( !$conn)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }


        $sql = "DELETE FROM customer WHERE customerID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "DELETED SUCCESSFUL!!!";
            header("location: customer_data.php");
        }
        else
        {
            echo "DELETE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>