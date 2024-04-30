<nav>

        <!-- ADD THE LINKS TO THE FILES LATER HERE -->
        <img src="logo.png" id="logo" alt="logo">
        <div id="webLinks">
            <a href="index.php" class="nav-items">Home</a>
            <a href="contact.php" class="nav-items">Contact Us</a>
            <a href="about.php" class="nav-items">About Us</a>

            <a href="products.php" class="nav-items">Products</a>
        </div>
        <div id="orderLinks">
            <a href="create_order.php" class="nav-items">Order</a>
            <a href="get_order_from_email.php" class="nav-items">Order Tracking</a>
            <a href="get_all_orders.php" class="nav-items">All Orders</a>
        </div>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div id="overlay" style="display: none;">
            <a href="index.php" class="mobileNav">Home</a>
            <a href="contact.php" class="mobileNav">Contact Us</a>
            <a href="about.php" class="mobileNav">About Us</a>
            <a href="products.php" class="mobileNav">Products</a>
            <a href="create_order.php" class="mobileNav">Order</a>
            <a href="get_order_from_email.php" class="mobileNav">Order Tracking</a>
            <a href="get_all_orders.php" class="mobileNav">All Orders</a>
        </div>
</nav>


<script>
    document.getElementById("hamburger").addEventListener('click', function(){
        var overlay = document.getElementById("overlay");
        if (overlay.style.display === "none") {
            overlay.style.display = "flex";
        } else {
            overlay.style.display = "none";
        }
    });
</script>