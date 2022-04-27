<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
 

 
class WallController extends Controller
{

    public function dashboard()
    {
        $messages = Message::all();
        return view('dashboard', ['messages'=>$messages]);
    }

    public function postMessage(Request $request)
    {
        
        $message=new Message();
        $message->user_id= Auth::id();
        $message->content=$request->message;
        $message->save();

        return redirect(route('dashboard'));
    }
    public function deletemessage(Request $request)
    {
        $message=Message::find($request->id);
        if ($message->user_id !=Auth::id()) 
        abort(404);

        $message->delete();
        
        return redirect(route('dashboard'));
    }

    public function formUpdateMessage(Request $request)
    {
        $message=Message::find($request->id);
        if ($message->user_id !=Auth::id()) 
        abort(404);

        return view('formUpdateMessage', ['messages'=>$message]);
    
    }

    public function updateMessage(Request $request)
    {
        $message=Message::find($request->id);
        if ($message->user_id !=Auth::id()) 
        abort(404);
        
        $message->content=$request->message;
        $message->save();

        return redirect(route('dashboard'));
    
    }
}