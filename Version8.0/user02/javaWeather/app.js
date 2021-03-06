// Tutorial by http://youtube.com/CodeExplained
// api key : a27da409970657af869f26fef6c2eb2f

// SELECT ELEMENTS
const iconElement = document.querySelector(".weather-icon");
const tempElement = document.querySelector(".temperature-value tr .current");
const highTempElement = document.querySelector(".temperature-value tr .high");
const lowTempElement = document.querySelector(".temperature-value tr .low");
const descElement = document.querySelector(".weather-desc p");
const locationElement = document.querySelector(".weather-title p");
const notificationElement = document.querySelector(".notification");
const feelTempElement = document.querySelector(".feel-temp p")

const robloxUsername = document.querySelector(".roblox-user")
const robloxId = document.querySelector(".roblox-id")
const robloxTitle = document.querySelector(".roblox-title")
const robloxPic = document.querySelector(".roblox-icon")
const robloxGroupList = document.querySelector(".roblox-groups")
const robloxInput = document.querySelector("#UserNameEnter")

// App data
const weather = {};

const robloxInf = {};

weather.temperature = {
    unit : "fahrenheit"
}

// APP CONSTS AND VARS
const KELVIN = 273;
// API KEY
const key = "a27da409970657af869f26fef6c2eb2f";

// CHECK IF BROWSER SUPPORTS GEOLOCATION
if('geolocation' in navigator){
    navigator.geolocation.getCurrentPosition(setPosition, showError);
}else{
    notificationElement.style.display = "block";
    notificationElement.innerHTML = "<p>Browser doesn't Support Geolocation</p>";
}

// SET USER'S POSITION
function setPosition(position){
    let latitude = position.coords.latitude;
    let longitude = position.coords.longitude;
    
    getWeather(latitude, longitude);
}

// SHOW ERROR WHEN THERE IS AN ISSUE WITH GEOLOCATION SERVICE
function showError(error){
    notificationElement.style.display = "block";
    notificationElement.innerHTML = `<p> ${error.message} </p>`;
}

// GET WEATHER FROM API PROVIDER
function getWeather(latitude, longitude){
    let api = `http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${key}`;
    
    fetch(api)
        .then(function(response){
            let data = response.json();
            return data;
        })
        .then(function(data){
            weather.temperature.current = data.main.temp - KELVIN;
            weather.temperature.high = data.main.temp_max - KELVIN;
            weather.temperature.low = data.main.temp_min - KELVIN;
            weather.temperature.feel = data.main.feels_like - KELVIN;
        
            weather.description = data.weather[0].description[0].toUpperCase() + data.weather[0].description.slice(1);
            weather.iconId = data.weather[0].icon;
            weather.city = data.name;
            weather.country = data.sys.country;
            console.log(data);
        })
        .then(function(){
            displayWeather();
        });
}

// DISPLAY WEATHER TO UI
function displayWeather(){
    iconElement.innerHTML = `<img src="images/icons/${weather.iconId}.png"/>`;
    //tempElement.innerHTML = `${weather.temperature.value}°<span>C</span>`; //Celcius
    tempElement.innerHTML = `${Math.floor(celsiusToFahrenheit(weather.temperature.current))}°<span>F</span>`; //Fahrenheit
    highTempElement.innerHTML = `${Math.floor(celsiusToFahrenheit(weather.temperature.high))}°<span>F</span>`;
    lowTempElement.innerHTML = `${Math.floor(celsiusToFahrenheit(weather.temperature.low))}°<span>F</span>`;
    descElement.innerHTML = weather.description;
    locationElement.innerHTML = `${weather.city}, ${weather.country} Weather`;
    feelTempElement.innerHTML =   `Feels like: ${Math.floor(celsiusToFahrenheit(weather.temperature.feel))}°<span>F</span>`;
    
    let avgTemp = Math.floor((Math.floor(celsiusToFahrenheit(weather.temperature.high)) + Math.floor(celsiusToFahrenheit(weather.temperature.low)))/2)
    
    if(Math.floor(celsiusToFahrenheit(weather.temperature.current)) > avgTemp){
        tempElement.style.backgroundColor= '#de0000'; //If the temp is in the high FOR THE DAY
    }else{
        tempElement.style.backgroundColor= '#73d0ff'; //If the temp is in the low for the day.
    }
    
}

// C to F conversion
function celsiusToFahrenheit(temperature){
    return (temperature * 9/5) + 32;
}

// WHEN THE USER CLICKS ON THE TEMPERATURE ELEMENET
tempElement.addEventListener("click", function(){
    if(weather.temperature.value === undefined) return;
    
    if(weather.temperature.unit == "celsius"){
        let fahrenheit = celsiusToFahrenheit(weather.temperature.value);
        fahrenheit = Math.floor(fahrenheit);
        
        tempElement.innerHTML = `${fahrenheit}°<span>F</span>`;
        weather.temperature.unit = "fahrenheit";
    }else{
        tempElement.innerHTML = `${weather.temperature.value}°<span>C</span>`;
        weather.temperature.unit = "celsius"
    }
});

function getRoblox(){
    userNameInput = 
    let nameApi = "api.roblox.com/users/get-by-username?username=" + userNameInput;
    fetch(nameApi)
        .then(function(response){
            let rbxData = response.json();
            return rbxData;
        })
        .then(function(data){
            robloxInf.user.Name = data.Username;
            robloxInf.user.Id = data.Id;
            console.log(data);
        })
        .then(function(display){
            robloxUsername.innerHTML = robloxInf.user.Name
            robloxId.innerHTML = robloxInf.user.Id
    })
    
    ```let groupApi = "api.roblox.com/users/" + robloxInf.user.Id + "/groups";
    fetch(groupApi)
        .then(function(response){
            let groupData = response.json();
            return groupData;
        })
        .then(function(data){
            
    })
```    
        
}