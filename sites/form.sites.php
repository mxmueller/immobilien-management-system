<?php
include '../templates/header.template.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<body>

    <?php
include '../templates/nav.template.php';
?>
    <div class="container-fluid p-5">
        <div class="card shadow-lg">
            <div class="card-header ">
                <h4 class="mt-2">Neue Immobilie Anlegen</h4>
            </div>
            <div class="card-body">

                <form id="ims_insert_form" action="../methods/inserts/new.insert.php" method="post">
                    <h5 class="mt-5">Adresse</h5>

                    <div class="form-row mt-3">
                        <div class="col-6">
                            <label for="zipcode">Postleitzahl:</label>
                            <input onKeyDown="limitText(this,5);" onKeyUp="limitText(this,5);" type="number"
                                name="zipcode" type="text" class="form-control" id="zipcode">
                        </div>
                        <div class="col">
                            <label for="city">Stadt:</label>
                            <input disabled name="city" type="text" class="form-control" id="city">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-10">
                            <label for="street">Straße:</label>
                            <input name="street" type="text" class="form-control" id="street">
                        </div>
                        <div class="col">
                            <label for="street_number">Hausnummer:</label>
                            <input name="street_number" type="text" class="form-control" id="street_number">
                        </div>
                    </div>

                    <h5 class="mt-5">Immobilie</h5>

                    <div class="form-group mt-3">
                        <label for="estate_type">Immobilien Typ:</label>
                        <select name="estate_type" class="form-control" id="estate_type">
                            <?php
                                include '../methods/view/types.view.php';
                                $TypeDataArray = TypeData();

                                foreach($TypeDataArray as $Type) {
                                // to know what's in $item
                                echo '<option value=' . $Type['Estate_TypeID'] . '>' . $Type['Estate_Type'] . '</option>';
                            }
                            ?>
                        </select>

                        <div class="form-group mt-3">
                            <label for="surface_size">Quadratmeter:</label>
                            <input name="surface_size" type="text" class="form-control" id="surface_size">
                        </div>

                        <div class="form-group mt-3">
                            <label for="rooms_count">Zimmer:</label>
                            <input name="rooms_count" type="text" class="form-control" id="rooms_count">
                        </div>

                        <div class="form-group mt-3">
                            <label for="bathroom_count">Badezimmer:</label>
                            <input name="bathroom_count" type="text" class="form-control" id="bathroom_count">
                        </div>

                        <div class="form-group mt-3">
                            <label for="price_per_square_meter">Preis Pro m²:</label>
                            <input name="price_per_square_meter" type="text" class="form-control"
                                id="price_per_square_meter">
                        </div>

                        <div class="form-group mt-3">
                            <label for="additional_cost">Nebenkosten:</label>
                            <input name="additional_cost" type="text" class="form-control" id="additional_cost">
                        </div>

                        <div class="shadow-lg card card-custom-money" style="max-width: 15rem;">
                            <div class="card-body">
                                <h6 class="card-title">Mietertrag pro Monat</h6>
                                <p class="card-text font-weight-bold text-success">499€</p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info mt-5" name="submit">Submit</button>

                </form>
            </div>
        </div>
</body>

</html>

<?php
} else {
    echo "Please log in first to see this page.";
}   
?>