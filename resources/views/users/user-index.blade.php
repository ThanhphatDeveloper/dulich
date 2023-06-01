<h1>Danh sách user</h1>
@foreach($lst as $u)
    <div class="tour">
        {{$u->image}}
        {{$u->ho}}
        {{$u->ten}}
        {{$u->email}}
        {{$u->sdt}}
    </div>
@endforeach