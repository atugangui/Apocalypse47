<?php
$get_races = "SELECT name from races";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Apocalypse 47 Character Creator</title>
		<meta charset="utf-8"/>

		<!-- css file link -->
		<link href="Creator.css" type="text/css" rel="stylesheet"/>
	</head>

	<body>
		<p>This is an online tool for making a character in the Apocalypse 47 LARP</p>
		<div id="creationNew">
			<fieldset>
				<button id="new">Create new character</button>
				<br>
				<br>
				<input name="load" type="text" size="22" placeholder="Enter a character to load it"></input>
			</fieldset>
		</div>
		<div id="char_area">
			<fieldset>
				<legend>Race</legend>
				<select id="race" size="5">
					<?php /*
					foreach (perform_query($get_races) as $rowRaces) { ?>
						<option><?= $rowRaces["race"] ?></option>

					  <?php}*/?>
				</select>
				<input type="submit" name="sel_race"/>
				<?php /*$selected_race = $_POST['sel_race'] ;
				$stmt = $db->prepare("SELECT background from backgrounds WHERE race = $selected_race" ;)
				$stmt->execute() ;
				$bg_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				*/?>
			</fieldset>

			<fieldset>
				<legend>Background</legend>

				<select id="background" size="5">
					<?php/*
					foreach($bg_rows as $bg_row){ ?>
						<option><?= $bg_row["background"] ?></option>
						<?php}
						*/?>
				</select>
				<input type="submit" name="sel_background"/>
			</fieldset>


			<fieldset>
				<legend>Advantages/Disadvantages</legend>
				<select id="advantages" size="5", multiple="multiple">

				</select>
				<input type="submit" name="sel_race"/>
			</fieldset>

			<fieldset>
				<legend>Skills</legend>
				<p>Choose which skill you only get ten points for:</p>
				<br>
				<input type="radio" name="skill_cat" value="physical" id="physical">
				<label for="physical">Physical</label>
				<input type="radio" name="skill_cat" value="mental" id="mental">
				<label for="mental">Mental</label>
				<input type="radio" name="skill_cat" value="spiritual" id="spiritual">
				<label for="spiritual">Spiritual</label>
			</fieldset>

		</div>

	</body>
</html>
