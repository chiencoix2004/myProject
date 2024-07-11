<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    // function showUser()
    // {
    //     $users = [
    //         [
    //             'id' => '1',
    //             'name' => 'chien',
    //         ],
    //         [
    //             'id' => '2',
    //             'name' => 'chien3',
    //         ],
    //     ];
    //     return view('list-user')->with([
    //         'abc'=>$users
    //     ]);
    // }

    // function getUser($id, $name = '')
    // {
    //     echo $id;
    //     echo $name;
    // }

    // function updateUser(Request $request)
    // {
    //     echo $request->id;
    //     echo $request->name;
    // }
    function showUser()
    {
        // 1. Lấy danh sách toàn bộ user
        // $result = DB::table('users')->get();
        // dd($result);

        // $result = DB::table('users')
        // ->select('id','name')
        // ->get();
        // dd($result);
        //Chỉ lấy thông tin cần thiết 



        // 2. Lấy thông tin user có id = 4 
        // $result = DB::table('users')->where('id','=>','4')->first();
        // $result = DB::table('users')->find('4'); 
        // Find()chỉ sử dụng trong trường hợp là ID
        // dd($result);

        // 3. Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id','=>','16')->value('name');
        // dd($result);


        // 4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','Ban giám hiệu')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->pluck('id');
        //pluck('id') nhét hết id vào 1 mảng
        // dd($result);


        // 5. Tìm user có độ tuổi lớn nhất trong công ty 
        // $result = DB::table('users')->where('tuoi',DB::table('users')->max('tuoi'))
        // ->get();
        // dd($result);


        // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')->where('tuoi',DB::table('users')->min('tuoi'))
        // ->get();
        // dd($result);


        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','Ban giám hiệu')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->count();
        // dd($result);


        // 8. Lấy danh sách tuổi các user 
        // $result = DB::table('users')->distinct()->pluck('tuoi');
        //distinct() lọc những giá trị trùng lặp 
        // dd($result);




        // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')
        // ->where('name','like','%Khải')
        // ->orWhere('name','like','%Thanh')
        // ->get();






        // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','Ban đào tạo')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->get();
        // dd($result);



        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        // ->where('tuoi','>=','30')->orderBy('tuoi','asc')->get();
        // dd($result);





        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        // ->orderBy('tuoi','desc')
        // ->offset(5)
        // ->limit(10)
        // ->get();
        // dd($result);



        // 13. Thêm một user mới vào công ty
        // $data = [
        //     'name'=>'Taj Coong Chien',
        //     'email'=>'tacongchien003"gmail.com',
        //     'phongban_id'=>'1',
        //     'songaynghi'=>'0',
        //     'tuoi'=>'20',
        //     'created_at'=> Carbon::now(),
        //     'updated_at'=> Carbon::now(),
        // ];
        // $userID = DB::table('users')->insertGetId($data);
        // $result = DB::table('users')->find($userID);
        // dd($result);






        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','Ban đào tạo')->value('id');
        // $listUser = DB::table('users')->where('phongban_id',$idPhongBan)->get();
        // // pluck('id') nhét hết id vào 1 mảng
        // // dd($result);
        // foreach ($listUser as $value ) {
        //      DB::table('users')->where('id','=',$value->id)
        //      ->update([
        //         'name'=>$value->name.'PDT'
        //      ]);
        // }
        // dd($listUser);





        // 15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('songaynghi','>','15')->delete();
    }
    public function listUsers()
    {
        $listUsers = DB::table('users')
            ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
            ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'phongban.ten_donvi',)
            ->get();
        return view('users/listUsers')
            ->with(['listUsers' => $listUsers]);
    }

    public function addUsers()
    {
        $phongban = DB::table('phongban')
            ->select('id', 'ten_donvi')
            ->get();
        return view('users/addUsers')
            ->with(['phongban' => $phongban]);
    }
    public function addPostUsers(Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');
    }


    public function deleteUsers($userId)
    {
        DB::table('users')->where('id', $userId)->delete();
        return redirect()->route('users.listUsers');
    }
    public function updateUsers($userId)
    {
        $phongban = DB::table('phongban')
            ->select('id', 'ten_donvi')
            ->get();
        $user = DB::table('users')->where('id', $userId)->first();
        return view('users/updateUsers')
            ->with([
                'user' => $user,
                'phongban' => $phongban
            ]);
    }

    public function updatePostUsers(Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'songaynghi' => $req->songaynghi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ];
        DB::table('users')->where( 'id',$req->idUser)->update($data);
        return redirect()->route('users.listUsers');
    }
}
