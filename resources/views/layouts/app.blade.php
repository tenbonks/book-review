<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Reviews</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">

        h1, h2 {
            @apply text-white
        }

        body {
            @apply bg-slate-900
        }

        .btn {
            @apply bg-slate-900 rounded-md px-4 py-2 text-center font-medium text-white shadow-sm ring-1 ring-slate-600/10 hover:bg-slate-800 h-10;
        }

        .input {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-white leading-tight focus:outline-none rounded-md border-slate-500 bg-slate-700;
        }

        .filter-container {
            @apply mb-4 flex space-x-2 rounded-md bg-slate-800 p-2;
        }

        .filter-item {
            @apply flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium text-white;
        }

        .filter-item-active {
            @apply bg-slate-900 shadow-sm text-white flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium;
        }

        .book-item {
            @apply text-sm rounded-md bg-slate-800 p-4 leading-6 text-white shadow-md shadow-black/10 ring-1 ring-slate-600/10;
        }

        .book-title {
            @apply text-lg font-semibold text-white hover:text-gray-300;
        }

        .book-author {
            @apply block text-gray-400;
        }

        .book-rating {
            @apply text-sm font-medium text-white;
        }

        .book-review-count {
            @apply text-xs text-gray-500;
        }

        .empty-book-item {
            @apply text-sm rounded-md bg-slate-800 py-10 px-4 text-center leading-6 text-white shadow-md shadow-black/10 ring-1 ring-slate-600/10;
        }

        .empty-text {
            @apply font-medium text-gray-400;
        }

        .reset-link {
            @apply text-gray-400 underline;
        }


    </style>
    {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl">
@yield('content')
</body>

</html>
