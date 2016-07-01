
function getName (str){
    if (str.lastIndexOf('\\')){
        var i = str.lastIndexOf('\\')+1;
    }
    else{
        var i = str.lastIndexOf('/')+1;
    }						
    var filename = str.slice(i);			
    var uploaded = document.getElementById("fileformlabel");
    uploaded.innerHTML = filename;
}
$(function() {
$('.selectbutton').on('click', function() {
    $('input[name="sel_file"]').click();
}); 
});
function call_delete() {
    var msg   = jQuery('#delete').serialize();
    jQuery.ajax({
        type: 'POST',
        url: 'scripts/delete.php',
        data: msg,
        success: function(data) {
            $('.success').text(data).fadeIn();
            $('.delim').fadeIn();
        },
        error:  function(xhr, str){
            $('.success').text('Возникла ошибка: ' + xhr.responseCode).fadeIn();
            $('.delim').fadeIn();
        }
    });
}

function call_add() {
    var form = document.forms.add;

    var formData = new FormData(form);  

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/add.php");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if(xhr.status == 200) {
                data = xhr.responseText;
                 $('.success').text(data).fadeIn();
                 $('.delim').fadeIn();
            } 
        }
    };

    xhr.send(formData);
}
