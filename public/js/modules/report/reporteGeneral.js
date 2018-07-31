$(document).ready(function(){
    $(function () {
       // $("#Modalagregar").hide();
        $("#output").empty();
    });
});


$("#btnGuardar").on('click', function () {
    $("#output").empty();
    var fechai=$("#fechai").val();
    var fechaf=$("#fechaf").val();

    var objApiRest = new AJAXRest('/reporte/reporteGeneralDatos', {fechai:fechai,fechaf:fechaf}, 'post');

    objApiRest.extractDataAjax(function (_resultContent) {
        if (_resultContent.status == 200) {
            $("#output").pivotUI( _resultContent.message,
                {
                    derivedAttributes: {
                    },
                    rows: ["tipo_solicitud","estado"],
                    cols: ["region","tipo_linea","operadora"],
                });
        } else {
            $(".output").empty();
            $("#Modalagregar").hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            alertToast(_resultContent.message, 3500);
        }
    });
});

function EditChanges(id,r)
{
    var objApiRest = new AJAXRest('/reporte/prueba2', {id:id,r:r}, 'post');
    objApiRest.extractDataAjax(function (_resultContent) {
        if (_resultContent.status == 200) {
            $("#output2").pivotUI( _resultContent.message,
                {
                    derivedAttributes: {
                    },
                    rows: ["fecha_ing","identificacion","estado","nombre","provincia","n_solicitud","celular","operadora","tipo_solicitud","tipo_linea"]
                });

        } else {
            $("#Modalagregar").hide();
            $(".output2").empty();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            alertToast(_resultContent.message, 3500);

        }
    });
}
