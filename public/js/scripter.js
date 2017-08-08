/** 
 * Simple JS router
 **/
const path = window.location.pathname;
// TODO: this is for demo purpose, vhost will be used here
if (path == '/register' || path == '/warriorw/public/register') {
    $(document).ready(function() {
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 99 // Creates a dropdown of 15 years to control year
        });
        $(".button-collapse").sideNav();
    });
    // TODO: this is for demo purpose
} else if (path == '/screening-test' || path == '/warriorw/public/screening-test') {
    $(document).ready(function() {
        $('select').material_select();
        $("#q13").change(function() {
            if ($(this).find('option:selected').length > 5) {
                $(this).parent('.select-wrapper').find('ul').find('li:not(.active)').css('pointer-events', 'none');
            } else {
                $(this).parent('.select-wrapper').find('ul').find('li:not(.active)').css('pointer-events', 'all');
            }
        });
        $('#age_slider').change(function() {
            $('#age').val($('#age_slider').val());
        });
        $('#waist_slider').change(function() {
            $('#waist').val($('#waist_slider').val());
        });
        $('#heart_slider').change(function() {
            $('#heart').val($('#heart_slider').val());
        });
        $('.q3 input[type=checkbox]').change(function() {
            $('.q3 .input-field').toggleClass('hidden');
            // We need to change name of the input button
            $('#q3_a1').attr("name", "q3_a1");
            $()
        });
        $('.q4 input[type=checkbox]').change(function() {
            $('.q4 .input-field').toggleClass('hidden');
        });
        $('.q5 input[type=checkbox]').change(function() {
            $('.q5 .input-field').toggleClass('hidden');
        });
        $('.q6 input[type=checkbox]').change(function() {
            $('.q6 .input-field').toggleClass('hidden');
        });
        $('.q7 input[type=checkbox]').change(function() {
            $('.q7 .input-field').toggleClass('hidden');
        });
        $('.q8 input[type=checkbox]').change(function() {
            $('.q8 .input-field').toggleClass('hidden');
        });
    });
    // TODO: used for demo purpose
} else if (path == '/home' || path == '/' || path == '/warriorw/public/home') {
    var Chart = require('./../../../node_modules/chart.js/dist/Chart.bundle.js');
    $(document).ready(function() {
        var chart = document.getElementById('chart');
        var myChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5", "Week 6", "Week 7", "Week 8", "Week 9", "Week 10", "Week 11", "Week 12", "Week 13", "Week 14", "Week 15"],
                datasets: [{
                    label: 'Point progress',
                    data: [20, 38, 58, 78, 90, 110, 130, 150, 165, 180, 200, 218, 238, 258, 278],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', ],
                    borderColor: ['rgba(255,99,132,1)', ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
} else if (path === '/profile-setup' || path == '/warriorw/public/profile-setup') {
    $(document).ready(function() {
        $('select').material_select();
        $('#country').change(function() {
            var selected = $('#country option:selected').val();
            if (selected == 'US') {
                if ($('.location').hasClass('s6')) {
                    $('.location').removeClass('s6');
                    $('.location').addClass('s4');
                    $('.state').removeClass('hidden');
                }
            } else {
                if ($('.location').hasClass('s4')) {
                    $('.location').removeClass('s4');
                    $('.location').addClass('s6');
                    $('.state').addClass('hidden');
                }
            }
        });
    });
} else if (jQuery.trim(path).substring(0, path.length - 2) == '/week' || jQuery.trim(path).substring(0, path.length - 3) == '/week') {
    $(document).ready(function() {
        $('.modal').modal();
    });
} else if (jQuery.trim(path).substring(0, path.length - 2) == '/quiz' || jQuery.trim(path).substring(0, path.length - 3) == '/quiz') {
    $(document).ready(function() {
        $('select').material_select();
    });
} else if (path == '/archive') {
    $(document).ready(function() {
        $('ul.tabs').tabs();
    });
} else if (path == '/food-diary' || path == '/warrirw/public/food-diary') {
    $(document).rady(function() {
        $(".food-diary-form").submit(function(event) {
            event.preventDefault();
            var day = $(this).children("[name='day']").val();
            console.log(day);
        })
    })
}
$(document).ready(() => {
    $(".button-collapse").sideNav();
})
/**
 * Everuthing above this comment is used from old developer JavaScript
 *
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function openEducationModal(modal, video_url) {
    $(modal + " iframe").attr('src', video_url);
    $(modal).modal({
        complete: function() {
            $(modal + " iframe").attr('src', '')
        } // Callback for Modal close
    });
    $(modal).modal("open");
}

function updateTaskStatus() {
    var form = $("form.update-task");
    var task_ids = [];
    var week_id = $('.week-id').data('id');
    $.each(form.find('.task-checkbox'), function(key, value) {
        if ($(value).prop("checked")) {
            task_ids.push($(value).data('id'));
        }
    });
    if (task_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {
                'task_ids': task_ids,
                'week_id': week_id
            },
        })
    }
}

function updateTrainingStatus() {
    var form = $("form.update-training");
    var training_ids = [];
    var week_id = $('.week-id').data('id');
    $.each(form.find('.training-checkbox'), function(key, value) {
        if ($(value).prop("checked")) {
            training_ids.push($(value).data('id'));
        }
    });
    if (training_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {
                'training_ids': training_ids,
                'week_id': week_id
            },
        })
    }
}

function updateEducationStatus() {
    var form = $("form.update-education");
    var education_ids = [];
    var week_id = $('.week-id').data('id');
    $.each(form.find('.education-checkbox'), function(key, value) {
        if ($(value).prop("checked")) {
            education_ids.push($(value).data('id'));
        }
    });
    if (education_ids.length > 0) {
        $.ajax({
            'url': form.attr('action'),
            'method': 'post',
            'data': {
                'education_ids': education_ids,
                'week_id': week_id
            },
        })
    }
}

function updateQuizStatus() {
    if ($(".quiz-completed").length == 0) {
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
            'data': {
                'quizes': quizes,
                'week_id': week_id
            },
            success: function(response) {
                if (typeof response['success'] != 'undefined') {
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

function openQuestion(question) {
    $('.' + question + ' .input-field').removeClass('hidden');
}

function closeQuestion(question) {
    $('.' + question + ' .input-field').addClass("hidden");
}
/**
 * Method used to open and change question 3-8 hidden fields
 */
function q38() {
    console.log("q38");
    $("#q3, #q4, #q5, #q6, #q7, #q8").each(function() {
        if ($(this).prop('checked')) {
            $(this).val('on');
            /**
             * This is used to change name of the hidden input fields on questions 3-8, else form vaidation wouldn't work
             */
            var selector = $(this).attr("name") + "_a1"; // This will be q3_a1, q4_a2, etc.
            var selector2 = $(this).attr("name") + "_a2";
            // Thos two lines will change hidden answer names so we can validate them
            $("#" + selector).attr("name", selector);
            $("#" + selector2).attr("name", selector2);
            openQuestion($(this).attr("name"));
        } else {
            $(this).val('off');
            var selector = $(this).attr("name") + "_a1"; // This will be q3_a1, q4_a2, etc.
            var selector2 = $(this).attr("name") + "_a2";
            $("#" + selector).attr("name", "");
            $("#" + selector2).attr("name", "");
            closeQuestion($(this).attr("name"));
        }
    });
}
/**
 * Method used to get user's notifications
 */
function getUserNotifications() {
    $.ajax({
        url: "notifications",
        dataType: "json",
        method: "GET",
        success: function(response) {
            if (response.length > 0) {
                for (i = 0; i < response.length; i++) {
                    if (response[i].type == "App\\Notifications\\NewWeekStarted") {
                        if (response[i].data.message != "undefined") {
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
function closeNotification(notification) {
    var toast = $(notification).children("span");
    var id = toast.data("id");
    $.ajax({
        url: "notification/" + id,
        method: "GET",
    })
    $(notification).fadeOut(function() {
        $(notification).remove();
    });
}
// Generic delete button
// Below is how an example delete button should look like
// <a href="#" id="tasks" data-id="{{ $task->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>
$('.js-delete').on('click', function(e) {
    e.preventDefault();
    var result = confirm('Are you sure you want to delete this item?');
    var token = $(this).data('token');
    var url = $(this).data('url');
    var redirect_url = $(this).data('redirect-url');
    if (result) {
        $.ajax({
            'url': url,
            'type': 'DELETE',
            'data': {
                _method: 'delete',
                _token: token
            },
            'success': function() {
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
            'data': {
                '_token': token,
                'day': day,
                'ate': ate,
                'drank': drank,
                'before_lunch': before_lunch
            },
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
        if ($.inArray('other not listed', value) > -1) {
            $(".q13-other").removeClass('hidden');
        } else {
            $(".q13-other").addClass('hidden');
        }
    });
    // Used to sort program weeks in order they are selected
    var program_related_weeks = [];
    $(".program-related-weeks").change(function() {
        if ($(this).prop("checked")) {
            program_related_weeks.push($(this).val());
        } else {
            if ($.inArray($(this).val(), program_related_weeks) > -1) {
                program_related_weeks.splice(program_related_weeks.indexOf($(this).val()), 1);
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
    });
    /**
     * We need to watch for screening test question switches, and update values according to this, because otherwise we won't be able to validate form
     */
    $("#q3, #q4, #q5, #q6, #q7, #q8").change(function() {
        q38();
        /*
        

        if($(this).prop('checked')) {
            $(this).val('on');
            /**
             * This is used to change name of the hidden input fields on questions 3-8, else form vaidation wouldn't work
             */
        /*  
            var selector = $(this).attr("name") + "_a1"; // This will be q3_a1, q4_a2, etc.
            var selector2 = $(this).attr("name") + "_a2";
            // Thos two lines will change hidden answer names so we can validate them
            $("#" + selector).attr("name", selector);
            $("#" + selector2).attr("name", selector2);
        } else {
            $(this).val('off');
            var selector = $(this).attr("name") + "_a1"; // This will be q3_a1, q4_a2, etc.
            var selector2 = $(this).attr("name") + "_a2";
            $("#" + selector).attr("name", "");
            $("#" + selector2).attr("name", "");
        }
        */
    });
    /**
     * This is used to change waist units
     */
    $('#unit').change(function() {
        if ($(this).val() == 'cm') {
            $('.setSliderWaist').html('<label>What is your waist circumference (cm)?</label><input type="range" id="waist_slider" name="waist_slider" min="60" max="140" step="0.5" />');
            $('#waist_slider').change(function() {
                $('#waist').val($('#waist_slider').val());
            });
        } else {
            $('.setSliderWaist').html('<label>What is your waist circumference (in)?</label><input type="range" id="waist_slider" name="waist_slider" min="23.5" max="55" step="0.25" />');
            $('#waist_slider').change(function() {
                $('#waist').val($('#waist_slider').val());
            });
        }
    })
    /**
     * This is used to change number of exercises
     */
    $("#exercise_slider").change(function() {
        $("#exercise").val($(this).val());
    })
    /**
     * Used to update all questions from 3 to 8 after validation
     */
    q38();
    /**
     * Used to activate navbar dropdown menus
     */
    $(".dropdown-button").dropdown();

    /**
     * We need to check if q13 other not listed is checked and open additional line
     */
    if($.inArray("other not listed", $("#q13").val()) > -1) {
        console.log("True");
        $(".q13-other").removeClass("hidden");
    }
})