$(function () {

    const $insert_form = $("#ims_insert_form");

    if ($insert_form) {

        let $zip_code = $insert_form.find("#zipcode");
        let $city = $insert_form.find("#city");

        console.log($city);

        $zip_code.on("input", function () {

            let $zip_code_dom = $(this);
            let $zip_code_dom_input = $zip_code_dom.val();
            let $ajax = $.ajax({
              type: "POST",
              data: { zipcodeinsert: $zip_code_dom_input },
              url: "../methods/view/zipcode.view.php",
            });

            $ajax.done(function ($city_ajax_response) {
                if (!$city_ajax_response.match("^<")) {
                  $($city).val($city_ajax_response);
                  $($city).text($city_ajax_response);
                }
            });
        });
    }
});

// frontend Function required
function limitText($limitField, $limitNum) {
    if ($limitField.value.length > $limitNum) {
        $limitField.value = $limitField.value.substring(0, $limitNum);
    }
}