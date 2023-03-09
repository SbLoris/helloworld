<?php
    require_once("api/includeAll.php");
    include("header.php");

    if($_SESSION['id_profil'] != 1) {
        echo "Vous n'avez pas les droits pour accéder à cette page";
        exit();
    }

    $req = new modAdmin();
?>

<form class="card" action = '' method ='POST'>
    <input name = 'name' placeholder = 'Nom'>
    <input name = 'username' placeholder = 'Prénom'>
    <input name = 'mail' placeholder = 'Email'>
    <input name = 'password' placeholder = 'Mot de passe'>
    <label for="team">--Choisissez une équipe</label>
    <select name ='team' required>
        <option value="NoTeam">Aucune équipe</option>
        <option value="TeamA">Team A</option>
        <option value="TeamB">Team B</option>
        <option value="TeamC">Team C</option>
    </select>
    <label for="role">--Choisissez un rôle</label>
    <select name="role" required>
            <?php if ($req->seeRoles->num_rows > 0): ?>
            <?php while($row = $req->seeRoles->fetch_assoc()):?>
                <option value="<?php echo($row['id']) ?>"><?php echo($row['profil']); ?></option>
            <?php endwhile; endif ?>
    </select>
    <button class="create" type ='submit' name='addEmploye'>Créer</button>
</form>