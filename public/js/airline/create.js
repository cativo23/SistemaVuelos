codigooriginal = codigo2.value;
$(function(){
    $("#nombrecorto").on("change", function(){
        console.log(nombrecorto.value);
        console.log(codigo2.value);
        obtenerCodigo();
    });
});

$(function(){
    $("#paisorigen").on("change", function(){
        console.log(paisorigen.value);
        console.log(codigooriginal, 'ORIGINAL 1');
        obtenerCodigo();
    });
});

$(function(){
    $("#nombrecorto").on("keyup", function(){
        codigo2.value = obtenerCorrelativo();
        codigo.value = codigo2.value;
        obtenerCodigo();
    });
});

$(function(){
    $("#paisorigen").on("keyup", function(){
        console.log(paisorigen.value);
        console.log(codigo2.value);
        codigo2.value = obtenerCorrelativo();
        codigo.value = codigo2.value;
        obtenerCodigo();
    });
});


function obtenerCodigo() {
    console.log(codigooriginal + ' CODIGO ORIGINAL')
    cuatroletras = codigo2.value

    if(nombrecorto.value.length == 0 || paisorigen.value.length == 0 ){
        codigo2.value = obtenerCorrelativo();
        console.log(codigo2.value)
        if(cuatroletras.length = 4){
            codigo2.value = obtenerCorrelativo();
        }
    }

    if(nombrecorto.value.length != 0 && paisorigen.value.length != 0 ){
        codigo2.value = nombrecorto.value.substr(0,2).toUpperCase() +
            paisorigen.value.substr(0,2).toUpperCase() + obtenerCorrelativo();
        codigo.value = codigo2.value;
    }
}

onload = obtenerCorrelativo();

function obtenerCorrelativo(){
    var nuevocorrelativo = ''
    correlativo = codigooriginal;

    console.log(correlativo, 'Codigo original');
    console.log(codigo2.value, 'codigo2');
    console.log(codigo.value, 'codigo');


    if(codigo2.value.length == 11){
        codigo.value = codigo2.value;
        console.log('11 digitos', codigo2.value);
    }

    if (codigo2.value.length <= 7){
        console.log('Menor o igual de 7 digitos')
        if(correlativo < 1000000){

            nuevocorrelativo = '0' + correlativo;
            codigo2.value = nuevocorrelativo;

            if(correlativo < 100000){

                nuevocorrelativo = '00' + correlativo;
                codigo2.value = nuevocorrelativo;

                if(correlativo < 10000){
                    nuevocorrelativo = '000' + correlativo;
                    codigo2.value = nuevocorrelativo;

                    if(correlativo < 1000){

                        nuevocorrelativo = '0000' + correlativo;
                        codigo2.value = nuevocorrelativo;

                        if(correlativo < 100){
                            nuevocorrelativo = '00000' + correlativo;
                            codigo2.value = nuevocorrelativo;
                            if(correlativo < 10){

                                nuevocorrelativo = '000000' + correlativo;
                                console.log(nuevocorrelativo)
                                codigo2.value = nuevocorrelativo;
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
