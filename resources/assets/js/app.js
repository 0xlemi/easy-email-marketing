window.$ = window.jQuery = require('jquery');
var bootstrap = require('bootstrap-sass');
var bootstrapSwitch = require('bootstrap-switch');
var sweetAlert = require('sweetalert');
var vue = require('vue');
var dt      = require( 'datatables.net-bs' )( window, $ );

$("[name='is_suscribed']").bootstrapSwitch();
$("[name='has_responded']").bootstrapSwitch();


$('#table_id').dataTable( {
  "ajax": "clients/getAll"
} );
