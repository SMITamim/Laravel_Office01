<?php

namespace App\Http\Controllers;

use App\Bank;
use App\client;
use App\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    function Client()
    {
        $clients = client::all();
        return view('welcome')->with('clients',$clients);


    }
    function ClientDetails(Request $request)
    {
        $details=Details::with('BankDetails')->where('Client_Id',$request->id)->get();
        //$details = DB::table('details')->where('Client_Id',$request->id)->get();
        $banks = Bank::all();
        //$request = Details::find($request);
        //$requestData = $request->requestData;


        return $details;

    }
}
