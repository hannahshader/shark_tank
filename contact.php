<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div id="contactContainer">
        <div id="innerContactContainer">
            <div id="firstContactSec">
                <h1 style="padding-bottom: 20px;">Contact Us</h1>
                <p>Visit us at our office in the picturesque Sunnyshore City, Sinnoh region, located at 139 Benson Avenue. Our friendly staff are ready to assist you in selecting the perfect Pokémon for your needs.</p>
                <br/>
                <p>
                    If you're unable to visit us in person, don't worry! We offer inter-regional shipping services, ensuring that your chosen Pokémon can join you on your journey no matter where you are. <br/>

                    For inquiries, bookings, or assistance, please don't hesitate to contact us using the form below or give us a call at (349) 614-5939. <br/> <br/>

                    We look forward to hearing from you and helping you embark on your next Pokémon adventure!

                </p>
            </div>
        </div>

        <div id="center">
            <div id="redCenter"></div>
            <div id="innerCircle">
                <div id="smallCircle"><div id="smallerCircle"></div></div>
            </div>
            
        </div>


        <div id="sinnerContactContainer">
            <div id="secContactSec">
                <form action="">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="content">Inquiry:</label><br>
                    <textarea style="resize: none;" id="content" name="content" rows="4" cols="50" maxlength="500" required></textarea><br>
                    <input type="submit" value="Submit">
                </form>
        
            </div>
        </div>
    </div>
    


    <?php include 'footer.php'; ?>
</body>
</html>