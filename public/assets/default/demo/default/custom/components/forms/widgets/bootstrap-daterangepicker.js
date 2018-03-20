//== Class definition

var BootstrapDaterangepicker = function () {
    
    //== Private functions
    var demos = function () {
        // predefined ranges
        var start = moment().subtract(29, 'days');
        var end = moment();

        $('#m_daterangepicker_6').daterangepicker({
            buttonClasses: 'm-btn btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                  format: 'DD MMM YYYY'
            },
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#m_daterangepicker_6 .form-control').val( start.format('DD/MM/YYYY') + ' / ' + end.format('DD/MM/YYYY'));
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    BootstrapDaterangepicker.init();
});