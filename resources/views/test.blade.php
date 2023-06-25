<h1>Danh sách thanh toán</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Tên phương thức</th>
                <th>Số tiền</th>
                <th>Mã thanh toán</th>
                <th>Tên khách hàng</th>
                <th>Ngày thanh toán</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->tenphuongthuc}}</td>
                    <td>{{$t->sotien}}</td>
                    <td>{{$t->mathanhtoan}}</td>
                    <td>{{$t->tenkhachhang}}</td>
                    <td>{{$t->ngaythanhtoan}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>