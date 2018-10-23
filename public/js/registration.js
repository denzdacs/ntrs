var body_numbers = [];
var sticker_numbers = [];

$(document).ready(function() {
   $('#drop-sikad').prop('disabled', true).hide(); 
   $('#drop-tricycle').prop('disabled', true).hide(); 
   setTimeout(()=> {
       getSuggestedAssociation($('#register-type').val());
   }, 2000);
});

$('#register-type').on('change', function() {
    let self = this;

    if ($(self).val() == 'Sikad-sikad') {
       $('#drop-sikad').prop('disabled', false).show(); 
       $('#drop-tricycle').prop('disabled', true).hide(); 
       getSuggestedAssociation($(self).val());
    }

    if ($(self).val() == 'Tricycle') {
       $('#drop-tricycle').prop('disabled', false).show(); 
       $('#drop-sikad').prop('disabled', true).hide(); 
       getSuggestedAssociation($(self).val());
    }

    if ($(self).val() == 'Select vehicle type') {
       $('#drop-sikad').prop('disabled', true).hide(); 
       $('#drop-tricycle').prop('disabled', true).hide(); 
    } 
});

function getSuggestedAssociation(type) {
    $.get( "/autosuggest/" + type , ( result ) => {
        sweetAlert("The association " + result.assoc + " has been recommended to you", "You can still choose to pick another association.", "info")
       if (type == 'Sikad-sikad') {
           $('#drop-sikad').prop('value', result.assoc);
       }
       if (type == 'Tricycle') {
           $('#drop-tricycle').prop('value', result.assoc); 
       }
    }).fail((error)=> { console.log(error); });
}

$('#snap').on('click',function() {
    $('#profile_input').trigger('click');
});

$('#profile_input').on('change', function(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("user_image");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
  $('#register-submit').prop('disabled',false);
});

$('#units').on('change keyup', function() {
    $("#bodynumber").empty();
    $("#stickernumber").empty();
    $('#body_number').val('');
    $('#sticker_number').val('');
    body_numbers = [];
    if ($('#units').val() > 0 && $('#units').val() <= 100) {
        $("#bodynumber").append(`
            <div class="bnumber-title">
                <label>Body Number:</label>
            </div>
        `);    
        $("#stickernumber").append(`
            <div class="bnumber-title">
                <label>Sticker Number:</label>
            </div>
        `);    
        for (let i = 0; i < $('#units').val(); i++) {
            $("#bodynumber").append(`
                <input type="text" class="form-custom bnumber" id="bi_${i}" placeholder="Body ${i + 1}" required>
            `);    
            $("#stickernumber").append(`
                <input type="text" class="form-custom snumber" id="si_${i}" placeholder="Sticker ${i + 1}" required>
            `);    
        }
    }

});

$("body").on("keyup", ".bnumber", function(){
    body_numbers = [];
    $('.bnumber').each((index) => {
        if ($('#bi_'+index).val()) {
            body_numbers.push($('#bi_'+index).val());
        }
    });
    $('#body_number').val(body_numbers.toString());
});

$("body").on("keyup", ".snumber", function(){
    sticker_numbers = [];
    $('.snumber').each((index) => {
        if ($('#si_'+index).val()) {
            sticker_numbers.push($('#si_'+index).val());
        }
    });
    $('#sticker_number').val(sticker_numbers.toString());
});

