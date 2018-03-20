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
      autoWidth : false,

      columns: [
        {
          width: "10px",
        },
        {
          width:"10px"
        },
        {
          width: "10px",
        },
        {
          width:"10px"
        },
        {
          width: "10px",
        },
        {
          width:"10px"
        },
        {
          width: "10px",
        },
        {
          width:"10px"
        },
        {
          width: "10px",
        },
        {
          width:"10px"
        },
        {
          width: "10px",
        },
        {
          width:"10px"
        },
      ],
      // autoWidth: false
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