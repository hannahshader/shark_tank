<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let time = performance.now();
            let unique_id = time.toString();
            document.getElementById('orderID').value = unique_id;
        });
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="create_order.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div id="body-wrap">
        <div id="form-container">
            <div class="diagonal-div-bg">
                <div class="diagonal-div-head-foot">
                    <div class="content-head-foot">
                        Place Your Order
                    </div>
                </div>
            </div>
            <form method="post">
                <input type="hidden" id="orderID" name="orderID">
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="quantity">Quantity:</label>
                        </div>
                    </div>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="pokemonName">Pokemon Name:</label>
                        </div>
                    </div>
                    <input type="text" id="pokemonName" name="pokemonName" required>
                </div>
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="customerFirstName">Customer First Name:</label>
                        </div>
                    </div>
                    <input type="text" id="customerFirstName" name="customerFirstName" required>
                </div>
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="customerLastName">Customer Last Name:</label>
                        </div>
                    </div>
                    <input type="text" id="customerLastName" name="customerLastName" required>

                </div>
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="email">Email:</label>
                        </div>
                    </div>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="diagonal-div-bg">
                    <div class="diagonal-div">
                        <div class="content">
                            <label for="specialInstructions">Special Instructions:</label>
                        </div>
                    </div>
                    <input type="text" id="specialInstructions" name="specialInstructions">
                </div>
                <div class="diagonal-div-bg">
                                <div class="diagonal-div-head-foot">
                                    <div class="content-head-foot">
                            <button type="submit" id="submitbtn"><span>Submit Order</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $orderDate = date("Y-m-d");
    $email = $_POST['email'];

    $sql = "INSERT INTO Orders (OrderID, Quantity, PokemonName, SpecialInstructions, CustomerFirstName, CustomerLastName, OrderDate, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sissssss", $orderID, $quantity, $pokemonName, $specialInstructions, $customerFirstName, $customerLastName, $orderDate, $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<p>Order successfully added!</p>";
        } else {
            echo "<p>Whoops! Looks like you tried to order something we don't have!</p>";
        }
        $stmt->close();
    } else {
        echo "Whoops! Your order failed.";
    }
    $conn->close();
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let time = performance.now();
            let unique_id = 'order_' + time.toString().replace('.', '') + Math.floor(Math.random() * 10000);

            document.getElementById('orderID').value = unique_id;
        });
    </script>
</head>
<body>
    <h1>Place Order</h1>
    <form method="post">
        <input type="hidden" id="orderID" name="orderID">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $orderDate = date("Y-m-d");
    $email = $_POST['email'];

    $sql = "INSERT INTO Orders (OrderID, Quantity, PokemonName, SpecialInstructions, CustomerFirstName, CustomerLastName, OrderDate, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sissssss", $orderID, $quantity, $pokemonName, $specialInstructions, $customerFirstName, $customerLastName, $orderDate, $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<p>Order successfully added!</p>";
        } else {
            echo "<p>Error inserting order: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
}
?>
 -->
