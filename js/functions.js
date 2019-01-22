$(document).ready(function(){


    $("#text_count").keyup(function (e){
        var text = $(this).val();
        data = {'text': text, 'op': 'counter'};
        $.ajax({
            'url' : 'process.php',
            'type' : 'POST',
            'dataType' : 'json',
            'data' : data,
            'success': function(data){
                console.log(data);
                if(data.status){
                    $("#words").text(data.counter);
                }
            }
        });
    });
});