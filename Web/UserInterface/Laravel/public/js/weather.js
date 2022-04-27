let coordinates = [
    {
        "lat": 47.5049574,
        "lon": 19.1462911
    },
    {
        "lat": 46.2515953,
        "lon": 20.1513065
    },
    {
        "lat": 47.5322584,
        "lon": 21.6224577
    },
    {
        "lat": 48.0949069,
        "lon": 20.7856903
    },
]

coordinates.forEach(c => {
    fetchWeather(c.lat, c.lon);
});

function fetchWeather(lat, lon)
{
    let appid = "63b5461c73e5a9a6040a41694277ebd6";
    let lang = "hu";
    let units = "metric";

    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${appid}&lang=${lang}&units=${units}`)
        .then(response => response.json())
        .then(result => appendCarouselItem(result))
        .catch(error => console.log('error', error));
}
function appendCarouselItem(data)
{
    let carousel = document.body.querySelector('.carousel-inner');
    let template = document.getElementById('weatherTemplate').content;
    let row = document.importNode(template,true);

    row.querySelector('h4#location').innerHTML = data.name + " (" + data.coord.lat + ", " + data.coord.lon + ")";
    row.querySelector('img#image').src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
    row.querySelector('h4#description').innerHTML = data.weather[0].description;
    row.querySelector('h4#temperature').innerHTML = "Hőmérséklet: " + data.main.feels_like + "°";
    row.querySelector('h4#humidity').innerHTML = "Páratartalom: " + data.main.humidity + "%";
    row.querySelector('h4#windSpeed').innerHTML = "Szélsebesség: " + data.wind.speed + " m/s";
    row.querySelector('h4#sunRise').innerHTML = "Napkelte: " + convertUnixTime(data.sys.sunrise);
    row.querySelector('h4#sunSet').innerHTML = "Napnyugta: " + convertUnixTime(data.sys.sunset);
    if(document.querySelector('div.carousel-item.active') == null)
    {
        row.querySelector('div.carousel-item').classList.add('active');
    }
    carousel.append(row);
}
function convertUnixTime(unix) {
    let a = new Date(unix * 1000),
        year = a.getFullYear(),
        months = ['Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December'],
        month = months[a.getMonth()],
        date = a.getDate(),
        hour = a.getHours(),
        min = a.getMinutes() < 10 ? '0' + a.getMinutes() : a.getMinutes(),
        sec = a.getSeconds() < 10 ? '0' + a.getSeconds() : a.getSeconds();
    return `${year} ${month} ${date}, ${hour}:${min}:${sec}`;
}