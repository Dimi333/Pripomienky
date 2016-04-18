<form action="/txtparse/parsetxt.php" method="post">
	<textarea name="pole" style="width:100%; height:150px"></textarea>

	<button type="submit">Posli</button>
</form>

<?php
	if($_POST['pole']) {
		$subject = $_POST['pole'];

		foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
	    	echo "<p><label><input type='checkbox'> ".$line."</label></p>";
		}
	}
