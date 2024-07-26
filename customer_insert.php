<html>
    <head>
        <title>
            Customer Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>
        <h1>Customer data Entry</h1>

        <form action="customer_save.php" method="post">
            <label for="customerID">Customer ID: </label>
            <input type="hidden" name="customerID"><br><br>


            <label for="fname">First Name: </label>
            <input type="text" name='fname'><br><br>

            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname"><br><br>

            <label for="email">Email: </label>
            <input type="text" name='email' id='email'><br><br>

            <label for="phone">Contact: </label>
            <input type="text" name="phone" id="phone"><br><br>

            <label for="address">Address: </label>
            <input type="text" name="address" id="address"><br><br>

            <label for="gender">Gender: </label>
            <!-- <input type="text" name="gender" id="gender"> -->
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select><br><br>

            <label for="datejoined">Date Joined: </label>
            <input type="date" name="datejoined" id="datejoined" value="<?php echo date('Y-m-d'); ?>"><br><br>

            <label for="remarks">Remarks: </label>
            <textarea name="remarks" id="remarks"></textarea><br><br>
            <button type="submit">SUBMIT</button>
        </form>
        </center>
    </body>
</html>