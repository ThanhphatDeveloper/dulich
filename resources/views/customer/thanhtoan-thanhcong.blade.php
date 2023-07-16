{{-- <!-- payment_success.html -->
    <title>Thanh toán thành công</title>
 
    <link href="{{asset('assets/css/thanhcong.css')}}" rel="stylesheet">
    <div class="container3">
        <div class="payment-success3">
            <h1>Thanh toán thành công</h1>
            <div class="button-container3">
                <a href="{{url('/')}}" class="button3">Quay lại trang chủ</a>
            </div>
        </div>
    </div> --}}

    <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      /* style.css */


.container2 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.payment-failed2 {
    background-color: #ffffff;
    padding: 30px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.payment-failed2 h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.payment-details2 p {
    margin-bottom: 10px;
}

.payment-details2 p strong {
    font-weight: bold;
}

.button-container2 {
    margin-top: 20px;
}

.button2 {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 4px;
}

.button2:hover {
    background-color: #0056b3;
}


/* thành công */

/* style.css */


.container3 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.payment-success3 {
    background-color: #ffffff;
    padding: 30px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.payment-success3 h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.payment-details3 p {
    margin-bottom: 10px;
}

.payment-details3 p strong {
    font-weight: bold;
}

.button-container3 {
    margin-top: 20px;
}

.button3 {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 4px;
}

.button3:hover {
    background-color: #0056b3;
}

    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Thanh toán thành công</h1> 
        <p>Chúng tôi đã nhận được yêu cầu đặt tour của bạn;<br/> chúng tôi sẽ sớm liên hệ với bạn trong vòng 24H!</p>
      </div>
      <div class="button-container3">
        <a href="{{url('/')}}" class="button3">Quay lại trang chủ</a>
    </div>
    </body>
</html>