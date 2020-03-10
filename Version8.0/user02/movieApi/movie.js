$(function(){
	
	//This is to remove the validation message if no poster image is present
	$('#term').focus(function() {
		var full = $('#poster').has("img").length ? true: false;
		if (full == false) {
			$('#poster').empty();
		}

	});

	var api_key = "7f671e92178e940a7ad70be179220554";
	var baseimg = "http://image.tmdb.org/t/p/w342";
    
    /*var showings = "https://api-gate2.movieglu.com/";
    var user = "client:SHAK&"
    var showingKey = "x-api-key:lscKidch5M4GJ5TOczjPJ6Hkfy07sv1x2Huvkejr&";
    var auth = "authorization:Basic U0hBSzpnbkk5MWJhdTlZMjk=&"
    var territory = "territory:US&"
    //var device_datetime = "device-datetime:" + (new DateTime()).format('Y-m-d H:i:s') + "&";
    var link = showings + user + showingKey + auth + territory;
    console.log(link); */
    
	//function definition 
	var getPoster = function(){

		//Grab the movie title and store it in a variable

		var film = $('#term').val();

		//check if the user has entered anything

		if (film == '') {
            /*Result Example: 
            ?({"page":1,"total_results":55,"total_pages":3,"results":[{"popularity":100.777,"vote_count":9693,"video":false,"poster_path":"\/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg","id":475557,"adult":false,"backdrop_path":"\/n6bUvigpRFqSwmPp1m2YADdbRBc.jpg","original_language":"en","original_title":"Joker","genre_ids":[80,18,53],"title":"Joker","vote_average":8.2,"overview":"During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure.","release_date":"2019-10-02"},
            */
            
            //If the input field was empty, display a message
			$('#head').html("<h2 class='loading'>Ha! We haven't forgotten to validate the form! Please enter something.</h2>");
		} else {

			//They must have entered a value, carry on with API call, first display a loading message to notify the user of activity
			$('#head').html("<h2 class='loading'>Your poster is on its way!</h2>");

			$.getJSON("https://api.themoviedb.org/3/search/movie?query=" + escape(film) + "&api_key=" + api_key + "&callback=?",
				function(json) {
				//print returned json object to familiarize with API data structure
				// console.log(json);
				// console.log(json.results[0].poster_path);

				//TMDb is nice enough to return a message if nothing was found, so we can base our if statement on this info

					if (json.total_results) {

						//Display the poster and a message announcing the result
                        $("#head").html('<h2 class="loading">We found you a poster!</h2>')
                        
						$('#poster').html('<img id="thePoster" src=' + baseimg + json.results[0].poster_path + ' />');
                        
                        $('#info').html('<p class="desc"><strong>Overview: </strong>' + json.results[0].overview + '<br><br>Release Date: ' + json.results[0].release_date + '</p>')
                        
					} else {
						$.getJSON("http://api.themoviedb.org/3/search/movie?query=nothing&api_key=" + api_key, 
							function(json){
								$('#poster').html('<h2 class="loading">We\'re afraid nothing was found for that search.</h2><img id="thePoster" src='+baseimg +  '/wgHcU0xp1txh21S9qdUUUr0d65x.jpg'+'>');
	                    });                 
	                }
			});
		}

		return false;	
	}

	$('#fetch form').on('submit', getPoster);
});