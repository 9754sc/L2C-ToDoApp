<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Route;
use DB;




class TodoController extends Controller
{

    public function index()
    {
        $title = 'TODO LIST';
        $items = DB::table('items')->get();

        return view('main')
            ->with('title', $title)
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'text'=>'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors( $validator )
                ->withInput();
        }

        DB::table('items')
            ->insert( $request->except('_token') );

        return redirect()->back()
            ->with('message','New item added. More work. Yey!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit($id)
    {
        //
        $item = DB::table('items')->where('id', $id)->first();
        if (!empty($item)) {
            $title = 'EDIT';

            return view('edit')
                ->with('title', $title)
                ->with('item', $item);

        } else {
            abort(404);
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
        $validator = Validator::make( $request->all(), [
            'text'=>'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors( $validator )
                ->withInput();
        }

        DB::table('items')
            ->where('id', $id)
            ->update(['text' => $request->text]);

        return redirect()->back()
            ->with('message','Task updated.');
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
        DB::table('items')->where('id', $id)->delete();

        return redirect()->back()
            ->with('message','Removed.');
    }
}
