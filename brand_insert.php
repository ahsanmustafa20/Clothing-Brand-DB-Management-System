<html>
    <head>
        <title>
            Brands Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>Brands data Entry</h1>
            
            <form action="brand_save.php" method="post">
                <label for="brandID">Brand ID: </label>
                <input type="hidden" name='brandID'>

                <label for="name">Brand Name: </label>
                <input type="text" name='name'><br><br>

                <label for="contact">Contact: </label>
                <input type="text" name="contact" id="contact"><br><br>

                <button type="submit">SUBMIT</button>

            </form>
            </center>
    </body>
</html>