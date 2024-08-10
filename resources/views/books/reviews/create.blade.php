@php use App\Enums\Routes; @endphp
@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl text-white">Add review for {{ $book->title }}</h1>

    <form method="POST" action="{{ route(Routes::booksReviewsStore()->value, $book) }}">
        @csrf

        <div class="input-group">
            <x-forms.label-error for="review"></x-forms.label-error>
            <textarea name="review" rows="3" id="review" required class="input mb-4"></textarea>
        </div>

        <div class="input-group">
            <x-forms.label-error for="rating"></x-forms.label-error>
            <select name="rating" id="rating" class="input mb-4">
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn">Add review</button>

    </form>
@endsection
