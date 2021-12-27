var JSONObj = {};

$(document).ready( function() {
    var index = " ";

    $.ajax({
        url: 'inscrieriPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            index: index,
        },
        success: function(data){
            JSONObj = data;
            var d = data.all;
            var output;
            $.each(d,function(i,e) {
                output += '<tr>' +
                    '<td>'+e[1]+'</td>' +
                    '<td>'+e[2]+'</td>' +
                    '<td>'+e[3]+'</td>' +
                    '<td>'+e[4]+'</td>' +
                    '<td>'+e[5]+'</td>' +
                    '<td>'+e[6]+'</td>' +
                    '<td><a style="color:#ec3838;" href="delete.php?id='+e[0]+'">Delete</a></td>' +
                    '</tr>';
            });

            $('#inscrieriTable').append(output);

            $("#numeP").append(data.pacienti);
            $("#numeM").append(data.medici);
        }
    });
});

$('#cautareData').click(function (e){
    e.preventDefault();
    var meetingTime = document.getElementById('meeting-time').value;
    if (!meetingTime){
        Swal.fire('Necesar de selectat filtrele')
    }
    else
    {
        $.ajax({
            url: 'inscrieriPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                meetingTime: meetingTime,
            },
            success: function(data){
                var d = data.meetTime;
                var output;
                $.each(d,function(i,e) {
                    output += '<tr>' +
                        '<td>'+e[0]+'</td>' +
                        '<td>'+e[1]+'</td>' +
                        '<td>'+e[2]+'</td>' +
                        '<td>'+e[3]+'</td>' +
                        '<td>'+e[4]+'</td>' +
                        '<td>'+e[5]+'</td>' +
                        '</tr>';
                });
                if (!output){
                    Swal.fire('Nu a fost gasit nimic');
                }
                else
                {
                    $("#inscrieriTable").find("tr:gt(0)").remove();
                    $('#inscrieriTable').append(output);
                }
            }
        });
    }
});

$("#showAll").click(function (e){
    e.preventDefault();
    var d = JSONObj.all;
    var output;
    $.each(d,function(i,e) {
        output += '<tr>' +
            '<td>'+e[1]+'</td>' +
            '<td>'+e[2]+'</td>' +
            '<td>'+e[3]+'</td>' +
            '<td>'+e[4]+'</td>' +
            '<td>'+e[5]+'</td>' +
            '<td>'+e[6]+'</td>' +
            '<td><a style="color:#ec3838;" href="delete.php?id='+e[0]+'">Delete</a></td>' +
            '</tr>';
    });
    $("#inscrieriTable").find("tr:gt(0)").remove();
    $('#inscrieriTable').append(output);
});

$("#createApp").click(function (e){
    e.preventDefault();
    var meetingApp = document.getElementById('meetingApp').value;
    var numeP = $("#numeP").val();
    var numeM = $("#numeM").val();

    if (!meetingApp || !numeP || !numeM){
        Swal.fire('Necesar de introdus toate datele');
    }
    else
    {
        $.ajax({
            url: 'inscrieriPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                meetingApp: meetingApp,
                numeP: numeP,
                numeM: numeM
            },
            success: function(data){
                if (data.status && typeof data.status == "boolean"){
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Inserarea a avut loc cu succes',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#appointment')[0].reset();
                }
            }
        });
    }
});