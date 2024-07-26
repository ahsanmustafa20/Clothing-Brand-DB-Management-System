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

        $id = mysqli_real_escape_string($conn, $_POST['supplierID']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $phone = mysqli_real_escape_string($conn, $_POST['contact']);

        $sql = "UPDATE supplier SET name = '$name', location = '$location', contact = '$phone' WHERE supplierID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: supplier_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>