<?php
/* 
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
        <!-- Compiled and minified CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Custom CSS for Creator.php -->
        <link href="charactersheet.css" rel="stylesheet">
        <script>
        var races = <?= $js_array ?>;
        var backgrounds = <?= $background ?> ;
        </script>
        <script src="creatorFlailing.js" type="text/javascript"></script>
    </head>
    <title>Create Character</title>
    <body>
    <form action="changesSubmitted.php" method="post">
      <h1 id="title">Create your Character </h1>

        <!-- name and pronouns -->
      <div class="container page-container" >

        	<h2>Name and Pronouns</h2>
          <div class="container">
        	<input type="text" value='name' name="name" />
        	<input type="text" value='pronouns' name="pronouns" />
      </div>

       <!-- race and background -->
        <h2> Race and Background </h2>
        <div class="container">
          <select name="race" class="required-entry" id="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
              <option value="">Select race</option>
              <?php
              for ($i=1; $i < sizeof($race_names); $i++) {
                  ?>
                  <option value=<?=$race_names[$i] ?> > <?=$race_names[$i] ?></option>
              <?php } ?>
          </select>    
          <script type="text/javascript" language="JavaScript">
                                document.write('<select name="background" id="subcategory"><option value="">Please select background</option></select>')
          </script>
          <noscript>
              <select name="background" id="subcategory" >
                  <option value="">Select background</option>
              </select>
          </noscript>
      </div>

       <!---------------------------------------------- skills ---------------------------->
        <h2>Skills</h2>
        <div class="container">
        <p> Each new character starts with 50 points to allot to skills: 10 points in one category and 20 points in the remaining two categories. <br> Remember to hold down the 'ctrl' button when selecting multiple options!</p>
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

        	<option value="<?= $skill ?>, <?= $cost ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required:  <?=$training?></option>

        		<?php }?>
          </select>

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

        	<option value="<?= $skill?>, <?= $cost ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>

        		<?php }?>
          </select>

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

        	<option value="<?= $skill ?>, <?= $cost ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>

        		<?php }?>
        	</select>
      </div>
      
      
        <h2>Advantages</h2>
        <div class="container">
        <p> Each major trait is worth two minor traits, so make sure your advantages and disadvantages equal out!
          <br>
        For example, if you have two minor advantages you can select one major disadvantage or two minor disadvantages</p>
          <legend>Major Advantages</legend>
          <select multiple="multiple" name="maj_adv[]" size="5">


            <?php
          foreach($major_advantages as $major_advantage){
            $maj_adv = explode(",", $major_advantage) ;
            $advantage = $maj_adv[1] ;
            $weight = $maj_adv[2] ;
            ?>

          <option value="<?= $advantage ?>, <?= $weight ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>

            <?php }?>
          </select>

          <legend>Minor Advantages</legend>
          <select multiple="multiple" name="min_adv[]" size="5">
           	<?php
          foreach($minor_advantages as $minor_advantage) {
           	$min_adv = explode(",", $minor_advantage) ;
           	$advantage = $min_adv[1] ;
           	$weight = $min_adv[2] ;
           	?>

          <option value="<?= $advantage ?>, <?= $weight ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>

           	<?php }?>
          </select>

          <legend>Major Disadvantages</legend>
          <select multiple = "multiple" name="maj_dis[]" size="5">
            <?php
          foreach ($major_disadvantages as $major_disadvantage){
            $maj_dis = explode(",", $major_disadvantage) ;
            $advantage = $maj_dis[1] ;
            $weight = $maj_dis[2] ;
            ?>

          <option value="<?= $advantage ?>, <?= $weight ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>

            <?php }?>
          </select>

            <legend>Minor Disadvantages</legend>
           	<select multiple="multiple" name="min_dis[]" size="5">
           		<?php
           	foreach ($minor_disadvantages as $minor_disadvantage){
           		$min_dis = explode(",", $minor_disadvantage) ;
           		$advantage = $min_dis[1] ;
           		$weight = $min_dis[2] ;
           		?>

           	<option value="<?= $advantage ?>, <?= $weight ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>

           		<?php }?>
          </select>

      </div>
      
       <!-- Traits -->
        <h2>Traits</h2>
        <div class="container">
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
      </div>

</div>
    <input class="btn btn-dark" type="submit" name="submit"/>
    <a href="welcome.php" class="btn btn-dark">Return to Home Page</a>

    </form>
    </body>

</html>