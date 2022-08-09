var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routename')[0].getAttribute('content')

document.addEventListener('DOMContentLoaded', function(){

// codigo para los links activos
routeactive = document.getElementsByClassName('lk-'+route)[0].classList.add('active');


});