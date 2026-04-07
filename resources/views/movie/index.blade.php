<x-movie-layout :genre="$theloai">
    <x-slot name='title'>Movie</x-slot>
    
    <div class='list-movie'>
        @foreach($data as $row)
            <div class='movie'> 
                <a href="{{url('movie/chitiet/'.$row->id)}}" style="text-decoration: none; color: inherit; display: block;">
                    @php $img = $row->image_link ?: asset('storage/movie_image/'.$row->image); @endphp
                    <img src="{{$img}}" width='100%' height='280px' style="object-fit: cover; display: block; margin-bottom: 8px;">
                    
                    <b style="display: block; padding: 0 5px;">{{$row->movie_name_vn}}</b>
                    <i style="display: block; font-style: normal; color: #666; margin-top: 5px;">{{$row->release_date}}</i>
                </a>
            </div>
        @endforeach
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