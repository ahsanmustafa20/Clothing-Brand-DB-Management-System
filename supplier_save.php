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

        $id = mysqli_real_escape_string($conn, $_POST['supplierID']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

        $insert = "INSERT INTO supplier (supplierID, name, location, contact) VALUES ('$id', '$name','$location', '$contact')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: supplier_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>