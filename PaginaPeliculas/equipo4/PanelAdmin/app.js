$(document).ready(function () {
    $('.hideinp').attr("disabled", true);
    $('#NombrePelicula').attr("disabled", true);
    $('#btnBuscar').hide();
    $('#btnEnviar').hide();
    let num=0;

    
    $('#Accion').click(function (e) { 
        e.preventDefault(); 
        let valor=$('#Accion').val();
        
        if(num==1)
        {
            $('.TituloVacio').remove();
        }
        
        if(valor=='opcion0'){
            $('#btnEditar').remove();
                    $('#btnGuardar').remove();
            $('#btnEnviar').hide();
            $('#AñoPelicula').attr('value','');
                            $('#Sinopsis').text('');
                            $('#categoria1').text('');
                            $('#txtTrailer1').attr('value','');
                            $('#txtPelicula1').attr('value','');
            console.log('.....');
            $('.hideinp').attr("disabled", true);
            $('#NombrePelicula').attr("disabled", true);
            $('#btnBuscar').hide();
            $('.img1').show();
            
        }
        if(valor=='opcion1'){
            $('#NombrePelicula').attr("disabled", false);
            $('#Frmglobal').attr("action", "SubirPelis.php");
            $('#btnEditar').remove();
                    $('#btnGuardar').remove();
            $('#btnEnviar').show();
            $('#AñoPelicula').attr('value','');
                            $('#Sinopsis').text('');
                            $('#categoria1').text('');
                            $('#txtTrailer1').attr('value','');
                            $('#txtPelicula1').attr('value','');
            console.log('si jala el agregar pelis');
            $('.hideinp').attr("disabled", false);
            $('#btnBuscar').hide();
            $('#NombrePelicula').attr("disabled", false);
            $('.img1').show();

        }
        if(valor=='opcion2'){
            $('#NombrePelicula').attr("disabled", false);
            $('#Frmglobal').attr("action", "ModificarPelis.php");
            $('#btnEnviar').hide();
            console.log('si jala el modify');
            $('.hideinp').attr("disabled", true);
            $('#NombrePelicula').attr("disabled", false);
            $('#btnBuscar').show();
            $('.img1').hide();
            $('#btnBuscar').click(function (e) {
                
                $('#IDPeli').remove();
                $('.Tituloinvalido').remove();
                $('#btnEditar').remove();
                $('#btnGuardar').remove();
                $('.PeliVacia').remove();
                $('.TituloVacio').remove();
                e.preventDefault();
                let titulo=$('#NombrePelicula').val();
                
                if( titulo==null || titulo=='')
                {
                    $('#btnEditar').remove();
                    $('#btnGuardar').remove();
                    $('.titulo1').append('<h6 class="TituloVacio" style="color:red;" > El titulo no puede ir vacio </h6>');
                            
                            $('#AñoPelicula').attr('value','');
                            $('#Sinopsis').text('');
                            $('#categoria1').text('');
                            $('#txtTrailer1').attr('value','');
                            $('#txtPelicula1').attr('value','');
                     num=1;


                }
                else{
                    let nombre1=titulo;
                    $('.PeliVacia').remove();
                    $('.TituloVacio').remove();
                    let valorpeli=$('#NombrePelicula').val();
                    $.get("/PaginaPeliculas/equipo4/PanelAdmin/convertir.php?Titulopeli="+valorpeli,
                        function (data) {

                            if(data=='No existe ninguna pelicula con este titulo'){
                                $('.titulo1').append('<h6 class="PeliVacia" style="color:red;" >NO SE ENCONTRO NINGUNA PELICULA CON ESE NOMBRE </h6>');
                            }
                            else{
                                let datospeli=data;
                                var coma = '&&&&';
                                function dividirCadena(string1,separador) {
                                    var arraynuevo = string1.split(separador);
                                    return arraynuevo;
                                }

                               let arreglo2 = dividirCadena(datospeli,coma);
                               console.log(arreglo2);
                               $('#Opcion1').remove();
                               $('#AñoPelicula').attr('value',arreglo2[1] );
                               
                               $('#Sinopsis').text(arreglo2[2]);
                               $('#categoria1').text(arreglo2[3]);
                               $('#txtTrailer1').attr('value',arreglo2[5] );
                               $('#txtPelicula1').attr('value',arreglo2[6] );
                               $('.titulo1').append('<input class="" type="text" id="IDPeli" name="txtIDPeli">');
                               $('#IDPeli').hide();
                               $('#IDPeli').attr('value',arreglo2[7]);
                               $('#btnEditar').remove();
                               $('.titulo1').append(' <button  id="btnEditar" type="button" class="btn btn-primary"> <?xml version="1.0" ?><svg baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M21.561,5.318l-2.879-2.879C18.389,2.146,18.005,2,17.621,2c-0.385,0-0.768,0.146-1.061,0.439L13,6H4C3.448,6,3,6.447,3,7  v13c0,0.553,0.448,1,1,1h13c0.552,0,1-0.447,1-1v-9l3.561-3.561C21.854,7.146,22,6.762,22,6.378S21.854,5.611,21.561,5.318z   M11.5,14.672L9.328,12.5l6.293-6.293l2.172,2.172L11.5,14.672z M8.939,13.333l1.756,1.728L9,15L8.939,13.333z M16,19H5V8h6  l-3.18,3.18c-0.293,0.293-0.478,0.812-0.629,1.289C7.031,12.969,7,13.525,7,13.939V17h3.061c0.414,0,1.108-0.1,1.571-0.29  c0.464-0.19,0.896-0.347,1.188-0.64L16,13V19z M18.5,7.672L16.328,5.5l1.293-1.293l2.171,2.172L18.5,7.672z"/></svg></button>');
                               $('#Accion').attr('disabled', true);
                               $('#btnEditar').click(function (e) { 
                                e.preventDefault();
                                // aqui todavia hay datos
                                $('.Tituloinvalido').remove();
                                if($('#NombrePelicula').val() != nombre1){
                                    $('.titulo1').append('<h6 class="Tituloinvalido" style="color:red;" > El titulo no coincide </h6>');
                                }
                                else{
                                    $('.Tituloinvalido').remove();
                                    $('#Accion').attr('disabled', true);
                                
                                $('.TituloVacio').remove();
                                if($('#NombrePelicula').val()=='')
                                {
                                    $('.titulo1').append('<h6 class="TituloVacio" style="color:red;" > El titulo no puede ir vacio </h6>');
                                }
                                else{
                                    
                                    $('.hideinp').attr("disabled", false);
                                $('#NombrePelicula').attr("disabled", true);
                                $('#btnBuscar').hide();
                                $('#btnEditar').hide();
                                $('#btnGuardar').remove();
                                $('.titulo1').append(' <button  id="btnGuardar" type="button" class="btn btn-primary"> <?xml version="1.0" ?> <?xml version="1.0" ?><svg height="18px" version="1.1" viewBox="0 0 18 18" width="18px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-255.000000, -381.000000)"><g id="save" transform="translate(255.000000, 381.000000)"><path d="M14,0 L2,0 C0.9,0 0,0.9 0,2 L0,16 C0,17.1 0.9,18 2,18 L16,18 C17.1,18 18,17.1 18,16 L18,4 L14,0 L14,0 Z M9,16 C7.3,16 6,14.7 6,13 C6,11.3 7.3,10 9,10 C10.7,10 12,11.3 12,13 C12,14.7 10.7,16 9,16 L9,16 Z M12,6 L2,6 L2,2 L12,2 L12,6 L12,6 Z" id="Shape"/></g></g></g></svg></button>');
                                console.log($('#NombrePelicula').val());
                                let bandera=0;
                                $('#btnGuardar').click(function (e) { 
                                    e.preventDefault();
                                    $('.hideinp').attr("disabled", true);
                                    $('#btnEditar').show();
                                    $('#btnGuardar').remove();
                                    
                                console.log($('#AñoPelicula').val());
                                console.log($('#Sinopsis').val());
                                console.log($('#categoria1').val());
                                console.log($('#txtTrailer1').val());
                                console.log($('#txtPelicula1').val());
                                console.log($('#IDPeli').val());

                                let idpeli1=$('#IDPeli').val();
                                let nombrepeli1=$('#NombrePelicula').val();
                                let añopeli1=$('#AñoPelicula').val();
                                let sinopsispeli1=$('#Sinopsis').val();
                                let caregoriapeli1=$('#categoria1').val();
                                let trailerpeli1=$('#txtTrailer1').val();
                                let enlacepeli1=$('#txtPelicula1').val();
                                console.log(caregoriapeli1);
                               

                                $('#btnMandar1').remove();
                                $('.btn1').append('<button type="button" class="btn btn-danger" id="btnMandar1">Enviar</button>');
                                $('#btnMandar1').click(function (e) { 
                                    $('.Titulofinal').remove()
                                    $('.Titulofinal2').remove()
                                    $.post("/PaginaPeliculas/equipo4/PanelAdmin/ModificarPelis.php?txtIDPeli="+idpeli1+"&NombrePeli="+nombrepeli1+"&txtAño=" + añopeli1 + "&txtSinopsis=" +sinopsispeli1 +"&txtCategoria=" + caregoriapeli1 +"&txtTrailer=" + trailerpeli1 +"&txtPelicula=" +enlacepeli1, data,
                                    function (data) {
                                        console.log(data);
                                        if(data=="LA INFORMACION SE MODIFICO CORRECTAMENTE")
                                        {
                                            $('.titulo1').append('<h6 class="Titulofinal" style="color:yellow;" > LA INFORMACION SE MODIFICO CORRECTAMENTE </h6>');
                                            setTimeout(function(){
                                                location.reload();
                                             }, 2000);

                                        }
                                        else
                                        {

                                            $('.titulo1').append('<h6 class="Titulofinal2" style="color:red;" > OCURRIO UN ERROR AL MODIFICAR LA INFORMACION </h6>');
                                            setTimeout(function(){
                                                location.reload();
                                             }, 2000);


                                        }
                                    },
                                    
                                );
                                });
                      
                                });
                                
                                }

                                }
                                
                                
                                
                               });
                            }
                        }
                    );
                     num=0;
                }
                
                
            });
           
        }
        if(valor=='opcion3'){
            $('#NombrePelicula').val('');
            $('#NombrePelicula').attr("disabled", false);
            $('#Frmglobal').attr("action", "EliminarPelis.php");
            $('#btnEditar').remove();
            $('#btnGuardar').remove();
            $('#btnBuscar').show();
            $('#AñoPelicula').attr('value','');
                            $('#Sinopsis').text('');
                            $('#categoria1').text('');
                            $('#txtTrailer1').attr('value','');
                            $('#txtPelicula1').attr('value','');
            console.log('si jala el delete');
            $('.hideinp').hide();
            $('#btnEnviar').hide();
            $('#NombrePelicula').attr("disabled", false);
            $('#btnBuscar').click(function (e) { 

                $('#IDPeli').remove();
                $('#btnEditar').remove();
                $('#btnGuardar').remove();
                e.preventDefault();
                $('.TituloVacio').remove();
                let titulo=$('#NombrePelicula').val();
                if( titulo==null || titulo=='')
                {
                
                    $('.titulo1').append('<h6 class="TituloVacio" style="color:red;" > El titulo no puede ir vacio </h6>');
                     num=1;
                }
                else{
                    $('#Accion').attr('disabled', true);
                    let valorpeli=$('#NombrePelicula').val();
                    $('.PeliVacia').remove();
                    $.get("/PaginaPeliculas/equipo4/PanelAdmin/convertir.php?Titulopeli="+valorpeli,
                        function (data) {
                            
                            if(data=='No existe ninguna pelicula con este titulo'){
                                $('.titulo1').append('<h6 class="PeliVacia" style="color:red;" >NO SE ENCONTRO NINGUNA PELICULA CON ESE NOMBRE </h6>');
                            }
                            else{
                                let datospeli=data;
                                var coma = '&&&&';
                                function dividirCadena(string1,separador) {
                                    var arraynuevo = string1.split(separador);
                                    return arraynuevo;
                                    
                                }
                               let arreglo2 = dividirCadena(datospeli,coma);
                               $('#tarj1').remove();
                               $('.btn1').append(' <div id=tarj1>   <div class="card-columns"><div class="card Tarjeta"><img id=img1 src="" class="card-img-top" alt="..."> <h1 id="Tituloelim" class="card-title"><strong></strong></h1> <h1 id="Añoelim" class="card-title"><strong></strong></h1></div></div></div>');
                               $('#img1').attr("src", '/PaginaPeliculas/equipo4/PanelAdmin/imagenes/'+arreglo2[4]);
                               $('#Tituloelim').attr('value', valorpeli);
                               let id2=arreglo2[7];
                               $('#Añoelim').attr('value',arreglo2[1] );
                               $('#btnEliminar').remove();
                               $('.btn1').append('<button  id="btnEliminar" type="button" class="btn btn-danger">Eliminar <svg enable-background="new 0 0 32 32" id="Editable-line" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="  M25,10H7v17c0,1.105,0.895,2,2,2h14c1.105,0,2-0.895,2-2V10z" fill="none" id="XMLID_129_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><path d="  M20,7h-8V5c0-1.105,0.895-2,2-2h4c1.105,0,2,0.895,2,2V7z" fill="none" id="XMLID_145_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><path d="  M28,10H4V8c0-0.552,0.448-1,1-1h22c0.552,0,1,0.448,1,1V10z" fill="none" id="XMLID_146_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><line fill="none" id="XMLID_148_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="16" x2="16" y1="15" y2="24"/><line fill="none" id="XMLID_147_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="12" x2="12" y1="15" y2="24"/><line fill="none" id="XMLID_149_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="20" x2="20" y1="15" y2="24"/></svg> </button>');
                               $('#btnEliminar').click(function (e) { 
                                $('.Respuestanula').remove();
                                e.preventDefault();
                                let confirm=prompt('esta seguro que desea elminarla?')
                               if(confirm=='si'){
                                $('.Titulofinal').remove()
                                    $('.Titulofinal2').remove()
                                $.get("/PaginaPeliculas/equipo4/PanelAdmin/eliminarpelis.php?ID_Peli=" + id2, data,
                                    function (data) {
                                        console.log(data);
                                        if(data=="LA INFORMACION SE ELIMINO CORRECTAMENTE")
                                        {
                                            $('.titulo1').append('<h6 class="Titulofinal" style="color:yellow;" > LA INFORMACION SE ELIMINO CORRECTAMENTE </h6>');
                                            setTimeout(function(){
                                                location.reload();
                                             }, 2000);

                                        }
                                        else
                                        {
                                            $('.titulo1').append('<h6 class="Titulofinal2" style="color:red;" > OCURRIO UN ERROR AL ELIMINAR LA INFORMACION </h6>');
                                            setTimeout(function(){
                                                location.reload();
                                             }, 2000);


                                        }
                                        
                                    },
                                    
                                );
                                
                               }
                               else{
                                $('.btn1').append('<h6 class="Respuestanula" style="color:red;" > NO SE CONFIRMO EL BORRADO </h6>');
                               }
                                
                               });

                             }
                            
                            





                        },
                       
                    );
                    

                }




                
            });


            
        }
        else{
            $('.hideinp').show();
            
            
        }
       
       
        
    });
   
    
});