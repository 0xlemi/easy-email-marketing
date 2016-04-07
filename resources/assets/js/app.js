window.$ = window.jQuery = require('jquery');
var bootstrap = require('bootstrap-sass');
var bootstrapSwitch = require('bootstrap-switch');
var sweetAlert = require('sweetalert');

$("[name='is_suscribed']").bootstrapSwitch();
$("[name='has_responded']").bootstrapSwitch();
