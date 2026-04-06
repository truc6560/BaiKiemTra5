<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index(){
        $genre = DB::table('genre')->get();
        return view("movie.index");
    }

    // Hàm hiển thị form thêm mới
    public function create()
    {
        $genre = DB::table('genre')->get();
        return view('admin.create');
    }

    // Hàm xử lý lưu dữ liệu và bắt lỗi
    public function store(Request $request)
    {
        $messages = [
            'required'    => ':attribute không được để trống.',
            'image'       => ':attribute tải lên bắt buộc phải là định dạng hình ảnh.',
            'date_format' => ':attribute phải nhập đúng định dạng năm-tháng-ngày (yyyy-mm-dd).',
        ];

        // 2. Đổi tên các biến thành tiếng Việt để hiển thị ra thông báo cho đẹp
        $customAttributes = [
            'original_name' => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'release_date'  => 'Ngày phát hành',
            'overview'      => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ];

        // 3. Chạy lệnh kiểm tra (Validation)
        $request->validate([
            'original_name' => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d', // Ràng buộc đúng chuẩn yyyy-mm-dd
            'overview'      => 'required',
            'image'         => 'required|image', // Bắt buộc phải là file ảnh
        ], $messages, $customAttributes);

        // --- Nếu code chạy qua được đoạn trên nghĩa là dữ liệu đã hợp lệ ---
        
        // 4. Xử lý lưu ảnh vào thư mục storage/app/public/
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            // Lấy chính xác tên gốc của file ảnh bạn tải lên (ví dụ: poster.jpg)
            $fileName = $request->file('image')->getClientOriginalName();
            
            // Dùng hàm storeAs để ép Laravel lưu đúng tên gốc đó, chuỗi sẽ rất ngắn
            $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = $imagePath;
        }

        // 5. Cứu cánh lỗi thiếu cột: Gán movie_name bằng với original_name
        $data['movie_name'] = $request->original_name;

        $maxId = DB::table('movie')->max('id'); // Tìm ID lớn nhất hiện tại
        $data['id'] = $maxId + 1;               // Cộng thêm 1 để làm ID cho phim mới

        // 6. Lưu vào Database
        DB::table('movie')->insert($data);

return redirect()->back()->with('success', 'Đã thêm phim thành công!');    }
}
