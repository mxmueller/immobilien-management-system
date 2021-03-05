<?php include '../templates/header.template.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?><?php include '../templates/nav.template.php';
        ?>

<body>

    <div class="container-fluid p-5">
        <div class="card shadow-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Postleitzahl</th>
                        <th scope="col">Straße</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Funktionen</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include '../methods/gets/get.estates.php';
                    $user_submits = new buildEstateQuery();
                    print_r($user_submits->overview());
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<?php
} else {
    echo "Please log in first to see this page.";
}
?>