// PARTIE THÉORIQUE
// EXERCICE 1 : QCM

1) c
2) c
3) b
4) c- "CD"
5) a
6) b

// EXERCICE 2 : 

document.getElementById("img1").src("second.jpg");
$("#img1").attr("src", "second.jpg");

----------

// PARTIE PRATIQUE

1)
// HTML & CSS
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription</title>
</head>

<body>
    <tbody style="display: flex;">
	<div id="div1" style="width: 50%;">
	    <table id="table" border="1">
		<tr>
		    <th>NOM</th><th>PRENOM</th><th>AGE</th><th>PHOTO</th>
		</tr>
		<tbody id="tableBody"></tbody>
	    </table>
	</div>

	<div id="div2" style="width: 50%;">
	    <div id="divNOM">
	    <label for="nom">NOM :</label><br>
	    <input id="nom" type="text" required /><br>
	    </div>
	    <div id="divPRENOM">
	    <label for="prenom">PRENOM :</label><br>
	    <input id="prenom" type="text" required /><br>
	    </div>
	    <div id="divAGE">
	    <label for="age">AGE :</label><br>
	    <input id="age" type="number" required /><br>
	    </div>
	    <div id="divPHOTO">
	    <label for="photo">PHOTO :</label><br>
	    <input id="photo" type="file" accept="image/*" required /><br>
	    </div>
	    <button id="addBtn">Ajouter</button>
	    <button type="reset">Supprimer</button>
	</div>
    </tbody>
</body>
</html>

 
// JS
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let age = document.getElementById("age");
let photo = document.getElementById("photo");
let table = document.getElementById("table");
let addBtn = document.getElementById("addBtn");
let ageReponse = document.createElement("div");
let divNom = document.getElementById("divNOM");
let divPrenom = document.getElementById("divPRENNOM");
let divAge = document.getElementById("divAGE");
let tableBody = document.getElementById("tableBody")

2)
// JS
function checkage() {
    if (parseInt(age.value) >= 6 && parseInt(age.value) <= 16) {
        ageReponse.innerHTML = `
	<br>
	<p style="color: green">Age Valide</p>
	`
	age.appendChild(ageReponse)

    } else {
        ageReponse.innerHTML = `
	<br>
	<p style="color: red">Age Non-valide</p>
	`
    }
}

3)
// JS
function EmptyInput() {
    if (nom.value.trim() !== "" && prenom.value.trim() !== "" &&
	age.value.trim() !== "" && photo.complete &&
	photo.naturalWidth !== 0) {
    	return true;
    } else {
	return false;
    }
}

4)
// JS
function add() {
    if(EmptyInput) {
	let nvLigne = document.createElement("tr");

	nvligne.innerHTML = `
	    <td>${nom.value}</td>
	    <td>${prenom.value}</td>
	    <td>${age.value}</td>
	    <td><img src="${photo.value}" width="50%"></td>
	`;
	tableBody.appendChild(nvLigne);
    } else {
	alert("Veuillez remplir tout les champs !")
    }
}
addBtn.addEventListener("click", add)


5)
// JS
let lignes = document.querySelectorAll("tr")

function remove() {
    lignes.forEach( ligne =>
	ligne.addEventListener("click", function {
	    ligneSelc = ligne.style.backgroundColor = "red";
    	});
    });

    if (ligneSelc !== 0) {
	lignes.forEach(ligne => ligne.remove());
    } else {
	alert("Veillez selectionez un ligne !");
    }
}

