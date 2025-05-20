<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite(['public/css/style.css', 'public/js/script.js'])

</head>

<body class="bg-biru-primary flex h-screen items-center justify-center">
    <section class="flex items-center justify-between space-x-4 rounded-lg bg-white p-4">
        <div class="flex w-1/2 flex-col items-center justify-center space-y-8">
            <h1 class="text-biru-tertiary text-5xl font-bold">
                Sign Up
            </h1>
            <div class="flex w-full flex-col items-center space-y-2">
                <div class="flex w-full flex-col items-center justify-center space-y-4">
                    <input class="w-full rounded-xl px-3 py-2" type="text" placeholder="Email" required>
                    <input class="w-full rounded-xl px-3 py-2" type="text" placeholder="Nama" required>
                    <input class="w-full rounded-xl px-3 py-2" type="text" placeholder="Unit Posyandu" required>
                    <input class="w-full rounded-xl px-3 py-2" type="text" placeholder="Password" required>
                    <input class="w-full rounded-xl px-3 py-2" type="text" placeholder="Konfirmasi Password"
                        required>
                </div>
            </div>
            <button
                class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">Sign
                Up
            </button>
            <p class="text-biru-tertiary font-medium">
                Sudah punya akun?
                <a href="#" class="text-biru-tertiary font-extrabold hover:underline">
                    Log In
                </a>
            </p>
        </div>
        <div class="flex w-1/2 items-center justify-center">
            <img src="{{ asset('asset/signup-img.png') }}" alt="Login Image">
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
