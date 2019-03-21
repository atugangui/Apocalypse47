<?php

$races = file_get_contents("race_types.csv") ;
$races = explode("\r", $races) ;
$bgs = file_get_contents("background_choices.csv") ;
$bgs = explode("\r", $bgs) ;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create dyanamic dropdown list in javascript</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="Softdev/creatorFlailing.js"></script>

    </head>
    <title>Dynamic Drop Down List</title>
    <body>
        <div class="category_div" id="category_div">Please choose a race:
            <select name="category" class="required-entry" id="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">


                <option value="">Select Language</option>
                <option value="Php">Php</option>
                <option value="Java">Java</option>
                <option value="Javascript">Javascript</option>
                <option value="Dotnet">Dotnet</option>
            </select>



            <select name="race" size = "5">
            		<?php
            		foreach($races as $race){
            			$race = explode(",", $race) ;
            			$r = $race[0] ;
            			?>
            			<option value="<?= $r ?>"><?=$r ?></option>
            		<?php }?>
            </select>


        </div>
        <div class="sub_category_div" id="sub_category_div">Please select framework:
            <script type="text/javascript" language="JavaScript">
                document.write('<select name="subcategory" id="subcategory"><option value="">Please select framework</option></select>')
            </script>
            <noscript>
                <select name="subcategory" id="subcategory" >
                    <option value="">Please select framework</option>
                </select>
            </noscript>
        </div>
    </body>
</html>