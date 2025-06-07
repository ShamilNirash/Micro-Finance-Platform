@extends('layouts/mainLayout')

@section('content')


    <div class="h-full w-full flex lg:h-5/6 lg:w-4/6 lg:rounded-lg lg:shadow-lg lg:overflow-hidden lg:flex-row flex-col">

    <!-- Left side: Logo and Company Name -->
        <div class="hidden xl:block  h-full w-full flex-col items-center justify-center p-5 lg:w-1/2 bg-blue-600 lg:pt-10 px-10 ">
            <div class="flex mt-8">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo" class="h-12" />
            </div>
            <h1 class="text-white text-2xl font-bold mt-4 uppercase">Primeway Investment</h1>
        </div>

    <!-- Right side: Sign In Form -->
        <div class="h-full w-full flex flex-col items-center justify-between bg-white p-5 xl:w-1/2">
            <div class="w-full max-w-md h-4/5 flex flex-col justify-center">
                <div class="flex justify-center mb-4 lg:hidden">
                    <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo" class="h-12" />
                </div>
                <h2 class="text-center text-2xl font-semibold text-blue-700 xl:text-left xl:text-3xl xl:font-bold mt-4">Welcome back</h2>
                <p class="text-center text-md text-gray-600 mt-2 xl:text-left ">Sign in to continue</p>

                <!-- Error Message Container -->
                <p id="errorMessage" class="text-center text-sm text-red-500 mt-8 hidden "></p>

                <form class="mt-12" id="signinForm" method="POST" action="">
                    <div class="relative my-2 text-sm">
                        <div class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="h-5 w-5" ...>...</svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder=" Email" class="w-full px-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="relative my-2 text-sm">
                        <div class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="h-5 w-5" ...>...</svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder=" Password" class="w-full px-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <div class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer" id="togglePassword">
                            👁️
                        </div>
                        <a href="#" class="text-xs text-blue-600 absolute right-0 top-full mt-2 font-medium">Forgot Password?</a>
                    </div>
                    <div class="flex items-center space-x-2 pr-2 mt-8">
                        <input type="checkbox" id="remember" name="remember" class="form-checkbox border-gray-300 rounded" />
                        <label for="remember" class="text-sm text-gray-600">Remember Me</label>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 mt-4">Login</button>
                </form>
            </div>

            <p class="text-center text-xs text-gray-500 ">
                Don't have an account? <a href="#" class="text-blue-600 font-medium">Register</a>
            </p>

        </div>
    </div>

    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });

        // Mock frontend validation for email and password
        const form = document.getElementById('signinForm');
        const errorMessage = document.getElementById('errorMessage');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission for now (mock)

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simple mock validation
            if (!email.includes('@')) {
                errorMessage.textContent = 'Invalid Email!';
                errorMessage.classList.remove('hidden');
            } else if (password.length < 6) {
                errorMessage.textContent = 'Incorrect Password! (Must be at least 6 characters)';
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.textContent = '';
                errorMessage.classList.add('hidden');
                // Mock success: In a real app, you'd let the form submit to the backend here
                console.log('Form would submit to backend now.');
            }
        });
    </script>

@endsection
