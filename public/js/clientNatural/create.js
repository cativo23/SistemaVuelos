

$(function(){
    $("#tipodocumento").on("change", function(){
        obtenerTipoDocumento();
        obtenerValor();
    });
});

;


function obtenerTipoDocumento() {
    var seleccion = tipodocumento.options[tipodocumento.selectedIndex].text;

    console.log(seleccion);
    // Si el tipo de doc es DUI
    if(seleccion == 'DUI'){
        formatodui.setAttribute("style", "display: inline")
        formatonit.setAttribute("style", "display: none")
        formatopasaporte.setAttribute("style", "display: none")

        ndocumento2.disabled = false;
        ndocumento3.disabled = true;
        ndocumento4.disabled = true;

        ndocumento2.setAttribute("name", "ndocumento");
        ndocumento3.setAttribute("name", "");
        ndocumento4.setAttribute("name", "");

    }

    if(seleccion == 'NIT'){
        formatodui.setAttribute("style", "display: none")
        formatonit.setAttribute("style", "display: inline")
        formatopasaporte.setAttribute("style", "display: none")

        ndocumento2.disabled = true;
        ndocumento3.disabled = false;
        ndocumento4.disabled = true;

        ndocumento2.setAttribute("name", "");
        ndocumento3.setAttribute("name", "ndocumento");
        ndocumento4.setAttribute("name", "");

    }

    if(seleccion == 'Pasaporte'){

        formatodui.setAttribute("style", "display: none")
        formatonit.setAttribute("style", "display: none")
        formatopasaporte.setAttribute("style", "display: inline")

        ndocumento2.disabled = true;
        ndocumento3.disabled = true;
        ndocumento4.disabled = false;

        ndocumento2.setAttribute("name", "");
        ndocumento3.setAttribute("name", "");
        ndocumento4.setAttribute("name", "ndocumento");
    }
}

function obtenerValor() {
    var seleccion = tipodocumento.options[tipodocumento.selectedIndex].text;

    if(seleccion == 'DUI' && ndocumento2.value.length != 0){
        //ndocumento1.value = ndocumento2.value;
        console.log(ndocumento2.value.length,'LENGTH DUI')
    }


    if(seleccion == 'NIT' && ndocumento3.value.length != 0){
        //ndocumento1.value = ndocumento3.value;
        console.log(ndocumento3.value.length,'LENGTH NIT')
    }
    //Pasando valor de a campos que se enviará


    //FALTA PASAPORTE
    if(seleccion == 'Pasaporte' && ndocumento4.value.length != 0){
        //ndocumento1.value = ndocumento4.value;
        console.log(ndocumento4.value.length,'LENGTH Pasaporte')
    }

}




