@extends('master1.master')
@section('title', 'Trust UC - Finance Pembelian')
@section('br1', 'Pembelian')
@section('br2', 'Edit')
@push('style')
    <style>
        [contenteditable="true"] {
            border-color: ##F8FAFC; /* Warna default (abu-abu) */
            transition: border-color 0.2s ease-in-out;
        }

        [contenteditable="true"]:focus {
            border-color: #383535 !important; /* Warna border saat diedit */
            outline: none;
            border-bottom: 1px dashed #dbf300;
        }
    </style>
@endpush
@section('main')
<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
    <div class="mt-16 px-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="flex flex-col gap-y-3 lg:h-10 lg:flex-row lg:items-center">
                        <div class="flex items-center text-lg font-medium group-[.mode--light]:text-white">
                            Pembelian
                            <i data-tw-merge="" data-lucide="arrow-right" class="mx-1 h-3.5 w-3.5 stroke-[1.3] sm:mx-2 sm:h-5 sm:w-5"></i>
                            <div class="text-sm sm:text-lg">
                                {{ $pengeluaran->id }}
                            </div>
                        </div>
                        {{-- <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row lg:ml-auto">
                            <button data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                Prev Order</button>
                            <button data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="arrow-right" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                Next Order</button>
                            <button data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="printer" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                Print Order</button>
                        </div> --}}
                    </div>
                    <div class="mt-3.5 grid grid-cols-10 gap-5">
                        <div class="col-span-12 xl:col-span-3">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="flex flex-col gap-5">
                                    <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                        <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                            <div class="-mt-px">Pembelian Details</div>
                                        </div>
                                        <div class="mt-2.5 flex flex-col gap-5 p-5">
                                            <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="clipboard" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">Tanggal:</div>
                                                    {{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('M d, Y') }}

                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="clock" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">
                                                        Transaction Status:
                                                    </div>
                                                    <div class="mr-auto flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success sm:mr-0">
                                                        <span class="-mt-px">
                                                            Pending Payment
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="clipboard" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">Payment Method:</div>
                                                    Direct bank transfer
                                                </div>
                                            </div> --}}
                                            <div class="mt-1.5">
                                                <button data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed w-full border-primary/20 text-primary/80 hover:bg-slate-50"><i data-tw-merge="" data-lucide="pen-square" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                                    Change Status</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                        <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                            <div class="-mt-px">Vendor Details</div>
                                        </div>
                                        <div class="mt-2.5 flex flex-col gap-5 p-5">
                                            <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="clipboard" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">Nama:</div>
                                                    <a class="underline decoration-primary/30 decoration-dotted underline-offset-[3px]" href="#">
                                                        {{ $pengeluaran->vendor->nama }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="calendar" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">No Hp:</div>
                                                    {{ $pengeluaran->vendor->no_hp }}
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <i data-tw-merge="" data-lucide="clock" class="mr-2.5 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                                <div class="flex w-full flex-col flex-wrap gap-y-1 sm:flex-row sm:items-center">
                                                    <div class="w-54 sm:mr-auto">Alamat:</div>
                                                    <a class="flex items-center underline decoration-primary/30 decoration-dotted underline-offset-[3px]" href="#">
                                                        <i data-tw-merge="" data-lucide="map-pin" class="stroke-[1] mr-1.5 h-3.5 w-3.5"></i>
                                                        {{ $pengeluaran->vendor->alamat }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 flex flex-col gap-7 xl:col-span-7">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                        <div class="-mt-px">Pembebanan Details</div>
                                    </div>
                                    <div class="mt-2.5 flex flex-col gap-5 p-5">
                                        <div class="overflow-auto xl:overflow-visible">
                                            @php
                                            // Cek apakah ada jenis pmebebanan komisi spv dan komisi sales
                                                $isKomisiSpv = $pengeluaran->Finance_detail_pengeluaran->contains(function ($detail) {
                                                    // return $detail->jenisPembebanan->nama === 'Komisi supervisor';
                                                    return in_array($detail->jenisPembebanan->nama, ['Komisi supervisor', 'Komisi Sales']);
                                                });

                                                // Jika ada , gunakan header "SPV / Sales " jika tidak ada tetap "Keterangan"
                                                $headerKeterangan = $isKomisiSpv ? 'SPV / Sales' : 'Keterangan';
                                            @endphp
                                            <table data-tw-merge="" class="w-full text-left border-b border-dashed border-slate-200/80">
                                                <thead data-tw-merge="" class="">
                                                    <tr data-tw-merge="" class="">
                                                        <td data-tw-merge="" class="dark:border-darkmode-300 border-b-0 px-0 py-0 [&_div]:first:rounded-l-md [&_div]:first:border-l [&_div]:last:rounded-r-md [&_div]:last:border-r">
                                                            <div class="border-y border-slate-200/80 bg-slate-50 px-5 py-4 font-medium text-slate-500">
                                                                Jenis Pengeluaran
                                                            </div>
                                                        </td>
                                                        <td data-tw-merge="" class="dark:border-darkmode-300 border-b-0 px-0 py-0 [&_div]:first:rounded-l-md [&_div]:first:border-l [&_div]:last:rounded-r-md [&_div]:last:border-r">
                                                            <div class="border-y border-slate-200/80 bg-slate-50 px-5 py-4 font-medium text-slate-500">
                                                                {{-- Keterangan --}}
                                                                {{ $headerKeterangan }}
                                                            </div>
                                                        </td>
                                                        <td data-tw-merge="" class="dark:border-darkmode-300 border-b-0 px-0 py-0 [&_div]:first:rounded-l-md [&_div]:first:border-l [&_div]:last:rounded-r-md [&_div]:last:border-r">
                                                            <div class="border-y border-slate-200/80 bg-slate-50 px-5 py-4 text-right font-medium text-slate-500">
                                                                Qty
                                                            </div>
                                                        </td>
                                                        <td data-tw-merge="" class="dark:border-darkmode-300 border-b-0 px-0 py-0 [&_div]:first:rounded-l-md [&_div]:first:border-l [&_div]:last:rounded-r-md [&_div]:last:border-r">
                                                            <div class="border-y border-slate-200/80 bg-slate-50 px-5 py-4 text-right font-medium text-slate-500">
                                                                Harga
                                                            </div>
                                                        </td>
                                                        <td data-tw-merge="" class="dark:border-darkmode-300 border-b-0 px-0 py-0 [&_div]:first:rounded-l-md [&_div]:first:border-l [&_div]:last:rounded-r-md [&_div]:last:border-r">
                                                            <div class="border-y border-slate-200/80 bg-slate-50 px-5 py-4 text-right font-medium text-slate-500">
                                                                Total
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengeluaran->Finance_detail_pengeluaran as $detail )
                                                        <tr id="row-{{ $detail->id }}" data-tw-merge="" class="[&_td]:first:pt-5 [&_td]:last:border-b-0 [&_td]:last:pb-5">
                                                            <!-- Jenis Pembebanan -->
                                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600 border-gray-600 focus-within:border-[#F8FAFC]" contenteditable="false" >
                                                                <div class="flex items-center">
                                                                    <div class="">
                                                                        <a class="whitespace-nowrap font-medium" href="#">
                                                                        {{ $detail->jenisPembebanan->nama ?? '-'}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                             {{-- <!-- Keterangan atau SPV / Sales -->
                                                            <td class="px-5 border-b py-3.5">
                                                                <div class="flex items-center">
                                                                    @if ($detail->jenisPembebanan->nama === 'Komisi')
                                                                        <a class="whitespace-nowrap font-medium">
                                                                            {{ $detail->sales ?? '-' }} / {{ $detail->spv ?? '-' }}
                                                                        </a>
                                                                    @else
                                                                        <a class="whitespace-nowrap font-medium">
                                                                            {{ $detail->keterangan ?? '-' }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td> --}}
                                                            <!-- Data Keterangan / SPV / Sales -->
                                                            <td class="px-5 border-b py-3.5">
                                                                <div class="flex items-center">
                                                                    @if ($detail->jenisPembebanan->nama === 'Komisi supervisor')
                                                                        <a class="whitespace-nowrap font-medium">
                                                                            {{ $detail->spv ?? '-' }}
                                                                        </a>
                                                                    @elseif ($detail->jenisPembebanan->nama === 'Komisi Sales')
                                                                        <a class="whitespace-nowrap font-medium">
                                                                            {{ $detail->sales ?? '-' }}
                                                                        </a>
                                                                    @else
                                                                        <a class="whitespace-nowrap font-medium">
                                                                            {{ $detail->keterangan ?? '-' }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <!-- Keterangan -->
                                                            {{-- <td data-tw-merge="" class="editable px-5 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600 border-gray-600 focus-within:border-[#F8FAFC]" contenteditable="true" data-id="{{ $detail->id }}" data-field="keterangan">
                                                                <div class="flex items-center">
                                                                    <div class="">
                                                                        <a class="whitespace-nowrap font-medium" href="#">
                                                                            {{ $detail->keterangan ?? '-'}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td> --}}
                                                            <!-- Qty -->
                                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 text-right dark:bg-darkmode-600 border-gray-600 focus-within:border-[#F8FAFC]" contenteditable="true" data-id="{{ $detail->id }}" data-field="qty">
                                                                <div class="whitespace-nowrap">
                                                                    {{ $detail->qty ?? '-'}}
                                                                </div>
                                                            </td>
                                                            <!-- Harga -->
                                                            <td data-tw-merge="" class="editable px-5 border-b dark:border-darkmode-300 border-dashed py-4 text-right dark:bg-darkmode-600 border-gray-600 focus-within:border-[#F8FAFC]" contenteditable="true" data-id="{{ $detail->id }}" data-field="biaya">
                                                                <div class="whitespace-nowrap">
                                                                    {{ formatRupiah($detail->biaya) ?? '-' }}
                                                                </div>
                                                            </td>
                                                            <!-- Total -->
                                                            <td data-tw-merge="" class="editable px-5 border-b dark:border-darkmode-300 border-dashed py-4 text-right dark:bg-darkmode-600 border-gray-600 focus-within:border-[#F8FAFC]" contenteditable="false" data-id="{{ $detail->id }}" data-field="total">
                                                                <div class="whitespace-nowrap">
                                                                    {{ formatRupiah($detail->total) ?? '-' }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-5 ml-auto mt-3 flex flex-col gap-4 pr-5 text-right">
                                            <div class="flex items-center justify-left">
                                                <div class="text-slate-600">Subtotal:</div>
                                                <div class="w-10 font-medium text-slate-100 sm:w-48 subtotal-display">
                                                    {{ formatRupiah($pengeluaran->subtotal) }}
                                                </div>
                                            </div>

                                            <!-- Hidden Input for Finance ID -->
                                            <input type="hidden" id="finance-id" value="{{ $pengeluaran->id }}">
                                            {{-- <div class="flex items-center justify-end">
                                                <div class="text-slate-500">Total:</div>
                                                <div class="w-20 font-medium text-slate-600 sm:w-48">
                                                    $1.821
                                                </div>
                                            </div> --}}

                                            {{-- <div class="flex items-center justify-end">
                                                <div class="text-slate-500">Amount paid:</div>
                                                <div class="w-20 font-medium text-slate-600 sm:w-48 subtotal-display">
                                                    {{ formatRupiah($pengeluaran->subtotal) }}
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="box box--stacked flex flex-col p-5">
                                <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                        <div class="-mt-px">Tracking Info</div>
                                    </div>
                                    <div class="mt-4 flex flex-col gap-3.5 px-5 py-2">
                                        <div class="relative overflow-hidden before:absolute before:inset-y-0 before:left-0 before:ml-[14px] before:w-px before:bg-slate-200/60 before:content-[''] before:dark:bg-darkmode-400">
                                            <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                                <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                                    <a class="font-medium text-primary" href="#">
                                                        Transaction Completed.
                                                    </a>
                                                    <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                        Funds will be forwarded to the seller.
                                                    </div>
                                                    <div class="my-3.5 rounded-[0.6rem] border bg-slate-50/80 p-1 sm:w-1/2">
                                                        <div class="grid grid-cols-1 overflow-hidden rounded-[0.6rem] md:grid-cols-3">
                                                            <div class="image-fit h-20 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100">
                                                                <img data-action="zoom" src="dist/images/products/product10-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                            </div>
                                                            <div class="image-fit h-20 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100">
                                                                <img data-action="zoom" src="dist/images/products/product7-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                            </div>
                                                            <div class="image-fit h-20 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100">
                                                                <img data-action="zoom" src="dist/images/products/product7-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-1.5 text-xs text-slate-500">
                                                        25 Mar 2046, 10:28 AM
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                                <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                                    <a class="font-medium text-primary" href="#">
                                                        The order has arrived.
                                                    </a>
                                                    <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                        Received by Calvin.
                                                    </div>
                                                    <div class="mt-1.5 text-xs text-slate-500">
                                                        23 Mar 2023, 08:28 AM
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                                <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                                    <a class="font-medium text-primary" href="#">
                                                        The order has been sent.
                                                    </a>
                                                    <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                        The order is being shipped by courier.
                                                    </div>
                                                    <div class="mt-1.5 text-xs text-slate-500">
                                                        23 Mar 2023, 12:21 AM
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                                <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                                    <a class="font-medium text-primary" href="#">
                                                        Payment Verified.
                                                    </a>
                                                    <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                        Payment has been received.
                                                    </div>
                                                    <div class="mt-1.5 text-xs text-slate-500">
                                                        23 Mar 2023, 12:21 AM
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('child-scripts')

        <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

        {{-- <script>
            $(document).ready(function () {
                $(document).on("blur", ".editable", function () {
                    let id = $(this).data("id");
                    let field = $(this).data("field");
                    let value = $(this).text().trim();

                    // console.log("ID:", id);
                    // console.log("Field:", field);
                    // console.log("Value:", value); // Cek apakah value terkirim

                    // Hilangkan titik (.) sebagai pemisah ribuan agar MySQL bisa menerima nilai
                    if (field === "biaya") {
                        value = value.replace(/\./g, ""); // Hapus semua titik dari angka
                    }

                    $.ajax({
                        url: "/finance/update/" + id,
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            field: field,
                            value: value,
                        },
                        success: function (response) {
                            console.log("Data updated:", response);
                            // Cek apakah respons mengandung data baru
                            // if (response.success) {
                            //     $("#row-" + id + " td[data-field='" + field + "']").text(value); // Perbarui teks di tabel
                            // } else {
                            //     alert("Gagal memperbarui data.");
                            // }
                            if (response.success) {
                                if(field === 'biaya') {
                                    let formattedValue = formatRupiah(value);
                                    $("#row-" + id + " td[data-field='" + field + "']").text(formattedValue);
                                } else {
                                    $("#row-" + id + " td[data-field='" + field + "']").text(value);
                                }
                            }
                        },
                        error: function (xhr) {
                            alert("Gagal menyimpan perubahan: " + xhr.responseText);
                        },
                    });
                });
            });

        </script> --}}

        <script>
                $(document).ready(function () {
                    $(document).on("blur", ".editable", function () {
                        let id = $(this).data("id");
                        let field = $(this).data("field");
                        let value = $(this).text().trim();

                        if (field === "biaya") {
                            value = value.replace(/\./g, ""); // Hapus titik ribuan
                        }

                        let row = $(this).closest("tr");
                        let qty = parseInt(row.find("td[data-field='qty']").text().trim()) || 0;
                        let biaya = parseInt(row.find("td[data-field='biaya']").text().replace(/[^\d]/g, "")) || 0;
                        let total = qty * biaya;

                        $.ajax({
                            url: "/finance/update/" + id,
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                field: field,
                                value: value,
                                total: total,
                            },
                            success: function (response) {
                                console.log("Data updated:", response);

                                if (response.success) {
                                    if (field === "biaya") {
                                        let formattedValue = formatRupiah(value);
                                        $("#row-" + id + " td[data-field='" + field + "']").text(formattedValue);
                                    }

                                    row.find("td[data-field='total']").text(formatRupiah(total));

                                    // Update subtotal otomatis setelah perubahan
                                    updateSubtotal();
                                }
                            },
                            error: function (xhr) {
                                alert("Gagal menyimpan perubahan: " + xhr.responseText);
                            },
                        });
                });

                $(document).on("input", "td[data-field='qty'] , td[data-field='biaya']" , function() {
                    let row =$(this).closest("tr");
                    let qty = parseInt(row.find("td[data-field='qty']").text().trim()) || 0;
                    let biaya = parseInt(row.find("td[data-field='biaya']").text().replace(/[^\d]/g, "")) || 0;

                    // hitung total
                    let total = qty * biaya;

                    // format total ke rupiah
                    let formattedTotal = formatRupiah(total);
                    // tampilkan di kolom total
                    row.find("td[data-field='total']").text(formattedTotal);

                })

                // Fungsi untuk menghitung subtotal berdasarkan total semua biaya
                function updateSubtotal() {
                    let financeId = $("#finance-id").val(); // Ambil ID dari hidden input
                    console.log("Finance ID:", financeId); // Debugging

                    let subtotal = 0;

                    $(".editable[data-field='biaya']").each(function () {
                        let biaya = parseInt($(this).text().replace(/[^\d]/g, "")) || 0;
                        let qty = parseInt($(this).closest("tr").find("td[data-field='qty']").text().trim()) || 1;
                        subtotal += biaya * qty;
                    });

                    // Update tampilan subtotal
                    $(".subtotal-display").text(formatRupiah(subtotal));

                    // Kirim subtotal ke database (finance_pengeluaran)
                    $.ajax({
                        url: "/finance/updatesubtotal/" + financeId,
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            subtotal: subtotal,
                        },
                        success: function (response) {
                            console.log("Subtotal updated in finance_pengeluaran:", response);
                        },
                        error: function (xhr) {
                            alert("Gagal memperbarui subtotal: " + xhr.responseText);
                        },
                    });
                }
            });

        </script>

        <!-- -->
        <script>
            document.getElementById("tambah").addEventListener("click", function (e) {
                e.preventDefault();

                let Nopol = document.getElementById("selectNopolcs").value;
                let biaya = document.querySelector("input[name='biaya']").value;
                let keterangan = document.querySelector("input[name='keterangan']").value;

                // Pastikan elemen select ada
                let jenisSelect = document.getElementById("selectJenis");
                let vendorSelect = document.getElementById("selectVendor");
                let selectSpv = document.getElementById("spv");
                let selectSales = document.getElementById("sales");

                if (!jenisSelect ) {
                    console.error("Element selectJenis atau selectVendor tidak ditemukan!");
                    return;
                }

                let jenisId = jenisSelect.value; // Ambil ID
                let jenisNama = jenisSelect.options[jenisSelect.selectedIndex].text; // Ambil Nama

                let vendorId = vendorSelect.value; // Ambil ID
                let vendorNama = vendorSelect.options[vendorSelect.selectedIndex].text; // Ambil Nama

                // if (biaya === "" || jenisId === "" ) {
                //     alert("Harap isi semua field yang diperlukan.");
                //     return;
                // }

                let table = document.getElementById("dataTable").querySelector("tbody");

                let newRow = table.insertRow();
                newRow.innerHTML = `
                    <td class="py-2 px-4 border">${vendorNama}</td> <!-- Tampilkan Nama -->
                    <td class="py-2 px-4 border">${jenisNama}</td> <!-- Tampilkan Nama -->
                    <td class="py-2 px-4 border">${keterangan}</td>
                    <td class="py-2 px-4 border biaya-value">${biaya}</td>
                    <td class="py-2 px-4 border">
                        <button class="bg-red-500 text-red px-2 py-1 rounded remove-row">Hapus</button>
                    </td>
                    <input type="hidden" name="jenis_id[]" value="${jenisId}"> <!-- Simpan ID -->
                    <input type="hidden" name="biaya[]" value="${biaya}">
                    <input type="hidden" name="keterangan[]" value="${keterangan}">

                `;
                updateSubtotal();
                resetForm();
            });

            // 🔥 Fungsi untuk reset form setelah tambah data
            function resetForm() {
                // Reset input hanya jika elemen ditemukan
                let biayaInput = document.querySelector("input[name='biaya']");
                if (biayaInput) biayaInput.value = "";

                let keteranganInput = document.querySelector("input[name='keterangan']");
                if (keteranganInput) keteranganInput.value = "";

                // Cek apakah elemen ada sebelum mengakses .tomselect
                let selectJenis = document.getElementById("selectJenis");
                if (selectJenis && selectJenis.tomselect) {
                    selectJenis.tomselect.clear();
                }

                let selectSales = document.getElementById("selectSales");
                if (selectSales && selectSales.tomselect) {
                    selectSales.tomselect.clear();
                }

                let selectSPV = document.getElementById("selectSPV");
                if (selectSPV && selectSPV.tomselect) {
                    selectSPV.tomselect.clear();
                }
            }

            // 🔥 Event listener untuk menghapus baris
            document.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });

            function updateSubtotal() {
                let total = 0;
                document.querySelectorAll(".biaya-value").forEach(function (cell) {
                    total += parseFloat(cell.textContent.replace(/\./g, "")) || 0;
                });

                // Tampilkan subtotal di halaman
                document.getElementById("subtotal").textContent = total.toLocaleString("id-ID");

                // Simpan subtotal ke input hidden agar bisa dikirim ke backend
                document.getElementById("subtotal_input").value = total;
            }

            document.getElementById("formPengeluaran").addEventListener("submit", function (e) {
                let data = [];
                let subtotal = 0;

                document.querySelectorAll("#dataTable tbody tr").forEach(function (row) {
                    // let VendorId = row.querySelector("input[name='vendor_id[]']").value;
                    let jenisId = row.querySelector("input[name='jenis_id[]']").value;
                    let keteranganInput = row.querySelector("input[name='keterangan[]']");
                    let keterangan = keteranganInput ? keteranganInput.value.trim() : "";

                    let biaya = parseFloat(row.querySelector("input[name='biaya[]']").value) || 0;

                    // console.log("Biaya:", biaya); // Debugging
                    subtotal += biaya;

                    data.push({
                        jenis_id: jenisId,
                        keterangan: keterangan,
                        sales: sales,
                        spv: spv,
                        tahun_pajak: tahunPajak,
                        biaya: biaya,
                    });
                });

                document.getElementById("detailTransaksi").value = JSON.stringify(data);
                document.getElementById("subtotalInput").value = subtotal;
            });

        </script>

        <script>
            $(document).on('focus', '.rupiah', function() {
                $(this).mask("#.##0", {
                    reverse: true
                });
            });
        </script>

        <!-- Show Hide Vendor -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const jenisSelect = document.getElementById("selectJenis");
                const spvContainer = document.getElementById("spvContainer");
                const salesContainer = document.getElementById("salesContainer");
                const TahunPajak = document.getElementById("TahunPajak");

                // Fungsi untuk menampilkan/menyembunyikan form
                function toggleForm() {
                    const selectedOption = jenisSelect.options[jenisSelect.selectedIndex];
                    const jenisNama = selectedOption.dataset.nama; // Ambil nama jenis dari atribut data-nama

                    if (jenisNama === "komisi") {
                        spvContainer.style.display = "flex"; // Tampilkan SPV
                        salesContainer.style.display = "flex"; // Tampilkan Sales
                        TahunPajak.style.display = "none"; // Tampilkan Sales
                    } else if (jenisNama === "pajak") {
                        TahunPajak.style.display = "flex";
                        spvContainer.style.display = "none";
                        salesContainer.style.display = "none";
                    } else {
                        spvContainer.style.display = "none"; // Sembunyikan SPV
                        salesContainer.style.display = "none";
                        TahunPajak.style.display = "none"; // Tampilkan Tahun Pajak
                    }
                }

                // Jalankan saat halaman dimuat (untuk kondisi edit)
                toggleForm();

                // Jalankan saat pengguna mengubah pilihan jenis_id
                jenisSelect.addEventListener("change", toggleForm);
            });
        </script>
        <!-- End Show Hide Vendor -->

    @endpush

@endsection
