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
            if (!output){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nu a fost gasit nimic',
                })
            }else {
                $("#myTable").find("tr:gt(0)").remove();
                $('#myTable').append(output);
            }

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
        ajax();
        $("#gradTable").hide();
        $("#myTable").show();

    }
});
$('#gradButton').click(function (e){
    e.preventDefault();
    var valueDate = document.getElementById('grad').value;
    if (!valueDate) {
        Swal.fire('Necesar de selectat filtrele')
    }
    else {
        let grad = $('input[name="grad"]').val();
        $.ajax({
            url: 'mediciPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                grad: grad
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
                        '</tr>';
                });

                // after finish creating html structure, append the output
                // into the table
                if (!output){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Nu a fost gasit nimic',
                    })
                }else
                {
                    $("#gradTable").find("tr:gt(0)").remove();
                    $("#myTable").hide();
                    $('#gradTable').show();
                    $('#gradTable').append(output);
                }
            }
        });
    }
});
$('#gardaButton').click(function (e){
    e.preventDefault();
    var valueDate = document.getElementById('theDate').value;
    if (!valueDate) {
        Swal.fire('Necesar de selectat filtrele')
    }
    else {
        let ziuaGarda = $('input[name="ziuaGarda"]').val();
        $.ajax({
            url: 'mediciPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                ziuaGarda: ziuaGarda
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
                        '</tr>';
                });

                // after finish creating html structure, append the output
                // into the table
                if (!output){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Nu a fost gasit nimic',
                    })
                }
                else {
                    $("#ziuaGarda").find("tr:gt(0)").remove();
                    $("#myTable").hide();
                    $("#gradTable").hide();
                    $('#ziuaGarda').show();
                    $('#ziuaGarda').append(output);
                }

            }
        });
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

$("#cars").change(function() {
    if ($(this).val() === "date") {
        $("#dateBox").show();
        $("#gradBox").hide();
        $("#gardaBox").hide();
    }
    else if ($(this).val() === "grad"){
        $("#dateBox").hide();
        $("#gradBox").show();
        $("#gardaBox").hide();
    }
    else if($(this).val() === "ziuaGarda"){
        $("#dateBox").hide();
        $("#gradBox").hide();
        $("#gardaBox").show();
    }
});