//== Class definition

var DatatableHtmlTableDemo = function() {
  //== Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#courseSearch'),
      },
      columns: [
        {
          field: 'Deposit Paid',
          type: 'number',
        },
        {
          field: 'Order Date',
          type: 'date',
          format: 'YYYY-MM-DD',
        },
      ],
    });
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();


// var handleNextCourseClick = function() {


//   $('#nextCourse').click(function() {
//   alert( "Handler for .click() called." );
// });

// }();

// function test(id){

//  alert(id);

// }

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});