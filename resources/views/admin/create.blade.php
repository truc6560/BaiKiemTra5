<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
        <h3 style="color: #0044cc; text-align: center; font-weight: bold; margin-bottom: 20px; text-transform: uppercase;">
            THÊM PHIM
        </h3>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 15px; border: 1px solid #f5c2c7; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/admin/movies/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tên tiếng Anh</label>
                <input type="text" name="original_name" value="{{ old('original_name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" value="{{ old('movie_name_vn') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Thể loại</label>
            <select name="genre_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">-- Chọn thể loại phim --</option>
                @foreach($genre as $item)
                    <option value="{{ $item->id }}" {{ old('id_genre') == $item->id ? 'selected' : '' }}>
                        {{ $item->genre_name_vn }}
                    </option>
                @endforeach
            </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Ngày phát hành</label>
                <input type="text" name="release_date" value="{{ old('release_date') }}" placeholder="yyyy-mm-dd" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mô tả</label>
                <textarea name="overview" rows="5" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('overview') }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Ảnh đại diện</label>
                <input type="file" name="image" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="text-align: center;">
                <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 30px; border-radius: 4px; cursor: pointer; font-size: 16px;">
                    Lưu
                </button>
            </div>
        </form>
    </div>
</x-movie-layout>