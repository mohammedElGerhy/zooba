<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ArtistExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use App\Models\Area;
use App\Models\Artist;
use App\Models\Citie;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ratings = Rating::all();
        $cities = Citie::all();
        $areas = Area::all();
        $services = Service::all();
        return view('admin.artists.create', compact('ratings', 'cities', 'areas', 'services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        try {

        if ($request->hasFile('image')){
        $imageNmae = $request->image->getClientOriginalName();
        $base = $request->image->move('image/artists', $imageNmae);
        }

            Artist::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'Address' => $request->Address,
                'National_ID' => $request->National_ID,
                'phone' => $request->phone,
                'image' => $base,
                'area_id' => $request->area_id,
                'citie_id' => $request->citie_id,
                'rating_id' => $request->rating_id,
                'service_id' => $request->service_id
            ]);
            return redirect()->route('artists.create')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('artists.create')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

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
        $artist = Artist::findOrFail($id);
        $ratings = Rating::all();
        $cities = Citie::all();
        $areas = Area::all();
        $services = Service::all();
        return view('admin.artists.edit', compact('ratings', 'cities', 'areas', 'artist','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request)
    {
      try {
        DB::beginTransaction();
            $artist = Artist::findOrFail($request -> id);
                $artist->name = $request->name;
                $artist->email = $request->email;
                $artist->password = Hash::make($request->password);
                $artist->Address = $request->Address;
                $artist->National_ID = $request->National_ID;
                $artist->phone = $request->phone;
                $artist->area_id = $request->area_id;
                $artist->citie_id = $request->citie_id;
                $artist->rating_id = $request->rating_id;
                 $artist->service_id = $request->service_id;
            $artist->save();

                if ($request->hasFile('image')){
                    $imageNmae = $request->image->getClientOriginalName();
                    $base = $request->image->move('image/artists', $imageNmae);
                    $artist = Artist::findOrFail($request -> id);
                    $artist->image = $base;
                    $artist->save();
                }
        DB::commit();

            return redirect()->route('artists.index')->with(['success'=>'تم حذف البيانات بنجاح']);
        }catch (\Exception $e){
        DB::rollback();
            return redirect()->route('artists.index')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);

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
        $image = Artist::findOrFail($request->id);
        if (! empty($image ->image)){
            $photo = Str::after($image->image, 'public/' );
            $photo = base_path('public/' .  $photo);
            unlink($photo);
        }

          Artist::findOrFail($request->id)->delete();
          return redirect()->route('artists.index')->with(['success'=>'تم تغير الاشتراك بنجاح']);

        }catch (\Exception $e){
            return redirect()->route('artists.index')->with(['errors'=>'هناك خطاء تاكد من البيانات']);
        }
    }

    public function getarea($id){

        $list_Area = Area::where("citie_id", $id)->pluck("name", "id");
        return $list_Area;
    }

        public  function statues ($id){

            try {
             $status =  Artist::findOrFail($id);
               if ($status -> Expiration === 1){
                   $status->update([
                       'Expiration' => 0
                   ]);
               } else{
                   $status->update([
                       'Expiration' => 1
                   ]);
               }

                return redirect()->route('artists.index')->with(['success'=>'تم حذف البيانات بنجاح']);
            }catch (\Exception $e){
                return redirect()->route('artists.index')->with(['errors'=>'هناك خطاء تاكد من البيانات المدخلا']);
            }

        }

        public function export(){
            return \Excel::download(new ArtistExport, 'artist.xlsx');
        }

}
