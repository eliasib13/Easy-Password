
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

$('.remove-register').click(function() {
    $('.ui.modal.removing-register').attr('reg-id', $(this).attr('item-id'));
    $('.ui.modal.removing-register').modal('show');
});

$('.remove-register-cancel').click(function() {
    $('.ui.modal.removing-register').attr('reg-id', '');
    return true;
});

$('.remove-register-confirm').click(function() {
    var id = $('.ui.modal.removing-register').attr('reg-id');
    $('.ui.modal.removing-register').attr('reg-id', '');

    $.ajax({
        method: 'DELETE',
        data: {
            id: id
        },
        url: 'api/register/delete',
        success: function (data) {
            if (data.status == 'OK') {
                $('.ui.modal.removing-register').modal('hide');
                $('.ui.modal.updated-register').modal('show');

                setTimeout(function() {
                    location.reload();
                }, 1300);
            }
        }
    });
});

