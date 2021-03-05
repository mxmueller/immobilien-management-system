<?php
include '../templates/header.template.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

    <body>

        <?php
        include '../templates/nav.template.php';
        ?>

        <?php
        include '../methods/gets/get.estates.php';
        $logged_in_user = $_SESSION['user_id'];
        $estate_entry_id = $_GET['id'];
        $edit = new buildEstateQuery();
        ?>

        <!-- DEV -->
        <!-- <div class="container-fluid p-5">
            <div class="card shadow-lg">
                <?php $q = $edit->edit($logged_in_user, $estate_entry_id);
                $r = $q->fetch_assoc();
                print_r($r);
                ?>
            </div>
        </div> -->

        <div class="container-fluid p-5">
            <div class="card shadow-lg">
                <div class="card-header ">
                    <h4 class="mt-2">Immobilie: <?php echo $r['EstateID'] ?></h4>
                </div>
                <div class="card-body">

                    <form id="ims_form" action="../methods/inserts/new.insert.php" method="post">
                        <h5 class="mt-5 font-weight-bold">Adresse</h5>

                        <div class="form-row mt-3">
                            <div class="col-6">
                                <label for="zipcode">Postleitzahl:</label>
                                <input value="<?php echo $r['ZipcodeID'] ?>" onKeyDown="limitText(this,5);" onKeyUp="limitText(this,5);" type="number" name="zipcode" type="text" class="form-control" id="zipcode">
                            </div>
                            <div class="col">
                                <label for="city">Stadt:</label>
                                <input disabled name="city" type="text" class="form-control" id="city">
                            </div>
                        </div>

                        <div class="form-row mt-3 pb-5">
                            <div class="col-10">
                                <label for="street">Straße:</label>
                                <input value="<?php echo $r['Address_Street'] ?>" name="street" type="text" class="form-control" id="street">
                            </div>
                            <div class="col">
                                <label for="street_number">Hausnummer:</label>
                                <input value="<?php echo $r['Address_Street_Number'] ?>" name="street_number" type="text" class="form-control" id="street_number">
                            </div>
                        </div>

                        <h5 class="mt-5 font-weight-bold">Immobilie</h5>

                        <div class="form-group mt-3 mb-3 pb-5">
                            <label for="estate_type">Immobilien Typ:</label>
                            <select name="estate_type" class="form-control" id="estate_type">
                                <?php
                                include '../methods/view/types.view.php';
                                $TypeDataArray = TypeData();

                                foreach ($TypeDataArray as $Type) {
                                    // to know what's in $item
                                    echo '<option class="type_select" value=' . $Type['Estate_TypeID'] . '>' . $Type['Estate_Type'] . '</option>';
                                }
                                ?>

                                <input id="type_preselect" select="<?php echo $r['Estate_TypeID'] ?>" type="hidden" name="preselect"> </input>

                                <script type="text/javascript">
                                    document.addEventListener('DOMContentLoaded', function() {
                                        let $type_preselect = $('#type_preselect').attr('select');
                                        let $options = $('#estate_type option');
                                        let $values = $.map($options, function($option) {
                                            console.log($type_preselect);
                                            if ($option.value == $type_preselect) {
                                                $($option).attr("selected", "selected");
                                            }
                                        });
                                    }, false);
                                </script>
                            </select>
                        </div>

                        <h5 class="mt-5 mb-3 font-weight-bold">Spezifikation</h5>
                        <div class="form-group">
                            <label class="w-100" for="surface_size">Quadratmeter:</label>
                            <input value="<?php echo $r['Estate_Meta_Surface_Size'] ?>" name="surface_size" class="form-control" type="text" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="w-100" for="rooms_count">Zimmer:</label>
                            <input value="<?php echo $r['Estate_Meta_Rooms_Count'] ?>" name="rooms_count" class="form-control" type="text" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="w-100" for="bathroom_count">Badezimmer:</label>
                            <input value="<?php echo $r['Estate_Meta_Bathroom_Count'] ?>" name="bathroom_count" class="form-control" type="text" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="w-100" for="price_per_square_meter">Preis Pro m²:</label>
                            <input value="<?php echo $r['Estate_Meta_Price_Per_Squaremeters'] ?>" type="number" name="price_per_square_meter" class="form-control" type="text" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="w-100" for="additional_cost">Nebenkosten:</label>
                            <input value="<?php echo $r['Estate_Meta_Additional_Costs'] ?>" name="additional_cost" class="form-control" type="text" />
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