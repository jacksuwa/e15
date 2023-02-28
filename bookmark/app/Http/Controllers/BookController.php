<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        # TODO: Query DB for all books
        # Return a view showing all books
        return 'Showing all the books';
    }

    public function show($title)
    {
        # TODO: Query the database for the book where title = $title
        # Load a view to display the book data that we got from DB
        return "This is the details for the book: " . $title;
    }
    public function filter($category, $subcategory)
    {
        return $category . ',' . $subcategory;
    }
}