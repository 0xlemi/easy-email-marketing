window.$ = window.jQuery = require('jquery');
var jQueryBridget = require('jquery-bridget');
var bootstrap = require('bootstrap-sass');
var bootstrapSwitch = require('bootstrap-switch');
var sweetAlert = require('sweetalert');
var Vue = require('vue');
var dt      = require( 'datatables.net-bs' )( window, $ );
var Masonry = require('masonry-layout');
var imagesLoaded = require('imagesloaded');
var summernote = require('summernote');

// Make a jQuery plugin
jQueryBridget( 'masonry', Masonry, $ );
imagesLoaded.makeJQueryPlugin( $ );

/*
 * VueJs code
 *
 *
 */
 new Vue({
  el: 'body',
  data: {
    is_disabled: false,
  },
  methods:{
    loading_button: function(){
        this.is_disabled = true;
    },
  }
});



/*
 * Anableing elements
 */
 // bootstrap-switch for checkboxes
$("[name='is_suscribed']").bootstrapSwitch();
$("[name='has_responded']").bootstrapSwitch();


/*
 * Summernote editor for email edit
 *
 *
 */
$('#summernote').summernote({
  height: 600,
  minHeight: null,
  maxHeight:null,
});

/*
 * Click on Client datatable functionality
 */
var clients_table = $('#clients_table').dataTable( {
  "ajax": "clients/getAll"
} );
$('#clients_table tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('table_active') ) {
        $(this).removeClass('table_active');
    }
    else {
        clients_table.$('tr.table_active').removeClass('table_active');
        $(this).addClass('table_active');
    }
    var id = clients_table.fnGetData(this)[0];
    window.location.href = "clients/"+id;
});

$('#client_transaction_table').dataTable();

/*
 * Masonry Grid generator
 */
var $grid = $('.grid').imagesLoaded( function() {
  $grid.masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer'
  }); 
});

/*
Taken from: https://gist.github.com/soufianeEL/3f8483f0f3dc9e3ec5d9
Modified by Ferri Sutanto
- use promise for verifyConfirm
Examples : 
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}"> 
- Or, request confirmation in the process -
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
*/

(function(window, $, undefined) {

    var Laravel = {
        initialize: function() {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            e.preventDefault()

            var link = $(this)
            var httpMethod = link.data('method').toUpperCase()
            var form

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                return false
            }

            Laravel
                .verifyConfirm(link)
                .done(function () {
                    form = Laravel.createForm(link)
                    form.submit()
                })
        },

        verifyConfirm: function(link) {
            var confirm = new $.Deferred()
            swal({   
                title: "Are you sure?",   
                text: "You will not be able to recover this!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                cancelButtonText: "No, cancel!",   
                closeOnConfirm: false
            }, 
            function(){
                confirm.resolve(link)
            })

            return confirm.promise()
        },

        createForm: function(link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    Laravel.initialize();

})(window, jQuery);

