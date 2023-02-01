<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Details;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class AdminHomePageController extends Controller
{
    function AdminHomePage()
    {
        $clients=\App\client::all();
        $banks=Bank::all();
        $details=Details::all();

        return view('adminHome')->with('clients',$clients)->with('banks',$banks)->with('details',$details);
    }
    function ClientDelete(Request $request)
    {
        $client =\App\client::where('id',$request->id)->delete();
        $details=Details::where('Client_Id',$request->id)->delete();
        return redirect()->route('AdminHomePage');
    }
    function ClientInfo(Request $request)
    {
        $client =\App\client::where('id',$request->id)->first();
        return $client;

    }
    function ClientUpdate(Request $request)
    {
        $client =\App\client::where('id',$request->id)->first();
        $client->Client_name=$request->clientName;
        $client->Client_phone=$request->clientPhone;
        $client->Client_add=$request->clientAdd;
        $client->save();
        return redirect()->route('AdminHomePage');


    }

    function CreateClient(Request $request)
    {

        $validate = $request->validate([
            "clientName"=>"required",
            'clientPhone'=>'required',
            'clientAdd'=>'required',

        ]
        );
        $client=new \App\client();
        $client->Client_name=$request->clientName;
        $client->Client_phone=$request->clientPhone;
        $client->Client_add=$request->clientAdd;
        $client->save();
        return redirect()->route('AdminHomePage');
    }
}
