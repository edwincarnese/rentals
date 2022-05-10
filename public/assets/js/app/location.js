let LocsA = [];

let originLat = 8.951097684123816;
let originLong = 125.54126008205894;

let USER_LATITUDE = null;
let USER_LONGITUDE = null;

function findMe() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        console.log("Geolocation is not supported by this browser.");
    }
}
    
function showPosition(position) {
    USER_LATITUDE = position.coords.latitude;
    USER_LONGITUDE = position.coords.longitude;

    document.cookie = "USER_LATITUDE="+USER_LATITUDE+"; max-age=864000;";
    document.cookie = "USER_LONGITUDE="+USER_LONGITUDE+"; max-age=864000;";

    window.location.href = $('#pages-home').val();
}

if(getCookie("USER_LATITUDE") || getCookie("USER_LATITUDE")) {
    USER_LATITUDE = getCookie("USER_LATITUDE");
    USER_LONGITUDE = getCookie("USER_LONGITUDE");
} 
else {
    USER_LATITUDE = null;
    USER_LONGITUDE = null;
}

if(USER_LATITUDE || USER_LONGITUDE) {
    LocsA.push(
        {
            name: 'I am here',
            location_latitude: originLat,
            location_longitude: originLong,
            map_image_url: '',
            name_point: 'I am here',
            url_point: ''
        },
    );
}

for(let i = 0; i < locationData.length; i++) {
    LocsA.push(
        {
            name: locationData[i]['title'],
            location_latitude: locationData[i]['latitude'],
            location_longitude: locationData[i]['longitude'],
            map_image_url: '/storage/'+locationData[i]['main_photo'],
            name_point: locationData[i]['title'],
            url_point: urlEndpoint + locationData[i]['id'],
            property_price: locationData[i]['price'],
            property_period: locationData[i]['period'],
            ratings: locationData[i]['ratings'],
            ratings_count: locationData[i]['ratings_count'],
        },
    );
}

(function(A) {
    if (!Array.prototype.forEach)
    A.forEach = A.forEach || function(action, that) {
        for (var i = 0, l = this.length; i < l; i++)
            if (i in this)
                action.call(that, this[i], i, this);
        };

})(Array.prototype);

    var mapObject, markers = [], markersData = {
        'Hotels': LocsA
    };

    var mapOptions = {
        zoom: 12,
        center: new google.maps.LatLng(8.9559536672309, 125.52851005253486),
        mapTypeId: google.maps.MapTypeId.ROADMAP,

        mapTypeControl: false,
    };

    var marker;
    mapObject = new google.maps.Map(document.getElementById('hero-map'), mapOptions);

    //create a DirectionsService object to use the route method and get a result for our request
    var directionsService = new google.maps.DirectionsService();

    //create a DirectionsRenderer object which we will use to display the route
    var directionsDisplay = new google.maps.DirectionsRenderer();

    //bind the DirectionsRenderer to the map
    directionsDisplay.setMap(mapObject);

    for (var key in markersData)
        markersData[key].forEach(function (item) {
            let icon = '/assets/images/icons/map-marker-2.png';
            if(!item.url_point) {
                icon = '/assets/images/icons/user.png';
            }
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
                map: mapObject,
                icon: icon,
            });

            if ('undefined' === typeof markers[key])
                markers[key] = [];
            markers[key].push(marker);
            google.maps.event.addListener(marker, 'click', (function () {
                closeInfoBox();
                if(item.url_point) {
                    getInfoBox(item).open(mapObject, this);
                    
                    if(USER_LATITUDE || USER_LONGITUDE) {
                        calcRoute(item.location_latitude, item.location_longitude);
                    }
                }
                mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
            }));

            if(!item.url_point && (USER_LATITUDE || USER_LONGITUDE)) {
                var circle = new google.maps.Circle({
                    map: mapObject,
                    radius: 1000,
                    fillColor: '#1111'
                });
                circle.bindTo('center', marker, 'position');
            }
});

function calcRoute(destinationLat, destinationLong) {
    closeInfoBox();

    var request = {
        origin: new google.maps.LatLng(originLat, originLong),
        destination: new google.maps.LatLng(destinationLat, destinationLong),
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
        } else {
            directionsDisplay.setDirections({ routes: [] });
            map.setCenter(myLatLng);
        }
    });
}

function getInfoBox(item) {
    let url_point = '';
    let map_image_url = '';
    let ratings_div = '';

    if(item.url_point) {
        url_point = '<div class="marker_tools">' +
            '<a href="'+ item.url_point + '" class="btn_infobox btn btn-block" target="_blank">View Property</a>' +
        '</div>';
    }
    if(item.map_image_url) {
        map_image_url = '<img src="' + item.map_image_url + '" alt="Image" style="width: 280px; height: 140px;"/>'
    }

    if(item.ratings) {
        const property_rating = Math.floor(item.ratings / item.ratings_count);
        let property_stars = 'Ratings: ';
        for(let i=0; i < property_rating; i++) {
            property_stars += `<svg style="color: green;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>`;
        }

        ratings_div = '<h3 class="text-center mb-0">'+ property_stars + '</h3>'
    }
    
    return new InfoBox({
        content:
        '<div class="marker_info" id="marker_info" style="background: #ffd281">' +
        map_image_url +
        '<h3 class="text-center mb-0">'+ item.name_point +'</h3>' +
        '<h3 class="text-center mb-0">₱'+ item.property_price + ' / ' + item.property_period + '</h3>' + 
        '<h3 class="text-center mb-0">'+ ratings_div + '</h3>' + 
        url_point,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(10, 125),
        closeBoxMargin: '5px -20px 2px 2px',
        closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
        isHidden: false,
        alignBottom: true,
        pane: 'floatPane',
        enableEventPropagation: true
    });
}

function hideAllMarkers () {
    for (var key in markers)
        markers[key].forEach(function (marker) {
            marker.setMap(null);
        });
};

function closeInfoBox() {
    $('div.infoBox').remove();
};

function getCookie(name) {
    let cookie = {};
    document.cookie.split(';').forEach(function(el) {
        let [k,v] = el.split('=');
        cookie[k.trim()] = v;
    })
    return cookie[name];
}