let idUser = document.getElementById('idUser').value;

fetch('/api/getadresses/' + idUser)
    .then(response => response.json())
    .then(data => {
        // le contenu de la réponse est disponible dans la variable "data"
        console.log(data);
        for (let index = 0; index < data.length; index++) {
            console.log(data[index]['id']);
            if (data[index]['longitude'] != null && data[index]['latitude'] != null) {
                var map = L.map('map' + data[index]['id']).setView([data[index]['latitude'], data[index]['longitude']], 13);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 21,
                }).addTo(map);
                var marker = L.marker([data[index]['latitude'], data[index]['longitude']]).addTo(map);
            }

        }
    })
    .catch(error => {
        // afficher une erreur si la requête a échoué
        console.error(error);
    });
