<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.services', compact('services'));
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
    public function store(ServiceRequest $request)
    {
        try {
      //  $validated = $request->validate();

        Service::create([
            'name' => $request-> name,
            'price' => $request-> price,
            'description' => $request-> description,
            'discount_percentage' => $request-> discount_percentage,
            'Expiry_date' => $request-> Expiry_date,
        ]);
        return redirect()->route('admin.services')->with(['success'=>'تم حفظ البيانات بنجاح']);

        }catch (\Exception $e){

            return redirect()->route('admin.services')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }

    /**k
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
    public function update(ServiceRequest $request)
    {
        try {
        $service = Service::findOrFail($request->id);
        $service->update([
            $service->name                = $request->name,
            $service->price               = $request->price,
            $service->description         = $request->description,
            $service->discount_percentage = $request-> discount_percentage,
            $service->Expiry_date         = $request-> Expiry_date,
        ]);
            return redirect()->route('admin.services')->with(['success'=>'تم حفظ البيانات بنجاح']);

        }catch (\Exception $e){
            return redirect()->route('admin.services')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Service::where('id',$id)->delete();

            return redirect()->route('admin.services')->with(['success'=>'تم حذف البيانات بنجاح']);

        }catch (\Exception $e){
            return redirect()->route('admin.services')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }
}
