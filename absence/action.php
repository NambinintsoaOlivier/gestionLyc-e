<?php 
    include_once('config.inc.php');
    $photo="";
    $id="";
    $nom ="";
    $prenom = "";
    $datenaiss = "";
    $lieu = "";
    $sexe = "";
    $adresse = "";
    $modifier= "";
    $matiere = "";
    $note_journaliere = "";
    $note_composition = "";
    $nommat = "";
    $coefmat = "";
    $classemat = "";
    $nomprof = "";
    $prenomprof = "";
    $adressep= "";
    $telp= "";
    $numautop= "";
    $im= "";
    $dipaca= "";
    $dippeda= "";
    $fonction= "";
    $specialite= "";
    $matp= "";
    $catp= "";
    $classep= "";
    $dure= "";
    $photop= "";
    $poste= "";
    $cinp = "";
    $datedp = "";
    $duplicata = "";
    $ide = "";
    $mt = "";
    $annee = "";
    $nomp = "";
    $nomm = "";
    $nomt = "";
    $classe="";
    $nomp="";
    $prenomp="";
    $cinp="";
    $dated="";
    $duplicata="";
    $sexep="";
    $tel="";
    $numauto="";
    $im="";
    $academique="";
    $pedagogique="";
    $fonction="";
    $specialite="";
    $categ="";
    $acien="";
    $fonction="";

// ajout etudiants
    if(isset($_POST['ajout'])) 
        {
            
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $datenaiss=$_POST['datenaiss'];
            $lieunaiss=$_POST['lieunaiss'];
            $sexe=$_POST['optionsRadiosinline'];
            $adresse=$_POST['adresse'];
            $maladie=$_POST['maladie'];
            $nompere=$_POST['nompere'];
            $profpere=$_POST['profpere'];
            $nommere=$_POST['nommere'];
            $profmere=$_POST['profmere'];
            $nomtuteur=$_POST['nomtuteur'];
            $proftuteur=$_POST['proftuteur'];
            $adressep=$_POST['adressep'];
            $contactp=$_POST['contactp'];
            $anneescol=$_POST['anneescol'];
            $classe=$_POST['classe'];

            $requete="INSERT INTO etudiant SET nom_elev='".$nom."',prenom_elev='".$prenom."',date_naiss_elev='".$datenaiss."',
            lieu_naiss_elev='".$lieunaiss."',sexe_elev='".$sexe."',adresse_elev='".$adresse."',maladie_elev='".$maladie."',
            nom_classe='".$classe."',nomprenom_pere='".$nompere."',proffession_pere='".$profpere."',nomprenom_mere='".$nommere."',proffession_mere='".$profmere."'
            ,nomprenom_tuteur='".$nomtuteur."',proffession_tuteur='".$proftuteur."',adresse_parent='".$adressep."',contact_parent='".$contactp."',annee='".$anneescol."'";
            mysql_query($requete);
        
                $requete1 = "SELECT * FROM parent";
        
        
                $query = mysql_query($requete1);
        
                $row = mysql_fetch_assoc($query);
        
                $contact = $row['contact_parent'];

                if (isset($contactp) && $contactp!=$contact){
                
                $requete2="INSERT INTO parent SET nomprenom_pere='".$nompere."',proffession_pere='".$profpere."',nomprenom_mere='".$nommere."',proffession_mere='".$profmere."'
                ,nomprenom_tuteur='".$nomtuteur."',proffession_tuteur='".$proftuteur."',adresse_parent='".$adressep."',contact_parent='".$contactp."'";
                mysql_query($requete2);    

        }
            include('liste_etudiants.php');
        }
            
// ajout prof
    
    if(isset($_POST['ajoutprof'])) 
            {
                $nomp=$_POST['nomp'];
                $prenomp=$_POST['prenomp'];
                $cinp=$_POST['cinp'];
                $datedp=$_POST['datedp'];
                $sexe=$_POST['optionsRadiosinline'];
                $duplicata=$_POST['duplicata'];
                $adressep=$_POST['adressep'];
                $telp=$_POST['telp'];
                $numautop=$_POST['numautop'];
                $im=$_POST['im'];
                $dipaca=$_POST['dipaca'];
                $dippeda=$_POST['dippeda'];
                $fonction=$_POST['fonction'];
                $specialite=$_POST['specialite'];
                $matp=$_POST['matp'];
                $catp=$_POST['catp'];
                $classep=$_POST['classep'];
                $dure=$_POST['dure'];
                $poste='enseignant';
                
                $requete="INSERT INTO proffesseur SET nom_prof='".$nomp."',prenom_prof='".$prenomp."',cin_prof='".$cinp."',
                date_delivrance='".$datedp."',sexe_prof='".$sexe."',duplicata='".$duplicata."',adresse_prof='".$adressep."',
                tel_prof='".$telp."',num_auto_enseign='".$numautop."',im_prof='".$im."',d_academique_prof='".$dipaca."',
                d_pedagoqique_prof='".$dippeda."',fonction_prof='".$fonction."',specialite_prof='".$specialite."',matiere_prof='".$matp."'
                ,categ_pro_prof='".$catp."',nom_classe='".$classep."',Ancienet_enseign_prof='".$dure."',photo_prof='".$photop."'";
                mysql_query($requete);
                // echo $requete;
    
                include('personnels.php');
            }
// ajout matiere
    if(isset($_POST['ajoutmat']))
            {
                $nommat=$_POST['nommat'];
                $coefmat=$_POST['coefmat'];
                $classemat=$_POST['classemat'];

                $requete=" INSERT INTO matiere SET nom_matiere='".$nommat."',coef_matiere='".$coefmat."',classe_mat='".$classemat."'";
                mysql_query($requete);
                include('matiere.php');
            }
// ajout note

    if(isset($_POST['ajoutnote'])) 
    {
        $matiere = $_POST['matiere'];

        $classe=$_POST['classe'];

        $requete = "SELECT * FROM matiere where classe_mat='$classe' and nom_matiere ='$matiere' ";

        $query = mysql_query($requete);
    
        $row = mysql_fetch_array($query);

        $coef = $row['coef_matiere'];
       

        $id=$_POST['ideleve'];
        $classe=$_POST['classe'];
        $trimestre=$_POST['trimestre'];
        $nj=$_POST['note_journaliere'];
        $nc=$_POST['nc'];

            $requete="INSERT INTO notes SET id_elev='".$id."',nom_classe='".$classe."',trimestre='".$trimestre."',matiere='".$matiere."',note_journaliere='".$nj."',
            note_composition='".$nc."',coeff_matiere='".$coef."'";
            mysql_query($requete);


        include('evaluation.php');

    }
// delete etudiants

        
    if(isset($_GET['delete']))
        {
            $id = $_GET['delete'];
            $requete = "DELETE  FROM etudiant WHERE id_elev='$id'";
            mysql_query($requete);
            include('liste_etudiants.php');
        }

// delete matiere
    if(isset($_GET['del']))
            {
                $id = $_GET['del'];
                $requete = "DELETE FROM matiere WHERE code_matiere='$id'";

                mysql_query($requete);
                include('matiere.php');  
            }




// modification etudiants

    if(isset($_GET['edite']))
        {
            $id = $_GET['edite'];

            $requete = "SELECT * FROM etudiant where id_elev = '$id'";

            $query = mysql_query($requete);

            $row = mysql_fetch_array($query);

            $id = $row['id_elev'];
            $nom = $row['nom_elev'];
            $prenom = $row['prenom_elev'];
            $datenaiss = $row['date_naiss_elev'];
            $lieu = $row['lieu_naiss_elev'];
            $sexe = $row['sexe_elev'];
            $adresse = $row['adresse_elev'];
            $id = $row['id_elev'];
        }
// mise a jour etudiant

    if(isset($_POST['modif']))
        {
            $id = $_POST['textid'];
            $nom=$_POST['textnom'];
            $prenom=$_POST['textprenom'];
            $datenaiss=$_POST['textdatenaiss'];
            $lieunaiss=$_POST['textlieunaiss'];
            
            $adresse=$_POST['textadresse'];
            $maladie=$_POST['textmaladie'];

            $requete = "UPDATE etudiant SET nom_elev='$nom',prenom_elev='$prenom',date_naiss_elev='$datenaiss',lieu_naiss_elev='$lieunaiss',
            adresse_elev='$adresse',maladie_elev='$maladie' WHERE id_elev ='$id'";

            mysql_query($requete);

            include('liste_etudiants.php');
        }
// evaluation note

    if(isset($_GET['evaluer']))
        {
                    $id = $_GET['evaluer'];

        
                    $requete = "SELECT * FROM etudiant  where id_elev = '$id'";
        
                    $query = mysql_query($requete);
        
                    $row = mysql_fetch_array($query);
        
                    $id = $row['id_elev'];
                    $nom = $row ['nom_elev'];
                    $prenom = $row ['prenom_elev'];
                    $classe = $row['nom_classe'];

                     
        }


// delete note


    if(isset($_GET['sup']))
        {
            $id = $_GET['sup'];
            $requete = "DELETE FROM notes WHERE id_note='$id'";
            mysql_query($requete);
            
            include('evaluation.php');
        }

// modification note

    if(isset($_GET['modifnote']))
        {
            $id = $_GET['modifnote'];

            $requete = "SELECT * FROM (trimestre inner join notes on trimestre.nom_trimestre = notes.trimestre)  where id_note = '$id'";

            
            $query = mysql_query($requete);

            $row = mysql_fetch_array($query);

            $ide = $row['id_elev'];


            $trimestre= $row['nom_trimestre'];

            $classe = $row['nom_classe'];

            $matiere = $row['matiere'];

            $note_journaliere = $row['note_journaliere'];

            $note_composition = $row['note_composition'];

            $coefmat = $row['coeff_matiere'];

            $modifier = true;

        }
// mis a jour note
    if(isset($_POST['editenote']))
        {
            $requete = "SELECT * FROM (matiere inner join notes  on matiere.nom_matiere = notes.matiere)";


            $query = mysql_query($requete);
        
            $row = mysql_fetch_array($query);
    
            $coef = $row['coef_matiere'];

            $id=$_POST['txtid'];
            $nj=$_POST['note_journaliere'];
            $nc=$_POST['nc'];

            $requete = "UPDATE notes SET note_journaliere='$nj',
            note_composition='$nc',coeff_matiere='$coef' WHERE id_note = '$id'";
            mysql_query($requete);
            include('evaluation.php');
        }

// modification matiere
    if(isset($_GET['editematiere']))
        {
        $id = $_GET['editematiere'];

        $requete = "SELECT * FROM matiere where code_matiere = '$id'";

        $query = mysql_query($requete);

        $row = mysql_fetch_array($query);

        $id = $row['code_matiere'];
        $nommat = $row['nom_matiere'];
        $coefmat = $row['coeff_matiere'];
        $classemat = $row['classe_mat'];
        $modifier=true;

        }    
// mis a jour matiere
    if(isset($_POST['ajourmat']))
        {
        $id = $_POST['textid'];
        $nommat=$_POST['nommat'];
        $coefmat=$_POST['coefmat'];
        $classemat=$_POST['classemat'];

        $requete = "UPDATE matiere SET nom_matiere='$nommat',coeff_matiere='$coefmat',classe_mat='$classemat' WHERE code_matiere = '$id'";

        mysql_query($requete);

        include('matiere.php');
        }
// delete prof
    if(isset($_GET['deletepers']))
        {
        $id = $_GET['deletepers'];
        $requete = "DELETE FROM proffesseur WHERE id_prof='$id'";
        mysql_query($requete);
        include('personnels.php');
        }

// modification prof
    if(isset($_GET['editeprof']))
    {
        $id = $_GET['editeprof'];

        $requete = "SELECT * FROM proffesseur WHERE id_prof = '$id'";

        $query = mysql_query($requete);
        $row = mysql_fetch_array($query);
        
        $id = $row['id_prof'];
        $nomprof=$row['nom_prof'];
        $prenomprof=$row['prenom_prof'];
        $cinp=$row['cin_prof'];
        $datedp=$row['date_delivrance'];
        $sexe=$row['sexe_prof'];
        $duplicata=$row['duplicata'];
        $adressep=$row['adresse_prof'];
        $telp=$row['tel_prof'];
        $numautop=$row['num_auto_enseign'];
        $im=$row['im_prof'];
        $dipaca=$row['d_academique_prof'];
        $dippeda=$row['d_pedagoqique_prof'];
        $fonction=$row['fonction_prof'];
        $specialite=$row['specialite_prof'];
        $matp=$row['matiere_prof'];
        $catp=$row['categ_pro_prof'];
        $classep=$row['nom_classe'];
        $dure=$row['Ancienet_enseign_prof'];
        // $photop=$row['photo_prof'];
        $modifier=true;

    }
// mis a jour prof
    if(isset($_POST['ajourprof']))
    {
        $id=$_POST['textid'];
        $nomp=$_POST['nomp'];
        $prenomp=$_POST['prenomp'];
        $cinp=$_POST['cinp'];
        $datedp=$_POST['datedp'];
        $sexe=$_POST['optionsRadiosinline'];
        $duplicata=$_POST['duplicata'];
        $adressep=$_POST['adressep'];
        $telp=$_POST['telp'];
        $numautop=$_POST['numautop'];
        $im=$_POST['im'];
        $dipaca=$_POST['dipaca'];
        $dippeda=$_POST['dippeda'];
        $fonction=$_POST['fonction'];
        $specialite=$_POST['specialite'];
        $matp=$_POST['matp'];
        $catp=$_POST['catp'];
        $classep=$_POST['classep'];
        $dure=$_POST['dure'];
        // $photop=$_POST['photop'];
        $poste='enseignant';

        $requete = "UPDATE proffesseur SET nom_prof='$nomp',prenom_prof='$prenomp',cin_prof='$cinp',
        date_delivrance='$datedp',sexe_prof='$sexe',duplicata='$duplicata',adresse_prof='$adressep',
        tel_prof='$telp',num_auto_enseign='$numautop',im_prof='$im',d_academique_prof='$dipaca',
        d_pedagoqique_prof='$dippeda',fonction_prof='$fonction',specialite_prof='$specialite',matiere_prof='$matp',
        categ_pro_prof='$catp',nom_classe='$classep',Ancienet_enseign_prof='$dure',photo_prof='$photop'
         WHERE id_prof = '$id'";

        mysql_query($requete);
        // echo $requete;
        include('personnels.php');
    }
// information etudiant
    if(isset($_GET['inform']))
    {
        $id = $_GET['inform'];

        $requete = "SELECT * FROM etudiant  where id_elev = '$id' ";


        $query = mysql_query($requete);

        $row = mysql_fetch_array($query);

        $nom = $row['nom_elev'];
        $prenom = $row['prenom_elev'];
        $classe = $row['nom_classe'];
        $daten = $row['date_naiss_elev'];
        $lieun = $row['lieu_naiss_elev'];
        $nompere = $row['nomprenom_pere'];
        $profpere = $row['proffession_pere'];
        $nommere = $row['nomprenom_mere'];
        $profmere = $row['proffession_mere'];
        $nomtuteur = $row['nomprenom_tuteur'];
        $proftuteur = $row['proffession_tuteur'];
        $adresse = $row['adresse_elev'];
        $annee = $row['annee'];
    }
// bulletin
    if(isset($_GET['bulletin']))
    {
        $id = $_GET['bulletin'];

        $requete = "SELECT * FROM (etudiant inner join notes on etudiant.id_elev=notes.id_elev) WHERE etudiant.id_elev = '$id'";

        $query = mysql_query($requete);

        $row = mysql_fetch_assoc($query);

        $id = $row['id_elev'];
        $nom=$row['nom_elev'];
        $prenom=$row['prenom_elev'];
        $annee = $row['annee'];
        $classe = $row['nom_classe'];
        $trimestre = $row['trimestre'];

        
    }
    if(isset($_GET['six2']))
    {
    $id = $_GET['six2'];

    $requete = "SELECT * FROM etudiant where id_elev = '$id'";

    $query = mysql_query($requete);

    $row = mysql_fetch_array($query);

    $id = $row['id_elev'];
    }  
// ajout matiere
    if(isset($_POST['ajoutannee']))
            {
                $annee=$_POST['nomannee'];
                $requete="INSERT INTO anneescolaire SET code_annee='".$annee."'";
                mysql_query($requete);
                include('index1.php');
            }
// ajout classe
    if(isset($_POST['ajoutclasse']))
    {
        $classe=$_POST['nomclasse'];
        $requete="INSERT INTO classe SET nom_classe='".$classe."'";
        mysql_query($requete);
        include('index1.php');
    }
// affiche fils  
    if(isset($_GET['fils']))
        {
            $id = $_GET['fils'];

            $requete = "SELECT * FROM parent  where contact_parent = '$id'";

            $query = mysql_query($requete);

            $row = mysql_fetch_array($query);

            $nomp = $row['nomprenom_pere'];
            $nomm = $row['nomprenom_mere'];
            $nomt = $row['nomprenom_tuteur'];
            $id = $row['contact_parent'];
        }
// entrer absence
    if(isset($_GET['abs']))
    {
            $id = $_GET['abs'];


            $requete = "SELECT * FROM etudiant  where id_elev = '$id'";

            $query = mysql_query($requete);

            $row = mysql_fetch_array($query);

            $prenom= $row['prenom_elev'];
            $id = $row['id_elev'];
            $classe = $row['nom_classe'];

             
    }
// ajout abs
    if(isset($_POST['ajoutabs'])) 
    {
    $id=$_POST['ideleve'];
    $trimestre=$_POST['trimestre'];
    $annee=$_POST['anneescol'];
    $heure=$_POST['heure'];
    $date=$_POST['date'];

    $requete="INSERT INTO absence SET id_elev='".$id."',trimestre='".$trimestre."',heure='".$heure."',
    anneescol='".$annee."',date_jour='".$date."'";
    mysql_query($requete);
    include('absence.php');
    }
// information proffesseurs
    if(isset($_GET['infop']))
    {
    $id = $_GET['infop'];

    $requete = "SELECT * FROM proffesseur  where id_prof = '$id' ";


    $query = mysql_query($requete);

    $row = mysql_fetch_array($query);

    $nomp = $row['nom_prof'];
    $prenomp = $row['prenom_prof'];
    $cinp = $row['cin_prof'];
    $dated = $row['date_delivrance'];
    $sexep = $row['sexe_prof'];
    $duplicata = $row['duplicata'];
    $adresse = $row['adresse_prof'];
    $tel = $row['tel_prof'];
    $numauto = $row['num_auto_enseign'];
    $im = $row['im_prof'];
    $academique = $row['d_academique_prof'];
    $pedagogique = $row['d_pedagoqique_prof'];
    $fonction= $row['fonction_prof'];
    $specialite = $row['specialite_prof'];
    $matiere = $row['matiere_prof'];
    $categ = $row['categ_pro_prof'];
    $classe = $row['nom_classe'];
    $ancien = $row['Ancienet_enseign_prof'];

}
// delete parent
    if(isset($_GET['deleteparent']))
        {
            $id = $_GET['deleteparent'];
            $requete = "DELETE FROM parent WHERE code_parent='$id'";
            mysql_query($requete);
            include('liste_parents.php');
        }
?>