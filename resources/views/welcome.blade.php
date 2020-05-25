<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
          * {box-sizing: border-box;}
body {background: #f69a73;}
.decor {
  position: relative;
  max-width: 500px;
  margin: 90px auto 0;
  background: white;
  border-radius: 30px;
}
.form-left-decoration,
.form-right-decoration {
  content: "";
  position: absolute;
  width: 50px;
  height: 20px;
  background: #f69a73;
  border-radius: 20px;
}
.form-left-decoration {
  bottom: 60px;
  left: -30px;
}
.form-right-decoration {
  top: 60px;
  right: -30px;
}
.form-left-decoration:before,
.form-left-decoration:after,
.form-right-decoration:before,
.form-right-decoration:after {
  content: "";
  position: absolute;
  width: 50px;
  height: 20px;
  border-radius: 30px;
  background: white;
}
.form-left-decoration:before {top: -20px;}
.form-left-decoration:after {
  top: 20px;
  left: 10px;
}
.form-right-decoration:before {
  top: -20px;
  right: 0;
}
.form-right-decoration:after {
  top: 20px;
  right: 10px;
}
.circle {
  position: absolute;
  bottom: 80px;
  left: -55px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: white;
}
.form-inner {padding: 50px;}
.form-inner input[type="text"],.form-inner input[type="button"],
.form-inner textarea {
  display: block;
  width: 100%;
  padding: 0 20px;
  margin-bottom: 10px;
  background: #E9EFF6;
  line-height: 40px;
  border-width: 0;
  border-radius: 20px;
  font-family: 'Roboto', sans-serif;
}

.form-inner input[type="button"] {
  margin-top: 30px;
  background: #f69a73;
  border-bottom: 4px solid #d87d56;
  color: white;
  font-size: 14px;
  box-shadow: 0 0 5px #FF00FF;
    -moz-box-shadow: 0 0 5px #FF00FF;
    -ms-box-shadow: 0 0 5px #FF00FF;
    -o-box-shadow: 0 0 5px #FF00FF;
    -webkit-box-shadow: 0 0 5px #FF00FF;
}
.form-inner input[type="button"]:hover {
    box-shadow: 0 0 12px #6633FF;
    -moz-box-shadow: 0 0 12px #6633FF;
    -o-box-shadow: 0 0 12px #6633FF;
    -ms-box-shadow: 0 0 12px #6633FF;
    -webkit-box-shadow: 0 0 12px #6633FF;
}
.form-inner textarea {resize: none;}
.form-inner h3 {
  margin-top: 0;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  font-size: 24px;
  color: #707981;
}


.loader {
  color: #f69a73;
  font-size: 5px;
  margin: 15px auto;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  position: relative;
  text-indent: -9999em;
  -webkit-animation: load4 1.3s infinite linear;
  animation: load4 1.3s infinite linear;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
@-webkit-keyframes load4 {
  0%,
  100% {
    box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
  }
  12.5% {
    box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
  }
  25% {
    box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
  }
  37.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  50% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  62.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
  }
  75% {
    box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
  }
  87.5% {
    box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
  }
}
@keyframes load4 {
  0%,
  100% {
    box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
  }
  12.5% {
    box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
  }
  25% {
    box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
  }
  37.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  50% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  62.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
  }
  75% {
    box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
  }
  87.5% {
    box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
  }
}



        </style>
        <script  src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script>  
     <script>
    function processFormRequest() {
        $( "#loaderId" ).show();
                var summ = 0;
                var isThereContent = false;
                var dataToSend = '{';
                var items = [];
                var paymentPorpose = '"paymentPorpose":[';
                var creditCardNum = '"creditCardNum":"';
                var paymentAmount = '"paymentAmount":';
                $( "#no_item_to_buy" ).hide();
                $( "#no_credit_card" ).hide();
                $('#server_error').html('');
                if(document.getElementById("jacket").checked) {
                    summ = summ + parseInt(document.getElementById("jacket").value);
                    items.push('"куртка:'.concat(parseInt(document.getElementById("jacket").value),'"'));
                    isThereContent = true;
                }
                if(document.getElementById("pants").checked) {
                    summ = summ + parseInt(document.getElementById("pants").value);
                    items.push('"брюки:'.concat(parseInt(document.getElementById("pants").value),'"'));
                    isThereContent = true;
                }
                if(document.getElementById("jeans").checked) {
                    summ = summ + parseInt(document.getElementById("jeans").value);
                    items.push('"джинсы:'.concat(parseInt(document.getElementById("jeans").value),'"'));
                    isThereContent = true;
                }
                if(document.getElementById("sweater").checked) {
                    summ = summ + parseInt(document.getElementById("sweater").value);
                    items.push('"свитер:'.concat(parseInt(document.getElementById("sweater").value),'"'));
                    isThereContent = true;
                }
                if(document.getElementById("sneakers").checked) {
                    summ = summ + parseInt(document.getElementById("sneakers").value);
                    items.push('"кроссовки:'.concat(parseInt(document.getElementById("sneakers").value),'"'));
                    isThereContent = true;
                }
                if(document.getElementById("cap").checked) {
                    summ = summ + parseInt(document.getElementById("cap").value);
                    items.push('"кепка:'.concat(parseInt(document.getElementById("cap").value),'"'));
                    isThereContent = true;
                }
                
                if(!isThereContent) { 
                   //выберите товары для покупки
                   $( "#no_item_to_buy" ).show();
                   return;
               }
               paymentPorpose = paymentPorpose.concat(items,']'); 
               dataToSend = dataToSend.concat(paymentPorpose);
               dataToSend = dataToSend.concat(',',paymentAmount,summ);
               var creditCardNumVal = document.getElementById('creditCardField');
               if(creditCardNumVal.value ==="") {
                    //введите номер кредитной карты
                    $( "#no_credit_card" ).show();
                    return;
               }
               creditCardNum = creditCardNum.concat(creditCardNumVal.value,'"');
               dataToSend = dataToSend.concat(',',creditCardNum);
               dataToSend = dataToSend.concat('}');
               //alert(dataToSend);
               $.ajax({
                    
              type:'POST',
              url:"{{route('registerPage')}}",
              data:{_token : '{{ csrf_token() }}', json: dataToSend},
              success:function(data){
                  $( "#loaderId" ).hide();
                  JSON.parse(data, function(k, v) {
               if (k === 'errorType') { $('#server_error').html(v); }
               if(k==='url') {
                          //code for url
                          returnedURL = 'Покупка успешно совершена. \n\
                                        Для просмотра более подробной инфрмации, пройдите по этой ';
                          returnedURL = returnedURL.concat('<a href="',v,'">','ссылке</a>');
                          $('#url_success').html(returnedURL);
               }
                  return;               
                   });   
              }
           });
               
            }
            
        </script>
            
        
    </head>
    <body>
        <form class="decor">
  <div class="form-left-decoration"></div>
  <div class="form-right-decoration"></div>
  <div class="circle"></div>
  <div class="form-inner">
    <h3>выберите товары для покупки</h3>
    
  <div>
  <input value=3500 type="checkbox" id="jacket" name="куртка">  
  <label for="jacket">куртка</label>
  </div>
    <div>
  <input value=1500 type="checkbox" id="pants" name="брюки">
  <label for="pants">брюки</label>
    </div>
    <div>
  <input value=2300 type="checkbox" id="jeans" name="джинсы">
  <label for="jeans">джинсы</label>
    </div>
    <div>
  <input value=3000 type="checkbox" id="sweater" name="свитер">
  <label for="sweater">свитер</label>
    </div>
    <div>
  <input value=1250 type="checkbox" id="sneakers" name="кроссовки">
  <label for="sneakers">кроссовки</label>
    </div>
    <div>
  <input value=780 type="checkbox" id="cap" name="кепка">
  <label for="cap">кепка</label>
    </div>
    &nbsp
    <input id='creditCardField' type="text" placeholder="номер вашей кредитной карты">
    <font   color="red" id="no_credit_card" hidden="true">
        Введите номер кредитной карты
    </font>
    <div id='loaderId' class="loader" hidden="true"> </div>
    <font   color="red"  id="no_item_to_buy" hidden="true">
        Вы не выбрали товар для покупки
    </font>
    <font   color="red"  >
    <div id="server_error"></div>
    </font>
    <div id="url_success"></div>
    <input type="button" onclick="processFormRequest()" value="Совершить платеж">
  </div>
</form>
    </body>
</html>
