@extends('layouts.app')

@section('content')
    <div class="w-full flex items-center mb-3 ">
        <a href="{{ route('users.index') }}" class="mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <div class="flex items-center mb-4">
            <div class="h-5 bg-blue-600 w-1 rounded-xl mr-2"></div>
            <div class="font-medium text-lg text-gray-700">Detail User</div>
        </div>
    </div>
    <div class="border-[1px] border-gray-300 shadow-sm  rounded-sm px-3 py-3">
        <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
            <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Nama</div>
            <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">{{ $user->name }}</div>
        </div>
        <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
            <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Nomor Telepon</div>
            <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">{{ $user->phone }}</div>
        </div>
        <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
            <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Email</div>
            <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">{{ $user->email }}</div>
        </div>
        <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
            <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Tipe User</div>
            <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">{{ $user->user_type }}
            </div>
        </div>
        <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
            <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Status User</div>
            <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">
                <p
                    class="h-5 flex items-center  bg-green-100 text-green-800 text-xs font-semibold px-3 py-3 rounded dark:bg-green-200 dark:text-green-800">
                    {{ $user->approved ? 'Approved' : 'Belum Approved' }}</p>
            </div>
        </div>
        @if (!$user->approved)
            <div class="flex w-full border-b-[1px] border-gray-300 py-2 mb-2">
                <div class="text-sm font-semibold leading-6 text-gray-900 flex justify-start w-6/12">Approval Akun</div>
                <div class="mt-1 truncate text-sm  leading-6 text-gray-500 flex justify-start w-6/12">

                    <form action="{{ route('users.approve', $user->id) }}" method="post">
                        @csrf
                        <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-3 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Approved Akun</button>
                    </form>

                </div>
            </div>
        @endif


    </div>
@endsection
