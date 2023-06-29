<!DOCTYPE html>
<html>

<head>
	<title>Weather App</title>
	<!-- Link CSS and JavaScript files here -->

	<style>
		@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap");

		:root {
			--gradient: linear-gradient(135deg, #72edf2 10%, #5151e5 100%);
		}

		* {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			line-height: 1.25em;
		}

		.clear {
			clear: both;
		}

		body {
			margin: 0;
			width: 100%;
			height: 100vh;
			font-family: "Montserrat", sans-serif;
			background-color: #343d4b;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
		}

		.container {
			/* border-radius: 25px; */
			/* -webkit-box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2); */
			/* background-color: #222831; */
			color: #ffffff;
			height: 400px;
		}

		.weather-side {
			position: relative;
			height: 100%;
			border-radius: 25px;
			background-image: url("https://images.unsplash.com/photo-1468083684825-012f39547b23?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80");								
			width: 335px;
			-webkit-box-shadow: 0 0 20px -10px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 20px -10px rgba(0, 0, 0, 0.2);
			-webkit-transition: -webkit-transform 300ms ease;
			transition: -webkit-transform 300ms ease;
			-o-transition: transform 300ms ease;
			transition: transform 300ms ease;
			transition: transform 300ms ease, -webkit-transform 300ms ease;
			-webkit-transform: translateZ(0) scale(1.02) perspective(1000px);
			transform: translateZ(0) scale(1.02) perspective(1000px);
			float: left;
			z-index: 1;
		}

		.weather-side:hover {
			-webkit-transform: scale(1.1) perspective(1500px) rotateY(10deg);
			transform: scale(1.1) perspective(1500px) rotateY(10deg);
		}

		.weather-gradient {
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background-image: var(--gradient);
			border-radius: 25px;
			opacity: 0.4;
		}

		.date-container {
			position: absolute;
			top: 25px;
			left: 25px;
		}

		.date-dayname {
			margin: 0;
		}

		.date-day {
			display: block;
		}

		

		.weather-container {
			position: absolute;
			bottom: 25px;
			left: 25px;
		}

		.weather-icon.feather {
			height: 60px;
			width: auto;
		}

		.weather-temp {
			margin: 0;
			font-weight: 700;
			font-size: 4em;
		}

		.weather-desc {
			margin: 0;
		}

		.info-side {
			position: relative;
			float: left;
			height: 100%;
			padding-top: 25px;
			border-radius: 25px;
			-webkit-box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
			background-color: #222831;
		}

		.info-side .today-info-humanitiy {
			padding: 0px 35px;
		}

		.info-side::after {
			position: absolute;
			background-color: #222831;
			-webkit-box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
			height: 400px;
			width: 341px;
			border-radius: 25px 0;
			content: "";
			left: -50px;
			top: 0px;
			z-index: -1;
		}

		@media only screen and (max-width: 675px) {
			.info-side::after {
				left: 0px;
				top: -50px;
				border-radius: 0 25px;
			}
		}

		.today-info {
			padding: 15px;
			margin: 0 25px 25px 25px;
			/* 	box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25); */
			border-radius: 10px;
		}

		.today-info>div:not(:last-child) {
			margin: 0 0 10px 0;
		}

		.today-info>div .title {
			float: left;
			font-weight: 700;
		}

		.today-info>div .value {
			float: right;
		}

		.week-list {
			list-style-type: none;
			padding: 0;
			margin: 10px 35px;
			-webkit-box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25);
			box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25);
			border-radius: 10px;

		}

		.week-list>li {
			float: left;
			padding: 15px;
			cursor: pointer;
			-webkit-transition: 200ms ease;
			-o-transition: 200ms ease;
			transition: 200ms ease;
			border-radius: 10px;
		}

		.week-list>li:hover {
			-webkit-transform: scale(1.1);
			-ms-transform: scale(1.1);
			transform: scale(1.1);
			background: #fff;
			color: #222831;
			-webkit-box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2);
		}

		.week-list>li.active {
			background: #fff;
			color: #222831;
			border-radius: 10px;
		}

		.week-list>li .day-name {
			display: block;
			margin: 10px 0 0 0;
			text-align: center;
		}

		.week-list>li .day-icon {
			display: block;
			height: 30px;
			width: auto;
			margin: 0 auto;
		}

		.week-list>li .day-temp {
			display: block;
			text-align: center;
			margin: 10px 0 0 0;
			font-weight: 700;
		}

		.location-container {
			padding: 25px 35px;
		}




		/* Apply styles to the button */
		.location-button {
			padding: 10px 20px;
			font-size: 16px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		.location-button:hover {
			background-color: #45a049;
		}

		* {
			box-sizing: border-box;
		}

		.select {
			position: relative;
			min-width: 200px;
		}

		.select select {
			-webkit-appearance: none;
			padding: 7px 40px 7px 12px;
			width: 100%;
			border: 1px solid #e8eaed;
			border-radius: 5px;
			background: #fff;
			box-shadow: 0 1px 3px -2px #9098a9;
			cursor: pointer;
			font-family: inherit;
			font-size: 16px;
			transition: all 150ms ease;
		}

		.select select:required:invalid {
			color: #5a667f;
		}

		.select select option {
			color: #223254;
		}

		.select select option[value=""][disabled] {
			display: none;
		}

		.select select:focus {
			outline: none;
			border-color: #07f;
			box-shadow: 0 0 0 2px rgba(0, 119, 255, 0.2);
		}

		.select select:hover+svg {
			stroke: #07f;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="weather-side">
			<div class="weather-gradient"></div>
			<div class="date-container">
				<h2 class="date-dayname"></h2><span class="date-day">30 Jun 2023</span><i class="location-icon" data-feather="map-pin"></i><span class="location">Colombo,Sri Lanka</span>
			</div>
			<div class="weather-container"><i class="weather-icon" data-feather="sun"></i>
				<h1 class="weather-temp">29°C</h1>
				<h3 class="weather-desc">Sunny</h3>
			</div>
		</div>
		<div class="info-side">
		<!-- Switch between different units of measuremen -->
			<div class="today-info-humanitiy">
				<label class="select" for="slct">
					<select id="units_change" required="required">
						<option selected="selected" disabled>Units of measurement</option>
						<option value="M">Celsius</option>
						<option value="I">Fahrenheit</option>
					</select></label>

			</div>
			<!-- Disply the relavanted data -->
			<div class="today-info-container">
				<div class="today-info">
					<div class="Current temperature"> <span class="title">Current temperature</span><span class="value" id="temp_val">0 %</span>

						<div class="clear"></div>
					</div>
					<div class="Weather Conditions"> <span class="title">Weather Conditions</span><span id="weather_val" class="value">0
							%</span>
						<div class="clear"></div>
					</div>
					<div class="humanitiy"> <span class="title">humanitiy</span><span class="value" id="hum_val">0 km/h</span>
						<div class="clear"></div>
					</div>
					<div class="wind"> <span class="title">Wind</span><span class="value" id="wind_val">0 km/h</span>
						<div class="clear"></div>
					</div>
					<div class="windSpeed"> <span class="title">Wind Speed</span><span class="value" id="wind_val">0 km/h</span>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<!-- week container -->
			<div class="week-container">
				<ul class="week-list">

					<li class="active"><i class="day-icon" data-feather="sun"></i><span class="day-name">Mon</span><span class="day-temp">29°C</span></li>
					<li><i class="day-icon" data-feather="cloud-rain"></i><span class="day-name">Tue</span><span class="day-temp">27°C</span></li>
					<li><i class="day-icon" data-feather="cloud"></i><span class="day-name">Wed</span><span class="day-temp">27°C</span></li>
					<li><i class="day-icon" data-feather="cloud-snow"></i><span class="day-name">Thu</span><span class="day-temp">26°C</span></li>
					<li><i class="day-icon" data-feather="cloud-rain"></i><span class="day-name">Fry</span><span class="day-temp">27°C</span></li>
					
					<div class="clear"></div>
				</ul>
			</div>

		</div>


		<!-- Include JavaScript code here -->
		<script>
			feather.replace();
		</script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				var units = 'M';

				$("#units_change").change(function() {
					var selectedOption = $(this).val();
					units = selectedOption;
					console.log(units);
					getData();

				});
//get the data json format
				function getData() {
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {
							var latitude = position.coords.latitude;
							var longitude = position.coords.longitude;
							console.log("Latitude: " + latitude);
							console.log("Longitude: " + longitude);

							var select = latitude + ":" + longitude;
							$.ajax({
								url: 'filterData',
								type: 'GET',
								dataType: "json",
								data: {
									locations: select,
									units: units,
								},
								/*current temperature, weather conditions, 
								humidity, wind , speed, and
								any other relevant information provided */
								success: function(response) {
									console.log(response['data']['data']);

									if (units == 'M') {
										$("#temp_val").text(response['data']['data'][0]['temp'] + 'C')
									} else {
										$("#temp_val").text(response['data']['data'][0]['temp'] + 'F')
									}

									$("#weather_val").text(response['data']['data'][0]['weather']['description'])
									$("#hum_val").text(response['data']['data'][0]['rh'])
									$("#wind_val").text(response['data']['data'][0]['wind_spd'].toFixed(2) + ' Kmh')
									$("#wind_val").text(response['data']['data'][0]['wind_spd'] + ' Kmh')
								},
								error: function(xhr, status, error) {
									console.error(error);
								}
							});
						})
					}

					//Implement error handling in case the API request fails or if the user denies

					navigator.permissions.query({
							name: 'geolocation'
						})
						.then((response) => {
							if (response['state'] != 'granted') {
								//dissplay the po pop
								console.log('Please Allow the Location Permission');
								alert('Please Allow the Location Permission');
							}
						})
				}

				getData();
			});
		</script>
</body>

</html>