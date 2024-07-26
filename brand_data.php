<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Brands List
            </h1>

            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if( !$conn)
            {
                die("Connection Failed: ".mysqli_connect_error());
            }
            ?>
            <table border=1>
                <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM brand";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['brandID']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['contact']?></td>
                    <td><a href="brand_edit.php?id=<?php echo $row['brandID'] ?>">EDIT</a>||
                    <a href="brand_delete.php?id=<?php echo $row['brandID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="brand_insert.php">INSERT NEW BRAND</a>

        </center>
    </body>
</html>