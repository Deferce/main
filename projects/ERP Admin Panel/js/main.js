/* JQUERY Dynamic web form */ 



//function for selecting option element
function gettEr(param) {
  //setting even via jquery on function -> change between elements
  $(param).on('change', function () {
    //setting variables with html input
    let inputFieldDVD = '<label for="SIZE">Size (MB): </label><input required  type="number" step="any" name="SIZE" ><label>*Please provide size for DVD in MB*</label>';

    let inputFieldBOOK = '<label for="Weight">Weight (KG)</label><input required type="number" step="any" name="WEIGHT"><label>*Please provide WEIGHT in KG*</label>';

    let inputFieldWEIGHT = '<label for="SIZE">Height (CM) </label><input required type="number" step="any" name="HEIGHT"><label for="WIDTH">Width (CM) </label><input required  type="number" step="any" name="WIDTH"><label for="LENGTH">Length (CM) </label><input required type="number" step="any" name="LENGTH" ><label>*Please provide HEIGHT WIDTH LENGTH*</label>';


    //variable that contains option value
    let value = $(this).val();

    //switch th e value in each case
    switch (value) {
      case value = "DVD":
        //get div(selectContainer) that serves as a container for added HTML via LET variable =>
        //remove input and label etc between switching
        $(".selectContainer").children('input,label,p,border').remove();
        //if DVD is selected append (add) html that contains in inputFieldDVD
        //also addClass (dynamicStyle) that contains style for this selection
        $(".selectContainer").append(inputFieldDVD).addClass('dynamicStyle');
        break;
      default:
        //remove input and label etc between switching
        $(".selectContainer").children('input,label,p,border').remove();
        break;
        // Rinse-repeat for the rest of the options
      case value = "BOOK":
        $(".selectContainer").children('input,label,p,border').remove();
        $(".selectContainer").append(inputFieldBOOK).addClass('dynamicStyle');
        break;

      case value = "FURNITURE":
        $(".selectContainer").children('input,label,p,border').remove();
        $(".selectContainer").append(inputFieldWEIGHT).addClass('dynamicStyle');
        break;

    }

  });
}

gettEr('#typeSwitcher');

function validator() {
  //Get elements 
  const formElem = document.getElementById("addForm");
  const errMsg = document.getElementById("errorPOP");
  const errMsg1 = document.getElementById("errorPOP1");
  const errMsg2 = document.getElementById("errorPOP2");
  const errMsg3 = document.getElementById("errorPOP3");
  const skuElem = document.getElementById("sku");
  const nameElem = document.getElementById("name");
  const selectorElem = document.getElementById("typeSwitcher");
  const priceElem = document.getElementById("price");

  //Sanitize from special symbols
  const san = /[ `!@#$%^&*()_+\-=\[\]{};' :"\\|,.<>\/?~]/;
  //Get values and trim from spaces
  const skuValue = skuElem.value.trim();
  const nameValue = nameElem.value.trim();
  const selectorValue = selectorElem.value.trim();
  const priceValue = priceElem.value.trim();

  //regex value for field testing
  const reg = /\d/g;

  //checking SKU field
  if (skuValue.length == 0) {
    errMsg1.innerHTML = '<p style="color:#ffffff;  background-color:orange;">Field cannot be empty</p>';
    //focus works only in some browsers :(
    skuElem.focus();
    return false;
  }
  errMsg1.innerHTML = "";
  if (skuValue.length <= 3) {
    errMsg1.innerHTML = '<p style="color:#ffffff;  background-color:orange;">SKU cant be less than 3 symbols</p>';
    skuElem.focus();
    return false;
  }
  errMsg1.innerHTML = "";

  if (skuValue.length >= 12) {
    errMsg1.innerHTML = '<p style="color:#ffffff; background-color:orange;">SKU cant be more than 12 symbols</p>';
    skuElem.focus();
    return false;
  }
  errMsg1.innerHTML = "";
  if (skuValue.match(san)) {
    errMsg1.innerHTML = '<p style="color:#ffffff; background-color:orange;">Special symbols are not allowed</p>';
    skuElem.focus();
    return false;
  }

  //checking name field
  if (nameValue.length == "") {
    errMsg.innerHTML = '<p style="color:#ffffff;  background-color:orange;">Name field cant be empty</p>';
    nameElem.focus();
    return false;
  }
  errMsg.innerHTML = "";

  if (nameValue.match(reg)) {
    errMsg.innerHTML = '<p style="color:#ffffff; background-color:orange;">Name field cannot contain numbers</p>';
    nameElem.focus();
    return false;
  }
  errMsg.innerHTML = "";

  if (nameValue.length <= 3) {
    errMsg.innerHTML = '<p style="color:#ffffff;  background-color:orange;">Name field cant be less than 3 symbols</p>';
    nameElem.focus();
    return false;
  }
  errMsg.innerHTML = "";

  if (nameValue.match(san)) {
    errMsg.innerHTML = '<p style="color:#ffffff; background-color:orange;">Special symbols are not allowed</p>';
    nameElem.focus();
    return false;
  }
  errMsg.innerHTML = "";

  if (nameValue.length >= 12) {
    errMsg.innerHTML = '<p style="color:#ffffff; background-color:orange;">Name field cant be more than 12 symbols</p>';
    nameElem.focus();
    return false;
  }
  errMsg.innerHTML = "";
  //Price validator
  if (priceValue.length == "") {
    errMsg2.innerHTML = '<p style="color:#ffffff; background-color:orange;">Price field cannot be empty or contain special symbols/characters</p>';
    priceElem.focus();
    return false;
  }
  errMsg.innerHTML = "";
  //Option validator

  if (selectorValue == 0) {
    errMsg3.innerHTML = '<p style="color:#ffffff; background-color:orange;">Please choose the product </p>';
    selectorElem.focus();
    return false;
  } else {
    errMsg.innerHTML = "";
    return true;
  }

}