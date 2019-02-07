// console.log("validate.js linked");
let bErrors = false;


$("form").submit(function(){
  // console.log("validating");
  // How do I know which elements in the form I want to validate?
  // How do I select all the data-validate="yes" from the form
  $(this).find('input[data-validate=yes]').each(function(){
    $(this).removeClass('invalid');
    // console.log( $(this) );
    // We have the elements.. how do I know what to check for?
    // console.log( $(this).attr('data-type')  ) // string integer

    let sDataType = $(this).attr('data-type');

    switch(sDataType) {
      case "string":
        console.log("Validating a string");
        let iMinLength = $(this).attr('data-min');
        let iMaxLength = $(this).attr('data-max');
        if( $(this).val().length < iMinLength || $(this).val().length > iMaxLength ){
          $(this).addClass('invalid');
          bErrors = true;
        }
        // console.log('the input must be at least', iMinLength, 'cha.')
        // console.log('the input cannot be longer than', iMaxLength, 'cha.')
      break;
      case "integer":
        console.log("Validating an integer");
        // if(isNaN($(this).val()) && ){
        //   console.log("NaN")
        // } else {
        //   console.log("number")
        // }
        let iMin = $(this).attr('data-min');
        let iMax = $(this).attr('data-max');
        console.log(iMin, iMax)
      
        if( Number($(this).val()) < iMin || Number($(this).val()) > iMax ){
          console.log("it is NOT between")
          $(this).addClass('invalid')
          bErrors = true;
        }
      break;
      default:
        console.log("Sorry don't know how to validate that")
      break;
    }

  })
  if (bErrors == false) return true;
  return false;
});

