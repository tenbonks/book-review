<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Reviews</title>

    {{-- External scripts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

    <style>
        /* Form Inputs */
        input:focus, textarea:focus {
            outline: none;
        }

        .input-group {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 16px;
        }

        .input-group input, .input-group textarea {
            padding: 8px;
            border-radius: 8px;
            /*border: none;*/
        }

        .input-group label {
            color: #fff;
            padding: 4px 8px 4px 0;
        }


        .label-error {
            display: flex;
            justify-content: space-between;
            align-content: center;
            flex-direction: column;
            gap: 4px;
        }

        @media (min-width: 550px) {
            .label-error {
                flex-direction: row;
            }

        }

        .label-error .error-message {
            height: fit-content;
            font-size: 12px;
            color: #fff;
            background: #c22;
            padding: 4px 8px;
            border-radius: 8px;
            position: relative;
            width: fit-content;
        }
    </style>

    @yield('style')
    {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl">

@if(session()->has('success'))
    <div x-data="{ flash : true }"
         x-show="flash"
         class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-md text-green-700"
         role="alert">
        <strong class="font-bold">Success!</strong>
        <p>{{ session('success') }}</p>
        <span class="absolute top-0 right-0 bottom-0 px-4 py-3">
            <i @click="flash = false" class="bi bi-x-lg hover:cursor-pointer"></i>
        </span>
    </div>
@endif

@yield('content')
</body>

</html>
