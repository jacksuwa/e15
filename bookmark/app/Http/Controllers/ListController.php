<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ListController extends Controller
{
    public function show(Request $request)
    {
        $books =  $request->user()->books->sortByDesc('pivot.created_at');

        return view('list/show', ['books' => $books]);
    }
    /**
     * GET /list/{slug}/add
     */

    public function add(Request $request, $slug)
    {
        $book = Book::findBySlug($slug);
        return view('list/add', ['book' => $book]);
    }

    public function save(Request $request, $slug)
    {
        #TODO possibly add validation

        $user = $request->user();
        $book = Book::findBySlug($slug);

        $user->books()->save($book, ['notes' => $request->notes]);

        return redirect('/list')->With(['flash-alert' => 'The book ' . $book->title . 'was added to your list']);
    }
}