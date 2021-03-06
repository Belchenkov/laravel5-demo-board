require('./bootstrap');

$(document).on('click', '.phone-button', function () {
    const button = $(this);
    axios.post(button.data('source')).then(function (response) {
        button.find('.number').html(response.data)
    }).catch(function (error) {
        console.error(error);
    });
});
