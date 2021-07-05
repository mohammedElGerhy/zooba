<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::all();
        return view('admin.ratings.rating', compact('ratings'));
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
    public function store(Request $request)
    {
        try {
            Rating::create([
            'Rate' => $request->Rate,
            'rating' => $request->rating,
            ]);
            return redirect()->route('ratings.index')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('ratings.index')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);
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
    public function update(Request $request)
    {
        try {
            $rating = Rating::findOrFail($request->id);
            $rating->update([
                $rating->Rate =  $request->Rate,
                $rating->rating =  $request->rating,
            ]);

            return redirect()->route('ratings.index')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('ratings.index')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);
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
            Rating::where('id',$id)->delete();

            return redirect()->route('ratings.index')->with(['success'=>'تم حذف البيانات بنجاح']);

        }catch (\Exception $e){
            return redirect()->route('ratings.index')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

        }
    }
}
