// Generic delete button
// Below is how an example delete button should look like
// <a href="#" id="tasks" data-id="{{ $task->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>

$('.js-delete').on('click', function(e) {
    e.preventDefault();

    var result =  confirm('Are you sure you want to delete this Task?');

    var name = this.id;
    var id = $(this).data('id');
    var token = $(this).data('token');
    // TODO: remove this after vhost is set up
    var url = '/warriorw/public/' + name + '/' + id;
    //var url = name + '/' + id;

    if (result) {
        $.ajax({
            'url': url,
            'type': 'DELETE',
            'data': {_method: 'delete', _token: token},
            'success': function () {
                window.location.replace(name);
            }
        });
    }
});

// Hide button for errors and notifications
$('.js-close').on('click', function() {
    $(this).closest('.js-hide').slideUp(400);
})

$(document).ready(function() {
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 99 // Creates a dropdown of 15 years to control year
    });
})
