<?php
include '../templates/header.template.php';
?>

<body>

    <?php
include '../templates/nav.template.php';
?>

    <div class="container-fluid p-5">
        <div class="card">
            <div class="card-header">
                <h4 class="mt-2">Neue Immobilie Anlegen</h4>
            </div>
            <div class="card-body">

                <form action="../methods/add_new_entry.php" method="post">
                    <h5 class="mt-5">Adresse</h5>

                    <div class="form-row mt-3">
                        <div class="col-10">
                            <label for="zipcode">Postleitzahl:</label>
                            <input name="zipcode" type="text" class="form-control" id="zipcode">
                        </div>
                        <div class="col">
                            <label for="city">Stadt:</label>
                            <input name="city" type="text" class="form-control" id="city">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-10">
                            <label for="street">Straße:</label>
                            <input name="street"type="text" class="form-control" id="street">
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
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
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
                            <input name="price_per_square_meter" type="text" class="form-control" id="price_per_square_meter">
                        </div>

                        <div class="form-group mt-3">
                            <label for="additional_cost">Nebenkosten:</label>
                            <input name="additional_cost" type="text" class="form-control" id="additional_cost">
                        </div>

                        <div class="form-group mt-5">
                            <h5>Mietkosten pro Monat</h5>
                            <div id="cost_sum">
                                <h5>499€</h5>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5" name="submit">Submit</button>

                </form>
            </div>
        </div>

</body>
</html>