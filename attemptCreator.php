


<?php
/* 
*
*
* This is the main character creation page. The options for everything are stored in CSV files
* The first php section parses out the variables from the CSV files
*
*/
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


$phys_skills = file_get_contents("physical_skills_available.csv") ;
$phys_skills = explode("\r", $phys_skills);
$ment_skills = file_get_contents("mental_skills_available.csv") ;
$ment_skills = explode("\r", $ment_skills) ;
$spirit_skills = file_get_contents("spiritual_skills_available.csv") ;
$spirit_skills = explode("\r", $spirit_skills) ;
$major_advantages = file_get_contents("major_advantages.csv") ;
$major_advantages = explode("\r", $major_advantages) ;

$minor_advantages = file_get_contents("minor_advantages.csv") ;
$minor_advantages = explode("\r", $minor_advantages) ;

$major_disadvantages = file_get_contents("major_disadvantages.csv") ;
$major_disadvantages = explode("\r", $major_disadvantages) ;

$minor_disadvantages = file_get_contents("minor_disadvantages.csv") ;
$minor_disadvantages = explode("\r", $minor_disadvantages) ;

$traits = file_get_contents("traits.csv") ;
$traits = explode("\r", $traits) ;
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
    <form action="changesSubmitted.php" method="post">
      <h1>Create your Character </h1>
      <h2> First, name your character and assign pronouns</h2>
        <fieldset>
        		<legend>Name and Pronouns</legend>
        		<input type="text" name="name" /> <br />
        		<input type="text" name="pronouns" /> <br />
        </fieldset>
        <h2> Next, choose your character's race and background</h2>
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
           			<select multiple="multiple" name="physical[]" size="10">
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
           			<select multiple="multiple" name="mental[]" size="10">
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
        			<select multiple="multiple" name="spiritual[]" size = "10">
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
        <fieldset>
           		<legend>Advantages</legend>
           		<p>You may have two major and four minor advantages, or one major and two minor advantages.<br>
           		Make sure to balance this out by taking disadvantages so the total weight is zero.</p>

                 <fieldset>
                    <legend>Major Advantages</legend>
                    <select multiple="multiple" name="maj_adv[]" size="5">
                       <?php
                       foreach($major_advantages as $major_advantage){
                          $maj_adv = explode(",", $major_advantage) ;
                          $advantage = $maj_adv[1] ;
                          $weight = $maj_adv[2] ;
                          ?>
                          <option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
                       <?php }?>
                    </select>
                 </fieldset>

           		<fieldset>
           			<legend>Minor Advantages</legend>
           			<select multiple="multiple" name="min_adv[]" size="5">
           				<?php
           				foreach($minor_advantages as $minor_advantage) {
           					$min_adv = explode(",", $minor_advantage) ;
           					$advantage = $min_adv[1] ;
           					$weight = $min_adv[2] ;
           					?>
           					<option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
           				<?php }?>
           			</select>
           		</fieldset>

                 <fieldset>
                    <legend>Major Disadvantages</legend>
                    <select multiple = "multiple" name="maj_dis[]" size="5">
                       <?php
                       foreach ($major_disadvantages as $major_disadvantage){
                          $maj_dis = explode(",", $major_disadvantage) ;
                          $advantage = $maj_dis[1] ;
                          $weight = $maj_dis[2] ;
                          ?>
                          <option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
                       <?php }?>
                    </select>
                 </fieldset>

           		<fieldset>
           			<legend>Minor Disadvantages</legend>
           			<select multiple="multiple" name="min_dis[]" size="5">
           				<?php
           				foreach ($minor_disadvantages as $minor_disadvantage){
           					$min_dis = explode(",", $minor_disadvantage) ;
           					$advantage = $min_dis[1] ;
           					$weight = $min_dis[2] ;
           					?>
           					<option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
           				<?php }?>
           			</select>
           		</fieldset>

        </fieldset>
        <fieldset>
                 <legend>Traits</legend>
                 <p>You can pick as many traits as you like</p>
                 <select multiple="multiple" name="traits[]" size="5">
                    <?php
                    foreach ($traits as $trait){
                       $traits = explode(",", $trait) ;
                       $trait = $traits[1] ;
                       ?>
                       <option value="<?= $trait ?>"><?=$trait ?></option>
                    <?php }?>
                 </select>
        </fieldset>
    <input type="submit" name="submit"/>
    </form>

    </body>
</html>