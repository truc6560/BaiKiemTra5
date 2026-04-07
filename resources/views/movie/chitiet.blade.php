<x-movie-layout>
    <x-slot name="title">
        Chi tiết phim
    </x-slot>

    <h4>{{ $movie->movie_name_vn }}</h4>
    <div class="movie-info">
        <div>
            <img src="{{ $movie->image_link }}" width='90%' height='100%'>
        </div>
        <div>
            Ngày phát hành: <b>{{ $movie->release_date }}</b><br>
            Quốc gia: <b>{{ $movie->country_name }}</b><br>
            Thời gian: <b>{{ $movie->runtime }} phút</b><br>
            Doanh thu: <b>{{ $movie->revenue }}</b><br>
            <b>Mô tả:</b><br>
            {{ !empty($movie->overview_vn) ? $movie->overview_vn : (!empty($movie->overview) ? $movie->overview : 'Đang cập nhật') }}<br>
            <a href="{{ $movie->trailer }}" target="_blank" class="btn btn-success">Xem trailer</a>

        </div>
    </div>	
</x-movie-layout>