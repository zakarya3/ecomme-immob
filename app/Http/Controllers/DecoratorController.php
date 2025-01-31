<?php

namespace App\Http\Controllers;

use App\Models\Decorator;
use Illuminate\Http\Request;

class DecoratorController extends Controller
{
    public function index()
    {
        $decorators = Decorator::all();
        return view("", compact(""));
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
        return redirect()->route("")->with("success","");
    }

    public function show($id)
    {
        $decorator = Decorator::findOrFail($id);
        return view("", compact(""));
    }

    public function edit($id)
    {
        $decorator = Decorator::findOrFail($id);
        return view("", compact(""));
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
        return redirect()->route("")->with("success","");
    }

    public function destroy($id)
    {
        Decorator::findOrFail($id)->delete();
        return redirect()->route("")->with("success","");
    }

    public function searchByName(Request $request){
        $name = $request->input('name');
        $decorators = Decorator::where('name', 'LIKE', "%{$name}%")->get();
        return view('decorators.index', compact('decorators'));
    }
        
}
