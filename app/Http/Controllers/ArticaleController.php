<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Articale;
use Auth;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $articales = Articale::all();
            return view('blog.home', compact('articales'));
            
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {            
            return view('blog.create');
        }else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (Auth::check()) {
            $this->validate($request, [
                'title'     => 'required|min:3',
                'post'      => 'required',
                'up1.*'     =>'required|mimes:jpg,jpeg|max:100'
            ]);

            $files = $request->file('up1');

            foreach ($files as $file) {
                $file->move('upload', $file->getClientOriginalName());
            }
        }else{
            return redirect('login');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {            

            $articales = Articale::findOrFail($id);
            return view('blog.show', compact('articales'));

        }else{
            return redirect('login');
        }      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {    

            $articale = Articale::findOrFail($id);
            return view('blog.edit', compact('articale'));

        }else{
            return redirect('login');
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {

            $this->validate($request, [
                'title'     => 'required|min:3',
                'post'      => 'required',
            ]);

            $articale = Articale::findOrFail($id);
            $articale->update($request->all());
            return redirect('/articale')->with('status', 'Database Updated');

        }else{
            return redirect('login');
        }           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
