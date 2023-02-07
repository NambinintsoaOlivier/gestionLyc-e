function recherche() {

    var search = document.getElementById("nom").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "enseignant1.php?search=" + search + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function rechercheEtudiant() {
    var search = document.getElementById("nom").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_elev").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "etudiants1.php?search=" + search + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function rechercheEtudiantAbsent() {
    var search = document.getElementById("nom").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_elev_absent").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "absence1.php?search=" + search + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function recherche_bulletin() {
    var search = document.getElementById("nom").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_bulletin").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "bulletin1.php?search=" + search + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function classe() {
    var classe = document.getElementById("classe").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_elev").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "etudiants1.php?classe=" + classe + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function classeAbsence() {
    var classe = document.getElementById("classe").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_elev_absent").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "absence1.php?classe=" + classe + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function rechercheNote() {
    var note = document.getElementById("note").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_note").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "note1.php?note=" + note + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function classeMatiere() {
    var matiere = document.getElementById("classe_matiere").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("matiere").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "matiere1.php?classe_matiere=" + matiere + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function bulletin() {
    var bulletin = document.getElementById("bulletin_classe").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_bulletin").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "bulletin1.php?bulletin=" + bulletin + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function trimestre() {
    var trim = document.getElementById("trimestre").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("search_note").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "note1.php?trim=" + trim + "";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function imprimer() {
    var div = document.getElementById("imprim");
    var div1 = document.getElementById("imprim1");
    if (div.style.display==="block"){
    div.style.display="none";
    }
    if (div1.style.display === "block") {
        div1.style.display = "none";
    }
    print();
    div.style.display = "block";
    div1.style.display = "block";
}
function bulletin_trimestre(){
    var trim = document.getElementById("trimestre_bulletin").value;
    var id=document.getElementById("id").value;
    var getHttpRequest = function () {
        var HttpRequest = false;
        if (window.XMLHttpRequest) {
            HttpRequest = new XMLHttpRequest();
            if (HttpRequest.overrideMimeType) {
                HttpRequest.overrideMimeType('Text/XML');
            }
        } else if (window.ActiveXObject) {
            try {
                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) { }
            }
        }
        return HttpRequest;
    }
    var HttpRequest = getHttpRequest();
    HttpRequest.onreadystatechange = function () {
        if (HttpRequest.readyState === 4) {
            document.getElementById("cont").innerHTML = HttpRequest.responseText;
        }
    }
    var str = "bulletin3.php?trim=" + trim + "&id="+id+"";
    HttpRequest.open('GET', str, true);
    HttpRequest.send(null);
}
function message() {
    var valide = "1";
    var nom = document.getElementById("nomEtudiant").value;
        var error = document.getElementById("error");
    var prenom = document.getElementById("prenomEtudiant").value;
        var error1 = document.getElementById("error1");
    var datenaiss = document.getElementById("dateNaissanceEtudiant").value;
    var lieunaiss = document.getElementById("lieuNaissEtudiant").value;
    
    var adresse = document.getElementById("adresseEtudiant").value;
        var error6 = document.getElementById("error6");
    var maladie = document.getElementById("maladieEtudiant").value;
    var np = document.getElementById("nomPereEtudiant").value;
    var pp = document.getElementById("proffessionPere").value;
    var nm = document.getElementById("nomMereEtudiant").value;
    var pm = document.getElementById("proffessionMere").value;
    var nt = document.getElementById("nomTuteurEtudiant").value;
    var pc = document.getElementById("proffessionTuteur").value;
    var ap = document.getElementById("adresseParentEtudiant").value;
    var cp = document.getElementById("contactParentEtudiant").value;
    var ans = document.getElementById("anneeScolaire").value;
    var cl = document.getElementById("classeEtudiant").value;
    if (nom === "") {
        error.style.display = "block"
    } else{
        error.style.display = "none"
            if (prenom === "") {
                error1.style.display = "block"
            }else {
                error1.style.display = "none"
                    if (adresse === "") {
                    error6.style.display = "block"
                    } else {
                    error6.style.display = "none"
                        if(cp==="") {
                        error15.style.display = "block"
                        }else{
                        error15.style.display = "none"
                            var sexe = document.querySelector('input[name="sexeEtudiant"]:checked').value;
                    var getHttpRequest = function () {
                    var HttpRequest = false;
                    if (window.XMLHttpRequest) {
                        HttpRequest = new XMLHttpRequest();
                        if (HttpRequest.overrideMimeType) {
                            HttpRequest.overrideMimeType('Text/XML');
                        }
                    } else if (window.ActiveXObject) {
                        try {
                            HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            try {
                                HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) { }
                        }
                    }
                    return HttpRequest;
                }
                var HttpRequest = getHttpRequest();
                HttpRequest.onreadystatechange = function () {
                    if (HttpRequest.readyState === 4) {
                        document.getElementById("confirmer").innerHTML = HttpRequest.responseText;
                    }
                }
                var str = "action.php?nomEtudiant=" + nom + "&prenomEtudiant=" + prenom + "&dateNaissanceEtudiant=" + datenaiss 
                        + "&lieuNaissEtudiant=" + lieunaiss + "&optionsRadios3=" + sexe + "&adresseEtudiant=" + adresse 
                        + "&maladieEtudiant=" + maladie + "&nomPereEtudiant=" + np + "&proffessionPere=" + pp 
                        + "&nomMereEtudiant=" + nm + "&proffessionMere=" + pm + "&nomTuteurEtudiant=" + nt
                        + "&proffessionTuteur=" + pc + "&adresseParentEtudiant=" + ap + "&contactParentEtudiant=" + cp 
                    + "&anneeScolaire=" + ans + "&classeEtudiant=" + cl + "&ajoutEtudiant=" + valide + "";
                HttpRequest.open('GET', str, true);
                HttpRequest.send(null);
                alert("Etudiant Enregistrer!");
                }
            }
        }
    }
}
function messageajour() {
    var valide1 = "1";
    var nom = document.getElementById("nomEtudiant").value;
    var error = document.getElementById("error");
    var prenom = document.getElementById("prenomEtudiant").value;
    var error1 = document.getElementById("error1");
    var datenaiss = document.getElementById("dateNaissanceEtudiant").value;
    var lieunaiss = document.getElementById("lieuNaissEtudiant").value;
    var sexe = document.querySelector('input[name="sexeEtudiant"]:checked').value;
    var adresse = document.getElementById("adresseEtudiant").value;
    var error6 = document.getElementById("error6");
    var maladie = document.getElementById("maladieEtudiant").value;
    var np = document.getElementById("nomPereEtudiant").value;
    var pp = document.getElementById("proffessionPere").value;
    var nm = document.getElementById("nomMereEtudiant").value;
    var pm = document.getElementById("proffessionMere").value;
    var nt = document.getElementById("nomTuteurEtudiant").value;
    var pc = document.getElementById("proffessionTuteur").value;
    var ap = document.getElementById("adresseParentEtudiant").value;
    var cp = document.getElementById("contactParentEtudiant").value;
    var ans = document.getElementById("anneeScolaire").value;
    var cl = document.getElementById("classeEtudiant").value;
    var id = document.getElementById("id").value;
    if (nom === "") {
        error.style.display = "block"
    } else {
        error.style.display = "none"
        if (prenom === "") {
            error1.style.display = "block"
        } else {
            error1.style.display = "none"
            if (adresse === "") {
                error6.style.display = "block"
            } else {
                error6.style.display = "none"
                if (cp === "") {
                    error15.style.display = "block"
                } else {
                    error15.style.display = "none"
                    var getHttpRequest = function () {
                        var HttpRequest = false;
                        if (window.XMLHttpRequest) {
                            HttpRequest = new XMLHttpRequest();
                            if (HttpRequest.overrideMimeType) {
                                HttpRequest.overrideMimeType('Text/XML');
                            }
                        } else if (window.ActiveXObject) {
                            try {
                                HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                            } catch (e) {
                                try {
                                    HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                } catch (e) { }
                            }
                        }
                        return HttpRequest;
                    }
                    var HttpRequest = getHttpRequest();
                    HttpRequest.onreadystatechange = function () {
                        if (HttpRequest.readyState === 4) {
                            document.getElementById("confirmer").innerHTML = HttpRequest.responseText;
                        }
                    }
                    var str = "action.php?nomEtudiant=" + nom + "&prenomEtudiant=" + prenom + "&dateNaissanceEtudiant=" + datenaiss
                        + "&lieuNaissEtudiant=" + lieunaiss + "&optionsRadios3=" + sexe + "&adresseEtudiant=" + adresse
                        + "&maladieEtudiant=" + maladie + "&nomPereEtudiant=" + np + "&proffessionPere=" + pp
                        + "&nomMereEtudiant=" + nm + "&proffessionMere=" + pm + "&nomTuteurEtudiant=" + nt
                        + "&proffessionTuteur=" + pc + "&adresseParentEtudiant=" + ap + "&contactParentEtudiant=" + cp
                        + "&anneeScolaire=" + ans + "&classeEtudiant=" + cl + "&ajourEtudiant=" + valide1 + "&id=" 
                        + id + "";
                    HttpRequest.open('GET', str, true);
                    HttpRequest.send(null);
                }
            }
        }
    }
}
function ajoutProf(){
    var valide = "1";
    var nom = document.getElementById("nomProf").value;
    var error = document.getElementById("error");
    var prenom = document.getElementById("prenomProf").value;
    var error1 = document.getElementById("error1");
    var cin = document.getElementById("cinProf").value;
    var error2 = document.getElementById("error2");
    var ddp = document.getElementById("dateDelivranceProf").value;  
    
    var dup = document.getElementById("duplicataProf").value;
    var ad = document.getElementById("adresseProf").value;
    var cp = document.getElementById("contactProf").value;
    var error8 = document.getElementById("error8");
    var nap = document.getElementById("numAutoProf").value;
    var error9 = document.getElementById("error9");
    var im = document.getElementById("imProf").value;
    var dap = document.getElementById("diplomeAcademiqueProf").value;
    var dpp = document.getElementById("diplomePedagogiqueProf").value;
    var fp = document.getElementById("fonctionProf").value;
    var sp = document.getElementById("specialiteProf").value;
    var ctp = document.getElementById("categorieProf").value;
    
        var cases1 = document.getElementsByName('matiere');
        var resultat1 = "";
        for (var i = 0; i < cases1.length; i++){
            if (cases1[i].checked){
                resultat1 += cases1[i].value +",";
            }
        }
    var mat=resultat1;
    var error16 = document.getElementById("error16");

        var cases2 = document.getElementsByName('classe');
        var resultat2 = "";
        for (var i = 0; i < cases2.length; i++) {
        if (cases2[i].checked) {
            resultat2 += cases2[i].value + ",";
        }
    }
    var classe = resultat2;

    var error17 = document.getElementById("error17");
    var enp = document.getElementById("encienneteProf").value;
    if (nom === "") {
        error.style.display = "block"
    } else {
        error.style.display = "none";
        if (prenom === "") {
            error1.style.display = "block"
        } else {
            error1.style.display = "none"
            if (cin === "") {
                error2.style.display = "block"
            } else {
                error2.style.display = "none"
                if (cp === "") {
                    error8.style.display = "block"
                } else {
                    error8.style.display = "none"
                    if (nap === "") {
                        error9.style.display = "block"
                    } else {
                        error9.style.display = "none"
                        if (mat === "") {
                            error16.style.display = "block"
                        } else {
                            error16.style.display = "none"
                            if (classe === "") {
                                error17.style.display = "block"
                            } else {
                                error17.style.display = "none";
                                var sexe = document.querySelector('input[name="sexe"]:checked').value;
                                var getHttpRequest = function () {
                                    var HttpRequest = false;
                                    if (window.XMLHttpRequest) {
                                        HttpRequest = new XMLHttpRequest();
                                        if (HttpRequest.overrideMimeType) {
                                            HttpRequest.overrideMimeType('Text/XML');
                                        }
                                    } else if (window.ActiveXObject) {
                                        try {
                                            HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                                        } catch (e) {
                                            try {
                                                HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                            } catch (e) { }
                                        }
                                    }
                                    return HttpRequest;
                                }
                                var HttpRequest = getHttpRequest();
                                HttpRequest.onreadystatechange = function () {
                                    if (HttpRequest.readyState === 4) {
                                        document.getElementById("ens").innerHTML = HttpRequest.responseText;
                                    }
                                }
                                var str = "action.php?nomProf=" + nom + "&prenomProf=" + prenom + "&cinProf=" + cin
                                    + "&dateDelivranceProf=" + ddp + "&optionsRadiosinline=" + sexe + "&duplicataProf=" + dup
                                    + "&adresseProf=" + ad + "&contactProf=" + cp + "&numAutoProf=" + nap
                                    + "&imProf=" + im + "&diplomeAcademiqueProf=" + dap + "&diplomePedagogiqueProf=" + dpp
                                    + "&fonctionProf=" + fp + "&specialiteProf=" + sp + "&categorieProf=" + ctp
                                    + "&matiere=" + mat + "&classe=" + classe + "&encienneteProf=" + enp + "&ajoutProf="+ valide +"";
                                HttpRequest.open('GET', str, true);
                                HttpRequest.send(null);
                            }
                        }
                    }
                }
            }
        }
    }
}
function ajourProf() {
    var valide1 = "1";
    var nom = document.getElementById("nomProf").value;
    var error = document.getElementById("error");
    var prenom = document.getElementById("prenomProf").value;
    var error1 = document.getElementById("error1");
    var cin = document.getElementById("cinProf").value;
    var error2 = document.getElementById("error2");
    var ddp = document.getElementById("dateDelivranceProf").value;
    var dup = document.getElementById("duplicataProf").value;
    var ad = document.getElementById("adresseProf").value;
    var cp = document.getElementById("contactProf").value;
    var error8 = document.getElementById("error8");
    var nap = document.getElementById("numAutoProf").value;
    var error9 = document.getElementById("error9");
    var im = document.getElementById("imProf").value;
    var dap = document.getElementById("diplomeAcademiqueProf").value;
    var dpp = document.getElementById("diplomePedagogiqueProf").value;
    var fp = document.getElementById("fonctionProf").value;
    var sp = document.getElementById("specialiteProf").value;
    var ctp = document.getElementById("categorieProf").value;
    var id = document.getElementById("id").value;
    var cases1 = document.getElementsByName('matiere');
    var resultat1 = "";
    for (var i = 0; i < cases1.length; i++) {
        if (cases1[i].checked) {
            resultat1 += cases1[i].value + ",";
        }
    }
    var mat = resultat1;
    var error16 = document.getElementById("error16");

    var cases2 = document.getElementsByName('classe');
    var resultat2 = "";
    for (var i = 0; i < cases2.length; i++) {
        if (cases2[i].checked) {
            resultat2 += cases2[i].value + ",";
        }
    }
    var classe = resultat2;

    var error17 = document.getElementById("error17");
    var enp = document.getElementById("encienneteProf").value;
    if (nom === "") {
        error.style.display = "block"
    } else {
        error.style.display = "none";
        if (prenom === "") {
            error1.style.display = "block"
        } else {
            error1.style.display = "none"
            if (cin === "") {
                error2.style.display = "block"
            } else {
                error2.style.display = "none"
                if (cp === "") {
                    error8.style.display = "block"
                } else {
                    error8.style.display = "none"
                    if (nap === "") {
                        error9.style.display = "block"
                    } else {
                        error9.style.display = "none"
                        if (mat === "") {
                            error16.style.display = "block"
                            alert("Verifier bien 'vous avez manquer quelque chose'");
                        } else {
                            error16.style.display = "none"
                            if (classe === "") {
                                error17.style.display = "block"
                                alert("Verifier bien 'vous avez manquer quelque chose'");
                            } else {
                                error17.style.display = "none";
                                var sexe = document.querySelector('input[name="sexe"]:checked').value;
                                var getHttpRequest = function () {
                                    var HttpRequest = false;
                                    if (window.XMLHttpRequest) {
                                        HttpRequest = new XMLHttpRequest();
                                        if (HttpRequest.overrideMimeType) {
                                            HttpRequest.overrideMimeType('Text/XML');
                                        }
                                    } else if (window.ActiveXObject) {
                                        try {
                                            HttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                                        } catch (e) {
                                            try {
                                                HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                            } catch (e) { }
                                        }
                                    }
                                    return HttpRequest;
                                }
                                var HttpRequest = getHttpRequest();
                                HttpRequest.onreadystatechange = function () {
                                    if (HttpRequest.readyState === 4) {
                                        document.getElementById("ens").innerHTML = HttpRequest.responseText;
                                    }
                                }
                                var str = "action.php?nomProf=" + nom + "&prenomProf=" + prenom + "&cinProf=" + cin
                                    + "&dateDelivranceProf=" + ddp + "&optionsRadiosinline=" + sexe + "&duplicataProf=" + dup
                                    + "&adresseProf=" + ad + "&contactProf=" + cp + "&numAutoProf=" + nap
                                    + "&imProf=" + im + "&diplomeAcademiqueProf=" + dap + "&diplomePedagogiqueProf=" + dpp
                                    + "&fonctionProf=" + fp + "&specialiteProf=" + sp + "&categorieProf=" + ctp
                                    + "&matiere=" + mat + "&classe=" + classe + "&encienneteProf=" + enp + "&ajourProf=" 
                                    + valide1 + "&id=" + id + "";
                                HttpRequest.open('GET', str, true);
                                HttpRequest.send(null);
                            }
                        }
                    }
                }
            }
        }
    }
}
function abscence(){
   var id = document.getElementById("ideleve").value;
   var trimestre = document.getElementById("trimestre").value;
   var ann = document.getElementById("anneescol").value;
    var h = document.getElementById("heure").value;
    var j= document.getElementById("date").value;
}