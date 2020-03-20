jQuery(document).ready(function ($) {

    function showMessage(el, text) {
        el.show();
        el.html(text)
        setTimeout(function () {
            el.hide(1000);
        }, 3000)
    }

    $('#select-user-role').selectmenu({
        change: function (event, ui) {
            let value = ui.item.value;
            $('#add_user select option[value=' + value + ']').prop('selected', true);
        }
    });

    $('#add_user input[type=submit]').on('click', function (e) {
        e.preventDefault();
        let data = $('#add_user').serialize();

        if ($('#add_user input[type=text]').val() != '') {
            $.post('/test-wow/user/add', data)
                .success(function (data) {
                    $('#all_users').html(data);
                    $('#add_user input[type=text]').val('');
                    showMessage($('#add_user .ajax-resp p'), 'Юзер добавлен')
                })
                .error(function (data) {
                    console.log(data)
                })
        } else {
            showMessage($('#add_user .ajax-resp p'), 'Заполните имя юзера')
        }
    })

    $('#add_role input[type=submit]').on('click', function (e) {
        e.preventDefault();
        let data = $('#add_role').serialize();

        if ($('#add_role input[type=text]').val() != '') {
            $.post('/test-wow/role/add', data)
                .success(function (data) {
                    let select = $('#select-user-role');
                    select.html(data);
                    select.prepend('<option disabled="" selected="">Роль юзера</option>');
                    select.selectmenu('refresh');
                    $('#add_role input[type=text]').val('');
                    showMessage($('#add_role .ajax-resp p'), 'Роль добавлена')
                })
                .error(function (data) {
                    console.log(data)
                })
        } else {
            showMessage($('#add_role .ajax-resp p'), 'Заполните название роли')
        }
    })
});