@extends('master1.master')
@section('title', 'Trust UC - Data Mobil')
@section('br2', 'Stock')
@section('main')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Critical CSS inlined here */
        .body {
            font-family: 'Poppins', sans-serif;
        }
        .dataTables_wrapper .dataTables_empty {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 1.2em;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px 0;
        }

    </style>
@endpush

<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
    <div class="mt-16 px-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                        <div class="text-base font-medium group-[.mode--light]:text-white">
                            Stock
                        </div>
                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                            <a href="#" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                                <i data-tw-merge="" data-lucide="pen-line" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <div class="mt-3.5 flex flex-col gap-8">
                        <div class="box box--stacked flex flex-col">
                            <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                                <div>
                                    <div class="relative">
                                        <i data-tw-merge="" data-lucide="search"
                                            class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                        <input data-tw-merge="" type="text" id="customFilter"
                                            placeholder="Search users..."
                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.5rem] pl-9 sm:w-64">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row">
                                    <!-- Export -->
                                    <!-- <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative">
                                        <button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto">
                                            <i data-tw-merge="" data-lucide="download" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                            Export
                                            <i data-tw-merge="" data-lucide="chevron-down" class="ml-2 h-4 w-4 stroke-[1.3]"></i>
                                        </button>
                                        <div data-transition="" data-selector=".show"  data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                    <i data-tw-merge="" data-lucide="file-bar-chart" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                    PDF
                                                </a>
                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                    <i data-tw-merge="" data-lucide="file-bar-chart" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                    CSV
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Filter -->
                                    <!-- <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block">
                                        <button id="filterButton" data-tw-merge=""
                                            data-tw-toggle="dropdown" aria-expanded="false"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto"><i
                                                data-tw-merge="" data-lucide="arrow-down-wide-narrow"
                                                class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                            Filter
                                            <span
                                                class="ml-2 flex h-5 items-center justify-center rounded-full border bg-slate-100 px-1.5 text-xs font-medium">
                                                3
                                            </span>
                                        </button>
                                         <div id="filterDropdown" data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                                <div class="p-2">
                                                    <div>
                                                        <div class="text-left text-slate-500"> Merk</div>
                                                        <select id="merkFilter" data-tw-merge="" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                            <option value="Support Specialist"> Toyota</option>
                                                            <option value="Data Analyst"> Honda</option>
                                                            <option value="Marketing Coordinator"> Suzuki</option>
                                                            <option value="Software Engineer"> Software Engineer</option>
                                                            <option value="Account Executive"> Account Executive</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="mt-3">
                                                        <div class="text-left text-slate-500">
                                                            Department
                                                        </div>
                                                        <select data-tw-merge=""
                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                            <option value="Support Team">
                                                                Support Team
                                                            </option>
                                                            <option value="Data Analytics">
                                                                Data Analytics
                                                            </option>
                                                            <option value="Marketing Department">
                                                                Marketing Department
                                                            </option>
                                                            <option value="Engineering">
                                                                Engineering
                                                            </option>
                                                            <option value="Account Management">
                                                                Account Management
                                                            </option>
                                                        </select>
                                                    </div> --}}
                                                    <div class="mt-4 flex items-center">
                                                        <button id="closeFilter" data-tw-merge=""
                                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">
                                                            Close
                                                        </button>
                                                        <button id="applyFilter" data-tw-merge=""
                                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">
                                                            Apply
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>-->
                                </div>
                            </div>
                            <!-- Table -->
                            <div class="overflow-auto ">
                                <table id="inventory-table" data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
                                    <thead data-tw-merge="" class="">
                                        <tr data-tw-merge="" class="">
                                            <th
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                No
                                            </th>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                No Polisi
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 w-52 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Type
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500 text-center">
                                                KM
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Merk
                                            </td>
                                            {{-- <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Model
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Warna
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Tahun
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Transmisi
                                            </td>--}}
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Tgl Beli
                                            </td>
                                            {{-- <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Harga Beli
                                            </td> --}}
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Harga Jual
                                            </td>
                                            {{-- <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Thumbnail
                                            </td> --}}
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Status
                                            </td>
                                            <td
                                                class="px-5 border-b dark:border-darkmode-300 w-20 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500 text-center">
                                                Action
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-reverse flex flex-col-reverse flex-wrap items-center gap-y-2 p-5 sm:flex-row">
                                <nav class="mr-auto w-full flex justify-center items-center sm:w-auto">
                                    <ul class="flex items-center">
                                        <li class="mr-2">
                                            <a id="prev-page" class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 text-center disabled:opacity-70 disabled:cursor-not-allowed shadow-none font-normal flex border-transparent text-slate-800 dark:text-slate-300 px-3">
                                                <i data-lucide="chevron-left" class="stroke-[1] h-4 w-4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <span id="page-info" class="transition duration-200 items-center justify-center py-2 rounded-md">
                                                Page 1
                                            </span>
                                        </li>
                                        <li class="ml-2">
                                            <a id="next-page" class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 text-center disabled:opacity-70 disabled:cursor-not-allowed shadow-none font-normal flex border-transparent text-slate-800 dark:text-slate-300 px-3">
                                                <i data-lucide="chevron-right" class="stroke-[1] h-4 w-4"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Show Entri -->
                                <select id="entriesPerPage" data-tw-merge=""
                                    class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 rounded-[0.5rem] sm:w-20">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>25</option>
                                    <option>35</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     var table = $('#inventory-table').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: "{{ route('master.json') }}",
        //             data: function(d) {
        //                 d.startDate = $('#startDate').val();
        //                 d.endDate = $('#endDate').val();
        //                 d.statusToggle = $('#statusToggle').is(':checked') ? 1 : 0;
        //                 d.customFilter = $('#customFilter').val();
        //             }
        //         },
        //         columns: [
        //             {
        //                 data: 'DT_RowIndex',
        //                 name: 'DT_RowIndex',
        //                 orderable: false,
        //                 searchable: false,
        //                 className: 'text-center',  // Add this line to center align the content
        //                 render: function(data) {
        //                     return data;
        //                 }
        //             },
        //             // { data: 'nopol', name: 'nopol', searchable: true },
        //             {
        //                 data: 'nopol',
        //                 name: 'nopol',
        //                 searchable: true,
        //                 render: function(data) {
        //                     return `<div class="flex items-center">
        //                                 <div class="ml-3.5">
        //                                     <a class="whitespace-nowrap font-medium" href="#">${data}</a>
        //                                 </div>
        //                             </div>`;
        //                 }
        //             },
        //             { data: 'type', name: 'type', searchable: true },
        //             { data: 'km', name: 'km' },
        //             { data: 'merk.nama', name: 'merk.nama', searchable: true },
        //             // { data: 'model',  name: 'model' , searchable: true },
        //             // { data: 'warna',  name: 'warna', searchable: true },
        //             // { data: 'tahun',  name: 'tahun', searchable: true },
        //             // { data: 'transmisi',  name: 'transmisi', searchable: true},
        //             // {
        //             //     data: 'tgl_beli',
        //             //     name: 'tgl_beli',
        //             //     searchable: true,
        //             //     render: function(data) {
        //             //         return data ? moment(data).format('DD/MM/YYYY') : '-';
        //             //     }
        //             // },
        //             {
        //                 data: 'tgl_beli',  // Data untuk tanggal
        //                 name: 'tgl_beli',
        //                 render: function(data) {
        //                     return `<div class="whitespace-nowrap">${moment(data).format('MMM D, YYYY')}</div>`;
        //                 }
        //             },
        //             // {
        //             //     data: 'harga_beli',
        //             //     name: 'harga_beli',
        //             //     searchable: true,
        //             //     render: function(data) {
        //             //         return data ? formatRupiah(data) : '-';
        //             //     }
        //             // },
        //             {
        //                 data: 'harga_jual',
        //                 name: 'harga_jual',
        //                 searchable: true,
        //                 render: function(data) {
        //                     return data ? formatRupiah(data) : '-';
        //                 }
        //             },
        //             // {
        //             //     data: 'image',
        //             //     name: 'image',
        //             //     render: function(data, type, row) {
        //             //         if (data) {
        //             //             return '<a href="#" class="view-image" data-image="' + data +
        //             //                 '" data-leasing="' + row.leasing + '" data-tenor="' + row
        //             //                 .tenor + '" data-dp_setor="' + row.dp_setor +
        //             //                 '" data-angsuran="' + row.angsuran + '" data-grade="' + row
        //             //                 .grade +
        //             //                 '"><span class="badge bg-warning text-dark"><i class="fa fa-eye"></i></span></a>';
        //             //         } else {
        //             //             return '<span class="badge bg-danger text-dark"><i class="fa fa-eye"></i></span>';
        //             //         }
        //             //     }
        //             // },
        //             {
        //                 data: 'status',
        //                 name: 'status',
        //                 render: function(data) {
        //                     if (data == 0)
        //                     return '<span class="badge bg-info text-white">Available</span>';
        //                     if (data == 1)
        //                     return '<span class="badge bg-success text-white">Proses</span>';
        //                     if (data == 2)
        //                     return '<span class="badge bg-danger text-white">Sold Out</span>';
        //                     return '<span class="d-flex justify-content-center">-</span>';
        //                 }
        //             },
        //             {
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: false,
        //                 searchable: false,
        //                 render: function(data, type, row) {
        //                     if (row.status == 2) return '-';
        //                     return '<a href="/mokas/edit/' + row.id +
        //                         '" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>';
        //                 }
        //             },
        //         ],
        //         pagingType: "simple_numbers",
        //         pageLength: 10,
        //         initComplete: function() {
        //             updatePageInfo();
        //         }
        //     });

        //     $('#inventory-table_filter').hide();
        //     $('.dataTables_length').hide();
        //     $('.dataTables_info').hide();
        //     $('.dataTables_paginate').hide();

        //     // Custom pagination controls
        //     $('#prev-page').on('click', function() {
        //         var page = table.page() - 1;
        //         if (page >= 0) {
        //             table.page(page).draw('page');
        //             updatePageInfo();
        //         }
        //     });

        //     $('#next-page').on('click', function() {
        //         var page = table.page() + 1;
        //         if (page < table.page.info().pages) {
        //             table.page(page).draw('page');
        //             updatePageInfo();
        //         }
        //     });

        //     function updatePageInfo() {
        //         var info = table.page.info();
        //         $('#page-info').text('Page ' + (info.page + 1) + ' of ' + info.pages);
        //     }

        //     $('#customFilter').on('keyup change', function() {
        //         table.draw();
        //     });

        //     $('#entriesPerPage').on('change', function() {
        //         var pageLength = parseInt($(this).val(), 10);
        //         table.page.len(pageLength).draw();
        //     });
        // });
        $(document).ready(function() {
            var table = $('#inventory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('master.json') }}",
                    data: function(d) {
                        d.startDate = $('#startDate').val();
                        d.endDate = $('#endDate').val();
                        d.statusToggle = $('#statusToggle').is(':checked') ? 1 : 0;
                        d.customFilter = $('#customFilter').val();
                        d.merkFilter = $('#merkFilter').val();
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',  // Center align the content
                        render: function(data) {
                            return data;  // Display row index or any content here
                        }
                    },
                    {
                        data: 'nopol',
                        name: 'nopol',
                        searchable: true,
                        render: function(data) {
                            return `<div class="flex ">
                                        <div class="ml-3.5">
                                            <a class="whitespace-nowrap font-medium text-center" href="#">${data}</a>
                                        </div>
                                    </div>`;
                        }
                    },
                    { data: 'type', name: 'type', searchable: true , className: 'text-center' },
                    { data: 'km', name: 'km', className: 'text-center' },
                    { data: 'merk.nama', name: 'merk.nama', searchable: true , className: 'text-center' },
                    {
                        data: 'tgl_beli',  // Data untuk tanggal
                        name: 'tgl_beli',
                        render: function(data) {
                            return `<div class="whitespace-nowrap text-center">${moment(data).format('MMM D, YYYY')}</div>`;
                        }
                    },
                    {
                        data: 'harga_jual',
                        name: 'harga_jual',
                        className: 'text-center',
                        searchable: true,
                        render: function(data) {
                            return formatRupiah(data);  // Format currency or similar
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            let statusText = '';
                            let iconClass = '';
                            let textClass = '';

                            // Convert data to number if needed
                            let status = Number(data);

                            switch (status) {
                                case 0:
                                    statusText = 'Available';
                                    iconClass = 'text-info';
                                    textClass = 'text-info';
                                    break;
                                case 1:
                                    statusText = 'Proses';
                                    iconClass = 'text-warning';
                                    textClass = 'text-warning';
                                    break;
                                case 2:
                                    statusText = 'Sold Out';
                                    iconClass = 'text-danger';
                                    textClass = 'text-danger';
                                    break;
                                default:
                                    statusText = '-';
                                    iconClass = 'text-slate-500';
                                    textClass = 'text-slate-500';
                                    break;
                            }

                            return `<div class="flex items-center justify-center ${textClass}">
                                        <i class="h-3.5 w-3.5 stroke-[1.7] lucide-${iconClass}"></i>
                                        <div class="ml-1.5 whitespace-nowrap">${statusText}</div>
                                    </div>`;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (row.status == 2) return '-';
                            return `
                                <div class="flex items-center justify-center">
                                    <div class="dropdown relative h-5">
                                        <button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu absolute z-[9999] hidden">
                                            <div class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                <a href="/mokas/edit/${row.id}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                    <i class="fas fa-edit mr-2"></i> Edit
                                                </a>
                                                <a href="/mokas/delete/${row.id}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item text-danger">
                                                    <i class="fas fa-trash-alt mr-2"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                    }

                ],
                pagingType: "simple_numbers",
                pageLength: 10,
                initComplete: function() {
                    updatePageInfo();
                },

                columnDefs: [
                    { className: 'px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600', targets: '_all' }
                ],
                });

                $('#inventory-table_filter').hide();
                $('.dataTables_length').hide();
                $('.dataTables_info').hide();
                $('.dataTables_paginate').hide();

                $(document).on('click', '[data-tw-toggle="dropdown"]', function() {
                    $(this).siblings('.dropdown-menu').toggleClass('hidden');
                });

                $(document).on('click', function(e) {
                    if (!$(e.target).closest('.dropdown').length) {
                        $('.dropdown-menu').addClass('hidden');
                    }
                });
                // Custom pagination controls
                $('#prev-page').on('click', function() {
                    var page = table.page() - 1;
                    if (page >= 0) {
                        table.page(page).draw('page');
                        updatePageInfo();
                    }
                });

                $('#next-page').on('click', function() {
                    var page = table.page() + 1;
                    if (page < table.page.info().pages) {
                        table.page(page).draw('page');
                        updatePageInfo();
                    }
                });

                function updatePageInfo() {
                    var info = table.page.info();
                    $('#page-info').text('Page ' + (info.page + 1) + ' of ' + info.pages);
                }

                $('#customFilter').on('keyup change', function() {
                    table.draw();
                });

                $('#entriesPerPage').on('change', function() {
                    var pageLength = parseInt($(this).val(), 10);
                    table.page.len(pageLength).draw();
                });
        });

        function formatRupiah(angka) {
            if (angka === null || angka === undefined || isNaN(angka)) {
                return '';
            }

            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');

            return 'Rp ' + ribuan;
        }

    </script>
@endpush

@endsection

