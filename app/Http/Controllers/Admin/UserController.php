<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // check xem có đăng nhập hay chưa
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('admin.user.profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        
        // lấy thông tin của user có id như đã đăng nhập
        $userId = Auth::id(); 
        // tìm trong data user có id như đã lấy ra
        $user = User::findOrFail($userId); 
        echo $user;
        $data = $request->all(); 

// // lấy tên của file ảnh upload và đưa vào data
        $file = $request->avatar;
        // echo $file;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName(); 
        }
            // dd($data);

// // nếu có nhập mk mới
        if ($data['password']) {
            // thì mã hóa và đưa vào mảng data
            $data['password'] = bcrypt($data['password']);
        } else {
            // nếu k có thì lấy mã cũ
            $data['password'] = $user->password;
        }

//         // up thông tin vào bảng user
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', ('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
