var param;
var form = document.getElementById('search');
var divError = document.getElementById('error');
var latSpan = document.getElementById('lat');
var lngSpan = document.getElementById('lng');
var divMap = document.getElementById('map');

divError.style.display = 'none';
divMap.style.display = 'none';

function ajaxGet(param, callback){
    var response;
    var xhr = new XMLHttpRequest();

    var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + param;

    xhr.open("GET", url, true);

    xhr.addEventListener("load", function(){
       if (xhr.status >= 200 && xhr.status < 400){
            response = JSON.parse(xhr.responseText);
            callback(response);
       }else{
           console.error(xhr.status + " " + xhr.statusText);
       }
    });

    xhr.send(null);
}

function getCoord(obj){
    var coord = {};
    coord.lat = obj.results[0].geometry.location.lat;
    coord.lng = obj.results[0].geometry.location.lng;
    return coord;
}

function initMap(obj) {
    // var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: obj
    });
    var marker = new google.maps.Marker({
        position: obj,
        map: map
    });
}

form.addEventListener("submit", function (e) {
    e.preventDefault();
    latSpan.textContent = 'Lattitude : ';
    lngSpan.textContent = 'Longitude : ';
    divError.style.display = 'none';
    divError.textContent = "";
    param = form.elements.adress.value;
    param = encodeURI(param);

    ajaxGet(param, function(response){
        switch(response.status){
            case "OK":
                var coord = getCoord(response);
                latSpan.textContent = 'Lattitude : ' + coord.lat;
                lngSpan.textContent = 'Longitude : ' + coord.lng;
                break;
            case "ZERO_RESULTS":
                divError.style.display = 'block';
                divError.textContent = "Adresse inexistante";
                break;
        }
        divMap.style.display = 'block';
        initMap(coord);
    });
});