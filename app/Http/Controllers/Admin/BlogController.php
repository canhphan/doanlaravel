<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogss;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // thêm dữ liệu vào 
    public function addGet()
    {
        return view('admin.blog.add');

    }
    public function addPost(BlogRequest $request)
    {
        // lay thong tin tu form dua vao bien data
        $data=$request->all();
        
        // lay ten file cua hinh anh dua vao data
        $file = $request->image;
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName(); 
        };

        if (Blogss::create($data)) {
           if (!empty($file)) {
                $file->move('upload/frontend/blog', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', ('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }

    }


// hien thi du lieu ra bang
    public function list()
    {
        $hienthi=Blogss::all();
        return view('admin.blog.list',compact('hienthi'));
            // dd($hienthi);
    }

// sua thong tin
    public function editblog($id)
    {
        $edit=Blogss::where('id',$id)->get();
        return view('admin.blog.edit',compact('edit'));
    } 

    public function updateblog(BlogRequest $request, $id) 
    {

        $a=Blogss::findOrFail($id);
        $data = $request->all(); 

// // lấy thông tin của file ảnh upload và đưa vào data
        $file = $request->image;
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName(); 
        }
        
        if ($a->update($data)) {
            if (!empty($file)) {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', ('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }

        echo "<a href='/Doan/public/blog/list'>quay lai</a>";

        
    }

    public function destroy($id)
    {
        $destroy=Blogss::where('id',$id)->delete();
        echo "<a href='/Doan/public/blog/list'>quay lai</a>";
        
    }

}
