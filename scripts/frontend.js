$(function () {
    $("#rooms_count").slider({
        formatter: function (value) {
            return "Current value: " + value;
        },
    });
    $("#rooms_count").on("slide", function (slideEvt) {
        $("#rooms_count_val").text(slideEvt.value);
    });


    $("#bathroom_count").slider({
        formatter: function (value) {
            return "Current value: " + value;
        },
    });
    $("#bathroom_count").on("slide", function (slideEvt) {
        $("#bathroom_count_val").text(slideEvt.value);
    });


    let $ss = new Slider("#surface_size");

    $("#destroy_surface_size").click(function () {
      $("#surface_size_label").hide();
      $(this).hide();
      $ss.destroy();
    });

    $("#surface_size").on("slide", function (slideEvt) {
      $("#surface_size_val").text(slideEvt.value);
    });

    let $adc = new Slider("#additional_cost");

    $("#destroy_additional_cost").click(function () {
        $("#additional_cost_span").hide();
        $(this).hide();
        $adc.destroy();
    });

    $("#additional_cost").on("slide", function (slideEvt) {
        $("#additional_cost_val").text(slideEvt.value);
    })


    let $ppsm = new Slider("#price_per_square_meter");

    $("#destroy_price_per_square_meter").click(function () {
        $("#price_per_square_meter_label").hide();
        $(this).hide();
        $ppsm.destroy();
    });

    $("#price_per_square_meter").on("slide", function (slideEvt) {
        $("#price_per_square_meter_val").text(slideEvt.value);
    });
})