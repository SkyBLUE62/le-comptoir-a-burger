<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert longitude latitude</title>
</head>

<body>
    <form action="{{ url('/add-long-lat/' . $dataAdresse['id']) }}" method="post" id="adresseForm">@csrf
        <input type="hidden" name="id" id="id" value="{{ $dataAdresse['id'] }}">
        <input type="hidden" name="adresse" id="adresse" value="{{ $dataAdresse['adresse'] }}">
        <input type="hidden" name="ville" id="ville" value="{{ $dataAdresse['ville'] }}">
        <input type="hidden" name="pays" id="pays" value="{{ $dataAdresse['pays'] }}">
        <input type="hidden" name="longitude" id="longitude" value="">
        <input type="hidden" name="latitude" id="latitude" value="">
    </form>
</body>
<script>
    try {
    let form = document.getElementById('adresseForm');
    let adresse = document.getElementsByName('adresse')[0].value;
    let ville = document.getElementsByName('ville')[0].value;
    let pays = document.getElementsByName('pays')[0].value;
    let latitude = document.getElementById('latitude');
    let longitude = document.getElementById('longitude');
    let completeAdresse = adresse + ', ' + ville + ', ' + pays;
    var url = "https://nominatim.openstreetmap.org/search?q=" + encodeURI(completeAdresse) +
        "&format=json&addressdetails=1";
    fetch(url)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            latitude.value = data[0].lat;
            longitude.value = data[0].lon;
            form.submit();
        })
        .catch(function(error) {
            console.log(error);
        });
    // Effectue l'action souhaitée
    } catch (error) {
        window.location.href = "/mon-compte";
    }

</script>

</html>
