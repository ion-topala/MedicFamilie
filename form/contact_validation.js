$(function (){
    $("#contact-form").validate({
        rules:{
            email:
                {
                    required: true,
                    email:true
                },
            name:{
                required: true
            },
            message:{
              required: true
            }
        },
        messages:{
            email: {
                required: 'Please enter an email address.',
                email: 'Please enter a <em>valid</em> email address.'
            }
        }
    })
})

$('#contact-form').submit(function (e){
    e.preventDefault();

    if ($("#contact-form").valid()) {
        let th = $(this);
        let mess = $('.mess');
        let btn = th.find('.submit');

        $.ajax({
            url: 'contact-form2.php',
            type: 'POST',
            dataType: 'json',
            data: th.serialize(),
            success(data) {
                if (data.status && typeof data.status == "boolean") {
                    swal({
                        title: "Mesajul a fost transmis cu succes!",
                        //text: "You clicked the button!",
                        icon: "success",
                        button: "OK",
                    });
                    setTimeout(function () {
                        th.trigger('reset');
                    }, 2000)
                } else {
                    swal({
                        title: "Eroare la transmitere",
                        text: "Verificati inputurile",
                        icon: "warning",
                        button: "OK",
                    });
                }
            },
            error: function () {
                swal({
                    title: "Eroare",
                    //text: "Verificati inputurile",
                    icon: "warning",
                    button: "OK",
                });
            }
        })
    }
});