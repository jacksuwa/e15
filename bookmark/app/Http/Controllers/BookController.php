<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * GET /search
     * Search books based on title or author
     */
    public function search(Request $request)
    {
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required'
        ]);

        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request->input('searchTerms', '');

        $searchResults = [];
        foreach ($books as $slug => $book) {
            if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
                $searchResults[$slug] = $book;
            }
        }
        return redirect('/')->with([
            'searchResults' => $searchResults,

        ])->withInput();
    }


    public function index()
    {
        # Load book data using PHP’s file_get_contents
        # We specify the books.json file path using Laravel’s database_path helper
        $bookData = file_get_contents(database_path('books.json'));

        # Convert the string of JSON text loaded from books.json into an
        # array using PHP’s built-in json_decode function
        $books = json_decode($bookData, true);

        # Alphabetize the books by title using Laravel’s Arr::sort
        $books = Arr::sort($books, function ($value) {
            return $value['title'];
        });

        return view('books/index', ['books' => $books]);
    }

    public function show($slug)
    {
        $bookData = file_get_contents(database_path('books.json'));

        $books = json_decode($bookData, true);

        $book = Arr::first($books, function ($value, $key) use ($slug) {
            return $key == $slug;
        });

        return view('books/show', [
            'book' => $book,
        ]);
    }

    public function filter($category, $subcategory)
    {
        return $category . ',' . $subcategory;
    }
    /**
     * GET /books/create
     * Display the form to add a new book
     */
    public function create(Request $request)
    {
        return view('books/create');
    }

    /**
     * POST /books
     * Process the form for adding a new book
     */
    public function store(Request $request)
    {
        # Code will eventually go here to add the book to the database,
        # but for now we'll just dump the form data to the page for proof of concept
        dump($request->all());
    }
}