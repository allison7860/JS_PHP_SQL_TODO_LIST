$(document).ready(function(){

    $('#submit').click(function(evt){
        evt.preventDefault();

        var data = {
        "name" : $('#name').val(),
        "description" : $('#description').val(),
        "date" : $('#date').val()
        };

        if (!(data.name == '') && !(data.description == '') && !(data.date == '')) {
        $.post('./includes/function.php?add', data)
            .done(function(result){
                getData();
            });
        } else {
            $('.popup_error').slideDown(300).fadeOut(3000);
        }
    });

    function getData() {
        $.ajax({
            url: './includes/function.php?list',
            method: 'GET',
            dataType: 'json'
        }).done(function(result){

                $('section').html('');
                $('section').append('<table><tr><th>Name</th><th>Date</th><th>Description</th><th>Remove</th></tr>');
                for (x in result) {
                    $('table').append('<tr><td>' + result[x].name + '</td><td>' + result[x].date +'</td><td>' + result[x].description + '</td><td><button class="'+result[x].name+'">X</button></td></tr>');
                }
                $('section').append('</table>');


                $('tr button').click(function () {
                    var con = confirm('Are you sure?');
                     if (con) {
                         var theclass = $(this).attr('class');
                         $.post('./includes/function.php?delete', { 'name': theclass })
                             .done(function () {
                                 getData();
                             });
                     } else {
                         return false;
                     }
                }); 
            });
    } getData();
});
