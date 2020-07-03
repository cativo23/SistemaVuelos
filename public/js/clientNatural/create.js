$(function(){
    $("#tipo_documento").on("change", function(){
        obtenerTipoDocumento();
    });
});

$(function(){
    $("#n_documento3").on("keyup", function(){

        console.log( formatopasaporte.children[0].children[0].input)
        n_documento3.value = n_documento3.value.toUpperCase()
        console.log(n_documento3)
    });
});



onload = obtenerSeleccionAlRecargar();

function obtenerSeleccionAlRecargar() {
    var seleccionado = tipo_documento.options[tipo_documento.selectedIndex].text;
    console.log(seleccionado, 'obtenerSeleccionAlRecargar');

    n_frecuente.value = n_frecuente2.value;

    if(formatodui.children[0].childNodes.length == 7 || formatonit.children[0].childNodes.length == 7 ||
        formatopasaporte.children[0].childNodes.length == 7){

        if(seleccionado == 'DUI'){

            // Mostrar y ocultar input
            formatodui.setAttribute("style", "display: inline")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento';
            formatonit.children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].name = 'n_documento3';

            //Foco al input
            //formatodui.children[0].children[0].focus();

        }

        if(seleccionado == 'NIT'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: inline")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].name = 'n_documento';
            formatopasaporte.children[0].children[0].name = 'n_documento3';

            //Foco al input
            //formatonit.children[0].children[0].focus();
        }

        if(seleccionado == 'Pasaporte'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: inline")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].name = 'n_documento';

            //Foco al input
            //formatopasaporte.children[0].children[0].focus();
        }
    }else{

        if(seleccionado == 'DUI'){

            // Mostrar y ocultar input
            formatodui.setAttribute("style", "display: inline")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento';
            formatonit.children[0].children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento3';

            //Foco al input
            //formatodui.children[0].children[0].children[0].focus();

        }

        if(seleccionado == 'NIT'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: inline")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].children[0].name = 'n_documento';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento3';

            //Foco al input
            //formatonit.children[0].children[0].children[0].focus();
        }

        if(seleccionado == 'Pasaporte'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: inline")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento';

            //Foco al input
            //formatopasaporte.children[0].children[0].children[0].focus();
        }

    }

    console.log('FIN obtenerSeleccionAlRecargar');
    return seleccionado;
}


function obtenerTipoDocumento(){
    var seleccion = tipo_documento.options[tipo_documento.selectedIndex].text;
    //console.log(seleccion);


    //console.log(n_documento.value , 'Tamaño: ', n_documento.value.length)

    console.log(formatodui.children[0])
    console.log(formatodui.children[0].childNodes.length)
    /*console.log(formatonit.children[0])
    console.log(formatonit.children[0].childNodes.length)
    console.log(formatopasaporte.children[0])
    console.log(formatopasaporte.children[0].childNodes.length)
    */
    // Con error 5
    // Sin error 7

    if(formatodui.children[0].childNodes.length == 7 || formatonit.children[0].childNodes.length == 7 ||
        formatopasaporte.children[0].childNodes.length == 7){

        if(seleccion == 'DUI'){

            // Mostrar y ocultar input
            formatodui.setAttribute("style", "display: inline")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento';
            formatonit.children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].name = 'n_documento3';

            //Foco al input
            formatodui.children[0].children[0].focus();

        }

        if(seleccion == 'NIT'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: inline")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].name = 'n_documento';
            formatopasaporte.children[0].children[0].name = 'n_documento3';

            //Foco al input
            formatonit.children[0].children[0].focus();
        }

        if(seleccion == 'Pasaporte'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: inline")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].name = 'n_documento';

            //Foco al input
            formatopasaporte.children[0].children[0].focus();
        }
    }else{

        if(seleccion == 'DUI'){

            // Mostrar y ocultar input
            formatodui.setAttribute("style", "display: inline")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento';
            formatonit.children[0].children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento3';

            //Foco al input
            formatodui.children[0].children[0].children[0].focus();

        }

        if(seleccion == 'NIT'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: inline")
            formatopasaporte.setAttribute("style", "display: none")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].children[0].name = 'n_documento';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento3';

            //Foco al input
            formatonit.children[0].children[0].children[0].focus();
        }

        if(seleccion == 'Pasaporte'){

            formatodui.setAttribute("style", "display: none")
            formatonit.setAttribute("style", "display: none")
            formatopasaporte.setAttribute("style", "display: inline")

            //Asingar name= n_documento al input seleccionado en tipo de documento
            formatodui.children[0].children[0].children[0].name = 'n_documento1';
            formatonit.children[0].children[0].children[0].name = 'n_documento2';
            formatopasaporte.children[0].children[0].children[0].name = 'n_documento';

            //Foco al input
            formatopasaporte.children[0].children[0].children[0].focus();
        }

    }
}


onload = obtenerCorrelativo();

function obtenerCorrelativo(){
    var nuevocorrelativo = ''


    //console.log(correlativo, 'Codigo original');
    console.log(n_frecuente.value, 'n_frecuente');


    if(n_frecuente.value.length == 11){
        codigo.value = codigo2.value;
        console.log('11 digitos', codigo2.value);
    }

    correlativo = n_frecuente.value;

    if (n_frecuente.value.length <= 7){
        console.log('Menor o igual de 7 digitos')
        if(correlativo < 1000000){

            nuevocorrelativo = 'CN0' + correlativo;
            n_frecuente2.value = nuevocorrelativo;
            n_frecuente.value = nuevocorrelativo;

            if(correlativo < 100000){

                nuevocorrelativo = 'CN00' + correlativo;
                n_frecuente2.value = nuevocorrelativo;
                n_frecuente.value = nuevocorrelativo;

                if(correlativo < 10000){
                    nuevocorrelativo = 'CN000' + correlativo;
                    n_frecuente2.value = nuevocorrelativo;
                    n_frecuente.value = nuevocorrelativo;

                    if(correlativo < 1000){

                        nuevocorrelativo = 'CN0000' + correlativo;
                        n_frecuente2.value = nuevocorrelativo;
                        n_frecuente.value = nuevocorrelativo;

                        if(correlativo < 100){
                            nuevocorrelativo = 'CN00000' + correlativo;
                            n_frecuente2.value = nuevocorrelativo;
                            n_frecuente.value = nuevocorrelativo;
                            if(correlativo < 10){

                                nuevocorrelativo = 'CN000000' + correlativo;
                                console.log(nuevocorrelativo)
                                n_frecuente.value = nuevocorrelativo;
                            }
                        }
                    }
                }
            }
        }else{
            if(correlativo = 1000000){
                nuevocorrelativo = correlativo;
            }else{
                nuevocorrelativo = correlativo % 1000000;
            }
        }
    }

    return nuevocorrelativo;
}
