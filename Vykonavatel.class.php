<?php
/**
* Trieda, ktorá robí všetky tie veci, aby sa dalo volať viac funkcii naraz napr. pridaj a zároveň vrát nový zoznam projektov
*/

class Vykonavatel
{
	private $db = null;
	public $json_vysledok;

	function __construct($db) {
		$this->db = $db;
	}

	function vypisVysledok() {
		echo $this->json_vysledok;
	}

	function nacitajProjekty() {
		$this->db->query("SELECT * FROM projekty");

		$this->json_vysledok = json_encode($this->db->resultset());
	}

	function pridajProjekt($nazov) {
		$this->db->query('INSERT INTO projekty (nazov) VALUES (:nazov)');
		$this->db->bind(':nazov', $nazov);
		$this->db->execute();
	}

	function spracujTxt($surovyTxt) {
		$vysledok = array();

		if($surovyTxt) {
			$pole = $surovyTxt;

			foreach(preg_split("/((\r?\n)|(\r\n?))/", $pole) as $line) {
				array_push($vysledok, $line);
			}
		}

		$this->json_vysledok = json_encode($vysledok);
	}
}