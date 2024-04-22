<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="stylesBen.css">
</head>
<body>
    <nav>
        <a href="index.html">Home</a>
        <a href="">Order</a>
        <a href="">Contact Us</a>
        <a href="">About Us</a>
        <a href="products.html">Products</a>
    </nav>

    <!-- Hero Image and Landing -->
    <div id="landing">
        <div id="landingText">
            <h1>TEXT</h1>
        </div>

    </div>

    <!-- Adoption of Pokemon section -->
    <div id="rentalHeader">
        <div>
            <h1 class="rentalHeaderItem">Pokemon Rentals</h1>
            <p>Info About the rentals- ADD LATER</p>
        </div>
    </div>


    <div id="pokemonSearchArea">
        <!-- Contains the filter and results -->
        <div>
            <!-- Filters -->
            <div>
                <select name="pokemonType" id="pokemonTypeSelect">
                    <option value="" selected disabled>Select your type &#x25BE;</option>
					<option value="NOTICE">HAVENT DONE FILTERING W PHP YET. THEY ARE ALL SET TO FIRE TYPE</option>
                    <option value="Fire">Fire</option>
                    <option value="Water">Water</option>
                    <option value="Ground">Ground</option>
                    <!-- add more -->
                </select>

                <select name="pokemonPrice" id="pokemonPriceSelect">
                    <option value="" selected disabled>Price Range &#x25BE;</option>
                    <option value="cheap">$10+</option>
                    <option value="average">$50+</option>
                    <option value="expensive">$100+</option>
                    <!-- add more -->
                </select>

            </div>
            <!-- Active Filters -->
            <div id="activeFilters">

            </div>

            <!-- Results  -->
            <div id="resultGrid">
                <!-- Placeholder -->
			<?php
			// Establish connection with database:
			$conn = new mysqli('localhost', 'uyugv9zmpnsmm', '6dnclcawsv7z', 'dbopzdajwlwfoj');

			if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }


			// Get + display menu items:
			$sql = "SELECT * from Pokemon";
			$whole_menu = $conn->query($sql);

			while($row = $whole_menu->fetch_assoc())
			{
				extract ($row);
				echo "<div class='gridItem' data-type='Fire' data-price='cheap'>"; //FIX data-type SO IT PULLS FROM DATABASE

				// dummy code. TODO: get + display image from API.
				echo "<div class='gridCircle' src='char.jpeg'><img class='gridImage' src='char.jpeg'></div>";

				echo "<p class='gridPokemonName'>$Name</p>";
				echo "<p class='gridInfo'>Info: $$Price</p>";
        		echo "</div>";
    		}

		// Close connection with database:
    	$conn->close();

			?>

<!--				OLD BENSON CODE -->

                <!-- Make instances of these when reading from the API -->
                <!-- NOTICE to allow for filtering  -->
<!--
                <div class="gridItem" data-type="fire" data-price="cheap">
                    <div class="gridCircle">
                        <img class="gridImage" src="char.jpeg" alt="">
                    </div>
                    <p class="gridPokemonName">Pokemon Name</p>
                    <p class="gridInfo">More Info</p>

                </div>
                <div class="gridItem"  data-type="water" data-price="expensive">
                    <div class="gridCircle">
                        <img class="gridImage" src="char.jpeg" alt="">
                    </div>
                    <p class="gridPokemonName">Pokemon Name</p>
                    <p class="gridInfo">More Info</p>

                </div>
                <div class="gridItem"  data-type="ground" data-price="cheap">
                    <div class="gridCircle">
                        <img class="gridImage" src="char.jpeg" alt="">
                    </div>
                    <p class="gridPokemonName">Pokemon Name</p>
                    <p class="gridInfo">More Info</p>

                </div>
                <div class="gridItem"  data-type="fire" data-price="average">
                    <div class="gridCircle">
                        <img class="gridImage" src="char.jpeg" alt="">
                    </div>
                    <p class="gridPokemonName">Pokemon Name</p>
                    <p class="gridInfo">More Info</p>

                </div>
-->

            </div>
        </div>
    </div>


    <footer class="footerStyle">
        Style for Footer Later
    </footer>


    <script>
        // Get the select elements
        var pokemonTypeSelect = document.getElementById('pokemonTypeSelect');
        var pokemonPriceSelect = document.getElementById('pokemonPriceSelect');

        // Get the "Active Filters" div
        var activeFiltersDiv = document.getElementById('activeFilters');

        // Add event listener to the 'pokemonTypeSelect' select element
        pokemonTypeSelect.addEventListener('change', function() {
            displaySelectedFilter(this, activeFiltersDiv);

        });

        // Add event listener to the 'pokemonPriceSelect' select element
        pokemonPriceSelect.addEventListener('change', function() {
            displaySelectedFilter(this, activeFiltersDiv);

        });

        // Function to display the selected filter
        function displaySelectedFilter(selectElement, activeFiltersDiv) {
            // Get the selected option's text
            var selectedOptionText = selectElement.options[selectElement.selectedIndex].text;

            // Determine the type of the filter (price or type) based on the id of the select element
            var filterType = selectElement.id === 'pokemonTypeSelect' ? 'type' : 'price';

            // Remove any existing filter of the same type from the "Active Filters" div
            var existingFilterDivs = activeFiltersDiv.getElementsByTagName('div');
            for (var i = 0; i < existingFilterDivs.length; i++) {
                if (existingFilterDivs[i].dataset.filterType === filterType) {
                    activeFiltersDiv.removeChild(existingFilterDivs[i]);
                    // Break the loop as we have found and removed the existing filter of the same type
                    break;
                }
            }

            // Create a new div element
            var newDiv = document.createElement('div');

            // Set the new div's text to the selected option's text
            newDiv.textContent = selectedOptionText;

            // Set the filter type as a data attribute on the new div
            newDiv.dataset.filterType = filterType;

            //Sets the classname
            newDiv.className = "selectedFilter"

            // Add event listener to the new div
            newDiv.addEventListener('click', function() {
                // Remove the new div when it's clicked
                this.remove();

                // Determine the type of the filter (price or type) based on the data attribute of the div
                var filterType = this.dataset.filterType;

                // Get the corresponding select element
                var selectElement = filterType === 'type' ? pokemonTypeSelect : pokemonPriceSelect;

                // Reset the select element to its default option
                selectElement.selectedIndex = 0;
                displayPokemon();
            });


            // Append the new div to the "Active Filters" div
            activeFiltersDiv.appendChild(newDiv);

            displayPokemon();
        }

        function displayPokemon(){
            var selectedType = pokemonTypeSelect.value;
            var selectedPrice = pokemonPriceSelect.value;

            var pokeDiv = document.getElementsByClassName("gridItem");

            for(var i = 0; i < pokeDiv.length ; i++){
                var pokemon = pokeDiv[i];

                var type = pokemon.dataset.type;
                var price = pokemon.dataset.price;


                if((selectedType === '' || selectedType === type) && (selectedPrice === '' || selectedPrice === price)){
                    pokemon.style.display = "";
                }
                else{
                    pokemon.style.display = "none";
                }
            }
        }



        var pokeInfos = document.getElementsByClassName("gridInfo");

        for(var i = 0; i < pokeInfos.length; i++){
            var pokeInfo = pokeInfos[i];

            pokeInfo.addEventListener('click',function(e){
                e.stopPropagation();
                var overlayInfo = document.createElement('div');
                overlayInfo.className = 'overlay';
                var overlayContent = document.createElement('div');
                overlayContent.className = 'overlay-content';
                overlayContent.innerHTML = 'Overlay Content';
                overlayInfo.appendChild(overlayContent);
                document.body.appendChild(overlayInfo);
                document.body.classList.add('no-scroll'); // Add no-scroll class to body

                overlayInfo.addEventListener('click', function(e) {
                    //Doesn't remove the overlay when content inside is clicked
                    e.stopPropagation();
                    this.remove();
                    document.body.classList.remove('no-scroll'); // Remove no-scroll class from body
                });

                overlayContent.addEventListener('click', function(e) {
                    //Doesn't remove the overlay when content inside is clicked
                    e.stopPropagation();
                });
            });
        }
    </script>
</body>
</html>