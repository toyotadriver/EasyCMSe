$('document').ready(function () {
    $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            let info = JSON.stringify(data);
            console.log(info);
            
            $('#users_container').append($('<div>', {
                class: 'usercard',
                html: info
            }))
        }})
})