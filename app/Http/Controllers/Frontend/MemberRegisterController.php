<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;



class MemberRegisterController extends Controller
{

    // them
    public function registerGet()
    {
        return view('frontend.member.register') ;   
    }
    public function registerPost(RegisterRequest $request)
    {
        $data=$request->all();
        $data['level']=0;

        // // lấy tên của file ảnh upload và đưa vào data
        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName(); 
        }

        // đưa vào cơ sở dữ liệu
        if (User::create($data)) {
            return redirect()->back()->withErrors('thanh cong');
        } else {
            return redirect()->back()->withErrors('that bai');
        }
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
