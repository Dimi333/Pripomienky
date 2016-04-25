<?php
//v. 1.0
header('Content-Type: text/html; charset=utf-8');

include 'set.php';
include 'Database.class.php';
include 'Vykonavatel.class.php';

$db = new Database($set_host, $set_user, $set_pass, $set_dbname);

$db->query("SET CHARACTER SET utf8");
$db->execute();

$params = json_decode(file_get_contents('php://input'), true);

$vyk = new Vykonavatel($db);


switch ($params['co']) {
	case 'spracujTxt':
		$vyk->spracujTxt($params['surovyTxt']);
		$vyk->vypisVysledok();
		
		break;

	case 'nacitajProjekty':
		$vyk->nacitajProjekty();
		$vyk->vypisVysledok();

		break;

	case 'pridajProjekt':
		$vyk->pridajProjekt($params['nazov']);
		$vyk->nacitajProjekty();
		$vyk->vypisVysledok();

		break;

	default:
		break;
}

