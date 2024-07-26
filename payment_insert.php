<html>
    <head>
        <title>
            Payment Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
    <?php  
        
        $conn = mysqli_connect('127.0.0.1','root','','project1');

        if( !$conn)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }
        $customer = mysqli_query($conn,"SELECT * FROM customer");

        mysqli_close($conn);
        ?>
        <center>
        <h1>Payment data Entry</h1>
        <form action="payment_save.php" method="post">
            <label for="paymentID">Payment ID: </label>
            <input type="hidden" name="paymentID"><br><br>
            
            <label for="customerID">Customer </label>
            <select name="customerID" id="customerID">
            <?php
            while($result = mysqli_fetch_array($customer)){?>
                <option value="<?php echo $result['customerID'] ?>"><?php echo $result['fname'] ?> <?php echo $result['lname'] ?></option>
            <?php }
            ?>
            </select><br><br>

            <label for="paymentdate">Payment date: </label>
            <input type="date" name="paymentdate" id="paymentdate"><br><br>

            <label for="amount">Amount: </label>
            <input type="number" name="amount" id="amount"><br><br>

            <button type="submit">SUBMIT</button>
        </form>
        </center>
    </body>
</html>