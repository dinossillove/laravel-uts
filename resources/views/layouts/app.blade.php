<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Product Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <header class="bg-white border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-5 py-4
                    flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('dashboard') }}"
               class="font-bold text-xl text-blue-600">
                Product Manager
            </a>

            <nav class="flex flex-wrap items-center gap-5 text-sm">

                <a href="{{ route('dashboard') }}"
                   class="hover:text-blue-600">
                    Dashboard
                </a>

                <a href="{{ route('products.index') }}"
                   class="hover:text-blue-600">
                    Produk
                </a>

                @auth
                    <a href="{{ route('customers.index') }}"
                       class="hover:text-blue-600">
                        Customer
                    </a>

                    <a href="{{ route('suppliers.index') }}"
                       class="hover:text-blue-600">
                        Supplier
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="hover:text-blue-600">
                        Kategori
                    </a>
                @endauth

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="text-red-600 cursor-pointer">
                        Logout
                    </button>
                </form>

            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto p-5 md:p-8">
        @yield('content')
    </main>

</body>
</html>