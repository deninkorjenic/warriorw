$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function openEducationModal(modal, video_url)
{
    $(modal + " iframe").attr('src', video_url);
    $(modal).modal({
        complete: function() { $(modal + " iframe").attr('src', '') } // Callback for Modal close
    });
    $(modal).modal("open");
}

function updateTaskStatus()
{
    var form = $("form.update-task");
    var task_ids = [];
    var week_id = $('.week-id').data('id');

    $.each(form.find('.task-checkbox'), function(key, value) {
        if($(value).prop("checked")) {
            task_ids.push($(value).data('id'));
        }
    });
    if(task_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {'task_ids': task_ids, 'week_id': week_id},
        })
    }
}
function updateTrainingStatus()
{
    var form = $("form.update-training");
    var training_ids = [];
    var week_id = $('.week-id').data('id');

    $.each(form.find('.training-checkbox'), function(key, value) {
        if($(value).prop("checked")) {
            training_ids.push($(value).data('id'));
        }
    });
    if(training_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {'training_ids': training_ids, 'week_id': week_id},
        })
    }
}
function updateEducationStatus()
{
    var form = $("form.update-education");
    var education_ids = [];
    var week_id = $('.week-id').data('id');

    $.each(form.find('.education-checkbox'), function(key, value) {
        if($(value).prop("checked")) {
            education_ids.push($(value).data('id'));
        }
    });
    if(education_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {'education_ids': education_ids, 'week_id': week_id},
        })
    }
}

function updateQuizStatus()
{
    if($(".quiz-completed").length == 0) {
        var quizes = [];

        var week_id = $(".update-quiz-url").data('week-id');
        
        $(".quiz").each(function(key, value) {
            
            var quiz_id = $(this).data('id');
            var quiz_answer = $(this).find('select[name="quiz-answer"]').val();

            var quiz = {
                'id': quiz_id,
                'answer': quiz_answer,
            };

            quizes.push(quiz);
        });

        $.ajax({
            'url': $(".update-quiz-url").data('url'),
            'method': 'post',
            'dataType': 'json',
            'data': {'quizes': quizes, 'week_id': week_id},
            success: function(response) {
                if(typeof response['success'] != 'undefined') {
                    window.location.replace(response['success']);
                } else {
                    var error = "<span class='answer-error' style='color:red;'>" + response['error']['message'] + "</span>";
                    $(".answer-error").remove();
                    $(error).insertAfter("select[name='quiz-answer'][id='answer-" + response['error']['id'] + "'");
                }
            }
        });
    }
}

/**
 * Method used to get user's notifications
 */
function getUserNotifications()
{
    $.ajax({
        url: "notifications",
        dataType: "json",
        method: "GET",
        success: function(response)
        {
            if(response.length > 0) {
                for(i = 0; i < response.length; i++) {
                    if(response[i].type == "App\\Notifications\\NewWeekStarted") {
                        if(response[i].data.message != "undefined") {
                            var toast = "<span data-id='" + response[i].id + "'>" + response[i].data.message + "</span><i class='material-icons toast-close'>close</i>"
                            Materialize.toast(toast);
                        }
                    }
                }
            }
        }
    })
}
/**
 * Method used to close notification toast
 */
function closeNotification(notification)
{
    var toast = $(notification).children("span");
    var id = toast.data("id");
    $.ajax({
        url: "notification/" + id,
        method: "GET",
    })
    $(notification).fadeOut(function(){
        $(notification).remove();
    });
}

// Generic delete button
// Below is how an example delete button should look like
// <a href="#" id="tasks" data-id="{{ $task->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>

$('.js-delete').on('click', function(e) {
    e.preventDefault();

    var result =  confirm('Are you sure you want to delete this item?');
    
    var token = $(this).data('token');

    var url = $(this).data('url');

    var redirect_url = $(this).data('redirect-url');

    if (result) {
        $.ajax({
            'url': url,
            'type': 'DELETE',
            'data': {_method: 'delete', _token: token},
            'success': function () {
                window.location.replace(redirect_url);
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
    });

    // Other not listed screening-test
    $("#q13").change(function() {
        var value = $(this).val();
        if($.inArray('other not listed', value) > -1) {
            $(".q13-other").removeClass('hidden');
        } else {
            $(".q13-other").addClass('hidden');
        }
    });

    // Used to sort program weeks in order they are selected
    var program_related_weeks = [];

    $(".program-related-weeks").change(function() {
        if($(this).prop("checked")) {
            program_related_weeks.push($(this).val());
        } else {
            if($.inArray($(this).val(), program_related_weeks) > -1) {
                program_related_weeks.splice( program_related_weeks.indexOf( $(this).val() ), 1);
            }
        }
        $("input[name='related_w']").val(program_related_weeks.join(', '));
    });

    /**
     * Code used to open/close education modal
     */
    $(".edu-modal-trigger").click(function(event) {
        event.preventDefault();

        var modal = $(this).data("modal-holder");
        var video_url = $(this).attr('href');

        openEducationModal(modal, video_url);
    });


    getUserNotifications();
    $(document).on("click", "#toast-container .toast", function() {
        closeNotification(this);
    })
})
