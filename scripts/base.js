$(function () {

    const $insert_form = $("#ims_form");
    
    if ($insert_form) {
        
        zipCodeString($insert_form);
    
    }

    window.globalzipCodeString = function() {
        zipCodeString($insert_form);
    }
});

function zipCodeString($form) {
    
    
    let $zip_code = $form.find("#zipcode");
    let $city = $form.find("#city");

    debugger;

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

// frontend Function required
function limitText($limitField, $limitNum) {
    if ($limitField.value.length > $limitNum) {
        $limitField.value = $limitField.value.substring(0, $limitNum);
    }
}