<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reading List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">

        <h1>My Reading List</h1>

        <div class="dashboard">
            <div class="dashboard-card">
                <h3>Total Books</h3>
                <p>{{ $totalBooks }}</p>
            </div>

            <div class="dashboard-card">
                <h3>To Read</h3>
                <p>{{ $toReadBooks }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Currently Reading</h3>
                <p>{{ $readingBooks }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Finished</h3>
                <p>{{ $finishedBooks }}</p>
            </div>
        </div>

        <a href="{{ route('books.create') }}">+ Add New Book</a>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <!-- Search and Status Filter -->
        <form action="{{ route('books.index') }}" method="GET" class="filter-form">

            <label for="status">Filter by Status:</label>

            <select name="status" id="status">
                <option value="">All Books</option>

                <option value="to-read" {{ request('status') == 'to-read' ? 'selected' : '' }}>
                    To Read
                </option>

                <option value="reading" {{ request('status') == 'reading' ? 'selected' : '' }}>
                    Reading
                </option>

                <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>
                    Finished
                </option>
            </select>

            <input
                type="text"
                name="search"
                placeholder="Search by book title or author..."
                value="{{ request('search') }}"
            >

            <button type="submit">Apply Filters</button>

            <a href="{{ route('books.index') }}">Clear Filters</a>

        </form>

        <h2>My Books</h2>

        @if ($books->isEmpty())

            <p>No books found. Try changing your search or filter!</p>

        @else

            @foreach ($books as $book)

                <div class="book-card">
                    <h3>{{ $book->title }}</h3>

                    <p>Author: {{ $book->author }}</p>

                    <p>Status: {{ $book->status }}</p>

                    <a href="{{ route('books.edit', $book) }}">Edit</a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this book?')">
                            Delete
                        </button>
                    </form>
                </div>

                <hr>

            @endforeach

        @endif

    </div>
</body>
</html>
