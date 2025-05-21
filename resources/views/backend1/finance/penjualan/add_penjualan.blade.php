@extends('master1.master')
@section('title', 'Trust UC - Finance Penjualan')
@section('br1', 'Penjualan')
@section('br2', 'Add')
@section('main')

    <div
        class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
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
                        <form id="formPengeluaran" action="{{ route('finance.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Cash Form -->
                            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-7 lg:gap-y-10">
                                <div class="relative flex flex-col col-span-12 gap-y-7 ">
                                    <div class="flex flex-col p-5 box box--stacked">
                                        <div
                                            class="rounded-[0.6rem] border border-slate-200/60 p-5 dark:border-darkmode-400">
                                            <div
                                                class="flex items-center border-b border-slate-200/60 pb-5 text-[0.94rem] font-medium dark:border-darkmode-400">
                                                <i data-tw-merge="" data-lucide="chevron-down"
                                                    class="w-5 h-5 mr-2 stroke-[1.3]"></i>
                                                Data Information
                                            </div>

                                            <div class="mt-5">
                                                <div
                                                    class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Tanggal</div>
                                                                <div
                                                                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
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
                                                <div class="flex-col pt-5 mt-2 mb-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Jenis Transaksi</div>
                                                                <div
                                                                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <select
                                                            class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md"
                                                            id="jenis" name="jenis_transaksi_id">
                                                            <option value="">Pilih Jenis Transaksi</option>
                                                            @foreach ($jenis as $s)
                                                                <option value="{{ $s->id }}">{{ $s->nama }}
                                                            @endforeach
                                                        </select>
                                                        @error('jenis')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <input type="hidden" name="jenis_transaksi_id[]" value="${jenisId}">

                                                <div id="form-pembayaran">
                                                    <div class="flex-col pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div
                                                            class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Bank / E-Wallet </div>
                                                                    <div
                                                                        class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                            <select
                                                                class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md"
                                                                id="pembayaran" name="pembayaran_id">
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
                                                    <div id="nominal"
                                                        class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div
                                                            class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Nominal</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 w-full mt-2 xl:mt-0">
                                                            <input id="nominalInput" data-tw-merge="" type="text"
                                                                placeholder="Nominal" value="{{ old('nominal') }}"
                                                                name="nominal"
                                                                class="rupiah disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        </div>
                                                    </div>

                                                    <!-- Card Nominal Selector -->
                                                    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 gap-3 mt-5">
                                                        @foreach ([100000, 200000, 300000, 500000, 800000, 1000000] as $amount)
                                                            <div onclick="setNominal({{ $amount }})"
                                                                class="cursor-pointer rounded-lg bg-slate-100 dark:bg-darkmode-800 px-4 py-3 text-center font-medium text-slate-700 dark:text-slate-300 hover:bg-primary hover:text-white transition duration-150">
                                                                {{ number_format($amount, 0, ',', '.') }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

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
                                                            <input id="profitInput" data-tw-merge="" type="text" placeholder="Profit" value="{{ old('profit') }}" name="profit"
                                                                class="rupiah disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        </div>
                                                    <div id="qtyCon"
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-4 sm:text-right xl:mr-5 xl:w-20">
                                                        <div class="text-left mr-2 ml-3 mt-2">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Quantity</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="qtyInp" class="flex-1 w-full mt-2 xl:mt-0">
                                                        <input data-tw-merge="" type="text" id="qty"
                                                            placeholder="qty" value="{{ old('qty', 1) }}" name="qty"
                                                            min="1"
                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        @error('qty')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Keterangan</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <input data-tw-merge="" type="text" placeholder="Keterangan"
                                                            value="{{ old('keterangan') }}" name="keterangan"
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

                                    <div class="overflow-x-auto mt-5 mb-4">
                                        <table id="dataTable" data-tw-merge class="w-full text-left">
                                            <thead data-tw-merge class="bg-dark text-white dark:bg-black/30">
                                                <tr data-tw-merge class="">
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Jenis Transaksi
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Bank / E-Wallet
                                                    </th>
                                                    <th data-tw-merge id="keterangan"
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Keterangan
                                                    </th>
                                                    {{-- <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Nominal
                                                    </th> --}}
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Harga
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
        <!-- Tom Select -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectIds = ['jenis', 'pembayaran'];

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
        </script>

        <script>
            document.getElementById("tambah").addEventListener("click", function(e) {
                e.preventDefault();

                // let jenis = document.getElementById("jenis").value;
                // let pembayaran = document.getElementById("pembayaran").value;
                let keterangan = document.querySelector("input[name='keterangan']").value;
                let nominal = document.querySelector("input[name='nominal']").value;
                let profit = document.querySelector("input[name='profit']").value;
                let qty = document.querySelector("input[name='qty']").value;

                // let jenis = document.getElementById("jenis").value;
                // let pembayaran = document.getElementById("pembayaran").value;

                // let jenisId = jenis.value;
                // let JenisNama = jenis.options[jenis.selectedIndex].text;
                // let pembayaranId = pembayaran.value;
                // let pembayaranNama = pembayaran.options[pembayaran.selectedIndex].text;

                let jenisEl = document.getElementById("jenis");
                let pembayaranEl = document.getElementById("pembayaran");

                let jenisId = jenisEl.value;
                let JenisNama = jenisEl.options[jenisEl.selectedIndex].text;

                let pembayaranId = pembayaranEl.value;
                let pembayaranNama = pembayaranEl.options[pembayaranEl.selectedIndex].text;

                // Hapus semua karakter selain angka
                nominal = parseFloat(nominal.replace(/[^\d]/g, '')) || 0;
                qty = parseFloat(qty.replace(/[^\d]/g, '')) || 0;

                let biayaf = nominal.toLocaleString();
                let totalBiaya = qty * nominal;

                let table = document.getElementById("dataTable").querySelector("tbody");
                let newRow = table.insertRow();

                newRow.innerHTML = `
                    <td class="py-2 px-4 border">${JenisNama}</td>
                    <td class="py-2 px-4 border">${pembayaranNama}</td>
                    <td class="py-2 px-4 border">${keterangan}</td> <!-- Nama SPV atau Sales ditampilkan di sini -->
                    <td class="py-2 px-4 border ">${biayaf}</td>
                    <td class="py-2 px-4 border">${qty}</td>
                    <td class="py-2 px-4 border biaya-value">${totalBiaya.toLocaleString()}</td>
                    <td class="py-2 px-4 border">
                        <button class="bg-red-500 text-red px-2 py-1 rounded remove-row">Hapus</button>
                    </td>
                    <input type="hidden" name="jenis_transaksi_id[]" value="${jenisId}">
                    <input type="hidden" name="pembayaran_id[]" value="${pembayaranId}">
                    <input type="hidden" name="harga_jual[]" value="${biayaf}">
                    <input type="hidden" name="keterangan[]" value="${keterangan}"> <!-- Simpan nama SPV/Sales -->
                    <input type="hidden" name="qty[]" value="${qty}">
                    <input type="hidden" name="total[]" value="${totalBiaya}">
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

                document.querySelectorAll(".biaya-value").forEach(function(cell) {
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
                    let jenisId = row.querySelector("input[name='jenis_id[]']").value;
                    let keteranganInput = row.querySelector("input[name='keterangan[]']");
                    let keterangan = keteranganInput ? keteranganInput.value.trim() : "";

                    let biaya = parseFloat(row.querySelector("input[name='biaya[]']").value) || 0;
                    let total = parseFloat(row.querySelector("input[name='total[]']").value) || 0;

                    subtotal += total; // Menggunakan totalBiaya untuk subtotal

                    data.push({
                        jenis_id: jenisId,
                        keterangan: keterangan,
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
