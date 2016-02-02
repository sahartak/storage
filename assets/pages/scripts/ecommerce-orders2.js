var EcommerceOrders = function () {

    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
    }

    var handleOrders = function () {

        var grid = new Datatable();

        grid.init({
            src: $("#datatable_orders"),

            loadingMessage: 'Loading...'

        });

        // handle group actionsubmit button click


    }

    return {

        //main function to initiate the module
        init: function () {

            initPickers();
            handleOrders();
        }

    };

}();

jQuery(document).ready(function() {    
   EcommerceOrders.init();
});