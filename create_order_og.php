<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="create_order.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <title>Order Form</title>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let time = performance.now();
        let unique_id = time.toString();
        document.getElementById('orderID').value = unique_id;
    });
    </script>

    <style media="screen">
        body {
            /* font-family: Arial, sans-serif; margin: 20px; */
            font-family: 'pokemon_blackwhiteregular';
            src: url('pokemon-black-white-webfont.woff2') format('woff2'),
            url('pokemon-black-white-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            background-image: url("orderbg.jpg");
            background-attachment: scroll;
        }

        @font-face {
            font-family: 'pokemon_blackwhiteregular';
            src: url('pokemon-black-white-webfont.woff2') format('woff2'),
            url('pokemon-black-white-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        #form-container {
            float:left;
            margin: auto;
            padding: 1vw;
            /* width: 75vw; */
            color: #ffffff;
        }

        .diagonal-div-bg {
            width: 700px;
            max-width: 99vw;
            height: 70px;
            background-color: #1879B0;
            transform: skewX(-20deg);
            margin-left: -38px;
            position: relative;
            overflow: hidden;
            border: 6px double #0E598F;
            margin-bottom: 2px;
        }

        .diagonal-div {
            /* width: 350px;
            height: 50px; */
            width: 450px;
            height: 30px;
            background-color: #3EE1E0;
            border: 6px solid #2DB5C2;
            /* transform: skewX(-20deg); */
            margin-left: 0px;
            position: relative;
            overflow: hidden;
        }

        .content {
            transform: skewX(20deg);
            color: #595959;
            text-shadow: #000000 0.6px 0.6px 0.9px;
            padding-left: 20px;
            font-size: 30px;
        }

        .diagonal-div-bg input {
            transform: skewX(20deg);
            /* color: #545854; */
            /* text-shadow: #000000 0.6px 0.6px 0.9px; */
            width: 300px;
            margin-left: 30px;
            margin-top: 2px;
            /* padding-left: 300px; */
            /* font-size: 30px; */
            font-family: 'pokemon_blackwhiteregular';
            src: url('pokemon-black-white-webfont.woff2') format('woff2'),
            url('pokemon-black-white-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-size: 20px;
        }

        .diagonal-div-bg textarea {
            transform: skewX(20deg);
            /* color: #545854; */
            /* text-shadow: #000000 0.6px 0.6px 0.9px; */
            width: 300px;
            margin-left: 55px;
            margin-top: 2px;
            /* padding-left: 300px; */
            /* font-size: 30px; */
            font-family: 'pokemon_blackwhiteregular';
            src: url('pokemon-black-white-webfont.woff2') format('woff2'),
            url('pokemon-black-white-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-size: 20px;
        }

        .diagonal-div-head-foot {
            /* width: 350px;
            height: 50px; */
            width: 450px;
            height: 60px;
            background-color: #3EE1E0;
            border: 6px solid #2DB5C2;
            /* transform: skewX(-20deg); */
            margin-left: 0px;
            position: relative;
            overflow: hidden;
        }

        .content-head-foot {
            transform: skewX(20deg);
            color: #595959;
            text-shadow: #000000 0.6px 0.6px 0.9px;
            padding-left: 20px;
            font-size: 50px;
            padding-top: 3px;
        }

        .content-head-foot button {
            /* transform: skewX(20deg); */
            color: #595959;
            width: 300px;
            text-shadow: #000000 0.6px 0.6px 0.9px;
            padding-left: 20px;
            font-size: 50px;
            background-color: #D7E0F7;
            border: 3px solid #0C517D;

                font-family: 'pokemon_blackwhiteregular';
                src: url('pokemon-black-white-webfont.woff2') format('woff2'),
                url('pokemon-black-white-webfont.woff') format('woff');
                font-weight: normal;
                font-style: normal;
        }

        .content-head-foot button:hover {
            background-color: #e5ebfa;
        }


        #submitbtn span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        #submitbtn span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: -7px;
          right: -20px;
          transition: 0.5s;
        }

        #submitbtn:hover span {
          padding-right: 35px;
        }

        #submitbtn:hover span:after {
          opacity: 1;
          right: 0;
        }

        #submitbtn:active {
          background-color: #0E314F;
          color: #ffffff;
          box-shadow: 0 5px #666;
        }

        #submitbtn:active span {
          transform: translateY(6px);
        }

        #body-wrap{
            padding-top: 80px;
            display: inline-block;
        }

        #right-side-div {
            color: #ffffff;
            font-size: 50px;
            float: right;
            justify-content: center;
            /* width:50%; */
        }

        #right-side-div img {
            margin: auto;
        }
    </style>
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
    <!-- <div id="right-side-div">
        <img src="logo.png">
    </div> -->
    </div>

    <!-- <div class="diagonal-div-bg">
        <div class="diagonal-div">
            <div class="content">
                TEST DIV
            </div>
        </div>
    </div> -->
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
