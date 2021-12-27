var JSONObj = {};

$(document).ready( function() {
    var index = " ";

    $.ajax({
        url: 'prescrieriPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            index: index,
        },
        success: function(data){
            JSONObj = data;
            var d = data.medicamentePrescrise;
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
            $('#medicamentePrescrise').append(output);
            autocomplete(document.getElementById("myInput"),data.listaMedicamente.flat());
        }
    });
});

$('#istorieMedButton').click(function (e){
    e.preventDefault();
    var medicament = $("#myInput").val();
    if (!medicament){
        Swal.fire('Necesar de introdus filtrele');
    }
    $.ajax({
        url: 'prescrieriPHP.php',
        type: 'POST',
        dataType: 'json',
        data: {
            medicament: medicament
        },
        success: function(data) {
            var d = data.filtruMedicament;
            var output;
            $.each(d, function (i, e) {
                output += '<tr>' +
                    '<td>' + e[0] + '</td>' +
                    '<td>' + e[1] + '</td>' +
                    '<td>' + e[2] + '</td>' +
                    '<td>' + e[3] + '</td>' +
                    '<td>' + e[4] + '</td>' +
                    '<td>' + e[5] + '</td>' +
                    '</tr>';
            });
            if (!output) {
                Swal.fire('Nu a fost gasit nimic');
            } else {
                $("#medicamentePrescrise").find("tr:gt(0)").remove();
                $('#medicamentePrescrise').append(output);
            }
        }
    });
});

$("#selectPrescrieri").change(function (){
    if ($(this).val() === "prescriereInvestigatiiCard"){
        $("#medicamentePrescrise").hide();
        $("#autocompleteBox2").hide();
        $("#investigatiiPrescrise").show();
        $("#prescrieInvestBox").show();
        var d = JSONObj.investigatiiCard;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '<td>' + e[2] + '</td>' +
                '<td>' + e[3] + '</td>' +
                '<td>' + e[4] + '</td>' +
                '<td>' + e[5] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigatiiPrescrise").find("tr:gt(0)").remove();
            $('#investigatiiPrescrise').append(output);
        }
    }
    else if($(this).val() === "prescriereMedicamente"){
        $("#investigatiiPrescrise").hide();
        $("#medicamentePrescrise").show();
        $("#autocompleteBox2").show();
        $("#prescrieInvestBox").hide();
        var d = JSONObj.medicamentePrescrise;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '<td>' + e[2] + '</td>' +
                '<td>' + e[3] + '</td>' +
                '<td>' + e[4] + '</td>' +
                '<td>' + e[5] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#medicamentePrescrise").find("tr:gt(0)").remove();
            $('#medicamentePrescrise').append(output);
        }
    }
    else if ($(this).val() === "prescriereInvestigatiiOftal"){
        $("#medicamentePrescrise").hide();
        $("#autocompleteBox2").hide();
        $("#investigatiiPrescrise").show();
        $("#prescrieInvestBox").show();
        var d = JSONObj.investigatiiOftal;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '<td>' + e[2] + '</td>' +
                '<td>' + e[3] + '</td>' +
                '<td>' + e[4] + '</td>' +
                '<td>' + e[5] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigatiiPrescrise").find("tr:gt(0)").remove();
            $('#investigatiiPrescrise').append(output);
        }
    }
    else if ($(this).val() === "prescriereInvestigatiiGen"){
        $("#medicamentePrescrise").hide();
        $("#autocompleteBox2").hide();
        $("#investigatiiPrescrise").show();
        $("#prescrieInvestBox").show();
        var d = JSONObj.investigatiiGen;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '<td>' + e[2] + '</td>' +
                '<td>' + e[3] + '</td>' +
                '<td>' + e[4] + '</td>' +
                '<td>' + e[5] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigatiiPrescrise").find("tr:gt(0)").remove();
            $('#investigatiiPrescrise').append(output);
        }
    }
    else if ($(this).val() === "prescrieretesteDiagn"){
        $("#medicamentePrescrise").hide();
        $("#autocompleteBox2").hide();
        $("#investigatiiPrescrise").show();
        $("#prescrieInvestBox").show();
        var d = JSONObj.testeDiagn;
        var output;
        $.each(d, function (i, e) {
            output += '<tr>' +
                '<td>' + e[0] + '</td>' +
                '<td>' + e[1] + '</td>' +
                '<td>' + e[2] + '</td>' +
                '<td>' + e[3] + '</td>' +
                '<td>' + e[4] + '</td>' +
                '<td>' + e[5] + '</td>' +
                '</tr>';
        });
        if (!output) {
            Swal.fire('Nu a fost gasit nimic');
        } else {
            $("#investigatiiPrescrise").find("tr:gt(0)").remove();
            $('#investigatiiPrescrise').append(output);
        }
    }
});


$("#prescrieButton").click(function (e){
    e.preventDefault();
    Swal.fire({
        title: 'Prescrierea unui medicament ',
        html: `<input type="text" id="login" class="swal2-input" placeholder="IDNP Pacient">
  <input type="text" id="medic" class="swal2-input" placeholder="IDNP Medic">
  <input type="text" id="password" class="swal2-input" placeholder="Medicanent">`,
        confirmButtonText: 'Adaugare',
        focusConfirm: false,
        preConfirm: () => {
            const login = Swal.getPopup().querySelector('#login').value
            const password = Swal.getPopup().querySelector('#password').value
            const medic = Swal.getPopup().querySelector('#medic').value
            if (!login || !password|| !medic) {
                Swal.showValidationMessage(`Introduceti datele`)
            }
            return { login: login, password: password, medic: medic }
        }
    }).then((result) => {
        var a = result.value.login;
        var b = result.value.password;
        var c = result.value.medic;
        $.ajax({
            url: 'prescrieriPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                pacientIDNP: a,
                medicamentDen: b,
                medicIDNP: c
            },
            success: function(data){
                if (data.status && typeof data.status === "boolean"){
                    Swal.fire('TOT ok')
                }
            }
        });

    })
});
$("#prescrieInvestButton").click(function (e){
    e.preventDefault();
    Swal.fire({
        title: 'Prescrierea unei investigatii ',
        html: `<input type="text" id="login" class="swal2-input" placeholder="IDNP Pacient">
  <input type="text" id="medic" class="swal2-input" placeholder="IDNP Medic">
  <select class="swal2-input" id="selectInvest">
    <option value="investigatii_ecard">Investigatii Ecardiologice</option>
    <option value="investigatii_oftal">Investigatii Oftalmologice</option>
    <option value="invsetigatii_gen">Investigatii Generale</option>
    <option value="teste_diagn">Teste Diagnostice</option>
</select>
  <input type="text" id="password" class="swal2-input" placeholder="Investigare">`,
        confirmButtonText: 'Adaugare',
        focusConfirm: false,
        preConfirm: () => {
            const login = Swal.getPopup().querySelector('#login').value
            const password = Swal.getPopup().querySelector('#password').value
            const medic = Swal.getPopup().querySelector('#medic').value
            const investigareTable = Swal.getPopup().querySelector('#selectInvest').value
            if (!login || !password || !medic ||!investigareTable) {
                Swal.showValidationMessage(`Introduceti datele`)
            }
            return { login: login, password: password, medic: medic, investigareTable: investigareTable }
        }
    }).then((result) => {
        var a = result.value.login;
        var b = result.value.password;
        var c = result.value.medic;
        var d = result.value.investigareTable;
        $.ajax({
            url: 'prescrieriPHP.php',
            type: 'POST',
            dataType: 'json',
            data: {
                pacientIDNP: a,
                investDen: b,
                medicIDNP: c,
                investTable: d
            },
            success: function(data){
                if (data.status && typeof data.status === "boolean"){
                    Swal.fire('TOT ok')
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        });

    })
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