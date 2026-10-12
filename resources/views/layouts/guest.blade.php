<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Product Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600">
                Product Manager
            </h1>

            <p class="text-slate-500 mt-2">
                Aplikasi manajemen produk
            </p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-sm">
            @yield('content')
        </div>
    </div>

</body>
</html>