// Data Picker Initialization
// $('#date').datetimepicker({
//     format: 'yyyy-mm-dd',
//     weekStart: 1,
//     todayBtn:  true,
//     autoclose: true,
//     todayHighlight: true,
//     startView: 2,
//     minView: 2,
//     forceParse: 0
// });

$( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
} );

$(document).ready(function() {
    $('#summernote').summernote(
        {
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        }
    );
});

$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
});