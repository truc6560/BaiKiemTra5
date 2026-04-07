<x-movie-layout>
    <x-slot name="title">
        Quản lý phim
    </x-slot>

    <style>
        .movie-thumb {
            width: 52px;
            height: 78px;
            object-fit: cover;
            border-radius: 2px;
        }
    </style>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    
    <div style='text-align:center; color:#15c; font-weight:bold; font-size:20px;'>DANH SÁCH PHIM</div>
    <a href="{{ route('admin.movies.create') }}" class='btn btn-sm btn-success mb-1'>Thêm</a>
    <table id = "id-table" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Ngày phát hành</th>
                <th>Điểm đánh giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td><img src="{{ $movie->image_link }}" alt="{{ $movie->movie_name_vn }}" class="movie-thumb"></td>
                <td>{{ $movie->movie_name_vn }}</td>
                <td>{{ \Illuminate\Support\Str::limit($movie->overview_vn, 85) }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->vote_average }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ url('/chitiet/'.$movie->id) }}" class="btn btn-primary btn-sm">Xem</a>
                        &nbsp;
                        <form method='post' action="{{ url('/movies/'.$movie->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phim này không?');">
                            @method('DELETE')
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                            @csrf
                        </form>
                    </div>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                    bStateSave:true,
                });
        });

    </script>
</x-movie-layout>