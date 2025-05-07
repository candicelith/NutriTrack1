<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['public/css/style.css', 'public/js/script.js'])
</head>

<body>

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
        aria-label="Sidebar">
        <div class="bg-biru-primary h-full overflow-y-auto px-5 py-8">
            <div class="flex h-full flex-col justify-between space-y-8">
                <a href="#" class="mb-5 flex items-center justify-center">
                    <img src="{{ asset('asset/logo nutritrack.png') }}" class="me-3" alt="NutriTrack Logo" />
                    <span class="self-center whitespace-nowrap text-2xl font-black">NutriTrack</span>
                </a>
                <div class="flex h-full flex-col justify-between">
                    <div class="space-y-12">
                        <div class="flex flex-col items-center justify-center space-y-3">
                            <img src="{{ asset('asset/profile-picture.png') }}" width="192" height="192"
                                alt="Profile Picture" class="h-48">
                            <span class="text-xl font-bold">Sucipto</span>
                            <span class="text-base font-medium">Posyandu Moyudan</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <ul class="w-fit space-y-6 text-xl font-semibold">
                                <li>
                                    <a href="#"
                                        class="text-biru-tertiary hover:bg-biru-tertiary group flex items-center rounded-lg px-3 py-2 hover:text-white">
                                        <svg class="text-biru-tertiary h-9 w-9 transition duration-75 group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ms-6">Edit Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}"
                                        class="{{ request()->routeIs('home') ? 'text-white bg-biru-tertiary' : 'text-biru-tertiary bg-none' }}text-biru-tertiary hover:bg-biru-tertiary group flex items-center rounded-lg px-3 py-2 hover:text-white"
                                        @if (request()->routeIs('home')) aria-current="page" @endif>
                                        <svg class="text-biru-tertiary h-9 w-9 transition duration-75 group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ms-6">Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-biru-tertiary hover:bg-biru-tertiary group flex items-center rounded-lg px-3 py-2 hover:text-white">
                                        <svg class="text-biru-tertiary h-9 w-9 transition duration-75 group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ms-6">Data Anak</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-biru-tertiary hover:bg-biru-tertiary group flex items-center rounded-lg px-3 py-2 hover:text-white">
                                        <svg class="text-biru-tertiary h-9 w-9 transition duration-75 group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ms-6">Data Gizi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <ul class="w-fit">
                            <li>
                                <a href="#"
                                    class="text-biru-tertiary hover:bg-biru-tertiary group flex items-center rounded-lg px-3 py-2 hover:text-white">
                                    <svg class="text-biru-tertiary h-9 w-9 transition duration-75 group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ms-6 text-xl font-semibold">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
