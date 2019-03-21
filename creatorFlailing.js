function dynamicdropdown(listindex)
{
    document.getElementById("subcategory").length = 0;
    switch (listindex)
    {
        case "Human" :
            document.getElementById("subcategory").options[0]=new Option("Please select framework","");
            document.getElementById("subcategory").options[1]=new Option("Cakephp","Cakephp");
            document.getElementById("subcategory").options[2]=new Option("Wordpress","Wordpress");
            document.getElementById("subcategory").options[3]=new Option("Codeigniter","Codeigniter");
            document.getElementById("subcategory").options[4]=new Option("Joomla","Joomla");
            document.getElementById("subcategory").options[5]=new Option("Magento","Magento");
            break;

        case "Java" :
            document.getElementById("subcategory").options[0]=new Option("Please select framework","");
            document.getElementById("subcategory").options[1]=new Option("Strauts","Strauts");
            document.getElementById("subcategory").options[2]=new Option("Hibernate","Hibernate");
            break;
        case "Javascript" :
            document.getElementById("subcategory").options[0]=new Option("Please select framework","");
            document.getElementById("subcategory").options[1]=new Option("D-Jango","D-Jango");
            document.getElementById("subcategory").options[2]=new Option("Angular","Angular");
            document.getElementById("subcategory").options[3]=new Option("Prototype","Prototype");
            document.getElementById("subcategory").options[4]=new Option("jQuery","jQuery");
            document.getElementById("subcategory").options[5]=new Option("Backbone","Backbone");
            break;
        case "Dotnet" :
            document.getElementById("subcategory").options[0]=new Option("Please select framework","");
            document.getElementById("subcategory").options[1]=new Option("VbScript","VbScript");
            break;
    }
    return true;
}