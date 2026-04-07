<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        <link rel="stylesheet" href="{{asset('library/bootstrap.min.css')}}">

        <script src="{{asset('library/jquery.slim.min.js')}}"></script>
        <script src="{{asset('library/popper.min.js')}}"></script>
        <script src="{{asset('library/bootstrap.bundle.min.js')}}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{asset('library/jquery-3.7.1.js')}}" ></script>
        <style>
            /* Định dạng màu nền và màu chữ của menu */
          
            .list-movie
            {
                display:grid;
                grid-template-columns:repeat(4,25%);
            }
            .movie
            {
                margin:10px;
                text-align:center;
                border-radius:5px;
                border:1px solid #dbdbdb;
                overflow: hidden;
                cursor:pointer;
            }
            .movie a
            {
                color: black;
                text-decoration:none;
            }
            .movie-info
            {
                display:grid;
                grid-template-columns:repeat(2,30% 70%);
            }
            .banner
            {
                position:relative;
                width:100%;
                max-width:1200px;
                height:220px;
                color:white;
                margin:0 auto;
                overflow:hidden;
            }
            .banner img
            {
                position:absolute;
                inset:0;
                width:100%;
                height:100%;
                object-fit:cover;
                z-index:0;
            }
            .banner-content
            {
                position:relative;
                z-index:1;
                padding:20px 20px;
                text-align:center;
            }
            .search-input
            {
                width: 90%;
                position: relative;
                margin: 0 auto;
                z-index:1;
            }
            .search-input input
            {
                width:100%;
                height:40px;
                border-radius:30px;
                border:none;
                padding-left:15px;
            }
            .search-btn
            {
                width:90px; 
                height: 40px;
                color:white; 
                background-image:linear-gradient(to right, rgba(30,213,169,1) 0%, rgba(1,180,228,1) 100%);
                border-radius:30px;
                border:none;
                position: absolute;
                right: 0;
            }

            .list-group-movie a
            {
                padding:10px;
                text-decoration:none;
                color:white;

            }
            .list-group-movie a:hover
            {
                background:#000;

            }

            /*.movie:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }*/

        </style>
    </head>
    <body>
        <header style='text-align:center'>
            <div class='banner'>
                <img src="{{asset('image/banner.jpg')}}" alt="Banner">
                <div class="banner-content">
                    <h2>Welcome.</h2>
                    <h3>Millions of movies, TV shows and people to discover. Explore now.</h3>
                </div>
                <div class='search-input'>
                    <form method="post" action="{{url('/timkiem')}}">
                        <input type="text" name='keyword' placeholder="Nhập tên bộ phim yêu thích để tìm kiếm"
                            value="{{ request()->input('keyword') }}">
                        <button class="search-btn">Tìm kiếm</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </header>
        <main style="max-width:1200px; margin:2px auto;">
        <div class='row'>
            <div class='col-3 pr-0'>
                <div class="card" style="width: 18rem; background-color:#222;color:white;">
                    <div class="card-header">
                    <i class="fa fa-film" aria-hidden="true"></i> <b>Thể loại phim</b>
                    </div>
                    <ul class="list-group list-group-flush list-group-movie">
                       @foreach($genre as $row)
                       <a href="{{url('/theloai/'.$row->id)}}">{{$row->genre_name_vn}}</a>
                       @endforeach
                    </ul>
                    </div>
                </div>
                    <div class='col-9'>
                         {{$slot}}
                    </div>
                </div>
            </div>  
         </div>
        </main>
    </body>
</html>