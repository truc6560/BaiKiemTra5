<x-movie-layout>
    <x-slot name="title">
        @isset($genreName)
            {{ $genreName }}
        @else
            Movie
        @endisset
    </x-slot>
    
    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie">
                @if($movie->image)
                    <img src="{{ $movie->image_link }}" alt="{{ $movie->movie_name }}" style="width:100%; height:auto;">
                @endif
                <div style="font-weight: bold; margin: 10px 0;">{{ $movie->movie_name }}</div>
                <div style="text-align: center; padding-bottom: 10px;">{{ $movie->release_date }}</div>
            </div>
        @endforeach
    </div>
</x-movie-layout>