onload = console.log('hola')
//Acciones del Seccion Economica

$(function(){
    $("#terminales").on("click", function(){

        if(terminales.value.length != 0){
            // terminales.value contiene un valor al menos
            if(terminales.value % 1 === 0){

            }else{
                terminales.value = '';
                console.log('A');
            }
        }
        if(terminales.value == 0){
            terminales.value = '';
            console.log('B');

        }
        terminales.focus();
    });
});

$(function(){
    $("#boton_terminales_menos").on("click", function(){

        if(terminales.value > 1){
            terminales.value = terminales.value - 1
        }else{
            terminales.value = 1
        }
        terminales.focus();

    });
});
$(function(){
    $("#boton_terminales_mas").on("click", function(){
        // console.log( economica.value)
        if(terminales.value.length == 0 || isNaN(parseInt(terminales.value, 10))){
            terminales.value = 1
        }else{
            terminales.value = parseInt(terminales.value, 10) + 1;
        }
        terminales.focus();

    });
});






//llenar el campo manuealmente
$(function(){
    $("#terminales").on("keyup", function(){

    });
});

