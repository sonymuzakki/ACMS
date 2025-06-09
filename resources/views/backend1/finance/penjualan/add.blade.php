@extends('master1.master')
@section('title', 'ACMS - Finance Penjualan')
@section('br1', 'Penjualan')
@section('br2', 'Add')
@section('main')

<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
        <div class="mt-16 px-5">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col mt-4 gap-y-3 md:mt-0 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                Add Penjualan
                            </div>
                        </div>

                        {{-- <form action="{{ route('finance.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
                        <form id="formPengeluaran" action="{{ route('finance.penjualan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <!-- Cash Form -->
                            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-7 lg:gap-y-10">
                                <div class="relative flex flex-col col-span-12 gap-y-7 ">
                                    <div class="flex flex-col p-5 box box--stacked">
                                        <div class="rounded-[0.6rem] border border-slate-200/60 p-5 dark:border-darkmode-400">
                                            <div
                                                class="flex items-center border-b border-slate-200/60 pb-5 text-[0.94rem] font-medium dark:border-darkmode-400">
                                                <i data-tw-merge="" data-lucide="chevron-down"
                                                    class="w-5 h-5 mr-2 stroke-[1.3]"></i>
                                                Data Information
                                            </div>

                                            <div class="mt-5">
                                                <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Tanggal</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <input data-tw-merge="" type="date" id="tanggal"
                                                            placeholder="Tanggal" value="{{ old('tanggal') }}"
                                                            name="tanggal"
                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        @error('tanggal')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex-col pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Jenis Transaksi</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md" id="jenis" name="jenis_transaksi_id">
                                                            <option value="">Pilih Jenis Transaksi</option>
                                                            @foreach ($jenis as $s)
                                                                <option value="{{ $s->id }}" data-nama="{{ $s->nama }}">{{ $s->nama }}
                                                            @endforeach
                                                        </select>
                                                        @error('jenis')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <!-- Form Bank / E-Wallet -->
                                                    <div class="flex-col pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Bank / E-Wallet </div>
                                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                            <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md" id="pembayaran" name="pembayaran_id">
                                                                <option value="">Pilih Bank</option>
                                                                @foreach ($pembayaran as $s)
                                                                    <option value="{{ $s->id }}">{{ $s->nama }}
                                                                @endforeach
                                                            </select>
                                                            @error('pembayaran')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- End Form Bank / E-Wallet -->

                                                    <!-- Form Nominal -->
                                                    <div id="nominal" class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Nominal</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                            <input id="nominalInput" data-tw-merge="" type="text" placeholder="Nominal" name="nominal"
                                                                class="rupiah disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Nominal -->

                                                    <!-- Card Nominal Selector -->
                                                    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 gap-3 mt-5">
                                                        @foreach ([100000, 200000, 300000, 500000, 800000, 1000000] as $amount)
                                                            <div onclick="setNominal({{ $amount }})"
                                                                class="cursor-pointer rounded-lg bg-slate-100 dark:bg-darkmode-800 px-4 py-3 text-center font-medium text-slate-700 dark:text-slate-300 hover:bg-primary hover:text-white transition duration-150">
                                                                {{ number_format($amount, 0, ',', '.') }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- End Card Nominal Selector -->

                                                    <!-- Form Profit and Quantity -->
                                                    <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div id="profit" class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                <div class="text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="font-medium">Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                                <input id="profitInput" data-tw-merge="" type="text" placeholder="Profit" name="profit"
                                                                    class="rupiah disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        </div>
                                                        <div id="qtyCon" class="inline-block mb-2 sm:mb-0 sm:mr-4 sm:text-right xl:mr-5 xl:w-20">
                                                            <div class="text-left mr-2 ml-3 mt-2">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Quantity</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="qtyInp" class="flex-1 w-full mt-2 xl:mt-0">
                                                            <input data-tw-merge="" type="text" id="qty"
                                                                placeholder="qty" value="{{ old('qty', 1) }}" name="qty" min="1"
                                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                            @error('qty')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- End Form Profit and Quantity -->
                                                </div>

                                                <div id="elseContainer" style="display: none" class="mt-5">
                                                    <!-- Form Profit and Quantity -->
                                                    <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div id="profit" class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                <div class="text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="font-medium">Produk</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                            <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md" id="produk" name="produk_id">
                                                                    <option value="">Pilih Produk</option>
                                                                    @foreach ($produk as $s)
                                                                        <option value="{{ $s->id }}" data-nama="{{ $s->nama }}">{{ $s->nama }}
                                                                    @endforeach
                                                                </select>
                                                                @error('jenis')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                        <div id="harga_beliForm" class="inline-block mb-2 sm:mb-0 sm:mr-4 sm:text-right xl:mr-5 xl:w-38">
                                                            <div class="text-left mr-2 ml-3 mt-2">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Harga Beli</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="qtyInp" class="flex-1 w-full mt-2 xl:mt-0">
                                                            <input data-tw-merge="" type="text" id="harga_beli" readonly placeholder="Harga beli" name="harga_beli"
                                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" >
                                                            @error('qty')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- End Form Profit and Quantity -->
                                                    <!-- Form Metode Pembayaran -->
                                                    <div class="flex-col block pt-5 mt-3 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Metode Pembayaran</div>
                                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-3 xl:mt-0">
                                                            <div class="flex flex-col sm:flex-row">
                                                                <div data-tw-merge="" class="flex items-center mr-4">
                                                                    <input data-tw-merge="" type="radio" name="metode_pembayaran" id="tunai" value="Tunai" {{ old('metode_pembayaran') == 'Tunai' ? 'checked' : '' }}  class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" >
                                                                    <label data-tw-merge="" for="cash" class="cursor-pointer ml-2">Tunai</label>
                                                                </div>
                                                                <div data-tw-merge="" class="flex items-center mt-2 mr-4 sm:mt-0">
                                                                    <input data-tw-merge="" type="radio" name="metode_pembayaran" id="bank" value="Bank" {{ old('metode_pembayaran') == 'Bank' ? 'checked' : '' }} class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" >
                                                                    <label data-tw-merge="" for="condition-second" class="cursor-pointer ml-2">Bank / E-Wallet</label>
                                                                </div>
                                                            </div>
                                                            @error('metode_pembayaran')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- End Form Metode Pembayaran -->
                                                    <!-- Form Bank -->
                                                    <div id="bankForm" style="display: none" class="mt-5">
                                                        <div class="flex-col pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                <div class="text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="font-medium">Bank </div>
                                                                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                            Required
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-1 w-full mt-2 xl:mt-0">
                                                                <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md" id="bank_else" name="pembayaran_id_else">
                                                                    <option value="">Pilih Bank</option>
                                                                    @foreach ($pembayaran as $s)
                                                                        <option value="{{ $s->id }}">{{ $s->nama }}
                                                                    @endforeach
                                                                </select>
                                                                @error('pembayaran_id_else')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Form Bank -->
                                                    </div>

                                                    <!-- Form Harga Jual -->
                                                    <div  id="harga" style="display: none" class="mt-5">
                                                        <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                <div class="text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="font-medium">Harga</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-1 w-full mt-2 xl:mt-0">
                                                                <input id="hargaInput" data-tw-merge="" type="text" placeholder="Harga" value="{{ old('harga_jual') }}" name="harga_jual"
                                                                    class="rupiah disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- End Form Harga Jual -->
                                                <div id="ketCon" class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Keterangan</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <input data-tw-merge="" type="text" placeholder="Keterangan" value="{{ old('keterangan') }}" name="keterangan"
                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-end gap-3 mt-2 md:flex-row">
                                        <a id="tambah" data-tw-merge=""
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-full rounded-[0.5rem] py-2.5 md:w-56"><i
                                                data-tw-merge="" data-lucide="plus" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                            Add
                                        </a>
                                    </div>

                                    <!-- Tabel untuk menampilkan data yang sudah diinput -->
                                    <div class="overflow-x-auto mt-5 mb-4">
                                        <table id="dataTable" data-tw-merge class="w-full text-left">
                                            <thead data-tw-merge class="bg-dark text-white dark:bg-black/30">
                                                <tr data-tw-merge class="">
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Jenis Transaksi
                                                    </th>
                                                    <th data-tw-merge id="label"
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Bank / E-Wallet
                                                    </th>
                                                    <th data-tw-merge id="keterangan"
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Keterangan
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Nominal
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Profit
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Qty
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Total
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr class="bg-gray-100 dark:bg-black/30">
                                                    <td colspan="5" class="px-5 py-3 font-bold text-right">Subtotal:
                                                    </td>
                                                    <td class="px-5 py-3 font-bold" id="subtotal">0</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- End Tabel -->

                                    <!-- Input hidden untuk menyimpan array data -->
                                    {{-- <input type="hidden" name="biaya[]" value="${biaya}"> --}}
                                    <input type="hidden" id="subtotal_input" name="subtotal">

                                    <div class="flex flex-col justify-end gap-3 mt-2 md:flex-row">
                                        <button type="submit" data-tw-merge=""
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-full rounded-[0.5rem] py-2.5 md:w-56"><i
                                                data-tw-merge="" data-lucide="pen-line"
                                                class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                            Save
                                        </button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('child-scripts')
        <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

        <script>
            // Show Hide Form Tarik dan Else
            document.addEventListener('DOMContentLoaded', function () {
                const jenisSelect = document.getElementById('jenis');
                const tarikContainer = document.getElementById('tarikContainer');
                const elseContainer = document.getElementById('elseContainer');

                function toggleTarikForm() {
                    const selectedOption = jenisSelect.options[jenisSelect.selectedIndex];
                    const nama = selectedOption.getAttribute('data-nama');

                    if (nama === 'Tarik Tunai' || nama === 'Top Up') {
                        tarikContainer.style.display = 'block';
                        elseContainer.style.display = 'none';
                    } else if (nama === 'Accesories' || nama === 'Beras'){
                        tarikContainer.style.display = 'none';
                        elseContainer.style.display = 'block';
                    } else {
                        tarikContainer.style.display = 'none';
                        elseContainer.style.display = 'none';
                    }
                }

                // Panggil saat halaman dimuat
                toggleTarikForm();

                // Jalankan saat select berubah
                jenisSelect.addEventListener('change', toggleTarikForm);
            });

            // Menangani perubahan pada select produk
            const produkSelect = new TomSelect('#produk', {
                create: false,
                placeholder: 'Pilih Produk',
            });
            // Menampilkan produk berdasarkan jenis transaksi yang dipilih
            document.getElementById('jenis').addEventListener('change', function () {
                const jenisId = this.value;

                produkSelect.clearOptions();
                produkSelect.addOption({ value: '', text: 'Pilih Produk' });
                produkSelect.refreshOptions();

                if (jenisId) {
                    fetch(`/produk-by-jenis/${jenisId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(item => {
                                produkSelect.addOption({
                                    value: item.id,
                                    text: item.nama,
                                });
                            });
                            produkSelect.refreshOptions();
                        })
                        .catch(error => {
                            console.error('Gagal memuat produk:', error);
                        });
                }
            });
            // Menampilkan harga beli produk saat produk dipilih
            document.getElementById('produk').addEventListener('change', function() {
                let produkId = this.value;

                if (produkId) {
                    fetch(`/produk/${produkId}/harga-beli`)
                        .then(res => {
                            if (!res.ok) {
                                throw new Error('Gagal mengambil harga beli produk');
                            }
                            return res.json();
                        })
                        .then(data => {
                            if (data.harga_beli === null || data.harga_beli === undefined) {
                                throw new Error('Harga beli tidak ditemukan , Harap Periksa apakah ada pembelian terhadap produk ini');
                            }

                            document.getElementById('harga_beli').value = formatRupiah(data.harga_beli);
                        })

                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: error.message,
                            });
                        });
                } else {
                    document.getElementById('harga_beli').value = '';
                }
            });
        </script>

        <script>
            const profitRules = [
                { min: 0, max: 0, profit: '' },
                { min: 1, max: 100000, profit: 2000 },
                { min: 100001, max: 300000, profit: 3000 },
                { min: 400000, max: 499000, profit: 4000 },
                { min: 500000, max: 599000, profit: 5000 },
                { min: 600000, max: 699000, profit: 6000 },
                { min: 700000, max: 799000, profit: 7000 },
                { min: 800000, max: 899000, profit: 8000 },
                { min: 900000, max: 999000, profit: 9000 },
                { min: 1000000, max: 1990000, profit: 10000 },
                { min: 2000000, max: 5990000, profit: 20000 }
            ];

            function setNominal(value) {
                const nominalInput = document.getElementById('nominalInput');
                if (nominalInput) {
                    nominalInput.value = value.toLocaleString('id-ID');
                    calculateProfit(value);
                }
            }

            function calculateProfit(nominal) {
                const profitInput = document.getElementById('profitInput');
                if (!profitInput) return;

                let profit = 0;

                for (const rule of profitRules) {
                    if (nominal >= rule.min && nominal <= rule.max) {
                        profit = rule.profit;
                        break;
                    }
                }

                profitInput.value = profit.toLocaleString('id-ID');
            }

            document.addEventListener('DOMContentLoaded', () => {
                const nominalInput = document.getElementById('nominalInput');
                if (!nominalInput) return;

                nominalInput.addEventListener('input', (e) => {
                    let raw = e.target.value.replace(/\D/g, '');
                    let value = parseInt(raw || 0);
                    calculateProfit(value);
                });
            });

            window.setNominal = function (value) {
                const nominalInput = document.getElementById('nominalInput');
                if (nominalInput) {
                    nominalInput.value = value.toLocaleString('id-ID');
                    calculateProfit(value);
                }
            };
        </script>

        <!-- Tom Select dan Show Hide Form -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectIds = ['jenis', 'pembayaran','metode_pembayaran'];

                selectIds.forEach(id => {
                    const element = document.getElementById(id);
                    if (element) {
                        new TomSelect(`#${id}`, {
                            create: false,
                            placeholder: 'Select Option ..',
                            // searchField: ['text']
                        });
                    }
                });

            });
            // Show Hide
            document.addEventListener('DOMContentLoaded', function() {
                const metodePembayaranRadios = document.querySelectorAll('input[name="metode_pembayaran"]');
                const bankForm = document.getElementById('bankForm');
                const hargaForm = document.getElementById('harga');

                metodePembayaranRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'Bank') {
                            bankForm.style.display = 'block';
                            hargaForm.style.display = 'block';
                        } else if (this.value === 'Tunai') {
                            bankForm.style.display = 'none';
                            hargaForm.style.display = 'block';
                        } else {
                            bankForm.style.display = 'none';
                            hargaForm.style.display = 'none';
                        }
                    });
                });
            });
        </script>

        <script>
            function getSelectedText(selectId) {
                const el = document.getElementById(selectId);
                return el.options[el.selectedIndex]?.text || '';
            }

            function getSelectedValue(selectId) {
                return document.getElementById(selectId).value;
            }

            function updateLabel() {
                const jenisText = getSelectedText('jenis').toLowerCase();
                const label = document.getElementById("label");
                if (jenisText.includes("tarik tunai") || jenisText.includes("top up")) {
                    label.innerText = "Bank";
                } else {
                    label.innerText = "Produk";
                }
            }

            // Tambahkan baris baru ke tabel
            document.getElementById("tambah").addEventListener("click", function (e) {
                e.preventDefault();

                let keterangan = document.querySelector("input[name='keterangan']").value;
                let nominal = document.querySelector("input[name='nominal']").value;
                let profit = document.querySelector("input[name='profit']").value;
                let qty = document.querySelector("input[name='qty']").value;

                const jenisId = getSelectedValue("jenis");
                const jenisText = getSelectedText("jenis");

                const isBank = jenisText.toLowerCase().includes("tarik tunai") || jenisText.toLowerCase().includes("top up");

                const bankId = getSelectedValue("pembayaran");
                const bankText = getSelectedText("pembayaran");

                const produkId = getSelectedValue("produk");
                const produkText = getSelectedText("produk");

                nominal = parseFloat(nominal.replace(/[^\d]/g, '')) || 0;
                qty = parseFloat(qty.replace(/[^\d]/g, '')) || 0;
                profit = parseFloat(profit.replace(/[^\d]/g, '')) || 0;

                let total = qty * nominal + profit;

                let table = document.getElementById("dataTable").querySelector("tbody");
                let newRow = table.insertRow();

                const selectedName = isBank ? bankText : produkText;
                const selectedId = isBank ? bankId : produkId;

                newRow.innerHTML = `
                    <td class="py-2 px-4 border">${jenisText}</td>
                    <td class="py-2 px-4 border">${selectedName}</td>
                    <td class="py-2 px-4 border">${keterangan}</td>
                    <td class="py-2 px-4 border">${nominal.toLocaleString()}</td>
                    <td class="py-2 px-4 border">${profit.toLocaleString()}</td>
                    <td class="py-2 px-4 border">${qty}</td>
                    <td class="py-2 px-4 border">${total.toLocaleString()}</td>
                    <td class="py-2 px-4 border">
                        <button class="bg-red-500 text-red px-2 py-1 rounded remove-row">Hapus</button>
                    </td>

                    <input type="hidden" name="jenis_transaksi_id[]" value="${jenisId}">
                    <input type="hidden" name="${isBank ? 'bank_id[]' : 'produk_id[]'}" value="${selectedId}">
                    <input type="hidden" name="nominal[]" value="${nominal}">
                    <input type="hidden" name="profit[]" value="${profit}">
                    <input type="hidden" name="keterangan[]" value="${keterangan}">
                    <input type="hidden" name="qty[]" value="${qty}">
                    <input type="hidden" name="total[]" value="${total}">
                `;

                // Reset input setelah tambah
                document.querySelector("input[name='keterangan']").value = '';
                document.querySelector("input[name='nominal']").value = '';
                document.querySelector("input[name='profit']").value = '';
                document.querySelector("input[name='qty']").value = '';
            });

            // Ganti label ketika jenis transaksi dipilih
            document.getElementById("jenis").addEventListener("change", updateLabel);

            // Jalankan saat halaman dibuka
            window.onload = updateLabel;

            // Hapus baris
            document.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });

            // 🔥 Fungsi untuk reset form setelah tambah data
            function resetForm() {
                // Reset input hanya jika elemen ditemukan
                let biayaInput = document.querySelector("input[name='biaya']");
                if (biayaInput) biayaInput.value = "";


                let keteranganInput = document.querySelector("input[name='keterangan']");
                if (keteranganInput) keteranganInput.value = "";

                // Cek apakah elemen ada sebelum mengakses .tomselect
                let selectJenis = document.getElementById("jenis");
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
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });

            function updateSubtotal() {
                let total = 0;

                document.querySelectorAll(".total").forEach(function(cell) {
                    let nilai = parseFloat(cell.textContent.replace(/[^\d]/g, "")) || 0;
                    total += nilai;
                });

                // Tampilkan subtotal dengan format ribuan
                document.getElementById("subtotal").textContent = total.toLocaleString("id-ID");

                // Simpan subtotal ke input hidden agar bisa dikirim ke backend
                document.getElementById("subtotal_input").value = total;
            }

            // Event listener untuk submit form
            document.getElementById("formPengeluaran").addEventListener("submit", function(e) {
                let data = [];
                let subtotal = 0;

                document.querySelectorAll("#dataTable tbody tr").forEach(function(row) {
                    let jenisId = row.querySelector("input[name='jenis_transaksi_id']").value;
                    let keteranganInput = row.querySelector("input[name='keterangan[]']");
                    let keterangan = keteranganInput ? keteranganInput.value.trim() : "";


                    let nominal = parseFloat(row.querySelector("input[name='nominal[]']").value) || 0;
                    let profit = parseFloat(row.querySelector("input[name='profit[]']").value) || 0;
                    let qty = parseFloat(row.querySelector("input[name='qty[]']").value) || 0;
                    let total = parseFloat(row.querySelector("input[name='total[]']").value) || 0;

                    subtotal += total; // Menggunakan totalBiaya untuk subtotal

                    data.push({
                        // jenis_id: jenisId,
                        keterangan: keterangan,
                        nominal: nominal,
                        qty: qty,
                        profit: profit,
                        biaya: biaya,
                        total: total,
                    });
                });

                // Simpan data transaksi dan subtotal ke input hidden sebelum submit
                document.getElementById("detailTransaksi").value = JSON.stringify(data);
                document.getElementById("subtotal_input").value = subtotal; // Pastikan ini berisi totalBiaya
            });
        </script>

        <script>
            $(document).on('focus', '.rupiah', function() {
                $(this).mask("#.##0", {
                    reverse: true
                });
            });
        </script>

        <!-- Isi Tanggal otomatis tgl sekarang && inputan qty min 1 []angka 0 di tolak ] -->
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var today = new Date();
                var day = ("0" + today.getDate()).slice(-2);
                var month = ("0" + (today.getMonth() + 1)).slice(-2);
                var todayFormatted = today.getFullYear() + "-" + month + "-" + day;
                document.getElementById('tanggal').value = todayFormatted;
            });

            document.addEventListener("DOMContentLoaded", function() {
                let qtyInput = document.getElementById("qty");

                // Set nilai default jika kosong atau tidak valid
                if (!qtyInput.value || qtyInput.value <= 0) {
                    qtyInput.value = 1;
                }

                // Pastikan nilai tidak kurang dari 1 saat diubah
                qtyInput.addEventListener("input", function() {
                    if (qtyInput.value <= 0) {
                        qtyInput.value = 1;
                    }
                });
            });
        </script>
        <!-- End -->
    @endpush

@endsection
