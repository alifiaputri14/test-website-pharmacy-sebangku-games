<!-- resources/views/users/create.blade.php -->
<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }} - {{ session('message') }}
        </div>
    @endif
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-7 sm:mx-auto sm:w-full sm:max-w-sm">
            <form method="post" action="/users" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div class="">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                        <input type="text" name="name" id="name" required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
         
                    <div class="form-group">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone"  required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div class=" grid grid-cols-2 gap-3">
                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <input type="email" name="email" id="email"  required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="form-group">
                        <label for="user_type" class="block text-sm font-medium leading-6 text-gray-900">user_type</label>
                        <input type="text" name="user_type" id="user_type"  required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
     
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <input type="password" name="password" id="password"  required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                
                
                
                {{-- <div class="form-group">
                    <label for="approved">approved</label>
                    <input type="text" name="approved" id="approved" class="form-control" required>
                </div> --}}
     
                <button type="submit"  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">
                Have a Account?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign Up</a>
            </p>

        </div>
    </div>

</body>

</html>

