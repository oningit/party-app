<?php

namespace App\Http\Controllers;

use App\Models\Pub;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Carbon;

class PubController extends Controller
{
    /**  
     * Show the new list in the homepage.  
     *  
     * @return Party List  
     */
    public function index() {

        $data = DB::table('pubs')->get();

        $pubs = Pub::where('created_at', '<', Carbon::now()->subMinute(480))->get();

         foreach ($pubs as $post) {
            $post->delete();
        }

        return view('home', compact('data'));

    }

    /**  
     * Store the requested data in the database.  
     *  
     * @return \Illuminate\Http\Response  
     */
    public function store(Request $request, Pub $pub) {

        $userId = Auth::id();

        $validator = $request->validate([
            'pubname' => 'required',
            'event' => 'required',
            'location' => 'required',
            'ytkey' => 'required|unique:pubs',
        ]);

        //Create record
        $pub = Pub::create([
                'pubname' => $request->pubname,
                'event' => $request->event,
                'location' => $request->location,
                'ytkey' => $request->ytkey,
                'user_id' => $userId,
        ]);
        
        $data = DB::table('pubs')->where('user_id', $userId)->get();

        $message = session()->now('message', 'Pub Created Successfully!');
        
        return view('pub.pubcreator', compact('data', 'message'));

    }

    /**  
     * Show the list.  
     *  
     * @return \Illuminate\Http\Response  
     */
    public function list() {

        $userId = Auth::id();
    
        $data = Pub::where('user_id', $userId)->get();

        $adata = DB::table('pubs')->get(); 

        return view('pub.list', compact('data', 'adata'));

    }

    /**  
     * Show the list according to the user in creator page.  
     *  
     * @return \Illuminate\Http\Response  
     */
    public function show() {

        $userId = Auth::id();

        $data = Pub::where('user_id', $userId)->get();
        
        return view('pub.pubcreator', compact('data'));

    }

    /**  
     * Delete the record.  
     *  
     * @return redirect session  
     */
    public function destroy($id) {

        $item = Pub::findOrFail($id);

        //Find item and then delete record
        $item->delete();

        return redirect()->back()->with('message', 'Deleted Successfully!');

    }

    /**  
     * Show the watch page.  
     *  
     * @return \Illuminate\Http\Response  
     */
    public function watch(Request $request) {

        $data = DB::table('pubs')->select('id','pubname','ytkey')->wherePubname($request->pubname)->get();

        return view('pub.watch', compact('data'));
    }

}
