function validateForm() {
    document.getElementById('status').innerHTML = "Sending...";
    formData = {
    'name'     : $('input[name=name]').val(),
    'email'    : $('input[name=email]').val(),
    'message'  : $('textarea[name=message]').val()
    };


    $.ajax({
    url : "ressources/php/mail.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {

    $('#status').text(data.message);
    if (data.code) //If mail was sent successfully, reset the form.
    $('#contact-form').closest('form').find("input[type=text], input[type=email], textarea").val("");
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
    $('#status').text(jqXHR);
    }
    });
}

