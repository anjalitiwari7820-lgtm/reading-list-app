<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $totalBooks = Book::count();
        $toReadBooks = Book::where('status', 'to-read')->count();
        $readingBooks = Book::where('status', 'reading')->count();
        $finishedBooks = Book::where('status', 'finished')->count();
        $query = Book::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
    $search = $request->search;

    $query->where(function ($q) use ($search) {
        $q->where('title', 'like', "%{$search}%")
          ->orWhere('author', 'like', "%{$search}%");
    });
}

$books = $query->latest()->get();

        return view('books.index', compact(
    'books',
    'totalBooks',
    'toReadBooks',
    'readingBooks',
    'finishedBooks'
));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|in:to-read,reading,finished',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|in:to-read,reading,finished',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully!');
    }
}
