@extends('layouts.app')

@section('content')
    <div class="">
        <div class="mb-5 flex items-center">
            <div class="w-full">
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                        List Product
                    </h2>
                    <span
                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                        product
                    </span>
                </div>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                    product data for the 24 last day ago
                </p>
            </div>
            <div class="flex justify-end w-full">
                <a href="/produk/tambah"
                    class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';">Add
                    New Product</a>
            </div>
        </div>

        <div class="grid grid-cols-5 gap-3">
            @foreach ($product as $data)
                <div class="w-50 h-50  border-gray-300 border-solid border-[1px] rounded-md ">
                    <div class=" ">
                        <img src={{ $data->image_url }} alt="" class="h-48  rounded-t-md''''.]'\ w-full">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center">
                            <a href="#" class="flex items-center">
                                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $data->nama_obat }}</h5>

                            </a>
                            <div class="w-full flex justify-end items-center">
                                <div class="mr-2">
                                    <a href="/produk/edit/{{ $data->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </a>


                                </div>
                                <div class="flex  items-center">
                                    <form action="{{ route('produk.delete', $data->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete {{ $data->name }}?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="w-full flex justify-end">
                                <span
                                class="h-5 flex items-center ml-2 bg-blue-100 text-blue-800 text-xs font-semibold px-[5px] py-[1px] rounded dark:bg-blue-200 dark:text-blue-800 ">{{ $data->status }}</span>
                            </div> --}}

                        </div>


                        <div class="flex h-full">
                            <p class="mb-2 text-xs h-full text-gray-700 dark:text-gray-400 mr-[2px]">{{ $data->deskripsi }}
                            </p>

                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">Rp {{ $data->harga }}</span>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full flex justify-end mt-3">
            {{ $product->links() }}
        </div>

    </div>
    </div>
@endsection
