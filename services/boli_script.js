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

            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("myInput"), data.pacientiIstorieMedicala.flat());
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
       $("#autocompleteBox").hide();
       $("#istoriaMedicalaTable").hide();
       $(".center").hide();
    }

    else if ($(this).val()==="pacientiBoli"){
        $("#myTable").hide();
        $("#pacientiBolnaviBox").show();
        $("#boliBox").hide();
        $("#autocompleteBox").hide();
        $("#istoriaMedicalaTable").hide();
        $("#pacientiBolnavi").hide();
        $(".center").show();
    }
        else if($(this).val()==="istoriaPacient"){
        $("#myTable").hide();
        $("#pacientiBolnavi").hide();
        $("#pacientiBolnaviBox").hide();
        $("#boliBox").hide();
        $("#autocompleteBox").show();
        $("#istoriaMedicalaTable").hide();
        $(".center").show();
    }
        else if (($(this).val()==="addPacient")){

    }
});
$("#newColumnBolnavi").click(function (e){
    e.preventDefault();
    Swal.fire({
        title: 'Adaugarea unei boli unui pacient',
        html: `<input type="text" id="login" class="swal2-input" placeholder="IDNP">
  <select class="swal2-input" id="swalSelect">
             <option value="afectiuni_sezon">Boli de sezon</option>
            <option value="boli_cronice">Boli cronice</option>
            <option value="boli_genetice">Boli genetice</option>
            <option value="boli_infectioase">Boli infectioase</option>
            <option value="lista_restboli">Alte boli</option>
    </select>
  <input type="text" id="password" class="swal2-input" placeholder="Boala">`,
        confirmButtonText: 'Submit',
        focusConfirm: false,
        preConfirm: () => {
            const login = Swal.getPopup().querySelector('#login').value
            const password = Swal.getPopup().querySelector('#password').value
            const swalSelect =  Swal.getPopup().querySelector('#swalSelect').value
            if (!login || !password) {
                Swal.showValidationMessage(`Introduceti datele`)
            }
            return { login: login, password: password, swalSelect:swalSelect }
        }
    }).then((result) => {
        var a = result.value.login;
        var b = result.value.password;
        var c = result.value.swalSelect;
        $.ajax({
            url: 'boliPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                pacientIDNP: a,
                boalaPacient: b,
                tabelul: c
            },
            success: function(data){
                if (data.status && typeof data.status === "boolean"){
                    Swal.fire('S-a inserat tot')
                }
            }
        });

    })
});

$("#newColumnIstorie").click(function (e){
    e.preventDefault();
    Swal.fire({
        title: 'Inserarea in tabelul istorie medicala',
        html: `<input type="text" id="login" class="swal2-input" placeholder="IDNP">
  <input type="text" id="password" class="swal2-input" placeholder="Boala">`,
        confirmButtonText: 'Adaugare',
        focusConfirm: false,
        preConfirm: () => {
            const login = Swal.getPopup().querySelector('#login').value
            const password = Swal.getPopup().querySelector('#password').value
            if (!login || !password) {
                Swal.showValidationMessage(`Introduceti datele`)
            }
            return { login: login, password: password }
        }
    }).then((result) => {
        var a = result.value.login;
        var b = result.value.password;
        $.ajax({
            url: 'boliPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                IDNP: a,
                boala: b
            },
            success: function(data){
                if (data.status && typeof data.status === "boolean"){
                    Swal.fire('TOT ok')
                }
            }
        });

    })
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
        $("#pacientiBolnavi").show();
        $(".center").hide();
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

$('#istorieMedButton').click(function (e){
    e.preventDefault();
    var myInput = $("#myInput").val();
    if(!myInput){
        Swal.fire('Necesar de introdus IDNP')
    }
    else {
        $("#istoriaMedicalaTable").show();
        $(".center").hide();
        $.ajax({
            url: 'boliPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                myInput: myInput,
            },
            success: function (data) {
                var d = data.pacientIstorie;
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
                    $("#istoriaMedicalaTable").find("tr:gt(0)").remove();
                    $('#istoriaMedicalaTable').append(output);
                }
            }
        });
    }
});

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}
