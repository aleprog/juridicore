<script src="{{ url('js/jquery/') }}/jquery2.js"></script>

<script src="{{ url('js/jquery/') }}/jqueryui.js"></script>
<script src="{{ url('js/jquery/') }}/jqueryuitouch.js"></script>





<script src="{{ url('adminlte/plugins/respond/') }}/html5shiv.min.js"></script>
<script src="{{ url('adminlte/plugins/respond/') }}/respond.min.js"></script>

<script src="{{ url('adminlte//plugins/datatables/') }}/jquery.dataTables2.min.js"></script>
<script src="{{ url('adminlte/js') }}/dataTables.buttons.min.js"></script>
<script src="{{ url('adminlte/js') }}/buttons.flash.min.js"></script>
<script src="{{ url('adminlte/js') }}/jszip.min.js"></script>
<script src="{{ url('adminlte/js') }}/pdfmake.min.js"></script>
<script src="{{ url('adminlte/js') }}/vfs_fonts.js"></script>
<script src="{{ url('adminlte/js') }}/buttons.html5.min.js"></script>
<script src="{{ url('adminlte/js') }}/buttons.print.min.js"></script>
<script src="{{ url('adminlte/js') }}/buttons.colVis.min.js"></script>
<script src="{{ url('adminlte/js') }}/dataTables.select.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/dataTables.colReorder.min.js"></script>

<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/notifications/pnotify.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/notifications/sweet_alert.min.js') }}"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script src="{{ url('js/modules/utils.js') }}"></script>
<script src="{{ url('js/modules/Core.js') }}"></script>

<script>
    $.fn.select2.amd.require([
        "select2/utils",
        "select2/dropdown",
        "select2/dropdown/attachContainer",
        "select2/dropdown/search"
    ], function (Utils, DropdownAdapter, AttachContainer, DropdownSearch) {
        var CustomAdapter = Utils.Decorate(
            Utils.Decorate(
                DropdownAdapter,
                DropdownSearch
            ),
            AttachContainer
        );

        $("select").select2({
            width: "100%",
            dropdownAdapter: CustomAdapter
        });

    })

</script>
<script>
    +function (w, d, undefined) {

        var id = new Date().getTime().toString();
        if (w.localStorage.appID === undefined) {
            w.localStorage.appID = id;
            w.onbeforeunload = function () {
                w.localStorage.removeItem('appID'); // Removemos la variable en localStorage
            };
        } else if (w.localStorage.appID !== id) {
            guardarDatos();
        }
    } (window, document);
    function guardarDatos()
    {
        var objApiRest = new AJAXRest('/admin/sessionAudita', {}, 'post');
        objApiRest.extractDataAjax(function (_resultContent) {
            if (_resultContent.status == 200) {
                $("#cerrar").click();
            }

        });
    }
</script>
<script type="text/javascript">
    $('.select2').attr('style','width : 100%');
    $('.treeview .title').attr('style','min-width : 229px');
    $('.treeview-menu').attr('style','min-width : 229px');
    $('.modal').removeAttr('tabindex');
    
</script>
<script type="text/javascript">
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
function soloNumeros6(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 50 && key <= 54)
}
function soloNumeros0_6(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 54)
}
function soloNumeros1_99(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 49 && key <= 54)
}

function agregahora()
{
    var horario_inicio=$("#horario_inicio").val();
    var cant_horas=$("#cant_horas").val();
    if(cant_horas==null || cant_horas=='')
    {
        cant_horas=2;

    }


var fin=(parseInt(horario_inicio.split(":")[0])+parseInt(cant_horas));
if(fin<10)
{
    fin="0"+fin;
}
   // var h=horario_inicio.add(cant_horas*3600,"hours").format('HH:mm');
    var horario_fin=$("#horario_fin").val(fin+":00").change();
    var idhf=$("#idhf").val(fin+":00").change();

}			
    </script>

@yield('javascript')

<script src="{{ url('adminlte/plugins/select2/') }}/select21.full.min.js"></script>