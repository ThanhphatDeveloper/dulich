@extends('layouts.customer')

@section('title', 'Chính sách đặt tour')

@section('content')

<main>
            <section class="hero_in general">
                <div class="wrapper">
                    <div class="container">
                        <h1 class="fadeInUp"><span></span>Chính sách bảo mật thông tin</h1>
                    </div>
                </div>
            </section>
            <!--/hero_in-->

            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="bloglist singlepost">
                            <p><img alt="" class="img-fluid" src="img/blog-single.jpg"></p>
                            <h1>Chính sách đặt tour</h1>
                            <div class="postmeta">
                            </div>
                            <!-- /post meta -->
                            <div class="post-content">
                                <div class="dropcaps">
                                    <p>ĐIỀU KHOẢN CHUNG

                                        Giá tất cả các dịch vụ được tính theo tiền đồng (Việt Nam - VNĐ). Giá dịch vụ được liệt kê một cách rõ ràng trong phần "Bao gồm" trong các tour du lịch, dịch vụ xe, khách sạn,... Gotravel không có nghĩa vụ thanh toán bất cứ chi phí nào không nằm trong phần "Bao gồm"
                                        
                                        Khi thanh toán quý khách có thể tùy chọn hình thức thanh toán bằng cách chuyển khoản, cà thẻ visa hoặc đóng tiền mặt đều được.
                                        
                                        Lưu ý: Tùy vào từng tour cụ thể sẽ có những điều khoản chi tiết riêng tương ứng. </p>
                                    <p>NHỮNG YÊU CẦU ĐẶC BIỆT TRONG CHUYẾN DU LỊCH

                                        Các yêu cầu đặc biệt của quý khách phải báo trước cho Gotravel ngay tại thời điểm đăng ký, Gotravel sẽ cố gắng đáp ứng những yêu cầu này trong khả năng của mình song sẽ không chịu trách nhiệm về bất kỳ sự từ chối cung cấp dịch vụ từ phía các nhà vận chuyển, khách sạn, nhà hàng và các nhà cung cấp dịch vụ độc lập khách.</p>
                                    <p>KHÁCH SẠN

                                        Khách sạn được cung cấp trên cơ sở những phòng có 2 giường đơn (TWIN) hoặc một giường đôi (DBL) tùy theo cơ cấu phòng của các khách sạn. Phòng 3 sẽ được bố trí khi cần thiết (TRIPLE). Khách sạn do Gotravel đặt cho các chương trình tham quan có tiêu chuẩn tương ứng với các mức giá vé mà khách sạn chọn khi đăng ký tour du lịch. Nếu cần thiết thay đổi về bất kỳ lý do nào, khách sạn thay thế sẽ tương đương với tiêu chuẩn của khách sạn ban đầu và sẽ được báo ngày cho du khách trước ngày khởi hành. Những yêu cầu đặc biệt của khách hàng nếu thông báo trước cho Gotravel sẽ được đáp ứng tùy theo khả năng cung cấp của khách sạn và khách hàng phải trả thêm tiền đối với các yêu cầu này (nếu có). Gotravel có quyền không đáp ứng những yêu cầu này nếu khách sạn từ chối cung cấp dịch vụ.</p>
                                    <p>CHÍNH SÁCH VẬN CHUYỂN, GIAO NHẬN

                                        a. Vận chuyển
                                        
                                        - Phương tiện vận chuyển tùy theo từng chương trình du lịch.
                                        
                                        - Với chương trình đi bằng xe: Xe máy lạnh (4-7-15-25-35-45 chỗ) sẽ được Gotravel sắp xếp tùy theo số lượng từng đoàn, phục vụ suốt chương trình tham quan.
                                        
                                        - Với chương trình đi bằng xe lửa, máy bay, tàu cánh ngầm (phương tiện vận chuyển công cộng), trong một số chương trình các nhà cung cấp dịch vụ có thể thay đổi giời khởi hành mà không báo trước, việc thay đổi này sẽ được Gotravel thông báo cho khách hàng nếu thời gian cho phép.
                                        
                                        - Gotravel không chịu trách nhiệm bồi hoàn và trách nhiệm pháp lý với những thiệt hại về vật chất lẫn tinh thần do việc chậm trễ giờ giấc khởi hành của các phương tiện vận chuyển công cộng hoặc sự chậm trễ do chính hành khách gây ra. Gotravel chỉ thực hiện hành vi giúp đỡ để giảm bớt tổn thất cho khách hàng.
                                        
                                        b. Giao nhận
                                        
                                        Khi hoàn thành một giao dịch mua Tour/ Đăng Ký, bạn đồng ý nhận email mà chúng tôi có thể gửi đến bạn, cung cấp cho bạn những thông tin về điểm đến và những thông tin cụ thể liên quan đến đăng ký và các điểm đến của bạn, và chúng tôi có thể gửi email mời bạn điền vào mẫu đánh giá của khách hàng.</p>
                                </div>

                                <p> TIẾP NHẬN THÔNG TIN VỀ CHƯƠNG TRÌNH DU LỊCH

                                    Trước khi đăng ký, khách hàng vui lòng đọc kỹ chương trình, giá vé, nội dung bao gồm cũng như không bao gồm trong chương trình. Khách hàng có thể trực tiếp hoặc nhờ người đại diện đến đăng ký đi du lịch và thanh toán tiền vé tại các văn phòng của Gotravel. Gotravel chỉ có trách nhiệm cung cấp thông tin chuyến đi cho khách hàng đến đăng ký trực tiếp hoặc cho người đại diện. Gotravel không chịu bất cứ trách nhiệm nào trong trường hợp người đại diện không cung cấp lại hoặc cung cấp không chính xác các thông tin của chuyến đi cho khách hàng.</p>
                                <p>TRÁCH NHIỆM VÀ CÁC CAM KẾT KHÁC.

                                    1. Về phía Gotravel:
                                    
                                    - Đảm bảo mọi dịch vụ theo đúng theo chương trình.
                                    
                                    - Phổ biến đầy đủ các thông tin cần thiết, các qui định khi đi du lịch trong và ngoài nước trước ngày khởi hành.
                                    
                                    - Với các chương trình du lịch nước ngoài, Gotravel không chịu trách nhiệm về các hành khách bị cơ quan hữu quan của nước ngoài từ chối cho nhập cảnh. Mọi phát sinh từ việc từ chối này do khách hàng chi trả bao gồm cả chi phí phạt hủy dịch vụ của các nhà cung cấp.
                                    
                                    2. Về phía khách hàng:
                                    
                                    - Thanh toán đầy đủ, đúng hạn.
                                    
                                    - Trong thời gian đi du lịch, khách hàng phải tuân thủ theo chương trình tour.
                                    
                                    - Cung cấp hộ chiếu, hình ảnh và các giấy tờ liên quan đến thủ tục xuất nhập cảnh đầy đủ, đúng hạng theo qui định.
                                    
                                    - Tuân thủ theo qui định và pháp luật các nước tham quan. Gotravel không chịu trách nhiệm pháp lý cũng như vật chất trong trường hợp khách hàng vi phạm pháp luật hoặc qui định của nước sở tại. Khách hàng phải chịu trách nhiệm thanh toán tất cả các chi phí phát sinh do việc vi phạm gây ra. Gotravel chỉ có trách nhiệm giúp đỡ khách hàng trong trường hợp này nhằm giảm thiểu mức thiệt hại cho khách.
                                    
                                    3. Tùy theo tình hình thực tế, Gotravel giữ quyền thay đổi lộ trình, sắp xếp lại thứ tự các điểm tham quan hoặc hủy bỏ chuyến đi du lịch bất cứ lúc nào mà Gotravel thấy cần thiết vì sự thuận tiện hoặc an toàn cho khách hàng.
                                    
                                    4. Trong quá trình thực hiện, nếu xảy ra tranh chấp sẽ được giải quyết trên cơ sở thương lượng không đạt được kết quả, vụ việc sẽ được đưa ra toàn án theo đúng qui định của pháp luật hiện hành. Mọi chi phí liên quan sẽ do bên thua kiện chịu.</p>
                                
                            </div>
                            <!-- /post -->
                        </div>
                        <!-- /single-post -->



                        <hr>

                    </div>
                    <!-- /col -->

                    
                    <!-- /aside -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>

@endsection