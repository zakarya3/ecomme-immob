<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Decorator;
use App\Models\Panel;
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

    public function addToPanel(Request $request)
    {
        $id = $request->input('decorator_id');
        $quantity = $request->input('quantity');
        $decorator = Decorator::find($id);
        if ($decorator) {
            Panel::create(['decorator_id' => $decorator->id, 'quantity'=> $quantity]);
            return redirect()->back()->with('success', 'Decorator added to panel');
        }
    }

    public function panel()
    {
        $panels = Panel::where('status', 'pending')->with('decorators')->get();
        $total = 0;
        foreach ($panels as $panel) {
            $total += $panel->quantity * $panel->decorators->price;
        }
        return view('cart', compact('panels', 'total'));
    }

    public function deleteItem($id)
    {
        $panel = Panel::find($id);
        $panel->delete();
        return redirect()->back()->with('success', 'Item removed from panel');
    }

    public function checkout()
    {
        $panels = Panel::where('status', 'pending')->with('decorators')->get();
        $total = 0;
        foreach ($panels as $panel) {
            $total += $panel->quantity * $panel->decorators->price;
        }
        return view('checkout', compact('panels', 'total'));
    }

    public function storOrder(Request $request) {
        $panels = Panel::where('status', 'pending')->with('decorators')->get();
        
        foreach ($panels as $panel) {
            $total_price = $panel->quantity * $panel->decorators->price;
           Commande::create(['panel_id'=> $panel->id, 'client_name'=> $request->input('client_name'), 'client_email'=> $request->input('client_email'), 'client_phone'=> $request->input('client_phone'), 'total_price'=> $total_price]);
           $panel->update(['status'=> 'approved']);
        }
        return redirect('/')->with('success','');
    }
    
        
}
