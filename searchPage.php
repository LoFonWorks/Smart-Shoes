<!DOCTYPE html>
<html>
    <head lang="en">
        <!--
            Smart Shoes Search Page HTML
            Author: Logan Fontenot
            Date:   11/7/22

            Filename:   searchPage.html
        -->

        <meta charset="utf-8" />
        <title>Smart Shoes</title>
        <link href="searchPage.css" rel="stylesheet"/> <!--External Style sheet-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!--Embedded style sheet-->
        <style>
            footer {
                clear: both;
                border-top: 1mm solid black;
                box-shadow: inset 0 5px 15px 0px rgba(0, 0, 0, 0.75);
                background-color: rgb(67, 110, 209);
                font-size: 0.9em;
                padding: 10px 0px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <?php include 'databaseConnection.php'; ?>
    
        <header>
            <a href="home.php"><img src="shoe.png" alt="Smart Shoes" id="logoimg"/></a> <!--Smart Shoes logo-->
            <h6> <!--Code for the smart shoes picture to the right of the logo. Uses a clever sizing technique using the periods to ceter the picture.-->
            ..
            </h6>
            <div class="navbar">
                <a id="a1" href="home.php">Home</a>
                <a id ="a1" href="searchPage.php">Men <script>document.getElementById('men').click(); document.getElementById('ageNone').click();</script></a>
                <a id="a1" href="searchPage.php">Woman <script>document.getElementById('women').click(); document.getElementById('ageNone').click();</script></a>
                <a id="a1" href="searchPage.php">Kids <script>document.getElementById('genderNone').click(); document.getElementById('children').click();</script></a>
                <a id="a1" href="paymentPage.php">Cart</a>
                <div class="subnav">
                    <button class="subbut">Contact<i class="fa fa-caret-down"></i></button>
                    <div class="content">
                        <ul>
                        <li id="p1">Phone: 337-666-000</li>
                        <li id="p1">Email: smartshoe@webmail.com</li>
                        <li id="p1"><a href="contactPage.html">Ticket Submission</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </header>

        <div>
            <div class="col-1-3"> <!--Filters. Currently unresponsive until backend completed-->
                <fieldset id="pickupInfo">
                    <legend>Filters</legend>
                    <b>Gender</b>
                    <form action="" method="GET">
                        <div>
                            <label for="genderNone">None</label>
                            <input id="genderNone" name="genderFilter" type="radio" value="none" checked/>
                        </div>
                        <div>
                            <label for="men">Men Shoes</label>
                            <input id="men" name="genderFilter" type="radio" value="male"/>
                        </div>
                        <div>
                            <label for="women">Women Shoes</label>
                            <input id="women" name="genderFilter" type="radio" value="female"/>
                        </div>
                        <hr/>
                        <b>Age</b>
                        <div>
                            <label for="ageNone">None</label>
                            <input id="ageNone" name="ageFilter" type="radio" value="none" checked/>
                        </div>
                        <div>
                            <label for="children">Child Shoes</label>
                            <input id="children" name="ageFilter" type="radio" value="child"/>
                        </div>
                        <div>
                            <label for="adult">Adult Shoes</label>
                            <input id="adult" name="ageFilter" type="radio" value="adult"/>
                        </div>
                        <hr/>
                        <div>
                            <label for="price">Price Range</label>
                            <input id="price" name="priceFilter" type="range"
                                value="275" step="25" min="50" max="500"/>
                            <table>
                                <tr>
                                    <td id="price1">50 &nbsp;</td>
                                    <td id="price2">250</td>
                                    <td id="price3">500</td>
                                </tr>
                            </table>
                            
                            <button type="submit" id="filterButton"">Apply Filters</button>
                            <button type="button" id="clearButton" onclick="filterClear()">Clear Filters</button>

                            <script> 
                                /*
                                $(document).ready(function () {
                                    $("#filterButton").click(function () {
                                        alert("Your filters have been applied.");
                                    });
                                }); */
                                
                                function filterClear() {
                                    document.getElementById('genderNone').click();
                                    document.getElementById('ageNone').click();
                                    document.getElementById('price').value = 275;
                                }
                            </script>
                        </div>
                    </form>
                </fieldset>
            </div>

            <div class="col-2-3"> <!--Second half of the screen with searchbar and products-->
                <form action="" method="GET">
                    <div class="searchbar"> <!--Searchbar-->
                        <input type="text" placeholder="Search..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                        <button type="submit">Submit</button>
                    </div>
                </form>

                <div class="searchResults"> <!--Products-->
                    <h1>Products</h1>
                    <?php 
                        $con = OpenCon();
                        if(isset($_GET['search'])) //If the user uses the search bar
                        {
                            $search = trim($_GET['search']);
                            $query = "SELECT name, cost, shoeArtifact
                                      FROM shoes
                                      WHERE name LIKE '%$search%'";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result)) 
                                {   ?>
                                    <div class="item">
                                        <img src="<?php echo $row['shoeArtifact'] ?>"/>
                                        <div class="purchaseInfo">
                                            <b><?php echo $row['name'] ?></b>
                                            <p><?php echo $row['cost'] ?></p>
                                            <input id="itemQuanity" type="number" value="1"  min="1" max="10"/>
                                        </div>
                                        <div class="purchaseButtons">
                                            <button type="button" class="addButton">Add to Cart</button>
                                            <button type="button" class="buyButton">Buy Now</button>
                                        </div>
                                    </div>
                    <?php       }
                            }
                            else
                            {   ?>
                                <p>No Item Found For <?php echo $search ?></p>
                    <?php   }
                        }
                        else if(isset($_GET['genderFilter'])) //If the user uses the filter
                        {
                            $gender = $_GET['genderFilter'];
                            $age = $_GET['ageFilter'];
                            $price = $_GET['priceFilter'];       
                            
                            $subQuery = " WHERE cost <= $price";
                            if($gender != 'none')
                                $subQuery .= " AND gender = '$gender'";
                            if($age != 'none')
                                $subQuery .= " AND age = '$age'";

                            $filterQuery = "SELECT name, cost, shoeArtifact 
                                            FROM shoes" . $subQuery;
                            $filterResult = mysqli_query($con, $filterQuery);

                            if(mysqli_num_rows($filterResult) > 0)
                            {
                                while($row = mysqli_fetch_array($filterResult)) 
                                {   ?>
                                    <div class="item">
                                        <img src="<?php echo $row['shoeArtifact'] ?>"/>
                                        <div class="purchaseInfo">
                                            <b><?php echo $row['name'] ?></b>
                                            <p><?php echo $row['cost'] ?></p>
                                            <input id="itemQuanity" type="number" value="1"  min="1" max="10"/>
                                        </div>
                                        <div class="purchaseButtons">
                                            <!--
                                            <button type="button" class="addButton">Add to Cart</button>
                                            <button type="button" class="buyButton">Buy Now</button> -->
                                            <form method='post' id='item-form-{<?php echo $row['id'] ?>}'>
                                                <button type='button' name='add_button' value='add_button' class='addButton' id='item-btn-{<?php echo $row['id'] ?>}'>Add to Cart</button>
                                                <input type='hidden' id='item_id' name='item_id' value='{<?php echo $row['id'] ?>}'/>
                                            </form>
                                            <form method='post' id='instant-buy-form-{<?php echo $row['id'] ?>}' action='paymentPage.php'>
                                                <input type='hidden' id='instant_buy' name='instant_buy' value='{<?php echo $row['id'] ?>}'/>
                                                <button type='button' name='instant_buy' id='instant-buy-btn-{<?php echo $row['id'] ?>}' class='buyButton'>Buy Now</button>
                                            </form>
                                        </div>
                                    </div>
                        <?php   }
                            }
                            else
                            {   ?>
                                <p>No Item Match Filters</p>
                    <?php   }
                        }
                        CloseCon($con);
                    ?>

                    <script type="text/javascript"> //Javascript code
                        for (var addCart of document.getElementsByClassName('addButton'))
                            addCart.addEventListener("click", cartClick);

                        function cartClick() {
                            alert("Item added to cart.");
                        }
                    </script>
                </div>
            </div>
        </div>

        <footer> <!--Small footer for extra flavor-->
            Smart Shoes &copy; 2022 All Rights Reserved
        </footer>
    </body>
</html>