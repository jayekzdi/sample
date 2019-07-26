<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<!-- <script src='fullcalendar/lib/jquery.min.js'></script> -->
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script>
	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
			editable: true,
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'get-events.php',
				color: '#d3d3d3',
				textColor:'black',
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
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		margin-bottom: : 100px;
		max-width: 1000px;
		margin: 40px auto;
		padding: 0 10px;
		font-family: century gothic;
		text-align: center;
	}

</style>
</head>
<body>

	<div id='script-warning'>
		<code>php/get-events.php</code> must be running.
	</div>

	<div id='loading'>loading...</div>

	<div id='calendar'></div>

</body>
</html>
