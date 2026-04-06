<x-movie-layout :genre="$theloai">
    <x-slot name='title'>Movie</x-slot>
    <div id='movie-view-div'>
        @include('movie.movie_view')
    </div>
    <script>
        $(document).ready(function(){
            $(document).on("click", ".menu-the-loai", function(e){
                e.preventDefault();
                let the_loai = $(this).attr("the_loai");
                $.ajax({
                    type: "POST",
                    url: "{{route('movieview')}}",
                    data: { "_token": "{{ csrf_token() }}", "the_loai": the_loai },
                    success: function(data) { $("#movie-view-div").html(data); }
                });
            });
        });
    </script>
</x-movie-layout>