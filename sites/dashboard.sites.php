<?php include '../templates/header.template.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?><?php include '../templates/nav.template.php';
    ?>

<body>
    <div class="container-fluid p-5">

        <div style="max-width: 350px; min-width: 295px;" class=" card shadow float-left">
            <div class="card-header ">
                <h5 class="mt-2 font-weight-bold">Herzlich Wilkommen: </h5>
            </div>
            <div class="card-body ">
                <?php
                include '../methods/user/name.user.php';
                ?>
            </div>
        </div>
        <div style="max-width: 350px;" class="card shadow float-left ml-5">
            <img class="card-img-top" src="../assets/house.jpg" alt="Card image cap">
            <div class="card-header ">
                <h5 class="mt-2 font-weight-bold">Angelegte Immobilien: </h5>
            </div>
            <div class="card-body "> <?php
                                        include '../methods/gets/get.estates.php';
                                        $dashboard_submits = new buildEstateQuery();
                                        print_r($dashboard_submits->dashboard());
                                        ?></div>
        </div>
    </div>
</body>

</html><?php
    } else {
        echo "Please log in first to see this page.";
    }

        ?>