
let boton = document.getElementById("boton_operario");
let div= document.getElementById("div_registro");


boton.addEventListener("click", function() {

    div.style.display = "block";

});

jQuery(document).ready(function ($) {
    $("#persona_id_sst").select2({
        closeOnSelect: true,
    });
});
jQuery(document).ready(function ($) {
    $("#articulos_sst").select2({
        closeOnSelect: true,
    });
});
