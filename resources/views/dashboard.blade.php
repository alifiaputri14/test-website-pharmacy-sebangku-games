@extends('layouts.app')

@section('content')
<div class="flex items-center mb-4">
    <div class="h-5 bg-blue-600 w-1 rounded-xl mr-2"></div>
    <div class="font-medium text-lg text-gray-700">Dashboard</div>
</div>
    <div class="grid grid-cols-4 gap-5">
        <div class="bg-blue-200 h-[120px] rounded-[16px] p-5">
            <div>Jumlah Produk</div>
            <div class="font-bold text-[30px] mt-3">
                {{ $produk }}
            </div>
        </div>
        <div class="bg-purple-200 h-[120px] rounded-[16px] p-5">
            <div>Jumlah User</div>
            <div class="font-bold text-[30px] mt-3">
                {{ $user }}
            </div>
        </div>
        <div class="bg-blue-200 h-[120px] rounded-[16px] p-5">
            <div>Jumlah Produk Aktif</div>
            <div class="font-bold text-[30px] mt-3">
                {{ $produkAktif }}
            </div>
        </div>
        <div class="bg-purple-200 h-[120px] rounded-[16px] p-5">
            <div>Jumlah Produk Aktif</div>
            <div class="font-bold text-[30px] mt-3">
                {{ $userAktif }}
            </div>
        </div>
    </div>

    <div class="w-full mt-5">
        <div class="flex items-center w-full  justify-center">
            <div class="overflow-x-auto w-full border-gray-300 border-[1px] shadow-md">
                <table class="min-w-full bg-white shadow-md rounded-xl">
                    <thead>
                        <tr class="bg-blue-gray-100 text-gray-700">
                            <th class="py-3 px-4 text-left">Nama Product</th>
                            <th class="py-3 px-4 text-left">Kategori</th>
                            <th class="py-3 px-4 text-left">Kemasan</th>
                            <th class="py-3 px-4 text-left">Harga</th>
                            <th class="py-3 px-4 text-left">Stok</th>
                            <th class="py-3 px-4 text-left">Deskripsi</th>
                            <th class="py-3 px-4 text-left">Tanggal Kadaluarsa</th>
                            <th class="py-3 px-4 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-blue-gray-900">
                        @foreach ($produklist as $produklist)
                            <tr class="border-b border-blue-gray-200">
                                <td class="py-3 px-4">{{ $produklist->nama_obat }}</td>
                                <td class="py-3 px-4">{{ $produklist->kategori }}</td>
                                <td class="py-3 px-4">{{ $produklist->kemasan }}</td>
                                <td class="py-3 px-4">{{ $produklist->harga }}</td>
                                <td class="py-3 px-4">{{ $produklist->stok }}</td>
                                <td class="py-3 px-4">{{ $produklist->deskripsi }}</td>
                                <td class="py-3 px-4">{{ $produklist->tanggal_kadaluarsa }}</td>
                                <td class="py-3 px-4">
                                    <div>
                                        <div
                                            class="h-5 flex w-fit items-center ml-2 bg-blue-100 text-blue-800 text-xs font-semibold px-[5px] py-[1px] rounded dark:bg-blue-200 dark:text-blue-800 ">
                                            {{ $produklist->status }}</span>
                                        </div>

                                        {{-- <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
