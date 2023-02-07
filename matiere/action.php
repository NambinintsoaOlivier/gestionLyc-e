    <?php
require_once("../securité/db_conn.php");
    if(isset($_GET['del']))
    {
    $id = $_GET['del'];
    $sql = "DELETE FROM matiere WHERE code_matiere='$id'";

    $resultat = $connection->query($sql);
    include('matiere.php');
    }