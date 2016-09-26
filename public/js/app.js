
if ($('.ui.error.message').length) {
    $('input[type!=submit]').transition('shake');
}

$('.ui.accordion').accordion();

$('.update-register').click(function() {
   var id = $(this).attr('item-id'),
       name = $('#name-' +  id),
       password = $('#value-' +  id),
       title = $('#title-' +  id);

    $.ajax({
        method: 'POST',
        data: {
            id: id,
            name: name.val(),
            password: password.val()
        },
        url: 'api/register/update',
        success: function (data) {
            if (data.status == 'OK') {
                title.text(name.val());

                $('.ui.modal.updated-register').modal('show');

                setTimeout(function() {
                    $('.ui.modal.updated-register').modal('hide');
                }, 1600);
            }
        }
    });
});