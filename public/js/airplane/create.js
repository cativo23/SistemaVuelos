//Acciones del Seccion Economica

$(function(){
    $("#economica").on("click", function(){

        if(economica.value.length != 0){
                if(economica.value % 1 === 0){

                }else{
                    economica.value = '';
                    console.log('A');
                }
        }
        if(economica.value == 0){
            economica.value = '';
            console.log('B');

        }
        economica.focus();
    });
});

$(function(){
    $("#boton_economica_menos").on("click", function(){

        if(economica.value > 0){
            economica.value = economica.value - 1
        }else{
            economica.value = 0
        }
        economica.focus();

    });
});
$(function(){
    $("#boton_economica_mas").on("click", function(){
       // console.log( economica.value)
        if(economica.value.length == 0 || isNaN(parseInt(economica.value, 10))){
            economica.value = 1
        }else{
            economica.value = parseInt(economica.value, 10) + 1;
        }
        economica.focus();

    });
});



//Acciones del Seccion Ejecutiva

$(function(){
    $("#ejecutiva").on("click", function(){

        if(ejecutiva.value.length != 0){
            if(ejecutiva.value % 1 === 0){

            }else{
                ejecutiva.value = '';
            }
        }
        if(ejecutiva.value == 0){
            ejecutiva.value = '';
        }
        ejecutiva.focus();
    });
});

$(function(){
    $("#boton_ejecutiva_menos").on("click", function(){
        if(ejecutiva.value > 0){
            ejecutiva.value = ejecutiva.value - 1
        }else{
            ejecutiva.value = 0
        }
    });
});
$(function(){
    $("#boton_ejecutiva_mas").on("click", function(){
        if(ejecutiva.value.length == 0 || isNaN(parseInt(ejecutiva.value, 10))){
            ejecutiva.value = 1
        }else{
            ejecutiva.value = parseInt(ejecutiva.value, 10) + 1;
        }

    });
});

//Acciones del Seccion Primera

$(function(){
    $("#primera").on("click", function(){

        if(primera.value.length != 0){
            if(primera.value % 1 === 0){

            }else{
                primera.value = '';
            }
        }
        if(primera.value == 0){
            primera.value = '';
        }
        primera.focus();
    });
});

$(function(){
    $("#boton_primera_menos").on("click", function(){
        if(primera.value > 0){
            primera.value = primera.value - 1
        }else{
            primera.value = 0
        }
    });
});
$(function(){
    $("#boton_primera_mas").on("click", function(){
        if(primera.value.length == 0 || isNaN(parseInt(primera.value, 10))){
            primera.value = 1
        }else{
            primera.value = parseInt(primera.value, 10) + 1;
        }

    });
});


//Actualizar campo Capacidad total
$(function(){
    $("#boton_economica_mas").on("click", function(){

            capacidad.value = parseInt(capacidad.value, 10) + 1;
    });
});

$(function(){
    $("#boton_ejecutiva_mas").on("click", function(){

        capacidad.value = parseInt(capacidad.value, 10) + 1;
    });
});
$(function(){
    $("#boton_primera_mas").on("click", function(){
        capacidad.value = parseInt(capacidad.value, 10) + 1;
    });
});

$(function(){
    $("#boton_economica_menos").on("click", function(){
        if(economica.value > 0) {
            capacidad.value = parseInt(capacidad.value, 10) - 1;
        }
    });
});

$(function(){
    $("#boton_ejecutiva_menos").on("click", function(){
        if(ejecutiva.value != 0) {
            capacidad.value = parseInt(capacidad.value, 10) - 1;
        }
    });
});
$(function(){
    $("#boton_primera_menos").on("click", function(){
        if(primera.value != 0) {
            capacidad.value = parseInt(capacidad.value, 10) - 1;
        }
    });
});


//llenar el campo manuealmente
$(function(){
    $("#economica, #ejecutiva, #primera").on("keyup", function(){
        if(parseInt(economica.value, 10) % 1 === 0 && parseInt(ejecutiva.value, 10) % 1 === 0 && parseInt(primera.value, 10) % 1 === 0) {

            capacidad.value = parseInt(economica.value, 10) +  parseInt(ejecutiva.value, 10) +  parseInt(primera.value, 10);
            console.log('1')
        }else{
            console.log('Else')
            if(isNaN(parseInt(economica.value, 10))){
                capacidad.value = parseInt(ejecutiva.value, 10) +  parseInt(primera.value, 10);
                console.log('1.1')
            }

            if(isNaN(parseInt(ejecutiva.value, 10))){
                capacidad.value = parseInt(economica.value, 10) +  parseInt(primera.value, 10);
                console.log('1.2')

            }

            if(isNaN(parseInt(primera.value, 10))){
                capacidad.value = parseInt(economica.value, 10) +  parseInt(ejecutiva.value, 10);
                console.log('1.3')

            }
        }



        // Vacio economica y ejecutiva
        if(isNaN(parseInt(economica.value, 10)) && isNaN(parseInt(ejecutiva.value, 10)) ||
            economica.value.length == 0 && ejecutiva.value.length == 0 && primera.value.length != 0){
            capacidad.value =  parseInt(primera.value, 10);
            console.log('3')

        }
        // Vacio economica y primera
        if(isNaN(parseInt(economica.value, 10))  && isNaN(parseInt(primera.value, 10
            && economica.value.length == 0 && primera.value.length == 0 && ejecutiva.value.length != 0))){
            capacidad.value = parseInt(ejecutiva.value, 10);
            console.log('4')

        }

        // Vacío ejecutivo y primera
        if(isNaN(parseInt(ejecutiva.value, 10)) && isNaN(parseInt(primera.value, 10
            && ejecutiva.value.length == 0 && primera.value.length == 0 && economica.value.length != 0))){
            capacidad.value = parseInt(economica.value, 10);
            console.log('5')
        }
        if(isNaN(parseInt(economica.value, 10)) && isNaN(parseInt(ejecutiva.value, 10)) && isNaN(parseInt(primera.value, 10
            && economica.value.length == 0 && ejecutiva.value.length == 0 && primera.value.length == 0))){
            capacidad.value = 0;
            //parseInt(0, 10);
            //console.log(capacidad.value);
            console.log('6');
        }


        if(capacidad.value < 0){
            capacidad.value = 0
            console.log('Hola')

        }
/*
        if(ejecutiva.value < 0){
            capacidad.value = 0
        }

        if(primera.value < 0){
            capacidad.value = 0
        }*/

    });
});


