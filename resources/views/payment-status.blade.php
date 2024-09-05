<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles & js -->
        @vite('resources/css/app.css')

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-100" x-data="{ statusId: {{ $statusId }} }">
            <!-- Success Message -->
            <div class="bg-white p-6 md:mx-auto" x-show="statusId == 1">
                <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Done!</h3>
                    <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
                    <p>This is your order number <strong>{{ $orderId }}</strong></p>
                    <div class="py-10 text-center">
                        <a href="/dashboard" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Failure Message -->
            <div class="bg-white p-6 md:mx-auto" x-show="statusId == 2 || statusId == 3">
                <svg viewBox="0 0 24 24" class="text-red-600 w-16 h-16 mx-auto my-6">
                    <path fill="currentColor"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z">
                    </path>
                </svg>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Unsuccessful!</h3>
                    <p class="text-gray-600 my-2">Some error occurred, please wait a moment before trying again.</p>
                    <div class="py-10 text-center">
                        <a href="/dashboard" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @vite('resources/js/app.js')
    </body>
</html>
