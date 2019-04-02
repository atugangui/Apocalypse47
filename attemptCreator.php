<?php
$races = file_get_contents("race_types.csv") ;
$races = explode("\r", $races) ;
$backgrounds = file_get_contents("background_choices.csv") ;
$backgrounds = explode("\r", $backgrounds) ;
$race_names = [];
$race_length = sizeof($races);
for($i = 0; $i < $race_length; $i++){
    $r = explode(",", $races[$i]);
    $race_names[$i] = $r[0];
}
$js_array = json_encode($race_names);
for ($i=0; $i < sizeof($backgrounds); $i++) {
    $temp = explode(",",$backgrounds[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $background[$i][$j] = $temp[$j];
    }
}
$background = json_encode($background);
?>



<html>
    <head>
        <title>Create Character</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
        var races = <?= $js_array ?>;
        var backgrounds = <?= $background ?> ;
        </script>
        <script src="creatorFlailing.js" type="text/javascript"></script>

    </head>
    <title>Create Character</title>
    <body>

        <fieldset>
        		<legend>Name and Pronouns</legend>
        		<input type="text" name="name" /> <br />
        		<input type="text" name="pronouns" /> <br />
        </fieldset>
        <fieldset>
            <legend> Race and Background </legend>
            <fieldset>
                <p> Select the race of your character: </p>
                <select name="category" class="required-entry" id="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
                    <option value="">Select race</option>
                    <?php
                    for ($i=1; $i < sizeof($race_names); $i++) {
                        ?>
                        <option value=<?=$race_names[$i] ?> > <?=$race_names[$i] ?></option>
                    <?php } ?>
                </select>
            </fieldset>
            <fieldset>
                <p> Select the background of your character: </p>
                <script type="text/javascript" language="JavaScript">
                                document.write('<select name="subcategory" id="subcategory"><option value="">Please select background</option></select>')
                </script>
                <noscript>
                    <select name="subcategory" id="subcategory" >
                        <option value="">Select background</option>
                    </select>
                </noscript>
            </fieldset>
        </fieldset>
        <fieldset>
           		<legend>Skills</legend>
           		<p>You start with ten points in a category of your choice, and twenty points in each of the other two.<br>
           		Remember to hold down control when picking multiple options</p>

           		<fieldset>
           			<legend>Physical</legend>
           			<select multiple="multiple" name="physical[]" size="5">
           				<?php
        		foreach($phys_skills as $phys){
        			$phys = explode(",", $phys) ;
        			$skill = $phys[0] ;
        			$requirement = $phys[1] ;
        			$cost = $phys[2] ;
        			$training = $phys[3] ;
        			?>
        			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
        		<?php }?>
           			</select>
           		</fieldset>

           		<fieldset>
           			<legend>Mental</legend>
           			<select multiple="multiple" name="mental[]" size="5">
           				<?php
        		foreach($ment_skills as $ment){
        			$ment = explode(",", $ment) ;
        			$skill = $ment[0] ;
        			$requirement = $ment[1] ;
        			$cost = $ment[2] ;
        			$training = $ment[3] ;
        			?>
        			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
        		<?php }?>
           			</select>
        		</fieldset>

        		<fieldset>
        			<legend>Spiritual</legend>
        			<select multiple="multiple" name="spiritual[]" size = "5">
        				<?php
        		foreach($spirit_skills as $spirit){
        			$spirit = explode(",", $spirit) ;
        			$skill = $spirit[0] ;
        			$requirement = $spirit[1] ;
        			$cost = $spirit[2] ;
        			$training = $spirit[3] ;
        			?>
        			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
        		<?php }?>
        			</select>
        		</fieldset>
           	</fieldset>


    </body>
</html>