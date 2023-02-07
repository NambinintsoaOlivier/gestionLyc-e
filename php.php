<?php
        require_once("securité/db_conn.php");
        $sql = "SELECT count(id_elev) AS nbrTotal FROM etudiant";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $nbrTotal = $liste->nbrTotal;
        }

        $sql = "SELECT count(id_elev) AS six FROM etudiant  WHERE nom_classe='6 eme'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $six = $liste->six;
        }

        $sql = "SELECT count(id_elev) AS cinq FROM etudiant  WHERE nom_classe='5 eme'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $cinq = $liste->cinq;
        }

        $sql = "SELECT count(id_elev) AS quatre FROM etudiant  WHERE nom_classe='4 eme'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $quatre = $liste->quatre;
        }

        $sql = "SELECT count(id_elev) AS trois FROM etudiant  WHERE nom_classe='3 eme'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $trois = $liste->trois;
        }

        $sql = "SELECT count(id_elev) AS second FROM etudiant  WHERE nom_classe='Second'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $second = $liste->second;
        }

        $sql = "SELECT count(id_elev) AS PremiereL FROM etudiant  WHERE nom_classe='Premiere L'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $PremiereL = $liste->PremiereL;
        }

        $sql = "SELECT count(id_elev) AS PremiereS FROM etudiant  WHERE nom_classe='Premiere S'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $PremiereS = $liste->PremiereS;
        }

        $sql = "SELECT count(id_elev) AS TerminalL FROM etudiant  WHERE nom_classe='Terminal L'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $TerminalL = $liste->TerminalL;
        }

        $sql = "SELECT count(id_elev) AS TerminalS FROM etudiant  WHERE nom_classe='Terminal S'";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $TerminalS = $liste->TerminalS;
        }

        $sql = "SELECT count(id_prof) AS prof FROM enseignant2";
        $resultat = $connection->query($sql);
        while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
            $prof = $liste->prof;
        }

        ?>