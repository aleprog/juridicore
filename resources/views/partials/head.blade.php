<meta charset="utf-8">
<title>
    {{ trans('global.global_title') }}
</title>

<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<link href="{{ url('js/jquery/jqueryuitime.css') }}" rel="stylesheet" type="text/css">

<link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/plugins/notifications/pnotify.custom.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('adminlte/plugins/datatables/jquery.dataTables2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('adminlte/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('adminlte/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css">


<link href="{{ url('adminlte/plugins/datatables/select.dataTables.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('adminlte/plugins/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ url('adminlte/plugins/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('adminlte/plugins/datatables/colReorder.dataTables.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ url('web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css">

<style>


    p {
        font-family: Arial, Helvetica, sans-serif!important;
    }
    .dot {
        height: 10px;
        width: 10px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }
   /* .dataTables_wrapper .dataTables_length {

         float: none !important
            ;}*/
    .dataTables_wrapper .dataTables_length {

 margin-right: 25px              ;}
   .form-control {

       height: 24px!important;
       padding: 0px 5px 0px 5px!important;

   }
   .select2-container--default.select2-container--disabled .select2-selection--single {
       background-color: #f7f7f7!important;
   }
   .form-control-t {

       height: 40px!important;
       width: 100%;

   }
    .panel-default>.panel-heading {
        color: #fff;
        background-color: #5fa9d4;
        border-color: #ddd;
    }

    .timeline-footer {
        padding: 2px!important;
    }

    .select2-container--default .select2-selection--single,.select2-selection .select2-selection--single {
        border:1px solid #d2d6de;
        border-radius: 10px;
        padding:6px 12px;
        height:24px;
        
    }
   .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 18px;!important ;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow b {

       margin-top: -4px!important;
   }
    input {
        -moz-border-radius: 10px!important;
        -webkit-border-radius: 10px!important;
        border-radius: 10px!important;
        padding: 0 4px 0 4px!important;
    }
    .form-group{
        margin-bottom: 2px!important;
    }
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-left: 2px!important;
        padding-right: 5px!important;
        padding-top: 0px!important;
        padding-bottom: 0px!important;

    }
   .main-sidebar, .left-side {
        position: fixed!important;
    }
    .sweet-alert h2 {
        font-size: 20px!important;
    }
    .sweet-alert {
        width: 400px!important;
        left: 55%!important;
    }
    .select2[disabled], .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #f7f7f7!important;
    }
    .select2-selection--disabled {
        background-color: #f7f7f7!important;
        border: 0px !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #5fa9d4!important;

    }
    .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #dbecf566 !important;
}
table.dataTable tbody tr {
    background-color: #ffffff00!important;
}
.tablacorta{
    font-size:12px!important;
    line-height: normal!important;
}
</style>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
    z-index:100!important;
}
.tooltip{
    opacity:1!important;
}
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #908484fa;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.main-header .sidebar-toggle::before {
    content: none;
}
</style>

<style media="print">
    /*@import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");*/
    body{
        width:792px !important;
        margin: 0px;
        padding: 0px;
        line-height: 1.1 !important;
    }
</style>
<style type="text/css">
    @media print {
        @page { margin: 0;  }
        body { margin: 1.6cm; }
    }
</style>

@yield('css')