$(document).ready(function() {
        var iCnt = opc;

// Crear un elemento div añadiendo estilos CSS
        var container = $(document.createElement('div'));

        $('#btAdd').click(function() {
            if (iCnt <= 19) {

                iCnt = iCnt + 1;
				 
                // Añadir caja de texto.
                $(container).append('<table border=0 cellpadding=0 cellspacing=5 id=tb' + iCnt + '><br/><tr> <th>Pregunta ' +  iCnt +  '</th><th>Opciones</th></tr><tr><td rowspan=4 id=pregunta><textarea class=input ROWS=5 name=pregunta[] required/></TEXTAREA></td><td><input type=text class=input id=opcion name=opcion[] placeholder="Opcion 1" required/></td></tr><tr><td><input type=text class=input id=opcion name=opcion[] placeholder="Opcion 2" required/></td></tr><tr><td><input type=text class=input id=opcion name=opcion[] placeholder="Opcion 3" required/></td></tr><tr><td><input type=text class=input id=opcion name=opcion[] placeholder="Opcion 4" required/></td></tr></table>');

                /*if (iCnt == 1) {   

					var divSubmit = $(document.createElement('div'));
					$(divSubmit).append('<input type=button class="bt" onclick="GetTextValue()"' + 'id=btSubmit value=Enviar />');

				}*/

				$('#main').after(container); 
            }
            else {      //se establece un limite para añadir elementos, 20 es el limite
                
                $(container).append('<label id=lb >Limite Alcanzado</label>'); 
                $('#btAdd').attr('class', 'bt-disable'); 
                $('#btAdd').attr('disabled', 'disabled');

            }
        });

        $('#btRemove').click(function() {   // Elimina un elemento por click
            if (iCnt != 1) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; $(container).find('br').remove();}
			
			if (iCnt == 19) { $('#btAdd').removeAttr('disabled'); $('#lb').remove();$('#btAdd').attr('class', 'bt'); }
			
            if (iCnt == 1) { $(container).empty(); 
        
                $(container).remove(); 
                //$('#btSubmit').remove(); 
                $('#btAdd').removeAttr('disabled'); 
                $('#btAdd').attr('class', 'bt') 

            }
        });

        $('#btRemoveAll').click(function() {    // Elimina todos los elementos del contenedor
			
			for (i = 2; i <= iCnt; i++) { 
				$('#tb' + i).remove(); 
			}
			
            $(container).empty(); 
            $(container).remove(); 
//            $('#btSubmit').remove();
			iCnt = 1; 
            $('#btAdd').removeAttr('disabled'); 
            $('#btAdd').attr('class', 'bt');

        });
    });

    // Obtiene los valores de los textbox al dar click en el boton "Enviar"
  /*  var divValue, values = '';

    function GetTextValue() {

        $(divValue).empty(); 
        $(divValue).remove(); values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
        $('body').append(divValue);

    }*/