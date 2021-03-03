<?php include '../templates/header.template.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?><?php include '../templates/nav.template.php';
    ?>

<body>
    <div class="container-fluid p-5">

        <div class="card shadow w-25 float-left">
            <div class="card-header ">
                <h4 class="mt-2">Herzlich Wilkommen: </h4>
            </div>
            <div class="card-body ">
                <?php
                include '../methods/user/name.user.php';
                ?>
            </div>
        </div>
        <div class="card shadow w-25 float-left ml-5">
            <div class="card-header ">
                <h4 class="mt-2">Angelegte Immobilien: </h4>
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