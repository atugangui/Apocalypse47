<?php
$races = file_get_contents("race_types.csv") ;
$races = explode("\r", $races) ;
$race_names = [];
$race_length = sizeof($races);
for($i = 0; $i < $race_length; $i++){
    $r = explode(",", $races[$i]);
    $race_names[$i] = $r[0];

}
$js_array = json_encode($race_names); 

?>



<html>
    <head>
        <title>Create dyanamic dropdown list in javascript</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
        var races = <?= $js_array ?>;
        </script>
        <script src="creatorFlailing.js" type="text/javascript"></script>

    </head>
    <title>Dynamic Drop Down List</title>
    <body>
        <div class="category_div" id="category_div">Select race:
            <select name="category" class="required-entry" id="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
                <option value="">Select race</option>
                <?php
                for ($i=1; $i < sizeof($race_names); $i++) { 
                    ?>
                    <option value=<?=$race_names[$i] ?> > <?=$race_names[$i] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="sub_category_div" id="sub_category_div">Select background:
            <script type="text/javascript" language="JavaScript">
                document.write('<select name="subcategory" id="subcategory"><option value="">Please select framework</option></select>')
            </script>
            <noscript>
                <select name="subcategory" id="subcategory" >
                    <option value="">Select background</option>
                </select>
            </noscript>
        </div>
    </body>
</html>                            
