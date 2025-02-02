<?php

namespace App\Http\Controllers;

use App\Models\Decorator;
use Illuminate\Http\Request;

class DecoratorController extends Controller
{
    public function index()
    {
        $decorators = Decorator::paginate(10);
        return view("index", compact("decorators"));
    }

    public function show($id)
    {
        $decorator = Decorator::find($id);
        $decorators = Decorator::paginate(10);
        return view('detail', compact('decorator', 'decorators'));
    }

    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $decorators = Decorator::where('name', 'LIKE', "%{$name}%")->get();
        return view('index', compact('decorators'));
    }

    public function searchByCategory(Request $request)
    {
        $category = $request->input('category');
        $decorators = Decorator::where('category', $category)->get();
        return view('index', compact('decorators'));
    }
        
}
