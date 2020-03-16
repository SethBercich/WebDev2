<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Forecast Weather using OpenWeatherMap with PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        #container {
            width: 400px;
            background-color: #ff8e38;

            display: inline-block;
            margin: auto;

            border-radius: 10px;
            padding-bottom: 50px;
        }

        .weather-title p {
            margin-top: 12px;
            font-size: 1.4em;
        }

        .notification {
            background-color: #f8d7da;
            display: none;
        }

        .notification p {
            color: #721c24;
            font-size: 1.2em;
            margin: 0;
            text-align: center;
            padding: 10px 0;
        }

        .weather-icon {
            width: 300px;
            height: 128px;
        }

        .weather-icon img {
            display: block;
            margin-bottom: 20px;
        }

        .temperature-value {
            width: 100%;
            text-align: center;
        }

        .temperature-value p {
            color: #293251;
            font-size: 3em;
            text-align: center;
            cursor: pointer;
        }

        .temperature-value .temps {
            color: #293251;
            font-size: 1.4em;
        }

        .temps .high {
            background-color: #de0000;
        }

        .temps .low {
            background-color: #73d0ff;
        }

        .temperature-description p {
            padding: 8px;
            color: #293251;
            text-align: center;
            font-size: 1.2em;
        }

        .location p {
            color: #293251;
            text-align: center;
            font-size: 0.8em;
        }

    </style>
</head>

<body>
    <div class='col-md-6'>
        <div id="container">
            <div class="weather-title">
                <p>CITY weather</p>
            </div>

            <div class="notification"> </div>

            <div class="weatherContainer">
                <div class="weather-icon">
                    <img src="icons/unknown.png" alt="">
                </div>

                <div class="weather-desc">
                    <p>Weather Description</p>
                </div>

                <table class="temperature-value">
                    <thead>
                        <td>Current Temp</td>
                        <td>Highest Temp</td>
                        <td>Lowest Temp</td>
                    </thead>
                    <tr class='temps'>
                        <td class='current'>Current</td>
                        <td class='high'>High</td>
                        <td class='low'>Low</td>
                    </tr>
                </table>

                <div class="feel-temp">
                    <p>Feels Like</p>
                </div>

            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>
