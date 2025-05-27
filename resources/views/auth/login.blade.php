<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        @vite(['public/css/style.css', 'public/js/script.js', 'resources/js/app.js'])
    </head>

    <body class="bg-biru-primary flex h-screen items-center justify-center">
        <section class="flex items-center justify-between space-x-4 rounded-lg bg-white p-4" x-data="loginFormHandler()">
            {{-- Alert Error --}}
            <div class="flex w-1/2 flex-col items-center justify-center space-y-12">
                <h1 class="text-biru-tertiary text-5xl font-bold">
                    Log In
                </h1>
                <div class="flex w-full flex-col items-center space-y-2">
                    <div class="flex w-full flex-col items-center justify-center space-y-4">
                        <input name="email" class="w-full rounded-xl px-3 py-2" type="text" placeholder="Email"
                            required>
                        <p x-show="errors.email" class="text-red-500 text-sm w-full px-3" x-text="errors.email"></p>

                        <input name="password" class="w-full rounded-xl px-3 py-2" type="text" placeholder="Password"
                            required>
                        <p x-show="errors.password" class="text-red-500 text-sm w-full px-3" x-text="errors.password">
                        </p>
                    </div>
                    <a href="#"
                        class="text-biru-tertiary flex w-full justify-end font-medium hover:underline">Lupa
                        Password?</a>
                </div>
                <button @click="submit()"
                    class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">
                    <span x-show="!isLoading">Login</span>
                    <img x-show="isLoading" src="{{ asset('asset/loading-white.gif') }}" alt="Loading"
                        class="w-6 h-6 inline" />

                </button>
                <p x-show="errors.login" class="text-red-500 text-sm text-center w-full px-3" x-text="errors.login"></p>
                <p class="text-biru-tertiary font-medium">
                    Belum punya akun?
                    <a href="#" class="text-biru-tertiary font-extrabold hover:underline">
                        Sign Up
                    </a>

                </p>

            </div>
            <div class="flex w-1/2 items-center justify-center">
                <img src="{{ asset('asset/login-img.png') }}" alt="Login Image">
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script>
            function loginFormHandler() {
                return {
                    isLoading: false,
                    errors: {},
                    async submit() {
                        this.isLoading = true;
                        this.errors = [];
                        try {
                            const response = await axios.post('/login', {
                                email: document.querySelector('input[name="email"]').value,
                                password: document.querySelector('input[name="password"]').value,
                            });
                            console.log(response.data);
                            // Handle successful login, e.g., store user data, redirect, etc.

                            // save token to local storage or Alpine store
                            Alpine.store('user').setToken(response.data.access_token);

                            // Load user data and update Alpine store
                            await Alpine.store('user').loadUser();
                            console.log('Login successful:', response.data);
                            window.location.href = '/home';
                        } catch (error) {
                            console.error('Login failed:', error);
                            if (error.response && error.response.data.errors) {
                                this.errors = error.response.data.errors;
                                console.error('Login errors:', this.errors);
                            } else {
                                this.errors = {
                                    login: "Email atau password salah"
                                };
                                console.error('Login error:', this.errors.login);
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
