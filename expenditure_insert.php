<html>
    <head>
        <title>
            Expenditure Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>Expenditure data Entry</h1>

            <form action="expenditure_save.php" method="post">
                <label for="expenditureID">Expenditure ID: </label>
                <input type="number" name="expenditureID" id="expenditureID"><br><br>

                <label for="exdate">Date: </label>
                <input type="date" name='exdate'><br><br>

                <label for="amount">Amount: </label>
                <input type="number" name="amount" id="amount"><br><br>

                <label for="remarks">Remarks: </label>
                <textarea name="remarks" id="remarks"></textarea><br><br>

                <button type="submit">SUBMIT</button>
            </form>
        </center>
    </body>
</html>