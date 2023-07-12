<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    
    public function momo_payment(Request $request){
        
        //dd($request);
        $money = $request->total_momo * $request->sokhach;
        $giagoc = $money;
        $km_id = 1;

        if(KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->exists()){
            $km = KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->where('hansudung', '>', 0)->first();
            $km_id = $km->id;
            $money = $money - $km->mucgiam;
        }

        $tour = Tour::where('id', $request->tour_id)->first();

        $money = $money * 0.7;
        $a = 1;
        $ten = $request->ten;
        $email = $request->email;
        $sdt = $request->sdt;
        $sokhach = $request->sokhach;
        $gioitinh = $request->gioitinh;
        $tour_id = $request->tour_id;
        $thoigiankhoihanh = $tour->ngaykhoihanh;

        $dulieu = array([
            'a'=>$a,
            'ten'=>$ten,
            'email'=>$email,
            'sdt'=>$sdt,
            'sokhach'=>$sokhach,
            'gioitinh'=>$gioitinh,
            'tour_id'=>$tour_id,
            'km_id'=>$km_id,
            'money'=>$money,
            'giagoc'=>$giagoc,
            'thoigiankhoihanh'=>$thoigiankhoihanh,
        ]);
        Session::put('dulieu',$dulieu);

        //dd($dulieu);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = 'Thanh toán đơn hàng';
        $amount = $money;
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8000/thanhtoan";
        $ipnUrl = "http://localhost:8000/thanhtoan";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        //dd($amount);
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "Test Store",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json
        //Just a example, please check more in there
        $test = $jsonResult['payUrl'];
        return redirect()->to($test);
        
    }

    public function momo_payment_qr(Request $request){
        //0919100100
        //dd($request);
        //$money = $request->total_momo;
        $money = $request->total_momo * $request->sokhach;
        $giagoc = $money;
        $km_id = 1;

        if(KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->exists()){
            $km = KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->where('hansudung', '>', 0)->first();
            $km_id = $km->id;
            $money = $money - $km->mucgiam;
        }

        $tour = Tour::where('id', $request->tour_id)->first();

        $money = $money * 0.7;
        $a = 1;
        $ten = $request->ten;
        $email = $request->email;
        $sdt = $request->sdt;
        $sokhach = $request->sokhach;
        $gioitinh = $request->gioitinh;
        $tour_id = $request->tour_id;
        $thoigiankhoihanh = $tour->ngaykhoihanh;

        //dd($tour);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua QR MoMo";
        $amount = $money;
        $orderId = time() ."";
        $redirectUrl =
         "http://localhost:8000/thanhtoan/$a/$ten/$email/$sdt/$sokhach/$gioitinh/$tour_id/$km_id/$money/$giagoc/$thoigiankhoihanh";
        $ipnUrl =
         "http://localhost:8000/thanhtoan/$a/$ten/$email/$sdt/$sokhach/$gioitinh/$tour_id/$km_id/$money/$giagoc/$thoigiankhoihanh";
        $extraData = "";
        $resultCode = "";

            $requestId = time() . "";
            $requestType = "captureWallet";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $money . "&extraData=" . $extraData . "&ipnUrl=" . 
            $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . 
            "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $money,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'resultCode' => $resultCode,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
    }

    public function vnpay_payment(Request $request){
        //dd($request);

        $money = $request->total_vnpay * $request->sokhach;
        //dd($money);
        $giagoc = $money;
        $km_id = 1;

        if(KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->exists()){
            $km = KhuyenMai::where('makhuyenmai', $request->makhuyenmai)->where('hansudung', '>', 0)->first();
            $km_id = $km->id;
            $money = $money - $km->mucgiam;
        }

        $tour = Tour::where('id', $request->tour_id)->first();

        $money = $money * 0.7;


        $ten = $request->ten;
        $email = $request->email;
        $sdt = $request->sdt;
        $sokhach = $request->sokhach;
        $gioitinh = $request->gioitinh;
        $tour_id = $request->tour_id;
        $thoigiankhoihanh = $tour->ngaykhoihanh;

        $a = 0;
        $data = $request->all();
        $code_cart = rand(00,9999);

        //dd($money);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 
        "http://localhost:8000/thanhtoan/$a/$ten/$email/$sdt/$sokhach/$gioitinh/$tour_id/$km_id/$money/$giagoc/$thoigiankhoihanh";
        $vnp_TmnCode = "FM9XJF5C";
        $vnp_HashSecret = "NRDAOOOFDEKIQUFRBDSUMQOLIKIEAFPW";

        $vnp_TxnRef = $code_cart;
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $money * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //dd($inputData);

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }
}