<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'E-shop' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center p-4">
        <h1 class="text-xl font-bold">
            <a href="{{ route('shop.home.index') }}">Eshop Demo</a>
        </h1>
        <nav class="space-x-4">
            <a href="{{ route('shop.home.index') }}" class="text-blue-600 hover:underline">Home</a>
            <a href="{{ route('shop.cart.index') }}" class="text-blue-600 hover:underline">
                Cart
                @if(!$cart->isEmpty())
                    <span class="text-sm font-bold bg-blue-500 text-white rounded-full px-2 py-1">{{ $cart->getQuantity() }}</span>
                @endif
            </a>
        </nav>
    </div>
</header>

<main class="container mx-auto py-6 flex-grow">
    <x-shop.flash-messages />
    {{ $slot }}
</main>

<footer class="bg-white text-center text-sm text-gray-500 py-4">
    &copy; {{ date('Y') }} {{ config('app.name') }} - <a href="{{ route('admin.dashboard.index') }}">Admin</a>
</footer>

</body>
</html>
