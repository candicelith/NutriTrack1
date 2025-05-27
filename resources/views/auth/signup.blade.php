<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up</title>
        @vite(['public/css/style.css', 'public/js/script.js', 'resources/js/app.js'])

    </head>

    <body class="bg-biru-primary flex h-screen items-center justify-center">
        <section class="flex items-center justify-between space-x-4 rounded-lg bg-white p-4" x-data="registerFormHandler()">
            <form id="form" @submit.prevent="submit()"
                class="flex w-1/2 flex-col items-center justify-center space-y-8">
                <h1 class="text-biru-tertiary text-5xl font-bold">
                    Sign Up
                </h1>

                {{-- Alert Error --}}
                <div id="alert" class="hidden p-4 rounded-lg bg-red-50 text-red-800">An error occurred. Please try
                    again.</div>

                <div class="flex w-full flex-col items-center space-y-2">
                    <div class="flex w-full flex-col items-center justify-center space-y-4">

                        <input name="email" class="w-full rounded-xl px-3 py-2" type="text" placeholder="Email"
                            required>
                        {{-- message error --}}
                        <p x-show="errors.email" class="text-red-500 text-sm w-full px-3" x-text="errors.email"></p>

                        <input name="name" class="w-full rounded-xl px-3 py-2" type="text" placeholder="Nama"
                            required>
                        {{-- message error --}}
                        <p x-show="errors.name" class="text-red-500 text-sm w-full px-3" x-text="errors.name"></p>

                        <input name="unit_id" class="w-full rounded-xl px-3 py-2" type="text"
                            placeholder="Unit Posyandu" required>
                        {{-- message error --}}
                        <p x-show="errors.unit_id" class="text-red-500 text-sm w-full px-3" x-text="errors.unit_id"></p>

                        <input name="password" class="w-full rounded-xl px-3 py-2" type="password"
                            placeholder="Password" required>
                        {{-- message error --}}
                        <p x-show="errors.password" class="text-red-500 text-sm w-full px-3" x-text="errors.password">
                        </p>

                        <input name="password_confirmation" class="w-full rounded-xl px-3 py-2" type="password"
                            placeholder="Konfirmasi Password" required>
                    </div>
                </div>
                <button type="submit"
                    class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">
                    <span x-show="!isLoading">Sign Up</span>
                    <img x-show="isLoading" src="{{ asset('asset/loading-white.gif') }}" alt="Loading"
                        class="w-6 h-6 inline" />
                </button>
                <p class="text-biru-tertiary font-medium">
                    Sudah punya akun?
                    <a href="#" class="text-biru-tertiary font-extrabold hover:underline">
                        Log In
                    </a>
                </p>
            </form>
            <div class="flex w-1/2 items-center justify-center">
                <img src="{{ asset('asset/signup-img.png') }}" alt="Login Image">
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script>
            function registerFormHandler() {
                return {
                    isLoading: false,
                    errors: {},
                    async submit() {
                        this.isLoading = true;
                        const formData = new FormData(document.getElementById('form'));
                        const data = JSON.stringify(Object.fromEntries(formData.entries()));
                        try {
                            const response = await axios.post('/register/nutritrack/admin', data, {
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                            });

                            console.log("response" + response.status);
                            switch (response.status) {
                                case 200:
                                    responseLogin = await axios.post('/login', {
                                        email: formData.get('email'),
                                        password: formData.get('password')
                                    }, {
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                    });
                                    console.log("responseLogin" + responseLogin.status);
                                    switch (responseLogin.status) {
                                        case 200:
                                            // Redirect to the dashboard or home page
                                            Alpine.store('user').setToken(responseLogin.data.access_token);
                                            responseData = await axios.get('/user');
                                            switch (responseData.status) {
                                                case 200:
                                                    Alpine.store('user').setUser(responseData.data);
                                                    break;
                                                default:
                                                    document.getElementById('alert').classList.remove('hidden');
                                                    break;
                                            }

                                            window.location.href = '/home';
                                            break;
                                        default:
                                            document.getElementById('alert').classList.remove('hidden');
                                            break;
                                    }
                                    break;
                            }
                        } catch (error) {
                            if (error.response) {
                                switch (error.response.status) {
                                    case 422:
                                        // Update error messages
                                        this.errors = error.response.data.errors;
                                        break;
                                    default:
                                        document.getElementById('alert').classList.remove('hidden');
                                        break;
                                }
                            }
                        } finally {
                            this.isLoading = false;
                        }
                    }
                };
            }
        </script>
    </body>

</html>
