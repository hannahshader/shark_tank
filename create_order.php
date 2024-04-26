<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
</head>
<body>
    <h1>Place Order</h1>
    <form method="post">
        <div>
            <label for="orderID">Order ID:</label>
            <input type="number" id="orderID" name="orderID" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div>
            <label for="pokemonName">Pokemon Name:</label>
            <input type="text" id="pokemonName" name="pokemonName" required>
        </div>
        <div>
            <label for="specialInstructions">Special Instructions:</label>
            <input type="text" id="specialInstructions" name="specialInstructions">
        </div>
        <div>
            <label for="customerFirstName">Customer First Name:</label>
            <input type="text" id="customerFirstName" name="customerFirstName" required>
        </div>
        <div>
            <label for="customerLastName">Customer Last Name:</label>
            <input type="text" id="customerLastName" name="customerLastName" required>
        </div>
        <div>
            <label for="orderDate">Order Date:</label>
            <input type="date" id="orderDate" name="orderDate">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <button type="submit">Submit Order</button>
        </div>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $conn = new mysqli('localhost', 'uyugv9zmpnsmm', '6dnclcawsv7z', 'dbopzdajwlwfoj');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $orderID = $_POST['orderID'];
    $quantity = $_POST['quantity'];
    $pokemonName = $_POST['pokemonName'];
    $specialInstructions = $_POST['specialInstructions'];
    $customerFirstName = $_POST['customerFirstName'];
    $customerLastName = $_POST['customerLastName'];
    $orderDate = $_POST['orderDate'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Orders (OrderID, Quantity, PokemonName, SpecialInstructions, CustomerFirstName, CustomerLastName, OrderDate, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderID, $quantity, $pokemonName, $specialInstructions, $customerFirstName, $customerLastName, $orderDate, $email]);
        echo "<p>Order successfully added!</p>";
    } catch (\PDOException $e) {
        echo "<p>Whoops! Looks like you tried to order something we don't have!". "</p>";
    }
    echo "<p>Order successfully added!</p>";
}
?>