<?php
require "./controller/controller.php";

$food_type = array(1 => 'Burger', 2 => 'Pizza', 3 => 'Sub', 4 => 'Drink');

$rowCount = getMenuRowCount()["COUNT(*)"];

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <title>Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./CSS/orderStyle.css">
</head>

<body>
    <header>
        <nav class="navbar  justify-content-between">
            <a class="navbar-brand"> <img src="./Images/logo.png" alt="" class="logo"></a>
            <form class="form-inline">

                <button class="btn btn-outline-danger my-2 my-sm-0 " type="submit">Manage Account</button>
            </form>
        </nav>
        </div>
    </header>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-1 col-xl-1">
                <nav id="sidebarMenu" class="navbar navbar-light navbar-expand-sm px-0 flex-row flex-nowrap">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbarWEX">
                        <div class="nav flex-sm-column flex-row" style="padding-top:360px; position: fixed;">
                            <a id="burger_btn" class="nav-item nav-link optn_btn " href="#Burger_h1">BURGER</a>
                            <a id="pizza_btn" class="nav-item nav-link optn_btn " href="#Pizza_h1">PIZZA</a>
                            <a id="sub_btn" class="nav-item nav-link optn_btn" href="#Sub_h1">SUB</a>
                            <a id="drink_btn" class="nav-item nav-link optn_btn" href="#Drink_h1">DRINK</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main" id="options">

            </div>
            <div class="main" id="body">

                <?php

                for ($i = 1; $i <= sizeof($food_type); $i++) {

                    echo '<br><h1 class="body_h1" id="' . $food_type[$i] . '_h1">' . $food_type[$i] . '</h1>';

                    $menu = getAllFoodByType($i);
                    foreach ($menu as $item) {
                        $img = '"./Images/' . $item['image'] . '.png"';
                ?>
                        <ul class="list-group w-100">
                            <li class="list-group-item " style="margin-bottom:10px;">
                                <img src=<?php echo $img ?> class="container_div pic_div">
                                <div class="container_div name_div">
                                    <h3><?php echo $item['f_name']  ?></h3>
                                    <p>Rating: <?php echo $item['review']  ?></p>
                                </div>
                                <div class="container_div amount_div">
                                    <h3>TK : <?php echo $item['price']  ?></h4>
                                </div>
                                <div class="container_div">
                                    <button class="opt_btn" onclick="loadPopup('<?php echo $item['id'] ?>')" value="<?php echo $item['id']  ?>" type="button" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-align-justify fa-6x"></i>
                                    </button>
                                </div>
                            </li>

                        </ul>
                <?php }
                } ?>

            </div>
            <div class="main" id="side_q">
                <h1>Your Orders</h1>
            </div>
        </div>
        <div id="popup_container">

        </div>
</body>

<div class="footer text-muted">
    <p class="text-center">Total Item shown: <i id="rowCount"><?php echo $rowCount; ?></i></p>
    <script src="JS/order.js"></script>
</div>

</html>