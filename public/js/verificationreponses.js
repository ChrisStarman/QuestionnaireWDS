var button = document.getElementById('valider');
button.onclick = function () {
    var valide;

    var infoscandidat = document.getElementsByClassName('infoscandidat');

    document.getElementById("requis");
    const supprimerRequis = (requis) => requis.forEach(element => element.remove());
    supprimerRequis(document.querySelectorAll(".requis"));

    for (let infocandidat of infoscandidat) {
        valide = false;
        var inputs = infocandidat.querySelectorAll(".infoscandidat input")
        inputs.forEach((input) => {
            if (!input.value == "" || !input.value == null) {
                valide = true;
            }
        });
        if (valide === false) {
            console.log(infocandidat);
            console.log(infocandidat.firstChild);
            infocandidat.firstElementChild.firstElementChild.setAttribute("id", "requis");
        }
    }

    var reponses = document.getElementsByClassName("reponses");

    for (let unereponse of reponses) {
        valide = false;
        var inputs = unereponse.querySelectorAll(".reponses input");
        inputs.forEach((input) => {
            if (input.getAttribute("type") === "checkbox" || input.getAttribute("type") === "radio") {
                if (input.checked) {
                    valide = true;
                }
            } else {
                if (!input.value == "" || !input.value == null) {
                    valide = true;
                }
            }
        });
        if (valide === false) {
            unereponse.parentNode.previousSibling.previousSibling.setAttribute("id", "requis");
        }
    }

    if (valide) {
        console.log('succès');
    } else {
        console.log('erreur');
        requis = document.getElementById("requis");
        requis.scrollIntoView({
            behavior: "smooth"
        });
        requis.insertAdjacentHTML("beforeend", "<span class='requis'> *</span>");
    }
    requis.removeAttribute("id");
}
