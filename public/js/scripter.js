$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
    //var url = '/' + name + '/' + id;

    if (result) {
        $.ajax({
            'url': url,
            'type': 'DELETE',
            'data': {_method: 'delete', _token: token},
            'success': function () {
                // TODO: This needs to be changed after vhost
                window.location.replace('/warriorw/public/' + name);
                //window.location.replace('/' + name)
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
    $(".food-diary-form").submit(function(event) {
        event.preventDefault();

        // Hidden input field telling us which day we're updating
        var day = $(this).find("[name='day']").val();

        var ate = [];
        $(this).find("input[name='ate[]']").each(function() {
            ate.push($(this).val());
        });

        var drank = [];
        $(this).find("input[name='drank[]']").each(function() {
            drank.push($(this).val());
        });

        // This field is used to etermine if we're updating before or after lunch
        var before_lunch = $(this).find("input[name='before_lunch']").val();

        var token = $(this).find("[name='_token']").val();

        $.ajax({
            'url': window.location.pathame,
            'type': 'post',
            'data': {'_token': token, 'day': day, 'ate': ate, 'drank': drank, 'before_lunch': before_lunch},
        });
    });

    $(".add-answer").click(function() {
        var newAnswer = "<div class='row'><div class='input-field col s12'>";
            newAnswer += "<input type='text' id='answer' name='answer[]' required></input>";
            newAnswer += "<label for='answer'>Answer</label></div></div>";

        $(newAnswer).insertBefore(this);
    })
})
