$(document).ready(function(){
    var count = 0;
    $("#text_count").keyup(function (e){
        var text = $(this).val();
        data = {'text': text, 'op': 'counter'};
        $.ajax({
            'url' : 'class/Process.php',
            'data' : data,
        });
    });
});