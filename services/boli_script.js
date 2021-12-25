var JSONObj = {};

$(document).ready( function() {
    var tableBoala = $("#tableBoala").val();
    var pacientiB =$("#pacientiB").val();

    $.ajax({
        url: 'boliPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            tableBoala: tableBoala,
            pacientiB: pacientiB
        },
        success: function(data){
            JSONObj = data;
            var d = data.boli;
            var output;
            $.each(d,function(i,e) {
                output += '<tr>' +
                    '<td>'+e[0]+'</td>' +
                    '<td>'+e[1]+'</td>' +
                    '</tr>';
            });

            $('#myTable').append(output);
            $("#select2").append(data.afectiuniSezon);
        }
    });
});

$('#boliButton').click(function (e){
    e.preventDefault();
    var tableBoala = document.getElementById('tableBoala').value;
    $("#myTable").find("tr:gt(0)").remove();
    $.ajax({
        url: 'boliPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            tableBoala: tableBoala,
        },
        success: function(data){
            var d = data.boli;
            var output;
            $.each(d,function(i,e) {
                output += '<tr>' +
                    '<td>'+e[0]+'</td>' +
                    '<td>'+e[1]+'</td>' +
                    '</tr>';
            });

            $('#myTable').append(output);
        }
    });
});

$("#optionsSelect").change(function (){
    if ($(this).val()==="listaBoli"){
       $("#myTable").show();
       $("#pacientiBolnavi").hide();
       $("#pacientiBolnaviBox").hide();
       $("#boliBox").show();
    }

    else if ($(this).val()==="pacientiBoli"){
        $("#myTable").hide();
        $("#pacientiBolnavi").show();
        $("#pacientiBolnaviBox").show();
        $("#boliBox").hide();
    }
});

$("#pacientiB").change(function (){
    if ($(this).val() ==="boli_cronice"){
        $('#select2 option:not(:first)').remove();
        $("#select2").append(JSONObj.boliCronice);
    }
    else if ($(this).val() ==="boli_genetice"){
        $('#select2 option:not(:first)').remove();
        $("#select2").append(JSONObj.boliGenetice);
    }
    else if ($(this).val() ==="boli_infectioase"){
        $('#select2 option:not(:first)').remove();
        $("#select2").append(JSONObj.boliInfectioase);
    }
    else if ($(this).val() ==="afectiuni_sezon"){
        $('#select2 option:not(:first)').remove();
        $("#select2").append(JSONObj.afectiuniSezon);
    }
    else{
        $('#select2 option:not(:first)').remove();
        $("#select2").append(JSONObj.alteBoli);
    }
});

$('#pacientiBolnaviButton').click(function (e){
    e.preventDefault();
    var pacientiB = $("#pacientiB").val();
    var denBoala = $("#select2").val();
    if(!denBoala){
        Swal.fire('Necesar de selectat filtrele')
    }
    else {
        $.ajax({
            url: 'boliPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                pacientiB: pacientiB,
                denBoala: denBoala
            },
            success: function (data) {
                var d = data.pacientiBolnavi;
                var output;
                $.each(d, function (i, e) {
                    output += '<tr>' +
                        '<td>' + e[0] + '</td>' +
                        '<td>' + e[1] + '</td>' +
                        '<td>' + e[2] + '</td>' +
                        '<td>' + e[3] + '</td>' +
                        '</tr>';
                });
                if (!output){
                    Swal.fire('Nu a fost gasit nimic');
                }
                else if (output)
                {
                    $("#pacientiBolnavi").find("tr:gt(0)").remove();
                    $('#pacientiBolnavi').append(output);
                }
            }
        });
    }
});
