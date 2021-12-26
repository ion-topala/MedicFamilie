var JSONObj = {};

$(document).ready( function() {
    var index = " ";

    $.ajax({
        url: 'tratamentePHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            index: index,
        },
        success: function(data){
            JSONObj = data;
            var d = data.medicamente;
            var output;
            $.each(d,function(i,e) {
                output += '<tr>' +
                    '<td>'+e[0]+'</td>' +
                    '<td>'+e[1]+'</td>' +
                    '<td>'+e[2]+'</td>' +
                    '<td>'+e[3]+'</td>' +
                    '</tr>';
            });
            $('#listDrugs').append(output);
        }
    });
});

$('#substantaActivaButton').click(function (e){
    e.preventDefault();
    var substantaActiva = $("#substantaActiva").val();
    if (!substantaActiva){
        Swal.fire('Necesar de introdus filtrele');
    }
    $.ajax({
        url: 'tratamentePHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            substantaActiva: substantaActiva
        },
        success: function(data) {
            var d = data.medicamenteSubst;
            var output;
            $.each(d, function (i, e) {
                output += '<tr>' +
                    '<td>' + e[0] + '</td>' +
                    '<td>' + e[1] + '</td>' +
                    '<td>' + e[2] + '</td>' +
                    '<td>' + e[3] + '</td>' +
                    '</tr>';
            });
            if (!output) {
                Swal.fire('Nu a fost gasit nimic');
            } else {
                $("#listDrugs").find("tr:gt(0)").remove();
                $('#listDrugs').append(output);
            }
        }
    });
});

$('#allMedicamente').click(function (e){
    e.preventDefault();
    var d = JSONObj.medicamente;
    var output;
    $.each(d, function (i, e) {
        output += '<tr>' +
            '<td>' + e[0] + '</td>' +
            '<td>' + e[1] + '</td>' +
            '<td>' + e[2] + '</td>' +
            '<td>' + e[3] + '</td>' +
            '</tr>';
    });
    if (!output) {
        Swal.fire('Nu a fost gasit nimic');
    } else {
        $("#listDrugs").find("tr:gt(0)").remove();
        $('#listDrugs').append(output);
    }
});
$("#selectFiltru").change(function (){
    if ($(this).val() === "filtreSubstantaActiva"){
        $("#labelProducator").hide();
        $("#producator").hide();
        $("#producatorButton").hide();
        $("#labelSubstantaActiva").show();
        $("#substantaActiva").show();
        $("#substantaActivaButton").show();
    }
    else{
        $("#labelProducator").show();
        $("#producator").show();
        $("#producatorButton").show();
        $("#labelSubstantaActiva").hide();
        $("#substantaActiva").hide();
        $("#substantaActivaButton").hide();
    }

});

$('#producatorButton').click(function (e){
    e.preventDefault();
    var producator = $("#producator").val();
    if (!producator){
        Swal.fire('Necesar de introdus filtrele');
    }
    $.ajax({
        url: 'tratamentePHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            producator: producator
        },
        success: function(data) {
            var d = data.producator;
            var output;
            $.each(d, function (i, e) {
                output += '<tr>' +
                    '<td>' + e[0] + '</td>' +
                    '<td>' + e[1] + '</td>' +
                    '<td>' + e[2] + '</td>' +
                    '<td>' + e[3] + '</td>' +
                    '</tr>';
            });
            if (!output) {
                Swal.fire('Nu a fost gasit nimic');
            } else {
                $("#listDrugs").find("tr:gt(0)").remove();
                $('#listDrugs').append(output);
            }
        }
    });
});
$("#selectTr").change(function (){
    if($(this).val() === "medicamente"){
        $("#substantaActivaBox").show();
        $("#listDrugs").show();
        $("#investigare").hide();
    }
    else if($(this).val() === "investigatiiCard"){
        $("#substantaActivaBox").hide();
        $("#listDrugs").hide();
        $("#investigare").show();

        var d = JSONObj.investigatiiCard;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigare").find("tr:gt(0)").remove();
            $('#investigare').append(output);
        }
    }
    else if($(this).val() === "investigatiiOftal"){
        $("#substantaActivaBox").hide();
        $("#listDrugs").hide();
        $("#investigare").show();

        var d = JSONObj.investigatiiOftal;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigare").find("tr:gt(0)").remove();
            $('#investigare').append(output);
        }
    }
    else if($(this).val() === "investigatiiGen"){
        $("#substantaActivaBox").hide();
        $("#listDrugs").hide();
        $("#investigare").show();

        var d = JSONObj.investigatiiGen;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigare").find("tr:gt(0)").remove();
            $('#investigare').append(output);
        }
    }
    else if($(this).val() === "testeDiagn"){
        $("#substantaActivaBox").hide();
        $("#listDrugs").hide();
        $("#investigare").show();

        var d = JSONObj.testeDiagn;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigare").find("tr:gt(0)").remove();
            $('#investigare').append(output);
        }
    }
});