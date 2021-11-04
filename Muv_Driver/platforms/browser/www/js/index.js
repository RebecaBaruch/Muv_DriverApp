document.addEventListener('deviceready', iniciar)

function iniciar() {
    navigator.geolocation.getCurrentPosition(geoSucess, geoError)
}
// definindo o local atual
function geoSucess(dados) {
    var lat = dados.coords.latitude
    var lon = dados.coords.longitude

    localStorage.setItem('latitu', lat)
    localStorage.setItem('longitu', lon)

    var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=";
    url += lat + ",";
    url += lon + "&key=";
    url += "AIzaSyABnuQpgsqSITzefoNMys4iXmfgWlXqEfk";


    $.ajax({
        dataType: "json",
        url: url,
        error: function (e) {
            console.log("errou" + e);
        },
        success: function (r) {
            console.log("foi!");
            // initMap();
        }
    })

}

function geoError(e) {
    navigator.notification.alert('Houve um erro:' + e.message, ' ', 'Erro')
}

function initMap() {
    var lat = parseFloat(localStorage.getItem('latitu'));
    var lon = parseFloat(localStorage.getItem('longitu'));

    var meulocal = { lat: lat, lng: lon };
    var map = new google.maps.Map(document.querySelector('#map'), {
        zoom: 16,
        center: meulocal,
        disableDefaultUI: true,
    });
    var marker = new google.maps.Marker({
        position: meulocal,
        map: map,
        animation: google.maps.Animation.DROP
    });

    const contentString = '<h3>Seu local atual!</h3>';
    setTimeout(function () {
        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });
        infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
        });
    }, 1000)
}