//== Class definition

var FormControls = function () {
    //== Private functions
    
    var validateCreateCourseForm = function () {
        $( "#createCourseForm" ).validate({
            // define validation rules
            rules: {
                courseName: {
                    required: true
                },
                courseDuration: {
                    required: true,
                    digits: true
                },
                courseCategory: {
                    required: true
                },
                coursePrerequisites: {
                    required: true,
                },                
                courseDescription: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#errorCreate');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                $('#createCourseForm')[0].submit(); // submit the form
            }
        });       
    }

    return {
        // public functions
        init: function() {
            validateCreateCourseForm(); 
        }
    };
}();


var courseCategoryOptions = function() {

    // var SSLC_Categories = {Option1:{value:'',text:''},option2:{value:'Science',text:'Science'},option3:{value:'Commerce',text:'Commerce'},option4:{value:'Arts',text:'Arts'},
    //         option5:{value:'Diploma',text:'Diploma'}};
    var SSLC_Categories = {Option1:{value:'',text:''},option4:{value:'Higher Secendory',text:'Higher Secendory'},
            option5:{value:'Diploma',text:'Diploma'}};

    var PUC_Categories = {option1:{value:'',text:''},option2:{value:'B.E/BTECH',text:'B.E/B.TECH'},option3:{value:'Medical',text:'Medical'},
                        option4:{value:'Diploma',text:'Diploma'},option5:{value:'Dental',text:'Dental'},Option6:{value:'Ayurveda',text:'Ayurveda'},
                        Option7:{value:'Homeopathy',text:'Homeopathy'},Option8:{value:'Veterinary',text:'Veterinary'},Option9:{value:'Unani',text:'Unani'},
                        Option10:{value:'Siddha',text:'Siddha'},Option11:{value:'Naturopathy &amp; Yogic',text:'Naturopathy &amp; Yogic'},
                        Option12:{value:'Nursing',text:'Nursing'},Option13:{value:'Pharmacy',text:'Pharmacy'},Option14:{value:'Physiotherapy',text:'Physiotherapy'},
                        Option15:{value:'Occupational Therapy',text:'Occupational Therapy'},Option16:{value:'Allied Health',text:'Allied Health'},
                        Option17:{value:'Paramedical',text:'Paramedical'},Option18:{value:'Agricultural',text:'Agricultural'},Option19:{value:'Architecture',text:'Architecture'},
                        Option20:{value:'Aviation',text:'Aviation'},Option21:{value:'Marine',text:'Marine'},Option22:{value:'Management',text:'Management'}
                    };

//onlick SSLC opt
    $('#SSLC').click(function(){

//remove default option first

        $('#courseCategory').empty();

//add SSLC_Categories array as options to courseCategory
        $.each(SSLC_Categories, function (i, item) {

            $('#courseCategory').append($('<option>', { 
                value: item.value,
                text : item.text 
            }));
        });
        var UGOrPG = $('#UGOrPG');
        UGOrPG.addClass('m--hide').show().removeAttr( 'style' );

    });

//onlick PUC option

    $('#PUC').click(function(){

        $('#courseCategory').empty();

//add PUC_Categories array as options to courseCategory
        $.each(PUC_Categories, function (i, item) {

            $('#courseCategory').append($('<option>', { 
                value: item.value,
                text : item.text 
            }));
        });

        var UGOrPG = $('#UGOrPG');
        UGOrPG.removeClass('m--hide').show();
        // mApp.scrollTo(alert, -200);

    });
}();


jQuery(document).ready(function() {    
    FormControls.init();
});