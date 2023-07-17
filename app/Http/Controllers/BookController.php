<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $books = Book::all();
        $bookTitle = $request->input('title');
        $filters = $request->input('filters');
        // if title is being set in the request, then filter by title otherwise get all books
        $books = Book::when($bookTitle, fn ($query, $bookTitle) => $query->title($bookTitle));
        $books = match ($filters) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest(),
        };
        /**
         * Disabled Cache For Now
         */
        // $cacheKey = 'books_' . $filters . '_' . $bookTitle;
        // $books = cache()->remember($cacheKey, 4800, fn () => $books->get());
        /**
         * Disabled Cache For Now
         */
        // return $books->get();
        $books = $books->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // $latestReview = $book->reviews()->latest()->get();
        $cacheKey = 'book_' . $book->id;
        // $latestReview = cache()->remember($cacheKey, 4800, fn () => $book->reviews()->latest()->get());
        $latestReview = cache()->remember($cacheKey, 4800, function () use ($book) {
            return $book->reviews()->latest()->get();
        });
        return view('books.show', compact('book', 'latestReview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
