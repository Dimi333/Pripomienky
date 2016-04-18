<?php
//v. 1.0
header('Content-Type: text/html; charset=utf-8');

include 'set.php';
include 'Database.class.php';

$db = new Database($set_host, $set_user, $set_pass, $set_dbname);

$db->query("SET CHARACTER SET utf8");
$db->execute();
/*$jwt = new JWT();

if($_GET['vypisZeton']) {
	$token = null;

	$headers = apache_request_headers();

	if(isset($headers['Authorization'])){
		$matches = array();
		preg_match('/Token token="(.*)"/', $headers['Authorization'], $matches);

		if(isset($matches[1])){
			$token = $matches[1];
		}
	}

	$token = $jwt->decode($token, $key, array('HS256'));

	if($token->name) {
		echo $token->name;

	} else {
		echo "prihlas sa";
	}

} else if($_GET['vratZeton']) {

	$request_body = file_get_contents('php://input');
	echo json_decode($request_body);

	//echo "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
} else {*/
	var_dump($_POST);
	switch ($_POST['co']) {
		case 'spracujTxt':
			$vysledok = '';

			if($_POST['pole']) {
				$pole = $_POST['pole'];

				foreach(preg_split("/((\r?\n)|(\r\n?))/", $pole) as $line) {
					$vysledok .= "<p><label><input type='checkbox'> ".$line."</label></p>";
				}
			}

			echo json_encode($vysledok);

			break;

		case 'nacitajProjekty':
			$db->query("SELECT
							nazov,
							id
						FROM
							projekty

						ORDER BY
							hry.id
						DESC");

			echo json_encode($db->resultset());

			break;

		default:
			break;
	}
//}
