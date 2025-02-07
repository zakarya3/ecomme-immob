<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Decorator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $decorators = Decorator::paginate(10);
        $commands = Commande::with('panels.decorators')->paginate(10);
        return view("dashboard", compact("decorators", "commands"));
    }

    public function create()
    {
        return view('create-decorator');
    }

    public function store(Request $request)
    {
        Decorator::create([
            "name" => $request->name,
            "category" => $request->category,
            "description"=> $request->description,
            "image" => $request->image,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route("dashboard")->with("success","");
    }

    public function show($id)
    {
        $decorator = Decorator::findOrFail($id);
        return view("", compact(""));
    }

    public function edit($id)
    {
        $decorator = Decorator::findOrFail($id);
        return view("edit-decorator", compact("decorator"));
    }

    public function update(Request $request, $id)
    {
        Decorator::findOrFail($id)->update([
            "name" => $request->name,
            "category" => $request->category,
            "description"=> $request->description,
            "image" => $request->image,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route("dashboard")->with("success","");
    }

    public function destroy($id)
    {
        Decorator::findOrFail($id)->delete();
        return redirect()->route("dashboard")->with("success","");
    }

    public function updateCommandeStatus(Request $request, $id)
    {
        Commande::findOrFail($id)->update([
            "status" => $request->status,
        ]);
        return redirect()->route("dashboard")->with("success","");
    }
}
