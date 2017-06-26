require('./bootstrap');

/** 
 * Simple JS router
**/
const path = window.location.pathname;

if (path == '/register') {

	$(document).ready(function(){
	  $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 99 // Creates a dropdown of 15 years to control year
	  });
	  $(".button-collapse").sideNav();
	});	

} else if (path == '/screening-test') {

	$(document).ready(function(){
		$('select').material_select();

		$("#q13").change(function(){
			if($(this).find('option:selected').length > 5) {
				$(this).parent('.select-wrapper').find('ul').find('li:not(.active)').css('pointer-events', 'none');
			} else {
				$(this).parent('.select-wrapper').find('ul').find('li:not(.active)').css('pointer-events', 'all');
			}
		});

		$('#age_slider').change(function(){
			$('#age').val($('#age_slider').val());
		});

		$('#waist_slider').change(function(){
			$('#waist').val($('#waist_slider').val());
		});

		$('#heart_slider').change(function(){
			$('#heart').val($('#heart_slider').val());
		});

		$('#unit').change(function(){
			if ($(this).val() == 'cm') {
				$('.setSlider').html('<label>What is your waist circumference (cm)?</label><input type="range" id="waist_slider" name="waist_slider" min="60" max="140" step="0.5" />');
				$('#waist_slider').change(function(){
					$('#waist').val($('#waist_slider').val());
				});				
			} else {
				$('.setSlider').html('<label>What is your waist circumference (in)?</label><input type="range" id="waist_slider" name="waist_slider" min="23.5" max="55" step="0.25" />');
				$('#waist_slider').change(function(){
					$('#waist').val($('#waist_slider').val());
				});				
			}
		})

		$('.q3 input[type=checkbox]').change(function(){
			$('.q3 .input-field').toggleClass('hidden');
		});
		$('.q4 input[type=checkbox]').change(function(){
			$('.q4 .input-field').toggleClass('hidden');
		});
		$('.q5 input[type=checkbox]').change(function(){
			$('.q5 .input-field').toggleClass('hidden');
		});
		$('.q6 input[type=checkbox]').change(function(){
			$('.q6 .input-field').toggleClass('hidden');
		});
		$('.q7 input[type=checkbox]').change(function(){
			$('.q7 .input-field').toggleClass('hidden');
		});
		$('.q8 input[type=checkbox]').change(function(){
			$('.q8 .input-field').toggleClass('hidden');
		});
	});
	
} else if (path == '/home' || path == '/') {
	var Chart = require('./../../../node_modules/chart.js/dist/Chart.bundle.js');
	$(document).ready(function(){
		var chart = document.getElementById('chart');
		var myChart = new Chart(chart, {
		    type: 'line',
			data: {
			    labels: ["Week 1","Week 2","Week 3","Week 4","Week 5","Week 6","Week 7","Week 8","Week 9","Week 10","Week 11","Week 12","Week 13","Week 14","Week 15"],
			    datasets: [{
			        label: 'Point progress',
			        data: [20,38,58,78,90,110,130,150,165,180,200,218,238,258,278],
			        backgroundColor: [
			            'rgba(255, 99, 132, 0.2)',
			        ],
			        borderColor: [
			            'rgba(255,99,132,1)',
			        ],
			        borderWidth: 1
			    }]
			},
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	});
	
} else if (path === '/profile-setup') {
	$(document).ready(function(){
		$('select').material_select();
		$('#country').change(function(){
			var selected = $('#country option:selected').val();
			if(selected == 'US') {
				if ($('.location').hasClass('s6')){
					$('.location').removeClass('s6');
					$('.location').addClass('s4');
					$('.state').removeClass('hidden');
				}
			} else {
				if ($('.location').hasClass('s4')){
					$('.location').removeClass('s4');
					$('.location').addClass('s6');
					$('.state').addClass('hidden');
				}
			}
		});
	});	
} else if (jQuery.trim(path).substring(0, path.length-2) == '/week' || jQuery.trim(path).substring(0, path.length-3) == '/week') {

	$(document).ready(function(){
		$('.modal').modal();
	});

} else if (jQuery.trim(path).substring(0, path.length-2) == '/quiz' || jQuery.trim(path).substring(0, path.length-3) == '/quiz') {

	$(document).ready(function(){
		$('select').material_select();
	});

} else if ( path == '/archive' ) {

	$(document).ready(function(){
		$('ul.tabs').tabs();
	});

}

$(document).ready(()=>{
			console.log($(".button-collapse"));
		$(".button-collapse").sideNav();
})