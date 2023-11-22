<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
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
        return view('admin.country.add');

    }
     public function addPost(CountryRequest $request)
    {
        $data=$request->all();

        if (Countries::create($data)) {
           echo "<a href='/Doan/public/country/list'>thanh cong</a>";
       } else
         echo "that bai";
}


// hien thi du lieu ra bang
    public function list()
    {
            $hienthi=Countries::all();
            return view('admin.country.list',compact('hienthi'));
            // dd($hienthi);
    }

// sua thong tin
    public function editcountry($id)
    {
        $edit=Countries::where('id',$id)->get();
        return view('admin.country.edit',compact('edit'));
    } 

    public function updatecountry(CountryRequest $request, $id) 
    {
       $update=Countries::findOrFail($id);
       $data = $request->all(); 
       if ($update->update($data)) {
        return redirect()->back()->with('success', ('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
    }

    public function destroy($id)
    {
        $destroy=Countries::where('id',$id)->delete();
echo "<a href='/Doan/public/country/list'>quay lai</a>";
        
    }

}
