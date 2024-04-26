<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS_COLIN</title>

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
                <select name="pokemonCategory" id="pokemonCategorySelect">
                    <option value="" selected disabled>Category &#x25BE;</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Battle">Battle</option>
                    <option value="Companionship">Companionship</option>
					<option value="Events">Events</option>
                </select>
				
				<select name="pokemonType" id="pokemonTypeSelect">
                    <option value="" selected disabled>Select your type &#x25BE;</option>
					<option value="Normal">Normal</option>
                    <option value="Fire">Fire</option>
                    <option value="Water">Water</option>
					<option value="Electric">Electric</option>
					<option value="Grass">Grass</option>
					<option value="Ice">Ice</option>
					<option value="Fighting">Fighting</option>
					<option value="Poison">Poison</option>
                    <option value="Ground">Ground</option>
					<option value="Flying">Flying</option>
					<option value="Psychic">Psychic</option>
					<option value="Bug">Bug</option>
					<option value="Rock">Rock</option>
					<option value="Ghost">Ghost</option>
					<option value="Dragon">Dragon</option>
					<option value="Dark">Dark</option>
					<option value="Steel">Steel</option>
					<option value="Fairy">Fairy</option>
                </select>

                <select name="pokemonPrice" id="pokemonPriceSelect">
                    <option value="" selected disabled>Price Range &#x25BE;</option>
                    <option value="cheap">$0—1,000</option>
                    <option value="average">$1,001—5,000</option>
                    <option value="expensive">$5,001—10,000</option>
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
				
				$price_range = "cheap";
				
				if ($Price > 5000) {
					$price_range = "expensive";
				} else if ($Price > 1000) {
					$price_range = "average";
				} 
//				if ($Price < 1000 || $Price == 1000) {
//					$price_range = "cheap";
//				} else if ($Price <= 5000) {
//					$price_range = "average";
//				} else {
//					$price_range = "expensive";
//				}
//				console.log($name);
				
				echo "<div class='gridItem' data-type1=$Type1 data-type2=$Type2 data-price=$price_range>";
				

                $lowercase_name = strtolower("$Name");
                if ($lowercase_name == "mr. mime") {
                    $lowercase_name = "mr-mime";
                }
                echo "<script>\n";
               
                echo "</script>\n";
                echo "<div class='gridCircle' id=$lowercase_name-image src='char.jpeg'></div>";



echo "<script>\n";
echo "fetchAPI('$lowercase_name');\n";

echo "async function fetchAPI(name) {\n";

echo "    var urlString = 'https://pokeapi.co/api/v2/pokemon/' + name;\n";
echo "    var urlStringSpecies = 'https://pokeapi.co/api/v2/pokemon-species/' + name;\n";
echo "    console.log(urlString);\n";
echo "    res = fetch(urlString)\n";
echo "    .then (res => res.text())\n";
echo "    .then (data =>\n";
echo "        {\n";
echo "            resSpec = fetch(urlStringSpecies)\n";
echo "            .then (resSpec => resSpec.text())\n";
echo "            data = JSON.parse(data);\n";
echo "            image = data.sprites.other['official-artwork'].front_default;\n";

echo "            console.log((data.name)[0].toUpperCase() + (data.name).substring(1));\n";
echo "            console.log('IMAGE: ' + image);\n";
				
echo "            document.getElementById(name+'-image').innerHTML = '<img src='+image+'>';\n";
echo "        })\n";
echo "        .catch (error => console.log(error));\n";
echo "}\n";
echo "</script>\n";




				echo "<p class='gridPokemonName'>$Name</p>";
				echo "<p class='gridInfo'>Price: $$Price</p>";
				echo "<p class='gridInfo'>Type(s): $Type1";
				if ($Type2 !== NULL) {
					echo ", $Type2</p>";
				}
//				echo "</p>"; //FIX so that it says 'Type(s)'
				
        		echo "</div>";
    		}

		// Close connection with database:
    	$conn->close();

			?>
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
            var filterType = selectElement.id === 'pokemonTypeSelect' ? 'price' : 'type';
//			var filterType = selectElement.id === 'pokemonTypeSelect' ? 'type1' || 'type2' : 'price';

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
//				  var selectElement = filterType === 'type1' || filterType === 'type2' ? pokemonTypeSelect : pokemonPriceSelect;

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

                var type1 = pokemon.dataset.type1; //is this part pulling from the db??
				var type2 = pokemon.dataset.type2;
                var price = pokemon.dataset.price; //all price are set to 'cheap' rn. need function that will calculate price range
//				var category = pokemon.datasset.Categories; (holder code. fix)


                if((selectedType === '' || selectedType === type1 || selectedType === type2) && (selectedPrice === '' || selectedPrice === price)){
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