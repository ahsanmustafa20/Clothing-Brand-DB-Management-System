<html>
    <head>
        <title>
            <h1>Supplier Insertion</h1>
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
    <center>
        <h1>Supplier data Entry</h1>
        <form action="supplier_save.php" method="post">
            <label for="supplierID">Supplier ID: </label>
            <input type="number" name='supplierID'>

            <label for="name">Supplier Name: </label>
            <input type="text" name='name'><br><br>

            <label for="location">Location: </label>
            <input type="text" name="location" id="location"><br><br>

            <label for="contact">Contact: </label>
            <input type="text" name="contact" id="contact"><br><br>

            <button type="submit">SUBMIT</button>

        </form>
        </center>
    </body>
</html>