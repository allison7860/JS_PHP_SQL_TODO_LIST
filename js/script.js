$(document).ready(function(){

    $('#submit').click(function(evt){
        evt.preventDefault();

        var data = {
        "name" : $('#name').val(),
        "description" : $('#description').val(),
        "date" : $('#date').val()
        };

        $.post('./includes/function.php?add', data)
            .done(function(){
                getData();
            });
    });

    function getData() {
        $.ajax({
            url: './includes/function.php?list',
            method: 'GET',
            dataType: 'json'
        }).done(function(data){

                $('section').html('');
                $('section').append('<table><tr><th>Name</th><th>Date</th><th>Description</th><th>Remove</th></tr>');
                for (x in data) {
                    $('table').append('<tr><td>' + data[x].name + '</td><td>' + data[x].date +'</td><td>' + data[x].description + '</td><td><button class="'+data[x].name+'">X</button></td></tr>');
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
                         pass;
                     }
                }); 
            });
    } getData();
});
