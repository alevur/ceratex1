// $(document).ready(function () {
//     $('#form_add_user').on('submit', function (event) {
//         event.preventDefault();
//         $.ajax({
//             url: '/AddUser.php',
//             type: 'POST',
//             dataType: 'json',
//             data: {
//                 form_data: $('#form_add_user').serialize()
//             },
//             success: function (data) {
//                 $('#form_add_user').trigger('reset');
//             }
//         });
//     });

$('#btn_save').click(function (e) {
    if ($('#form_add_user')[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
            url: 'AddUser.php',
            type: 'POST',
            data: {
                form_data: $('#form_add_user').serialize(),
                action: 'btn_save'
            },
            success: function (data) {
                $('#form_add_user').trigger('reset');

            }
        })
    }
});
$('#btn_upload').click(function () {
    $.post(
        "/uploadInSheets.php",
        {myActionName: true}
    );
});
