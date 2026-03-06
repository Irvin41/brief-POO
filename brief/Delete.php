<?php
require_once 'Auteur.php';

$auteurObj = new Auteur();

$id = $_GET['id'];

$auteurObj->supprimerAuteur($id);

header('Location: index.php');
exit;