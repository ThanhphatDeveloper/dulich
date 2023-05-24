<h1>Danh sách tour</h1>
@foreach($lst as $t)
    <div class="tour">
        {{$t->tentour}}
        {{$t->loai_tour->loaitour}}
    </div>
@endforeach