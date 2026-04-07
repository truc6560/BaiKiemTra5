<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieControllerCreate extends Controller
{
// Hàm hiển thị form thêm mới
    public function create()
    {
        $genre = DB::table('genre')->get();
        return view('admin.create');
    }

    // Hàm xử lý lưu dữ liệu và bắt lỗi
    public function store(Request $request)
    {
        // 1. Dịch thông báo lỗi
        $messages = [
            'required'    => ':attribute không được để trống.',
            'image'       => ':attribute tải lên bắt buộc phải là định dạng hình ảnh.',
            'date_format' => ':attribute phải nhập đúng định dạng năm-tháng-ngày (yyyy-mm-dd).',
        ];

        // 2. Đổi tên cột
        $customAttributes = [
            'original_name' => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'genre_id'      => 'Thể loại', // THÊM MỚI
            'release_date'  => 'Ngày phát hành',
            'overview'      => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ];

        // 3. Chạy Validate (Thêm ràng buộc cho genre_id)
        $request->validate([
            'original_name' => 'required',
            'movie_name_vn' => 'required',
            'genre_id'      => 'required', // THÊM MỚI
            'release_date'  => 'required|date_format:Y-m-d',
            'overview'      => 'required',
            'image'         => 'required|image',
        ], $messages, $customAttributes);

        // 4. Xử lý lưu ảnh
        $data = $request->except('_token', 'genre_id'); // Loại bỏ genre_id khỏi data của bảng movie
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = $imagePath;
        }

        // 5. Chuẩn bị dữ liệu và tạo ID mới
        $data['movie_name'] = $request->original_name;
        $maxId = DB::table('movie')->max('id');
        $newMovieId = $maxId + 1;
        $data['id'] = $newMovieId;

        // 6. LƯU VÀO BẢNG MOVIE
        DB::table('movie')->insert($data);

        // 7. LƯU VÀO BẢNG MOVIE_GENRE (THÊM MỚI)
        DB::table('movie_genre')->insert([
            'id_movie' => $newMovieId,
            'id_genre' => $request->genre_id
        ]);

        return redirect()->back()->with('success', 'Đã thêm phim thành công!');
    }
}