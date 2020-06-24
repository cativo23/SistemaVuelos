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

            nuevocorrelativo = 'CC0' + correlativo;
            n_frecuente2.value = nuevocorrelativo;
            n_frecuente.value = nuevocorrelativo;

            if(correlativo < 100000){

                nuevocorrelativo = 'CC00' + correlativo;
                n_frecuente2.value = nuevocorrelativo;
                n_frecuente.value = nuevocorrelativo;

                if(correlativo < 10000){
                    nuevocorrelativo = 'CC000' + correlativo;
                    n_frecuente2.value = nuevocorrelativo;
                    n_frecuente.value = nuevocorrelativo;

                    if(correlativo < 1000){

                        nuevocorrelativo = 'CC0000' + correlativo;
                        n_frecuente2.value = nuevocorrelativo;
                        n_frecuente.value = nuevocorrelativo;

                        if(correlativo < 100){
                            nuevocorrelativo = 'CC00000' + correlativo;
                            n_frecuente2.value = nuevocorrelativo;
                            n_frecuente.value = nuevocorrelativo;
                            if(correlativo < 10){

                                nuevocorrelativo = 'CC000000' + correlativo;
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
