<?php
session_start();

require './listes.php';
require './Classes/Scanner.php';
$scanner = new Scanner();


//Scanner Controller
if(!isset($_SESSION['text']) && !isset($_POST['text'])){
    $_POST['text'] = "Une balise d'ouverture sera surlignée en vert &lt;dnt&gt; et surlignera en bleu le texte jusqu'à la fermeture de celle-ci. &lt;/dnt&gt; Une mauvaise balise &lt;dtn&gt; sera surlignée en rouge.";
}
if(isset($_POST['text'])) {
    $_SESSION['text'] = $scanner->scanAll($openedDTN, $closedDTN, $validateItems, $unValidateItems, $_POST['text']);
}


$template = 'home';
$template .= '.phtml';
require './views/'. $template;

// session_destroy();