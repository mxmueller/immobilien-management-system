<?php
include '../templates/header.template.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<?php
include '../templates/nav.template.php';
?>

<body>
    <div class="container-fluid p-5">
        <div class="card shadow-lg">
            <div class="card-header ">
                <h4 class="mt-2">Dashboard</h4>
            </div>
        </div>
</body>

</html>

<?php
} else {
    echo "Please log in first to see this page.";
}   
?>