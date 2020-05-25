<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function is_valid_luhn($number) {
  $sumTable = array(
    array(0,1,2,3,4,5,6,7,8,9),
    array(0,2,4,6,8,1,3,5,7,9));
  $sum = 0;
  $flip = 0;
  for ($i = strlen($number) - 1; $i >= 0; $i--) {
    $sum += $sumTable[$flip++ & 0x1][$number[$i]];
  }
  return $sum % 10 === 0;
  }
function checkForErrorsInCardNum($creditCardNum) {
    if(strpos($creditCardNum, ' ')!== false) { 
        return config('global.spacesInCredCardError');
    } else if(!ctype_digit($creditCardNum)){
        return config('global.nonDigitCharactersError');
    } else if(!$this->is_valid_luhn($creditCardNum)) {
        return config('global.incorrectCreditCardNum');
    } else {
        return "ok";
    }
}
function checkForErrors($paymentAmount,$creditCardNum,$itemsCount) {
    $returnedVal = $this->checkForErrorsInCardNum($creditCardNum);
    if($returnedVal!="ok") {return $returnedVal;}
    if($paymentAmount<0){
        return config('global.negativeSumError');
    } else if($paymentAmount===0) {
       return config('global.sumZeroValError');
    } else if($itemsCount===0){
        return config('global.nothingInBasketError');
    } else {
        return "ok";
    }
  }
  function generate_session_id(
    $length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
) {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
  }
public function register(Request $request) {
    $json = $request->input('json');
    $arr = json_decode($json,true);
    $newPaymentSession = new \App\Paymentsession;
    $newPaymentSession->paymentAmount = $arr["paymentAmount"];
    $newPaymentSession->creditCardNum = trim($arr["creditCardNum"]);
    $newPaymentSession->date = microtime(true)*1000;
    $newPaymentSession->paymentPorpose = '';
    foreach($arr["paymentPorpose"] as $paymentPorposeItem){ 
        $newPaymentSession->paymentPorpose = $newPaymentSession->paymentPorpose.$paymentPorposeItem.'<br/>';
    }
    $returnedStr = $this->checkForErrors($newPaymentSession->paymentAmount,
            $newPaymentSession->creditCardNum,count($arr["paymentPorpose"]));
    if($returnedStr!="ok") { return json_encode(array('errorType' => strval($returnedStr)),JSON_UNESCAPED_UNICODE);}
    $newPaymentSession->sessionId =  $this->generate_session_id(config('global.sessionIdSize'));
    $newPaymentSession->save();
    $url = config('global.sessionInfoUrl').'?sessionId='.$newPaymentSession->sessionId;
     return json_encode(array('url' => strval($url)),JSON_UNESCAPED_UNICODE);
  }

  function milisecondsToMinutes($miliseconds) { return ($miliseconds/60000); }

  public function getPaymentInfoBySessionId(Request $request) {
    $sessionId = $request->input('sessionId');
    $paymentSession = \App\PaymentSession::where('sessionId',$sessionId)->first();
    $currentTime = microtime(true)*1000;
    $difference = $currentTime-$paymentSession->date;
    if($this->milisecondsToMinutes($difference)>config('global.sessionLiveTime')) {
        return view('sessionExpiredPage');
    } else {
    return view('paymentSessPage',['paymentSession'=>$paymentSession]);
    }
 }  
public function getSessionsByDate(Request $request) {
   $arr = json_decode($request->input('json'),true);
   $creditCardNum =  $arr['creditCardNum'];
   $returnedVal = $this->checkForErrorsInCardNum($creditCardNum);
   if($returnedVal!="ok") { return json_encode(array('errorType' => $returnedVal),JSON_UNESCAPED_UNICODE); }
   $leftTimeBorder = $arr['leftTimeField'];
   $rightTimeBorder = $arr['rightTimeField'];
   if(!ctype_digit($leftTimeBorder) or !ctype_digit($rightTimeBorder)) { 
       return json_encode(array('errorType' => config('global.nonDigitCharactersError')),JSON_UNESCAPED_UNICODE);
   }
   $leftTimeBorderInteger = intval($leftTimeBorder);
   $rightTimeBorderInteger = intval($rightTimeBorder);
   if($leftTimeBorderInteger<0 or $rightTimeBorderInteger<0) { 
       return json_encode(array('errorType' => config('global.negativeDigitValues')),JSON_UNESCAPED_UNICODE); 
   }
   if($leftTimeBorderInteger>=$rightTimeBorderInteger) {  
       return json_encode(array('errorType' => config('global.leftMoreThenRight')),JSON_UNESCAPED_UNICODE);
   }
   $paymentSessions = \App\PaymentSession::where([
       ['creditCardNum',$creditCardNum],
       ['date','>',$leftTimeBorderInteger],
       ['date','<',$rightTimeBorderInteger]])->get();
   if(count($paymentSessions)>0) {
       $output = array();
    foreach($paymentSessions as $paymentSession){ 
    array_push($output, array(
        'sessionId'=>$paymentSession->sessionId,
        'data'=>$paymentSession->date,
        'paymentPorpose'=>$paymentSession->paymentPorpose,
        'paymentAmount'=>$paymentSession->paymentAmount
        ));}
       return json_encode(array('array'=>$output),JSON_UNESCAPED_UNICODE);
   } else { 
       return json_encode(array('emptyList' => config('global.emptySessionList')),JSON_UNESCAPED_UNICODE); 
   } 
  }
}
