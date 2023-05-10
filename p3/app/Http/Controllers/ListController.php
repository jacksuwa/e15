<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ListController extends Controller
{

    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $item = Item::find($id);

        return view('list/add', ['item' => $item]);
    }
    /**
     * Save a newly created resource in storage.
     */

    public function save(Request $request, $id)
    {

        $user = $request->user();
        $item = Item::find($id);

        # Add item to user's list
        //  $request->user()->items()->save($item, ['comments' => $request->comments]);
        $user->items()->save($item, ['comments' => $request->comments]);

        return redirect('/list')->with(
            'message',
            'The item  ' . $item->id . ' : ' . $item->name . ' was added to your item list.'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $items = $request->user()->items;
        return view('list/show', ['items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $user = $request->user();

        $item = $user->items()->where('items.id', $item->id)->first();

        $item->pivot->comments = $request->comments;
        $item->pivot->save();

        return redirect('/list')->with(
            'message',
            'Your comments for ' . $item->name . ' was updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $item = Item::find($id);
        $user = $request->user();
        $item = $user->items()->where('items.id', $item->id)->first();

        $item->pivot->delete();


        return redirect($request->headers->get('referer'))->with('message', 'Item was removed from your list');
    }
}