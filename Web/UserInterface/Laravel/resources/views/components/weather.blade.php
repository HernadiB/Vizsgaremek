<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">

    </div>
</div>
<template id="weatherTemplate">
    <div class="carousel-item">
        <h4 id="location"></h4>
        <img src="" alt="Pic not found" id="image">
        <p id="description"></p>
        <p id="temperature"></p>
        <p id="humidity"></p>
        <p id="windSpeed"></p>
        <p id="sunRise"></p>
        <p id="sunSet"></p>
    </div>
</template>
<script>
    showWeather(coordinates)
</script>