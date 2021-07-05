<?php


namespace App\Repository;


use App\Events\AlertEvent;
use App\Models\Comment;
use App\Models\Presence;
use App\Models\Request_all_use;
use Complex\Exception;

class ArtistRepository implements ArtistRepositoryInterface
{

    public function index(){
        $Presence = Presence::where('artist_id', auth()->guard('artist')->id())->get()->last();
        return  view('artist.index' , compact('Presence'));
    }


    public function add_presence ($request){
        try {

            $presence = $request->validate( [
                'presence' => 'required',
                'artist_id' => 'required|exists:App\Models\Artist,id',

            ], [
            ], [
    		'presence' =>	'عليك تسجيل حضور او غياب',
                'artist_id' => 'هناء خطاء ما',

    	]);
         Presence::create($presence);
         return redirect()->route('artist.profile')->with(['success' => 'تم التسجيل']);
        }catch (\Exception $e){
            return redirect()->route('artist.profile')->with(['error' => 'هناك حطاء حاول مرا اخرا']);
        }
    }



    public function store($request) {

            $request->validate([
                'service_id'           => 'required',
                'artist_id'          => 'required',
                'user_id'        => 'required',
                'area_id'  => 'required|numeric',
                'citie_id'        => 'required',
                'address'        => 'required',
            ]);
            Request_all_use::create([
                'service_id' => $request->service_id,
                'artist_id' => $request->artist_id,
                'user_id' => $request->user_id,
                'area_id' => $request->area_id,
                'citie_id' => $request->citie_id,
                'address' => $request->address
            ]);
            return response()->json(['success'=>' تم ارسال طلبك سيتم التواصل معك']);
    }

    public function show($id)
    {
        $showdate = Request_all_use::select('*')->where('artist_id', $id)->get()->last();
        return view('artist.show', compact('showdate'));
    }

    public function destroy($id)
    {
        Request_all_use::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function get_processes(){

        $processes = Request_all_use::select('*')->where('artist_id', auth()->guard('artist')->id())->get();
        return view('artist.processe', compact('processes'));
    }

    public function store_comment ($request){
        $request->validate([
            'comment'        => 'required',
        ]);
        $get_id = Request_all_use::select('*')->
        where('user_id', $request->user_id)
            ->where('artist_id', $request->artist_id)
            ->where('service_id', $request->service_id)
            ->where('service_id', $request->service_id)->get()
            ->last();
            Request_all_use::where('id', $get_id->id)
                ->update(['rating' => $request->comment]);
        return response()->json(['success'=>' تم ارسال تقيمك'.'  ' .$request->comment.' ' . 'نتمنا لك خدمة ممتازة']);

    }

    public function statues_success ($request){
    $statues =  Request_all_use::find($request->request_id);
        $statues->update(['statues'=> 0]);
        return response()->json(['success'=>'بدات الخدمة']);

    }

    public function statues_end ($request){
        $statues =  Request_all_use::find($request->request_id);
        $statues->update(['statues'=> 2]);
        return response()->json(['success'=>'انتهاء الخدمة']);

    }
    public function login (){
        return view('artist.login');
    }

    public function set_login ($request){

        $remember_me = $request->has('remember_me')?true:false;

        if (auth()->guard('artist')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)){
            return redirect() -> route('artist.profile');
        }
        return redirect()->back()->with('errors', 'هناك  خطا بالبيانات ');
    }

    public function logout(){
        auth()->guard('artist')->logout();
        return redirect() -> route('artist.login');
    }

}
