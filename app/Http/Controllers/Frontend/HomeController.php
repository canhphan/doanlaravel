<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.index.index');
    }
    public function blog()
    {
        return view('frontend.blog.blog');
    }
    public function blogdetail()
    {
        return view('frontend.blog.blogdetail');
    }
    public function checkout()
    {
        return view('frontend.cart.checkout');
    }
    public function login()
    {
        return view('frontend.member.login');
    }
     public function register()
    {
        return view('frontend.member.register');
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
