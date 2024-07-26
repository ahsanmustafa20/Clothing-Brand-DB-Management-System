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

        $id = mysqli_real_escape_string($conn, $_POST['brandID']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

        $insert = "INSERT INTO brand (brandID, name, contact) VALUES ('$id', '$name', '$contact')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: brand_data.php");
        }
        else
        {
            echo "INSERTION FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>