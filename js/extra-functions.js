/**
 * tem algum código pra refatorar aqui... :-/
 * 
 */


function submitEnter(field,e) { 
 var keycode = (window.Event) ? e.which : e.keyCode; 
 if(keycode == 13){ 
  for(i=0; i < field.form.elements.length; i++){   
   if((field.form.elements[i].name == 'btOk')      
    &&((field.form.elements[i].type == 'button')   
     ||(field.form.elements[i].type == 'submit'))){ 
     field.form.btOk.click();
     return false; 
   } 
  } 
  return false; 
 }else{  
  if(keycode == 27){ 
   for(i=0; i < field.form.elements.length; i++) {   
    if ((field.form.elements[i].name == 'btNo')      
     && (field.form.elements[i].type == 'button')) { 
      field.form.btNo.click();
      return false; 
    } 
   } 
   return false; 
  }else{ 
   return true; 
  }
 }

}


function somenteInt(field, e){
  var strCheck = '0123456789'; 
  var keycode = (window.Event) ? e.which : e.keyCode; 
  if((keycode==null)||(keycode==0)||(keycode==8) 
   ||(keycode==9)||(keycode==13)||(keycode==27) )
     return submitEnter(field,e); 
  key = String.fromCharCode(keycode); 
  if(strCheck.indexOf(key) == -1){ 
   return false; 
  }else{ 
   return submitEnter(field,e); 
  } 
}
 


/**
 * codigo baseado na função 'somenteInt()' mais esse exemplo:
 * http://maozinhadaweb.blogspot.com/2007/05/mscara-de-data-com-javascript_14.html
 * usado no componente TDateEdit
 */
function mascaraData(field, e) {
  let keycode = (window.Event) ? e.which : e.keyCode; 
  if ((keycode==null) || (keycode==0) || (keycode==8) || 
      (keycode==9) || (keycode==13) || (keycode==27) ) {
        return submitEnter(field,e); 
      }
  let key = String.fromCharCode(keycode); 
  let strCheck = '0123456789'; 
  if (strCheck.indexOf(key) == -1){ 
    return false; 
  } else { 
    let data = field.value;  
    if (data.length == 2){ 
    data = data + '/';
    field.value = data; 
    return true; 
    } else { 
    if (data.length == 5){ 
      data = data + '/'; 
      field.value = data; 
      return true; 
    } else { 
      return true; 
    } 
    } 
  }
} 

/**
 * Abaixo 2 funções que copiei da pesquisa de preços dos combustíveis do procon
 * Esta function TFloatEdit_onKeyUp1 é mais recente onde ela tem objetivo 
 * de aplicar mascara de valor com casas decimais.
 * Por exemplo, ao digitar o numero 1, ja vira 0,01 automatico...
 * 
 */
function onlyNumbers(str) 
{
    return str.replace(/[^0-9]/g,'');
}

function TFloatEdit_onKeyUp1(input,decimals,decimalSeparator)
{
    let numbers = onlyNumbers( input.value );

    // at least one 0 on left
    let qty = numbers.length;
    while (qty < (decimals+1)) {
        numbers = "0" + numbers;
        qty++;
    }

    let left = numbers.slice(0, qty - decimals);
    let right = numbers.slice(qty - decimals);

    // convert to remove zeros on left
    left = parseInt(left).toString();

    input.value = left + decimalSeparator + right;
}
