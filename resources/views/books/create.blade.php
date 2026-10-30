
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="page-title">Add a New Book</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="book-form" action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title"
               value="{{ old('title') }}" required>
        <br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author"
               value="{{ old('author') }}" required>
        <br><br>

        <label for="status">Reading Status:</label>
        <select id="status" name="status" required>
            <option value="to-read" {{ old('status', 'to-read') == 'to-read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ old('status') == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ old('status') == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>
        <br><br>

        <button type="submit">Save Book</button>
    </form>

    <p class="back-link"><a href="{{ route('books.index') }}">← Back to Reading List</a></p>
    </div>
</body>
</html>
