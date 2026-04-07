<div class='list-movie' style="display: grid; grid-template-columns: repeat(4, 25%);">
    @foreach($data as $row)
        <div class='book' style="margin: 10px; text-align: center; border: 1px solid #555555; border-radius: 5px; overflow: hidden; padding-bottom: 10px; background: #fff;"> 
            <a href="{{url('movie/chitiet/'.$row->id)}}" style="text-decoration: none; color: inherit; display: block;">
                @php $img = $row->image_link ?: asset('storage/movie_image/'.$row->image); @endphp
                <img src="{{$img}}" width='100%' height='280px' style="object-fit: cover; display: block; margin-bottom: 8px;">
                
                <b style="display: block; padding: 0 5px;">{{$row->movie_name_vn}}</b>
                <i style="display: block; font-style: normal; color: #666; margin-top: 5px;">{{$row->release_date}}</i>
            </a>
        </div>
    @endforeach
</div>