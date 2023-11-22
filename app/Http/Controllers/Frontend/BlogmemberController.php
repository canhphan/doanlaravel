<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogss;
use Illuminate\Support\Facades\Auth;
use App\Models\Rate;
use App\Models\Cmt;



class BlogmemberController extends Controller
{
    // /Blog list/
    public function blogmember()
    {

         $posts = Blogss::orderBy('id', 'DESC')->paginate(3);

        return view('frontend.blog.blog',compact('posts'));
    }

    // Blog detail
    public function blogdetail($id)
    {   

    $edit=Blogss::where('id',$id)->get();
    $user = Blogss::find($id);    
    $previous = Blogss::where('id', '<', $id)->max('id');    
    $next = Blogss::where('id', '>', $id)->min('id');
    
    // -layy all rate cua id blog nay 
    // - tinh tbc 

     $tbRate = Rate::where('idblog', $id);
     $averageScore = $tbRate->avg('rate');

    // -layy all cmt cua id blog nay 
     // $cmt = Cmt::where('idblog', $id && 'iduser', $id);




    return view('frontend.blog.blogdetail',compact('edit','previous','next','averageScore'));

    }
    

    public function blograte(Request $request){
        
        $user=Auth::id();
        $idblog = $request->id_blog;
        $ratevalue = $request->rate;

        // Tạo một bài viết mới và lưu vào cơ sở dữ liệu
        $post = new Rate([
            'idblog' => $idblog,
            'iduser' => $user,
            'rate' => $ratevalue
        ]);

        $post->save();

        return response()->json(['message' => 'Bài viết đã được thêm vào cơ sở dữ liệu']);
       
    }


 public function blogcmt(Request $request){
    // dd($request->all());
        $name=Auth::user()->name;
        $avt=Auth::user()->avatar;
        $user=Auth::id();
        $idblog = $request->id_blog;
        $cmtx = $request->message;
        $lv = $request->level;

        // Tạo một bài viết mới và lưu vào cơ sở dữ liệu
        $postcmt = new Cmt([
            'idblog' => $idblog,
            'iduser' => $user,
            'cmt' => $cmtx,
            'name' => $name,
            'avatar' => $avt,
            'level' => $lv
        ]);

        $postcmt->save();

        return response()->json(['message' => 'Bài viết đã được thêm vào cơ sở dữ liệu']);
       
    }



}
