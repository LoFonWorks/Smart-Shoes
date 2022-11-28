<!DOCTYPE php>
<html lang="en">

<head>
    <!--
        Smart shoe Payment Page HTML
        Author: Muhammad Shazad Yousufzai Pathan
        Date:   11/2/22
        Filename:   paymentPage.php
        -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./paymentPage.css">
    <script src="paymentPage.js" type="module"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#hide").click(function(){
            $("#hProduct").hide();
          });
          $("#show").click(function(){
            $("#hProduct").show();
          });
        });
    </script>
    <?php
        require_once('db_utils.php');
        if(array_key_exists('add_item_id', $_POST)) {
            add_item_to_cart($_POST['add_item_id'], 1);
        }
        if(array_key_exists('remove_item_id', $_POST)) {
            remove_item_from_cart($_POST['remove_item_id'], 1);
        }
        if(array_key_exists('buy-form-user-id', $_POST)) {
            echo "<script>alert('Thank You For Shopping with us');</script>";
            clear_user_cart($_POST['buy-form-user-id']);
        }
    ?>
   
    <title>Payment Page</title>
</head>

<body>
    <span id='page_data'>
        <?php
            if(array_key_exists('instant_buy', $_POST)) {
                $items = get_item_by_id($_POST['instant_buy']);
                while($row = $items->fetch_assoc()){
                    echo "<div>
                            <p hidden>{$row['name']}</p>
                            <p hidden>{$row['cost']}</p>
                            <p hidden>{$row['shoeArtifact']}</p>
                            <p hidden>1</p>
                            <p hidden>{$row['id']}</p>
                          </div>";
                };
            }
            else{
                $items = get_cart_items(1);
                while($row = $items->fetch_assoc()){
                    echo "<div>
                            <p hidden>{$row['name']}</p>
                            <p hidden>{$row['cost']}</p>
                            <p hidden>{$row['shoeArtifact']}</p>
                            <p hidden>{$row['quantity']}</p>
                            <p hidden>{$row['item_id']}</p>
                          </div>";
                };
            }
        ?>
    </span>

    <script>
        
    </script>

    <header>
        <a href="home.html"><img src="shoe.png" alt="Smart Shoes" id="logoimg"/></a>
        <h6>
         ..
        </h6>
        <div class="navbar">
            <a id="a1" href="home.html">Home</a>
            <a id ="a1" href="searchPage.php">Men</a>
            <a id="a1" href="searchPage.php">Woman</a>
            <a id="a1" href="searchPage.php">Kids</a>
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
        
    </header>

    <span class='payment-card-info'>

        <div id="card-wrapper">
            <div class="row">
                <div class="col-xs-5">
                    <div id="cards">
                        <img src="Visa-icon.png">
                        <img
                            src="Master-Card-icon.png">
                    </div>
                    <!--#cards end-->
                    <div class="form-check">
                        <label class="form-check-label" for='card'>
                            Credit card payment
                        </label>
                    </div>
                </div>
                <!--col-xs-5 end-->
                <!--col-xs-5 end-->
            </div>
            <!--row end-->
            <div class="row">
                <div class="col-xs-5">
                    <i class="fa fa fa-user"></i>
                    <label for="cardholder">Cardholder's Name</label>
                    <input type="text" id="cardholder">
                    
                </div>
                <!--col-xs-5-->
                <div class="col-xs-5">
                    <i class="fa fa-credit-card-alt"></i>
                    <label for="cardnumber">Card Number</label>
                    <input type="text" id="cardnumber">
                    
                </div>
                <!--col-xs-5-->
            </div>
            <!--row end-->
            <div class="row row-three">
                <div class="col-xs-2">
                    <i class="fa fa-calendar"></i>
                    <label for="date">Valid thru</label>
                    <input type="text" placeholder="MM/YY" id="date">
                </div>
                <!--col-xs-3-->
                <div class="col-xs-2">
                    <i class="fa fa-lock"></i>
                    <label for="date">CVV / CVC *</label>
                    <input type="text">
                </div>
                <!--col-xs-3-->
                
                <!--col-xs-6 end-->
            </div>
            <!--row end-->
            <footer>
                <!-- <button class="btn">Back</button> -->
                <form method='post' id='buy-form'>
                    <input type='hidden' name='buy-form-user-id' value=1 />
                    <button class="btn">Buy</button>
                </form>
            </footer>
        </div>

        <div id="summary-wrapper">
            <h1 style="margin: 0em 0em; background-color:  rgb(67,110,209); padding: 0.5em; border-top: 1mm solid black;
            box-shadow: inset 0 5px 15px 0px rgba(0, 0, 0, 0.75);  ">Purchase Summary</h1>
            <span id='summary-table-span'>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>PPU</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </span>
            <h2 style="margin: -0.7em 0em; background:  rgb(67,110,209); padding: 0.5em; border-top: 1mm solid black;
            box-shadow: inset 0 5px 15px 0px rgba(0, 0, 0, 0.75);" id='summary-total-row'>
                <p id='summary-total-label'>Total:</p>
                <p id='summary-total-amount'>0$</p>
            </h2>
        </div>

    </span>

    <span class="imgs-and-related-container">
        <div id="item-imgs-wrapper">
            <h3 style="margin: 0em 0em; background:  rgb(67,110,209); padding: 0.5em; border-top: 1mm solid black;
            box-shadow: inset 0 5px 15px 0px rgba(0, 0, 0, 0.75);">Product Details</h3>
            <span id='img-table'>
                <table>
                    <tbody>
                    </tbody>
                </table>
            </span>

        </div>

        <span class='related-items-wrapper'>
            <h3 style="margin: 0em 0em; background:  rgb(67,110,209); padding: 0.5em; border-top: 1mm solid black;
            box-shadow: inset 0 5px 15px 0px rgba(0, 0, 0, 0.75);">Related Items</h3>

            <span id='related-items-table-container'>
                <table id="hProduct">
                    <tbody>
                    </tbody>
                </table>
                <button id="hide">Hide Products</button>
                <button id="show">Show Products</button>
            </span>
        </span>
    </span>
    <footer>
        Smart Shoes &copy; 2022 All Rights Reserved
    </footer>

</body>

</html>