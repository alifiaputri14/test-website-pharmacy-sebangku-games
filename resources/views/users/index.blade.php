@extends('layouts.app')

@section('content')
    <div class="w-full mb-3">
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                List Users
            </h2>
            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                product
            </span>
        </div>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
            users data is updated periodically
        </p>
    </div>
    @if (count($users) > 0)
        <ul role="list" class="divide-y divide-gray-100 border-gray-300 border-[1px] rounded-md shadow-sm px-5 py-3">
            @foreach ($users as $user)
                <li class="flex justify-between gap-x-6 py-2.5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <a href="/users/{{$user->id}}">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                            </a>
                            
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->phone }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">{{ $user->user_type }}</p>
                        @if ($user->approved == 1)
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                </div>
                                <p class="text-xs leading-5 text-gray-500">Active</p>
                            </div>
                        @else
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <div class="flex-none rounded-full bg-red-500/20 p-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                </div>
                                <p class="text-xs leading-5 text-gray-500">Inactive</p>
                            </div>
                        @endif

                    </div>
                </li>
            @endforeach


        </ul>
    @else
        <p>Tidak ada pengguna yang terdaftar.</p>
    @endif


@endsection
