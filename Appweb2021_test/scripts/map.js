mapbox.accessToken = 'pk.eyJ1IjoibHVjYXNwcmludHoiLCJhIjoiY2t3bTRncHowMHp0ODJ3cGR0ZmV0ankzbCJ9.HVm_k6XdwD4lFQBubqLeqg';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [6.9176, 48.3009], // starting position [lng, lat]
    zoom: 9 // starting zoom
    });