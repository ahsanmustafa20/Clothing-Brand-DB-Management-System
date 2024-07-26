<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="../styles.css">
    </head>
    <body>
    <a href="..\Home.php">HOME</a>
        <center>
            <h1>Total Expenditure Done Till Date</h1>
            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');

            if( !$conn )
            {
                die("Connnettion Failed:" .mysqli_connect_error());
            }

            $sql = "SELECT SUM(amount) AS Amount FROM expenditure";
            $result = mysqli_query($conn,"$sql");
            $x = mysqli_fetch_assoc($result);
            ?>
            <table border = 1>
                <tr>
                    <th>Total Expenditure</th>
                </tr>
                <tr>
                    <td align=center><?php echo $x['Amount'] ?></td>
                </tr>
            </table>
        </center>
    </body>
</html>