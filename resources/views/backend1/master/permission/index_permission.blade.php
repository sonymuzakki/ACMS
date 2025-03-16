@extends('master1.master')
@section('title', 'Trust UC - Role Permission')
@section('br2', 'Role & Permission')
@push('style')
@endpush
@section('main')

<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
    <div class="mt-16 px-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                        <div class="text-base font-medium group-[.mode--light]:text-white">
                            Role & Permission
                        </div>
                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                            <a href="#" id="open-modal" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
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
                                        <i data-tw-merge="" data-lucide="search" class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                        <input data-tw-merge="" type="text" id="customFilter" placeholder="Search users..."
                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.5rem] pl-9 sm:w-64">
                                    </div>
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
                                            <th
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Nama Roles
                                            </th>
                                            <th
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Permission
                                            </th>
                                            <th
                                                class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                                                Action
                                            </th>
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


                    <!-- Modal Add -->
                    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="header-footer-modal-preview" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                            <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600   sm:w-[600px]  p-10 text-center">
                            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="mr-auto text-base font-medium">
                                    Add Data
                                </h2>
                            </div>
                            <form action="{{ route('store.roles.permission') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div data-tw-merge class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-12 mb-3">
                                        <label data-tw-merge for="modal-form-9" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                            Nama Role
                                        </label>
                                        <select data-tw-merge id="modal-form-6" name="role_id" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1">
                                            <option selected="" disabled>Select Option ..</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-12 sm:col-span-12">
                                        <div data-tw-merge class="flex items-center mr-2 mr-2 mb-3">
                                            <input data-tw-merge type="checkbox" id="CheckDefaultmain" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" value="">
                                            <label data-tw-merge for="CheckDefaultmain" class="cursor-pointer ml-2">Permission All</label>
                                        </div>
                                        <hr>
                                    </div>

                                    @foreach ($permission_groups as $group )
                                    <div class="col-span-6 sm:col-span-12">
                                        <div data-tw-merge class="flex items-center mb-2">
                                            <input data-tw-merge type="checkbox" id="flexCheckDefault" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" value="">
                                            <label data-tw-merge for="flexCheckDefault" class="cursor-pointer ml-2">{{ $group->group_name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp
                                        @foreach ($permissions as $permission )
                                        <div data-tw-merge class="flex items-center mb-2">
                                            <input data-tw-merge type="checkbox" name="permission[]" id="flexCheckDefault{{ $permission->id }}" value="{{ $permission->id }}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" value="">
                                            <label data-tw-merge for="flexCheckDefault{{ $permission->id }}" class="cursor-pointer ml-2"> 
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                    @endforeach
                                    {{-- @foreach ($permission_groups as $group )
                                        <div class="col-span-6 sm:col-span-12">
                                            <div data-tw-merge class="flex items-center mb-3">
                                                <input data-tw-merge type="checkbox" id="flexCheckDefaultGroup" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50" value="">
                                                <label data-tw-merge for="flexCheckDefaultGroup" class="cursor-pointer ml-2">{{ $group->group_name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $permission )
                                                <div data-tw-merge class="flex items-center mb-2">
                                                    <input data-tw-merge type="checkbox" name="permission[]" id="flexCheckDefault{{ $permission->id }}" value="{{ $permission->id }}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                                                    <label data-tw-merge for="flexCheckDefault{{ $permission->id }}" class="cursor-pointer ml-2"> {{ $permission->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach --}}


                                </div>

                                <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400">
                                    <button data-tw-merge data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-20 mr-1 w-20">Cancel</button>
                                    {{-- <button data-tw-merge type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20 w-20">Submit</button> --}}
                                    <button data-tw-merge type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20 w-20">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Modal Content -->

                    <!-- Modal Delete -->
                    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="delete-modal-preview" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                        <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
                            <div class="p-5 text-center">
                                <i data-tw-merge data-lucide="x-circle" class="stroke-[1] w-5 h-5 mx-auto mt-3 h-16 w-16 text-danger mx-auto mt-3 h-16 w-16 text-danger"></i>
                                <div class="mt-5 text-3xl">Are you sure?</div>
                                <div class="mt-2 text-slate-500">
                                    Do you really want to delete these records? <br>
                                    This process cannot be undone.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" class="cancel transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-24">Cancel</button>
                                <button type="button" class="confirm-delete transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-danger w-24">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Content -->

                    <!-- Modal Succes After delete -->
                    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="success-modal-preview" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                        <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
                            <div class="p-5 text-center">
                                <i data-tw-merge data-lucide="check-circle" class="stroke-[1] w-5 h-5 mx-auto mt-3 h-16 w-16 text-success mx-auto mt-3 h-16 w-16 text-success"></i>
                                <div class="mt-5 text-3xl">Good job!</div>
                                <div class="mt-2 text-slate-500">
                                    You have successfully deleted the record.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" class="close-success-modal transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24">Ok</button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Content -->

                </div>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
<script>
        $(document).ready(function() {
            var table = $('#inventory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('all.roles.permission1') }}",
                    data: function(d) {
                        d.customFilter = $('#customFilter').val();
                        d.merkFilter = $('#merkFilter').val();
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return data;
                        }
                    },
                    { data: 'name', name: 'name', searchable: true , className: 'text-center', },
                    {
                        data: 'permissions',
                        name: 'permissions',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            // Check if data is available
                            if (!data || !data.length) {
                                return '<div class="flex items-center justify-center text-danger"><span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">No Permissions</span>';
                            }

                            // Generate HTML for permissions
                            let permissionsHtml = '<div class="flex flex-wrap gap-2 items-center justify-center">'; // Added flexbox container with gap
                            data.forEach(permission => {
                                permissionsHtml += `
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        ${permission.name}
                                    </span>
                                `;
                            });
                            permissionsHtml += '</div>'; // Close flexbox container
                            return permissionsHtml;
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
                                                <a href="/admin/permission/edit1/${row.id}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                    <i class="fas fa-edit mr-2"></i> Edit
                                                </a>
                                                <a href="#" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item text-danger delete-btn" data-id="${row.id}">
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

                // Ketika tombol delete diklik
                $(document).on('click', '.delete-btn', function() {
                    var dataId = $(this).data('id');
                    $('#delete-modal-preview').data('id', dataId).addClass('show'); // Tampilkan modal konfirmasi
                });

                // Ketika tombol delete dikonfirmasi
                $('#delete-modal-preview').on('click', '.confirm-delete', function() {
                    var dataId = $('#delete-modal-preview').data('id');

                    $.ajax({
                        url: `/admin/permission/delete/${dataId}`,
                        type: 'get', // Ubah menjadi DELETE
                        success: function(result) {
                            $('#delete-modal-preview').removeClass('show'); // Sembunyikan modal konfirmasi
                            $('#success-modal-preview').addClass('show'); // Tampilkan modal berhasil
                            table.ajax.reload(); // Muat ulang DataTable
                        },
                        error: function(error) {
                            // Tangani error jika terjadi
                            console.error('Error:', error);
                        }
                    });
                });

                // Menutup modal konfirmasi ketika tombol cancel diklik
                $('#delete-modal-preview').on('click', '.cancel', function() {
                    $('#delete-modal-preview').removeClass('show');
                });

                // Menutup modal berhasil ketika tombol ok diklik
                $('#success-modal-preview').on('click', '.close-success-modal', function() {
                    $('#success-modal-preview').removeClass('show');
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
            // Open the modal when the "Add New" button is clicked
            document.getElementById('open-modal').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior
                document.getElementById('header-footer-modal-preview').classList.add('show');
            });

            // Close the modal when the "Cancel" button is clicked
            document.querySelector('[data-tw-dismiss="modal"]').addEventListener('click', function() {
                document.getElementById('header-footer-modal-preview').classList.remove('show');
            });
        });

</script>

<script>
    // function openEditModal(id, role_id, permissions) {
    //     // Populate the form fields with data
    //     document.getElementById('edit-role').value = role_id;

    //     // Handle permission checkboxes
    //     document.querySelectorAll('input[name="permission[]"]').forEach(checkbox => {
    //         checkbox.checked = permissions.includes(parseInt(checkbox.value));
    //     });

    //     // Update the form action URL
    //     document.getElementById('edit-form').action = `/permission/update/${id}`;

    //     // Show the modal
    //     document.getElementById('edit-modal').classList.remove('invisible', 'opacity-0');
    //     document.getElementById('edit-modal').classList.add('show');
    // }

    // function closeEditModal() {
    //     // Hide the modal
    //     document.getElementById('edit-modal').classList.remove('show');
    //     document.getElementById('edit-modal').classList.add('invisible', 'opacity-0');
    // }

    // function openEditModal(roleId, roleName, permissions) {
    //     $.ajax({
    //         url: `/admin/roles/${roleId}/edit`,
    //         method: 'GET',
    //         success: function(response) {
    //             // Populate the modal with the role data
    //             $('#edit-role').val(response.role.id);
    //             $('#edit-form').attr('action', `/admin/roles/${response.role.id}`);

    //             // Uncheck all checkboxes initially
    //             $('#edit-permission-all').prop('checked', false);
    //             $('input[type=checkbox]').prop('checked', false);

    //             // Check the permissions that the role already has
    //             response.permissions.forEach(function(permissionId) {
    //                 $(`#edit-permission-${permissionId}`).prop('checked', true);
    //             });

    //             // Handle "Permission All" checkbox logic
    //             $('#edit-permission-all').change(function() {
    //                 $('input[name="permission[]"]').prop('checked', this.checked);
    //             });

    //             // Handle group checkboxes logic
    //             response.permission_groups.forEach(function(group) {
    //                 let groupCheckbox = $(`#edit-group-${group.group_name}`);
    //                 let allChecked = true;
    //                 group.permissions.forEach(function(permission) {
    //                     if (!response.permissions.includes(permission.id)) {
    //                         allChecked = false;
    //                     }
    //                 });
    //                 groupCheckbox.prop('checked', allChecked);

    //                 groupCheckbox.change(function() {
    //                     group.permissions.forEach(function(permission) {
    //                         $(`#edit-permission-${permission.id}`).prop('checked', groupCheckbox.prop('checked'));
    //                     });
    //                 });
    //             });

    //             // Show the modal
    //             $('#edit-modal').addClass('show').removeClass('hidden');
    //         }
    //     });
    // }

    // function closeEditModal() {
    //     $('#edit-modal').removeClass('show').addClass('hidden');
    // }

    function openEditModal(id, roleId, permissionIds) {

        console.log('ID:', id);
        console.log('Role ID:', roleId);
        console.log('Permission IDs:', permissionIds);

        // Open the modal
        document.getElementById('edit-modal').classList.add('show');

        // Set the role ID in the select field
        document.getElementById('edit-role').value = roleId;

        // Clear all checkboxes first
        document.querySelectorAll('#edit-modal input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });

        // If permissions exist, check the appropriate checkboxes
        if (permissionIds) {
            let permissionsArray = permissionIds.split(',');
            permissionsArray.forEach(function(permissionId) {
                document.getElementById('edit-permission-' + permissionId).checked = true;
            });
        }

        // Set the form action URL dynamically
        let form = document.getElementById('edit-form');
        form.action = `/admin/roles/${id}`;
    }

    function closeEditModal() {
        // Close the modal
        document.getElementById('edit-modal').classList.remove('show');
    }


    $('#CheckDefaultmain').click(function(){
                    if($(this).is(':checked')){
                        $('input[type= checkbox]').prop('checked',true);
                    }else{
                        $('input[type= checkbox]').prop('checked',false);
                    }
                })
</script>
@endpush

@endsection
