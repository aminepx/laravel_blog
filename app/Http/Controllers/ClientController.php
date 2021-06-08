<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{


    public function index()
    {

        $clients=Client::all(); 
        return view('clients.clients', ['clients' => $clients]);
    }


    public function details($id)
    {
       $client=Client::find($id);
        return view('clients.details', ['client' => $client]);
    }


    public function create()
    {
        return view('clients.addNew');
    }

    public function store(Request $req)
    {


        $req->validate([
            "name"=>'required|min:6|max:8',
            "email"=>'required|email',
            "phone"=>'required|min:10|max:10',
        ]);

        $client=new Client();
        $client->name=$req->name;
        $client->email=$req->email;
        $client->phone=$req->phone;
        $client->save();
        session()->flash('message','client added successfully');
        return redirect('clients');
    }


    public function show($id)
    {
       
       $client=Client::find($id);

        return view('clients.update',['client'=>$client]);

    }

    public function update(Request $req , $id)
    {
         $client=Client::find($id);
         $client->name=$req->name;
         $client->email=$req->email;
         $client->phone=$req->phone;
         $client->save();
        session()->flash('message','client updated successfully');
         return redirect('clients');
    }


    public function deleteOneUser($id)
    {
        $client=Client::find($id);
        $client->delete();
        session()->flash('message','client deleted successfully');
        return redirect('clients');
    }
}
