//SLIDER FILTER
//Cost slider
$("#price_range_slider").slider({
    range:true,
    min: 500,
    max: 700000,
    values:[400, 700000],
    step: 500,
    stop:function(event, ui){
        $("#min_price_shown").val(ui.values[0]);
        $("#max_price_shown").val(ui.values[1]);
        $("#hidden_min_price").val(ui.values[0]);
            $("#hidden_max_price").val(ui.values[1]);
            filterData();
        }
});

//Min input changed
$("#min_price_shown").change(function () {
    if($(this).val() <= $("#hidden_max_price").val() && $(this).val() >= 500){
        $("#price_range_slider").slider("values", 0, $(this).val());
        $("#hidden_min_price").val($(this).val());
        filterData();
    }
    else{
        alert("Wrong Input!")
    }
});

//Max input changed
$("#max_price_shown").change(function () {
    if($(this).val() >= $("#hidden_min_price").val() && $(this).val() <= 700000){
        $("#price_range_slider").slider("values", 1, $(this).val());
        $("#hidden_max_price").val($(this).val());
        filterData();
    }
    else{
        alert("Wrong Input!")
    }
});
    

//Toggle cost filter
function toggleFilter(e){
    e.preventDefault();
    document.getElementById("filter-toggler").classList.toggle("active");
    document.getElementById("cost-filter-container").classList.toggle("active");
}