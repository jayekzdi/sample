<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<!-- <script src='fullcalendar/lib/jquery.min.js'></script> -->
<script src='fullcalendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			editable: true,
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 700px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
