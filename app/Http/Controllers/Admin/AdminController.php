<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        try {
           Admin::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'statues' => $request->statues,
           ]);
           return redirect()->route('admin.admins')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('admin.admins')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request)
    {
        try {

            $admin = Admin::findOrFail($request->id);
            $admin->update([
                $admin->name                = $request->name,
                $admin->email               = $request->email,
                $admin->password         = Hash::make($request->password),
                $admin->statues          = $request-> statues,
            ]);
            return redirect()->route('admin.admins')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('admin.admins')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Admin::findOrFail($request->id)->delete();
            return redirect()->route('admin.admins')->with(['success'=>'تم تغير الاشتراك بنجاح']);

        }catch (\Exception $e){
            return redirect()->route('admin.admins')->with(['errors'=>'هناك خطاء تاكد من البيانات']);
        }
    }
}
