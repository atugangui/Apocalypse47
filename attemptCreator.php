<?php

$races = file("race_types.csv") ;
$race_names = [];
foreach($races as $race){
    list($race_names) = split(',', $race);
}

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
                <?php
                foreach($racenames as $racename){ ?>
                    <option value="<?= $racename ?>"><?=$racename ?></option>
                <?php }?>
            </select>
        </div>

/*
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
*/
    </body>
</html>