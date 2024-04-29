/* Définition du centre et du zoom de la carte (valeur initiale)  */
const carte = L.map('map').setView([50.8467139, 4.3525151], 16);

/* Ajout d'un fond de carte (arrière-plan) */
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(carte);

/* Récupération des données */
fetch("carteJSON.php")
    .then(function(response){
        response.json().then(function(data){
            console.log(data);
            afficheMarqueurs(data);
            afficheListe(data);
        });
    })
    .catch(function(error){
        console.log(error.message);
    });

/* Création d'un tableau de marqueurs pour un affichage optimal avec FeatureGroup */
const markerTable = [];

function afficheMarqueurs(liste){
    /* Boucle pour créer les marqueurs de la liste */
    for (let item in liste){
        /* créer un marqueur pour chaque élément de la liste */
        let unMarqueur = L.marker([liste[item].latitude, liste[item].longitude]).addTo(carte);
        /* mettre le nom de l'item dans un popup */
        unMarqueur.bindPopup(`<h3>${liste[item].nom}</h3><p>${liste[item].adresse}</p>`);

        /* ajouter ce marqueur au tableau */
        markerTable.push(unMarqueur);
    }

/* placer le tableau de marqueurs dans le featureGroup */
const groupe = new L.featureGroup(markerTable);

/* adapter l'affichage de ma carte en fonction de la position des marqueurs */
carte.fitBounds(groupe.getBounds(),{padding:[10,10]});
}

function afficheListe(liste){
    const divliste = document.getElementById("liste");

    const UL = document.createElement("ul");

    liste.forEach(function(item,index){
        // créer l'élément de type <li>
        let LI = document.createElement("li");
        // remplir le <li>
        LI.innerHTML = `${item.nom} | ${item.adresse}`;
        // ajouter un eventListener sur le clic
        LI.addEventListener('click', itemClick);
        // ajouter un attribut à cet item LI pour l'identifier
        LI.setAttribute("id",`${item.id}`);
        // ajouter des attributs à cet item LI pour stocker les coordonnées
        LI.setAttribute("latitude",`${item.latitude}`);
        LI.setAttribute("longitude",`${item.longitude}`);
        // attacher ce <li> au <ul>
        UL.appendChild(LI);
    });

    // attacher la liste <ul> au DIV
    divliste.appendChild(UL);
}

function itemClick(){
    let id = this.getAttribute("id");
    let latitude = this.getAttribute("latitude");
    let longitude = this.getAttribute("longitude");
    let marqueur = markerTable[id-1];
    carte.flyTo([latitude,longitude],18);
}