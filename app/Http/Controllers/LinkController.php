<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{

    public function index(){
        $links = Link::orderBy('created_at', 'desc')->get();
        // dd($links);
        return view('link-manager', compact('links'));
    }
    public function redirectTo($param)
    {
        $exceptions=['login', 'register', 'home'];
        if(in_array($param, $exceptions)) {
            return redirect(route($param));
        }else{

            if($link = Link::where('name', $param)->first()) {
                $link->increment('visits');
                return redirect($link->url);
            }
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Link::create([
            'name' => $request->name,
            'user_id'  => auth()->user()->id,
        ])->save();
        return redirect(route('home'));
    }

    public function delete($id)
    {
        $link = Link::where('id', $id)->first();
        $link->delete();
        return redirect(route('home'));
    }

    public function showEditModal($id)
    {
        $link = Link::findOrFail($id);
        return view('link-edit', compact('link'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        $link = Link::findOrFail($id);
        $link->update([
            'name' => $request->name,
            'url' => $request->url
        ]);
        return redirect(route('home'));
    }

}
