@extends('layouts.app')

@section('content')
    <div class="mb-4">
        {{-- @dd($latestReview) --}}
        <h1 class="mb-2 text-2xl">{{ $book->title }}</h1>
        <div class="mb-4">
            <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">
                Add a review!</a>
        </div>
        <div class="book-info">
            <div class="book-author mb-4 text-lg font-semibold">by {{ $book->author }}</div>
            <div class="book-rating flex items-center">
                <div class="mr-2 text-sm font-medium text-slate-700">
                    <x-start-rating :rating="$book->rating_avg" />
                    {{ number_format($book->rating_avg, 1) }}
                </div>
                <span class="book-review-count text-sm text-gray-500">
                    {{ $book->rating_count }} {{ Str::plural('review', $book->rating_count) }}
                </span>
            </div>
        </div>
    </div>

    <div>
        <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
        <ul>
            @forelse ($latestReview as $review)
                <li class="book-item mb-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <div class="font-semibold">

                                <x-start-rating :rating="$review->rating" />

                                {{ $review->rating }}
                            </div>
                            <div class="book-review-count">
                                {{ $review->created_at->format('M j, Y') }}</div>
                        </div>
                        <p class="text-gray-700">{{ $review->review }}</p>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-book-item">
                        <p class="empty-text text-lg font-semibold">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
