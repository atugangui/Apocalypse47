$("#first-choice").change(function() {

    var $dropdown = $(this);

    $.getJSON("jsonbackgrounds.json", function(data) {

        var key = $dropdown.val();
        var vals = [];

        switch(key) {
            case 'human':
                vals = data.human.split(",");
                break;
            case 'havassian':
                vals = data.havassian.split(",");
                break;
            case 'base':
                vals = ['Please choose from above'];
        }

        var $secondChoice = $("#second-choice");
        $secondChoice.empty();
        $.each(vals, function(index, value) {
            $secondChoice.append("<option>" + value + "</option>");
        });

    });
});