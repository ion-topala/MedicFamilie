
// logare
$(function (){
   $.validator.addMethod('strongPassword',function (value,element){
      return this.optional(element)
          || value.length >= 8
          && /\d/.test(value)
          && /[a-z]/i.test(value)
          && /[A-Z]/.test(value)
          && /\W/.test(value);
   }, 'Your password must be at least 8 characters long and contain at least one number, uppercase and lowercase char.')

   $.validator.addMethod("exactlength", function(value, element, param) {
      return this.optional(element) || value.length == param;
   }, $.validator.format("Please enter exactly 13 digits without spaces"));

   $("#login-form").validate({
      rules:{
         username:
             {
                required: true,
                exactlength: 13,
                nowhitespace: true,
                digits: true
             },
         password: {
            required: true,
            strongPassword: true
         }
      },
      messages:{
         username: {
            required: 'Please enter your IDNP'
         }
      }
   })
})

$('.login_btn').click(function (e){
   e.preventDefault();
   $(`input `).removeClass('error');

   if($("#login-form").valid()) {
      let login = $('input[name="username"]').val(),
          password = $('input[name="password"]').val();

      $.ajax({
         url: 'loginPHP.php',
         type: 'POST',
         dataType: 'json',
         data: {
            username: login,
            password: password
         },
         success(data) {
            if (data.status && typeof data.status == "boolean") {
               document.location.href = '../index.php';
            } else {
               if (data.type === 1) {
                  data.fields.forEach(function (field) {
                     $(`input[name="${field}"]`).addClass('error');
                  });
               }
               $('.msg').removeClass('none').text(data.message);
            }
         }
      });
   }
});

// registrarea
$(function (){
   $.validator.addMethod('strongPassword',function (value,element){
      return this.optional(element)
          || value.length >= 8
          && /\d/.test(value)
          && /[a-z]/i.test(value)
          && /[A-Z]/.test(value)
          && /\W/.test(value);
   }, 'Your password must be at least 8 characters long and contain at least one number, uppercase and lowercase char.')

   $.validator.addMethod("exactlength", function(value, element, param) {
      return this.optional(element) || value.length == param;
   }, $.validator.format("Please enter exactly 13 digits without spaces"));

   $("#register-form").validate({
      rules:{
         username:
             {
                required: true,
                exactlength: 13,
                nowhitespace: true,
                digits: true
             },
         password: {
            required: true,
            strongPassword: true
         },
         password2: {
            required:true,
            equalTo: "#password"
         },
         firstName:{
            required: true,
            nowhitespace: true,
            lettersonly:true
         },
         secondName:{
            required: true,
            nowhitespace: true,
            lettersonly:true
         }
      },
      messages:{
         username: {
            required: 'Please enter your IDNP'
         }
      }
   })
})


$('.register-btn').click(function (e){
   e.preventDefault();
   $(`input `).removeClass('error');
   $('.msg').addClass('none');

   if($("#register-form").valid()) {
      let login = $('input[name="username"]').val(),
          password = $('input[name="password"]').val(),
          password2 = $('input[name="password2"]').val(),
          firstName = $('input[name="firstName"]').val(),
          secondName = $('input[name="secondName"]').val();
      $.ajax({
         url: 'registerPHP.php',
         type: 'POST',
         dataType: 'json',
         data: {
            username: login,
            password: password,
            password2: password2,
            firstName: firstName,
            secondName: secondName
         },
         success(data) {
            if (data.status && typeof data.status == "boolean") {
               // document.location.href= '';
               // $('.msg').addClass('msg-succes');
               // $('.msg').removeClass('none').text(data.message);
               swal({
                  title: "Inregistrarea a avut loc cu succes!",
                  text: "Accesarea paginii de login...",
                  icon: "success",
               }).then(function (){
                 window.location = "login2.php";
               });

               $('input[name="username"]').val('');
               $('input[name="password"]').val('');
               $('input[name="password2"]').val('');
               $('input[name="firstName"]').val('');
               $('input[name="secondName"]').val('');

            } else {
               if (data.type === 1) {
                  data.fields.forEach(function (field) {
                     $(`input[name="${field}"]`).addClass('error');
                  });
               }
               $('.msg').removeClass('none').text(data.message);
            }
         }
      });
   }
   });

