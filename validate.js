// console.log("validate.js linked");
$("form").submit(function(){
  let bErrors = false;
  // console.log("validating");
  // How do I know which elements in the form I want to validate?
  // How do I select all the data-validate="yes" from the form
  $(this).find('input[data-validate=yes]').each(function(){
    $(this).removeClass('invalid');
    // console.log( $(this) );
    // We have the elements.. how do I know what to check for?
    // console.log( $(this).attr('data-type')  ) // string integer

    let sDataType = $(this).attr('data-type');
    let iMin = $(this).attr('data-min');
    let iMax = $(this).attr('data-max');

    switch(sDataType) {
      case "string":
        if( $(this).val().length < iMin || $(this).val().length > iMax ){
          $(this).addClass('invalid');
          bErrors = true;
        }
      break;
      case "integer":
        if( Number($(this).val()) < iMin || Number($(this).val()) > iMax ){
          $(this).addClass('invalid');
          bErrors = true;
        }
      break;
      case "email":
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if( $(this).val().length < iMin || $(this).val().length > iMax  || re.test(String($(this).val()).toLowerCase()) == false ){
          $(this).addClass('invalid');
          console.log("email NOT valid");
          bErrors = true;
        }
      break;

      default:
        console.log("Sorry don't know how to validate that");
    }

  })

  // if any of the inputs have classes
  // if( $(this).children().hasClass('invalid') ) { return false }
  // chaining . . .

  if (bErrors == true) return false;
});



// function validateEmail(email) {
//   var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//   return re.test(String(email).toLowerCase());
// }
// console.log(validateEmail('a@a.com'));

