function ajax(){
    let dateSearch = $('input[name="dateSearch"]').val();
    $.ajax({
        url: 'mediciPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            dateSearch: dateSearch
        },
        success: function(data){
            // here we populate data returned by controller
            // if returned data is a plain array, then parse into javascript obj
            var d = data;
            // d = [{ name : 'john', phone : 123 }]; --> example
            // this depend on your returned data from controller
            var output;
            $.each(d,function(i,e) {
                // here you structured the code depend on the table of yours
                output += '<tr>' +
                    '<td>'+e[0]+'</td>' +
                    '<td>'+e[1]+'</td>' +
                    '<td>'+e[2]+'</td>' +
                    '<td>'+e[3]+'</td>' +
                    '<td>'+e[4]+'</td>' +
                    '<td>'+e[5]+'</td>' +
                    '<td>'+e[6]+'</td>' +
                    '<td>'+e[7]+'</td>' +
                    '<td>'+e[8]+'</td>' +
                    '</tr>';
            });

            // after finish creating html structure, append the output
            // into the table
            $('#myTable').append(output);
        }
    });
}
$('#dateButton').click(function (e){
    e.preventDefault();
    var valueDate = document.getElementById('dateSearch').value;
    if (!valueDate) {
        Swal.fire('Necesar de selectat filtrele')
    }
    else {
        $("#myTable").find("tr:gt(0)").remove();
        ajax();
    }
});

$(document).ready( function() {
    dateSearch = " ";
    $.ajax({
        url: 'mediciPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            dateSearch: dateSearch
        },
        success: function(data){
            // here we populate data returned by controller
            // if returned data is a plain array, then parse into javascript obj
            var d = data;
            // d = [{ name : 'john', phone : 123 }]; --> example
            // this depend on your returned data from controller
            var output;
            $.each(d,function(i,e) {
                // here you structured the code depend on the table of yours
                output += '<tr>' +
                    '<td>'+e[0]+'</td>' +
                    '<td>'+e[1]+'</td>' +
                    '<td>'+e[2]+'</td>' +
                    '<td>'+e[3]+'</td>' +
                    '<td>'+e[4]+'</td>' +
                    '<td>'+e[5]+'</td>' +
                    '<td>'+e[6]+'</td>' +
                    '<td>'+e[7]+'</td>' +
                    '<td>'+e[8]+'</td>' +
                    '</tr>';
            });

            // after finish creating html structure, append the output
            // into the table
            $('#myTable').append(output);
        }
    });
});



// $('#dateButton').click(function (e){
//     e.preventDefault();
//     let dateSearch = $('input[name="dateSearch"]').val();
//     $.ajax({
//         url: 'mediciPHP.php',
//         type: 'POST',
//         dataType: 'json',
//         data: {
//             dateSearch: dateSearch,
//         },
//         success: function(data){
//             // here we populate data returned by controller
//             // if returned data is a plain array, then parse into javascript obj
//             var d = data;
//             // d = [{ name : 'john', phone : 123 }]; --> example
//             // this depend on your returned data from controller
//             var output;
//             $.each(d,function(i,e) {
//                 // here you structured the code depend on the table of yours
//                 output += '<tr>' +
//                     '<td>'+e[0]+'</td>' +
//                     '<td>'+e[1]+'</td>' +
//                     '<td>'+e[2]+'</td>' +
//                     '<td>'+e[3]+'</td>' +
//                     '<td>'+e[4]+'</td>' +
//                     '<td>'+e[5]+'</td>' +
//                     '<td>'+e[6]+'</td>' +
//                     '<td>'+e[7]+'</td>' +
//                     '<td>'+e[8]+'</td>' +
//                     '</tr>';
//             });
//
//             // after finish creating html structure, append the output
//             // into the table
//             $('#myTable').append(output);
//         }
//     });
// });
