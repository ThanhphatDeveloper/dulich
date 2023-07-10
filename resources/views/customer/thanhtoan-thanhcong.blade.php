<!-- payment_success.html -->
    <title>Thanh toán thành công</title>
 
    
    <div class="container3">
        <div class="payment-success3">
            <h1>Thanh toán thành công</h1>
            <div class="payment-details3">
                <p><strong>Phương thức thanh toán:</strong> {{ $paymentMethod }}</p>
                <p><strong>Họ tên:</strong> {{ $fullName }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $phone }}</p>
                <p><strong>Số khách:</strong> {{ $guestCount }}</p>
                <p><strong>Giới tính:</strong> {{ $gender }}</p>
                <p><strong>Tour:</strong> {{ $tour }}</p>
                <p><strong>Khuyến mãi:</strong> {{ $promotion }}</p>
                <p><strong>Tiền thanh toán:</strong> {{ $amountPaid }}</p>
                <p><strong>Giá tiền:</strong> {{ $price }}</p>
            </div>
            <div class="button-container3">
                <a href="#" class="button3">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
