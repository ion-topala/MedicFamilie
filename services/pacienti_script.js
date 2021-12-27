$(document).ready( function() {
    let dateSearch = " ";
    $.ajax({
        url: 'pacientiPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            dateSearch: dateSearch
        },
        success: function(data){
            var d = data.pacienti;
            var output;
            $.each(d,function(i,e) {
                if (e[11] == 0){
                 e[11] = "Nu este";
                }
                else if(e[11] == 1){
                    e[11] = "Este";
                }
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
                    '<td>'+e[9]+'</td>' +
                    '<td>'+e[10]+'</td>' +
                    '<td>'+e[11]+'</td>' +
                    '</tr>';
            });

            $('#myTable').append(output);
            $('#denVaccin').append(data.options)
        }
    });
});

$('#vaccinButton').click(function (e){
    e.preventDefault();
    var valueDate = document.getElementById('denVaccin').value;
    if (!valueDate) {
        Swal.fire('Necesar de selectat filtrele')
    }
    else {
        let denVaccin = $("#denVaccin").val();
        let dateSearch = "aaa";
        $.ajax({
            url: 'pacientiPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                denVaccin: denVaccin,
                dateSearch: dateSearch
            },
            success: function(data){
                var d = data.vaccin;
                var output;
                $.each(d,function(i,e) {
                    output += '<tr>' +
                        '<td>'+e[0]+'</td>' +
                        '<td>'+e[1]+'</td>' +
                        '<td>'+e[2]+'</td>' +
                        '<td>'+e[2]+'</td>' +
                        '</tr>';
                });
                if(!output){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Nu s-a gasit nimic',
                    })
                }else
                {
                    $('html, body').animate({
                        scrollTop: $(".footer-07").offset().top
                    }, 1000);

                    $("#vaccinTable").find("tr:gt(0)").remove();
                    $('#vaccinTable').append(output);
                    $('#vaccinTable').show();
                }
            }
        });
    }
});



$("#polita").change(function() {
    if ($(this).val() === "all") {
        $("tr:contains('Nu este')").show();
        $("tr:contains('Este')").show();
    }
    else if ($(this).val() === "true"){
        $("tr:contains('Este')").show();
        $("tr:contains('Nu este')").hide();
    }
    else if($(this).val() === "false"){
        $("tr:contains('Este')").hide();
        $("tr:contains('Nu este')").show();
    }
});