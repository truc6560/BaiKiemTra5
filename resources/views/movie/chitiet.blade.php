<x-movie-layout :genre="$theloai">
    <x-slot name='title'>{{ $data->movie_name_vn }}</x-slot>
    <style>
        .info { display: grid; grid-template-columns: 35% 65%; gap: 20px; }
        .movie-img { width: 100%; border-radius: 8px; }
    </style>
    <h4>{{ $data->movie_name_vn }}</h4>
    <div class='info'>
        <div>
            <img src="{{ $data->image_link ?: asset('storage/movie_image/'.$data->image) }}" class="movie-img">
        </div>
        <div>
            <p>Ngày phát hành: <b>{{ $data->release_date }}</b></p>
            <p>Quốc gia: <b>{{ $data->country_name }}</b></p>
            <p>Thời gian: <b>{{ $data->runtime }} phút</b></p>
            <p>Doanh thu: <b>{{ number_format($data->revenue, 0, ',', '.') }}</b></p>
            <p><b>Mô tả:</b></p>
            <p style="text-align: justify">{{ $data->overview_vn }}</p>
            <a href="{{ $data->trailer }}" target="_blank" class="btn btn-success">Xem trailer</a>
        </div>
    </div>
</x-movie-layout>