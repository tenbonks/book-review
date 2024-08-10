@php use App\Enums\Routes; @endphp
@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl text-white">Add review for {{ $book->title }}</h1>

    <form method="POST" action="{{ route(Routes::booksReviewsStore()->value, $book) }}">
        @csrf

        <x-forms.input-group for="review">
            <textarea name="review" rows="3" id="review" class="input mb-4">{{ old('review', '') }}</textarea>
        </x-forms.input-group>

        <x-forms.input-group for="rating">
            <select name="rating" id="rating" class="input mb-4">
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </x-forms.input-group>

        <button type="submit" class="btn">Add review</button>

    </form>
@endsection
