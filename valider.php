<?php	
	include('config.php');
	
	echo $_POST['name'];

	//vérification
	if (empty($_POST['name'])) {
		echo "objet requis";
    	$erreur = 'objet requis';
    	header('Location: index.php?erreur='.$erreur);
    } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
    	echo "contient des caractères interdits";
    	$erreur ='contient des caractères interdits';
    	header('Location: index.php?erreur='.$erreur);
    }
    $bdd = new PDO('mysql:host=localhost; dbname='.BDD_nom.'; charset=utf8', BDD_login, BDD_mdp);
    $requete="INSERT INTO argonaute (argo_id, argo_name) VALUES (NULL, '".$_POST['name']."')";
    $exe= $bdd -> query($requete);

    if (empty($erreur)) {
    	$success = 'requête envoyer avec succés';
    	header('Location: index.php?success='.$success);
    }
    //renvoie