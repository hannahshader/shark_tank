<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>About Order</title>
</head>

<body>
        <?php
            $conn = new mysqli('localhost', 'uyugv9zmpnsmm', '6dnclcawsv7z', 'dbopzdajwlwfoj');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            // SQL to join all tables and select all columns
            $sql = "SELECT p.*, pc.Category, c.Description, o.OrderID, o.Quantity, o.SpecialInstructions, 
            o.CustomerFirstName, o.CustomerLastName, o.OrderDate, o.Email
            FROM Pokemon p
            JOIN Pokemon_Categories pc ON p.Name = pc.Name
            JOIN Categories c ON pc.Category = c.Category
            JOIN Orders o ON p.Name = o.PokemonName";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["Name"]. " - Type1: " . $row["Type1"]. " - Type2: " . $row["Type2"] . 
                " - Price: " . $row["Price"] . " - Category: " . $row["Category"] . 
                " - Description: " . $row["Description"] . " - OrderID: " . $row["OrderID"] . 
                " - Quantity: " . $row["Quantity"] . " - Special Instructions: " . $row["SpecialInstructions"] . 
                " - Customer: " . $row["CustomerFirstName"] . " " . $row["CustomerLastName"] . 
                " - Order Date: " . $row["OrderDate"] . " - Email: " . $row["Email"] . "<br>";
            }
            } else {
            echo "0 results";
            }

            

            $conn->close();
        ?>
</body>
</html>