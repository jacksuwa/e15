<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = new Item;
        $items = $item::orderBy('id', 'asc')->get();
        return view('items/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0'
        ]);

        $name  = $request->input('name');
        $price  = $request->input('price');

        $item = new Item;
        $item->name = $name;
        $item->price = $price;
        $item->save();

        return redirect('/items/create')->with('message',  'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return redirect('/items')->with('message', 'Item is not found.');
        }

        $onList = $item->users()->where('user_id', $request->user()->id)->count() >= 1;

        return view('items/show', [
            'item' => $item,
            'onList' => $onList
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        #get the item from database
        $item = Item::find($id);
        #return view with item - check
        return view('items/edit', ['id' => $item->id, 'price' => $item->price, 'name' => $item->name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0'
        ]);


        $name  = $request->input('name');
        $price  = $request->input('price');

        $items = new Item();
        #find the item in the database
        $item = $items::find($id);
        $item->name = $name;
        $item->price = $price;
        $item->save();
        return redirect('/items/' . $id . '/edit')->with('message', 'The item ' . $item->name . ' was updated');
    }
    /**
     * Prompt user to confirm delete
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */
    public function delete($id)
    {
        $item = Item::find($id);
        return view('items/delete', compact('item'));
    }

    public function archive()
    {
        $item = new Item;
        $items = $item::onlyTrashed()->orderBy('id', 'asc')->get();
        return view('items/archive', compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item, Request $request)
    {
        # force delete soft deleted items
        if ($item->trashed()) {
            # detach the relationships between item and users
            $item->users()->detach();
            $item->forceDelete();
            return redirect('items/archive')->with(
                'message',
                'The item ' . $item->name . ' deleted permanently'
            );
        }

        # Soft delete item
        $item->delete();

        return redirect('/items')->with(
            'message',
            '“' . $item->name . '” was soft deleted.'
        );
    }
    public function restore(Item $item, Request $request)
    {
        #restore soft deleted items
        $item->restore();
        return redirect('/items/archive')->with(
            'message',
            'The item ' . $item->name . ' was restored'
        );
    }
}