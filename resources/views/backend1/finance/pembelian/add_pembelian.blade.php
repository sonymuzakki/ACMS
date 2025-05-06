@extends('master1.master')
@section('title', 'Trust UC - Finance Pembelian')
@section('br1', 'Pembelian')
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
                                Add Pembelian
                            </div>
                        </div>

                        {{-- <form action="{{ route('finance.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
                        <form id="formPengeluaran" action="{{ route('finance.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <div class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
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
                                                <!-- Vendor -->
                                                {{-- <div
                                                    class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Supplier</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <select class="w-full text-sm border-slate-200 shadow-sm rounded-md"
                                                            id="supplier" name="supplier_id">
                                                            <option value="">Pilih Supplier</option>
                                                            @foreach ($supplier as $s)
                                                                <option value="{{ $s->id }}">{{ $s->nama }} -
                                                                    {{ $s->vendor }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <div  class="flex-col pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Supplier</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md"
                                                            id="supplier" name="supplier_id">
                                                            <option value="">Pilih Supplier</option>
                                                            @foreach ($supplier as $s)
                                                                <option value="{{ $s->id }}">{{ $s->nama }} -
                                                                    {{ $s->vendor }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('spv')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Barang -->
                                                <div
                                                    class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Kategori</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <select class="tom-select w-full text-sm border-slate-200 shadow-sm rounded-md"
                                                            id="kategori" name="kategori_id">
                                                            <option value="">Pilih Kategori</option>
                                                            @foreach ($barang as $s)
                                                                <option value="{{ $s->id }}">{{ $s->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <input type="hidden" name="vendor_id" id="hiddenVendor"> --}}

                                                <div id="ketCon" class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
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

                                                <div
                                                    class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                    <div
                                                        class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium" id="label-harga">Harga</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full mt-2 xl:mt-0">
                                                        <input data-tw-merge="" type="text" id="harga" name="harga"
                                                            class="rupiah disable ed:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        @error('biaya')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
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

                                                <div
                                                    class="flex-col block pt-5 mt-2 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-end gap-3 mt-2 md:flex-row">
                                        <a id="tambah" data-tw-merge=""
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-full rounded-[0.5rem] py-2.5 md:w-56"><i
                                                data-tw-merge="" data-lucide="plus"
                                                class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                            Add
                                        </a>
                                    </div>

                                    <div class="overflow-x-auto mt-5 mb-4">
                                        <table id="dataTable" data-tw-merge class="w-full text-left">
                                            <thead data-tw-merge class="bg-dark text-white dark:bg-black/30">
                                                <tr data-tw-merge class="">
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Supplier
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Nama Barang
                                                    </th>
                                                    <th data-tw-merge id="keterangan"
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Keterangan
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Qty
                                                    </th>
                                                    <th data-tw-merge
                                                        class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-b-0 whitespace-nowrap">
                                                        Harga
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
            document.addEventListener('DOMContentLoaded', function() {
                const selectIds = ['kategori','supplier'];

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

                $(document).ready(function() {
                    $('#selectVendor').on('change', function() {
                        var kode_kategori = $(this).val();
                        // console.log(kode_kategori);
                        if (kode_kategori) {
                            $.ajax({
                                url: '/get/' + kode_kategori,
                                type: 'GET',
                                data: {
                                    '_token': '{{ csrf_token() }}'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    // console.log(data);
                                    if (data) {
                                        $('#selectJenis').empty();
                                        $('#selectJenis').append(
                                            '<option value="">-Pilih-</option>');
                                        $.each(data, function(key, barang) {
                                            $('select[name="barang"]').append(
                                                '<option value="' + barang
                                                .vendor_id + '">' +
                                                barang.nama + '</option>'
                                            );
                                        });
                                    } else {
                                        $('#selectJenis').empty();
                                    }
                                }
                            });
                        } else {
                            $('#selectJenis').empty();
                        }
                    });
                });

                // $(document).ready(function() {
                //     const params = new URLSearchParams(window.location.search);
                //     const inventoryId = params.get('inventory_id');

                //     if (inventoryId) {
                //         $('#selectNopolcs').val(inventoryId).trigger('change'); // set select2 dan trigger event

                //         $.ajax({
                //             url: '/get-data/' + inventoryId,
                //             type: 'GET',
                //             dataType: 'json',
                //             success: function(response) {
                //                 console.log('Full response:', response); // Liat semua isi response
                //                 var data = response[0];
                //                 console.log('Model:', data.model);
                //                 console.log('Type:', data.type);
                //                 console.log('No Rangka:', data.no_rangka);
                //                 console.log('Tahun:', data.tahun);
                //                 console.log('Warna:', data.warna);
                //                 console.log('Merk:', data.merk);
                //                 console.log('Merk Nama:', data.merk.nama);

                //                 // Assign ke form
                //                 $('#type_cs').val(data.type);
                //                 $('#no_rangka_cs').val(data.no_rangka);
                //                 $('#tahun_cs').val(data.tahun);
                //                 $('#model_cs').val(data.model);
                //                 $('#warna_cs').val(data.warna);
                //                 $('#merk_cs').val(data.merk.nama);
                //             },
                //             error: function(xhr, status, error) {
                //                 console.error('AJAX Error:', error);
                //                 console.log('XHR Response:', xhr.responseText);
                //             }
                //         });
                //     }
                // });

                $(document).ready(function() {
                    function fetchInventoryData(inventoryId) {
                        if (!inventoryId) return;

                        // Set value dropdown supaya terlihat dipilih
                        $('#selectNopolcs').val(inventoryId);

                        $.ajax({
                            url: '/get-data/' + inventoryId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                var data = response[0];
                                $('#type_cs').val(data.type);
                                $('#no_rangka_cs').val(data.no_rangka);
                                $('#tahun_cs').val(data.tahun);
                                $('#model_cs').val(data.model);
                                $('#warna_cs').val(data.warna);
                                $('#merk_cs').val(data.merk.nama);
                            }
                        });
                    }

                    $('#selectNopolcs').on('change', function() {
                        var inventoryId = $(this).val();
                        fetchInventoryData(inventoryId);
                    });

                    var urlParams = new URLSearchParams(window.location.search);
                    var inventoryIdFromUrl = urlParams.get('inventory_id');

                    if (inventoryIdFromUrl) {
                        // Tunggu DOM selesai render dulu baru set val dan fetch
                        setTimeout(function() {
                            $('#selectNopolcs').val(inventoryIdFromUrl);
                            fetchInventoryData(inventoryIdFromUrl);
                        }, 100); // 100ms biasanya cukup
                    }
                });


            });
        </script>

        <script>
            document.getElementById("tambah").addEventListener("click", function(e) {
                e.preventDefault();

                let supplier = document.getElementById("supplier").value;
                let kategori = document.getElementById("kategori").value;
                let keterangan = document.querySelector("input[name='keterangan']").value;
                let harga = document.querySelector("input[name='harga']").value;
                let qty = document.querySelector("input[name='qty']").value;

                // Hapus semua karakter selain angka
                harga = parseFloat(harga.replace(/[^\d]/g, '')) || 0;
                qty = parseFloat(qty.replace(/[^\d]/g, '')) || 0;

                // if (!jenisSelect || !vendorSelect) {
                //     console.error("Element selectJenis atau selectVendor tidak ditemukan!");
                //     return;
                // }

                let biayaf = harga.toLocaleString();
                let totalBiaya = qty * harga;

                let table = document.getElementById("dataTable").querySelector("tbody");
                let newRow = table.insertRow();

                // // Cek apakah jenis adalah "Komisi Sales" atau "Komisi Supervisor"
                // let displayKeterangan = keterangan;

                // if (jenisNama.toLowerCase() === "komisi sales" && selectSales) {
                //     displayKeterangan = selectSales.options[selectSales.selectedIndex]
                //     .text; // Ambil nama Sales dari select
                // } else if (jenisNama.toLowerCase() === "komisi supervisor" && selectSpv) {
                //     displayKeterangan = selectSpv.options[selectSpv.selectedIndex].text; // Ambil nama SPV dari select
                // }

                newRow.innerHTML = `
                    <td class="py-2 px-4 border">${supplier}</td>
                    <td class="py-2 px-4 border">${kategori}</td>
                    <td class="py-2 px-4 border">${keterangan}</td> <!-- Nama SPV atau Sales ditampilkan di sini -->
                    <td class="py-2 px-4 border">${qty}</td>
                    <td class="py-2 px-4 border ">${biayaf}</td>
                    <td class="py-2 px-4 border biaya-value">${totalBiaya.toLocaleString()}</td>
                    <td class="py-2 px-4 border">
                        <button class="bg-red-500 text-red px-2 py-1 rounded remove-row">Hapus</button>
                    </td>
                    <input type="hidden" name="biaya[]" value="${harga}">
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

        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                const vendorSelect = document.getElementById("vendor");
                const jenisContainer = document.getElementById("jenisContainer");
                const spvCon = document.getElementById("spvCon");
                const salesCon = document.getElementById("salesCon");
                const ketCon = document.getElementById("ketCon");
                const labelHarga = document.getElementById("label-harga");
                const labelKeterangan = document.getElementById("keterangan");
                const qtyCon = document.getElementById("qtyCon");
                const qtyInp = document.getElementById("qtyInp");
                const hiddenVendor = document.getElementById('hiddenVendor');

                let jenisSelect = new TomSelect("#jenis", {
                    create: false,
                    placeholder: 'Pilih Jenis ..',
                    searchField: ['text']
                });

                const jenisData = @json($jenis);

                vendorSelect.addEventListener("change", function() {
                    if (vendorSelect.value) {
                        vendorSelect.setAttribute("disabled", "true");
                        hiddenVendor.value = vendorSelect.value;
                    }

                    const selectedVendorId = vendorSelect.value;
                    jenisSelect.clear();
                    jenisSelect.clearOptions();

                    if (selectedVendorId) {
                        jenisContainer.classList.remove("opacity-3", "invisible");
                        const filteredJenis = jenisData.filter(j => j.vendor_id == selectedVendorId);

                        filteredJenis.forEach(jenis => {
                            jenisSelect.addOption({ value: jenis.id, text: jenis.nama });
                        });

                        jenisSelect.refreshOptions();
                    } else {
                        jenisContainer.classList.add("opacity-3", "invisible");
                    }
            });

            // Event listener untuk select jenis pembebanan
            jenisSelect.on("change", function(value) {
                const selectedJenis = jenisData.find(j => j.id == value);

                if (selectedJenis) {
                    if (selectedJenis.nama.toLowerCase() === "komisi supervisor") {
                        spvCon.style.display = "flex";
                        salesCon.style.display = "none"; // Sembunyikan sales jika supervisor dipilih
                        labelHarga.textContent = "Komisi"; // Ubah label ke "Komisi"
                        labelKeterangan.textContent = "SPV / Sales"; // Ubah label ke "Keterangan"
                        ketCon.style.display = "none";
                        qtyCon.style.display = "none";
                        qtyInp.style.display = "none";
                    } else if (selectedJenis.nama.toLowerCase() === "komisi sales") {
                        salesCon.style.display = "flex";
                        spvCon.style.display = "none"; // Sembunyikan supervisor jika sales dipilih
                        labelHarga.textContent = "Komisi"; // Ubah label ke "Komisi"
                        labelKeterangan.textContent = "SPV / Sales"; // Ubah label ke "Keterangan"
                        ketCon.style.display = "none";
                        qtyCon.style.display = "none";
                        qtyInp.style.display = "none";
                    } else {
                        spvCon.style.display = "none";
                        salesCon.style.display = "none";
                    }
                } else {
                    spvCon.style.display = "none";
                    salesCon.style.display = "none";
                }
                });
            });

            document.addEventListener("DOMContentLoaded", function () {
                const jenisSelect = document.getElementById('jenis');
                const spvSelect = document.getElementById('spv');
                const salesSelect = document.getElementById('selectNopolcs');
                const biayaInput = document.querySelector('input[name="biaya"]');

                const endpointMap = {
                    'komisi supervisor': {
                        select: spvSelect,
                        url: '/api/get-biaya-supervisor'
                    },
                    'komisi sales': {
                        select: salesSelect,
                        url: '/api/get-komisi-sales'
                    }
                };

                function updateBiaya() {
                    const selectedJenis = jenisSelect.options[jenisSelect.selectedIndex]?.text?.toLowerCase() || "";
                    const isSalesKomisi = selectedJenis.includes("komisi sales");
                    const isSpvKomisi = selectedJenis.includes("komisi supervisor");

                    const salesValue = salesSelect.value?.trim() || "";
                    const spvValue = spvSelect.value?.trim() || "";

                    const isSalesValid = salesValue !== "";
                    const isSpvValid = spvValue !== "";


                    if (isSalesKomisi && isSalesValid) {
                        fetchBiaya(endpointMap["komisi sales"].url, salesValue, "sales");
                        return;
                    }

                    if (isSpvKomisi && isSpvValid) {
                        fetchBiaya(endpointMap["komisi supervisor"].url, spvValue, "supervisor");
                        return;
                    }

                    console.log("Sales Value:", salesValue);
                    console.log("Valid Sales?", isSalesValid);

                    biayaInput.value = "";
                }

                function fetchBiaya(url, id, tipe) {
                    fetch(`${url}?inventory_id=${encodeURIComponent(id)}`)
                        .then(response => {
                            if (!response.ok) throw new Error(`Gagal ambil data dari ${url}`);
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                let nilai = 0;

                                if (tipe.includes('sales') && data.total_komisi !== undefined) {
                                    nilai = data.total_komisi;
                                } else if (tipe.includes('supervisor') && data.harga !== undefined) {
                                    nilai = data.harga;
                                } else {
                                    biayaInput.value = "";
                                    alert("Data tidak lengkap.");
                                    return;
                                }

                                biayaInput.value = formatRupiah(nilai.toString());
                            } else {
                                biayaInput.value = "";
                                alert("Data tidak ditemukan.");
                            }
                        })
                        .catch(error => {
                            console.error("Fetch error:", error);
                            biayaInput.value = "";
                        });
                }

                // Event listeners
                jenisSelect.addEventListener("change", updateBiaya);
                spvSelect.addEventListener("change", updateBiaya);
                salesSelect.addEventListener("change", updateBiaya); // Untuk jaga-jaga

                if (salesSelect.tomselect) {
                    salesSelect.tomselect.on("change", updateBiaya);
                }
            });

        </script> --}}
    @endpush

@endsection
