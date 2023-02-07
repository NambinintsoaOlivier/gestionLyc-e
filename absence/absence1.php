    <?php
    require("../securité/db_conn.php");
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        if ($search != "") {
            $sql = "SELECT * FROM etudiant";
            $resultat = $connection->query($sql);
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $nom = $row['nom_elev'];
                $prenom = $row['prenom_elev'];
                if (((strtolower($search)) == strtolower(substr($nom, 0, (strlen($search))))) || ((strtolower($search)) == strtolower(substr($prenom, 0, (strlen($search)))))
                ) { ?>
    <tr class="liste">
        <td width="20%">
            <a href="info.php?inform=<?php echo $row['id_elev'] ?>"><?php echo $row['nom_elev'];  ?></a>
        </td>
        <td width="20%">
            <?php echo $row['prenom_elev'];  ?>
        </td>
        <td width="20%">
            <?php echo $row['sexe_elev']; ?>
        </td>
        <td width="20%">
            <?php echo $row['nom_classe']; ?>
        </td>
        <td width="20%" class="text-center">
            <a class="btn btn-outline-primary" href="nouv_absence.php?absence=<?php echo $row['id_elev'] ?>">Ajouter</a>
        </td>
    </tr>
    <?php
                        }
                    }
                } else {
                    ?>
    <tbody id="search_elev">
        <?php
                        $sql = "SELECT * FROM etudiant order by date_inscription desc";
                        $resultat = $connection->query($sql);
                        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                            ?>
        <tr class="liste">
            <td width="20%">
                <a href="info.php?inform=<?php echo $row['id_elev'] ?>"><?php echo $row['nom_elev'];  ?></a>
            </td>
            <td width="20%">
                <?php echo $row['prenom_elev'];  ?>
            </td>
            <td width="20%">
                <?php echo $row['sexe_elev']; ?>
            </td>
            <td width="20%">
                <?php echo $row['nom_classe']; ?>
            </td>
            <td width="20%" class="text-center">
                <a class="btn btn-outline-primary"
                    href="nouv_absence.php?absence=<?php echo $row['id_elev'] ?>">Ajouter</a>
            </td>
        </tr>
        </body>
        <?php  }
                    }
                }
                if (isset($_GET['classe'])) {
                    $classe = $_GET['classe'];
                    $sql = "SELECT * FROM etudiant WHERE etudiant.nom_classe='$classe'";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $nom = $row['nom_elev'];
                        $prenom = $row['prenom_elev']; ?>
        <tr class="liste">
            <td width="20%">
                <a href="info.php?inform=<?php echo $row['id_elev'] ?>"><?php echo $row['nom_elev'];  ?></a>
            </td>
            <td width="20%">
                <?php echo $row['prenom_elev'];  ?>
            </td>
            <td width="20%">
                <?php echo $row['sexe_elev']; ?>
            </td>
            <td width="20%">
                <?php echo $row['nom_classe']; ?>
            </td>
            <td width="20%" class="text-center">
                <a class="btn btn-outline-primary"
                    href="nouv_absence.php?absence=<?php echo $row['id_elev'] ?>">Ajouter</a>
            </td>
        </tr>
        <?php
                }

                if ($classe === "tout") {
                    ?>
    <tbody id="search_elev">
        <?php
                        $sql = "SELECT * FROM etudiant order by date_inscription desc";
                        $resultat = $connection->query($sql);
                        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                            ?>
        <tr class="liste">
            <td width="20%">
                <a href="info.php?inform=<?php echo $row['id_elev'] ?>"><?php echo $row['nom_elev'];  ?></a>
            </td>
            <td width="20%">
                <?php echo $row['prenom_elev'];  ?>
            </td>
            <td width="20%">
                <?php echo $row['sexe_elev']; ?>
            </td>
            <td width="20%">
                <?php echo $row['nom_classe']; ?>
            </td>
            <td width="20%" class="text-center">
                <a class="btn btn-outline-primary"
                    href="nouv_absence.php?absence=<?php echo $row['id_elev'] ?>">Ajouter</a>
            </td>
        </tr>
        </body>
        <?php  }
            }
        } ?>

        </html>