function dynamicdropdown(listindex)
{

    document.getElementById("subcategory").length = 0;
    switch (listindex)
    {
        case "Human" :
            document.getElementById("subcategory").options[0]=new Option("Please select background","");
            var i = 1;
            var option = 1;
            while (i<backgrounds.length){
                if ("Human" == backgrounds[i][1]) {
                    document.getElementById("subcategory").options[option]=new Option(backgrounds[i][0],backgrounds[i][0]);
                    option++;
                }
                i++;
            }
            break;

        case "Havassian" :
            document.getElementById("subcategory").options[0]=new Option("Please select background","");
            var i = 1;
            var option = 1;
            while (i<backgrounds.length){
                if ("Havassian" == backgrounds[i][1]) {
                    document.getElementById("subcategory").options[option]=new Option(backgrounds[i][0],backgrounds[i][0]);
                    option++;
                }
                i++;
            }
            break;
        case "Vaukderir" :
            document.getElementById("subcategory").options[0]=new Option("Please select background","");
            var i = 1;
            var option = 1;
            while (i<backgrounds.length){
                if ("Vaukderir" == backgrounds[i][1]) {
                    document.getElementById("subcategory").options[option]=new Option(backgrounds[i][0],backgrounds[i][0]);
                    option++;
                }
                i++;
            }
            break;
        case "Wulfen" :
            document.getElementById("subcategory").options[0]=new Option("Please select background","");
            var i = 1;
            var option = 1;
            while (i<backgrounds.length){
                if ("Wulfen" == backgrounds[i][1]) {
                    document.getElementById("subcategory").options[option]=new Option(backgrounds[i][0],backgrounds[i][0]);
                    option++;
                }
                i++;
            }
            break;
    }
    return true;
}