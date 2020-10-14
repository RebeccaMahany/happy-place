import './styles/app.css';

var $ = require('jquery');

$(document).ready(function() {
    // When the user submits their desired action, send it over to the backend and display the result of their action.
    $('#room-action').on('submit', function(e) {
        e.preventDefault();
        var action = $('#action').val()
        $.post(
            '/happy-place/ajax/room-action',
            {'action': action}
        ).done(function(data) {
            $('#action-result').text(data.action_result);
        }).fail(function() {
            window.location.replace('/happy-place/error');
        })
    });
});
