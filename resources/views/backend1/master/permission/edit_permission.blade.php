@extends('master1.master')
@section('title', 'Trust UC - Data Mobil')
@section('br1', 'Role Permission')
@section('br2', 'Edit')
@push('style')
@endpush
@section('main')

<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
    <div class="mt-16 px-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12 sm:col-span-10 sm:col-start-2">
                    <div class="mt-7">
                        <div class="box box--stacked flex flex-col">
                            <div class="p-7">
                                {{-- <form action="{{ route('admin.roles.update',$roles->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Nama Role</div>
                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Enter your full legal name as it appears on your official identification.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <input type="text" readonly placeholder="Nama" name="name" value="{{ $roles->name }}" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-12 mt-5">
                                        <div class="flex items-center mr-2 mb-3">
                                            <input type="checkbox" id="edit-permission-all" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                            <label for="edit-permission-all" class="cursor-pointer ml-2">Permission All</label>
                                        </div>
                                        <hr>
                                    </div>

                                    @foreach ($permission_groups as $group)
                                    <div class="col-span-3 sm:col-span-3">
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="edit-group-{{ $group->group_name }}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                            <label for="edit-group-{{ $group->group_name }}" class="cursor-pointer ml-2">{{ $group->group_name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp
                                        @foreach ($permissions as $permission)
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" name="permission[]" id="edit-permission-{{ $permission->id }}" value="{{ $permission->id }}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                            <label for="edit-permission-{{ $permission->id }}" class="cursor-pointer ml-2">{{ $permission->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div> --}}

                                <form action="{{ route('admin.roles.update',$roles->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Nama Role</div>
                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Enter your full legal name as it appears on your official identification.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <input type="text" readonly placeholder="Nama" name="name" value="{{ $roles->name }}" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-12 mt-5 mb-4">
                                        <div class="flex items-center mr-2 mb-3">
                                            <input type="checkbox" id="CheckDefaultmain" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                            <label for="CheckDefaultmain" class="cursor-pointer ml-2">Permission All</label>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="grid grid-cols-12 gap-4">
                                        @foreach ($permission_groups as $group)
                                        <div class="col-span-6 sm:col-span-6">
                                            <div class="flex items-center mb-2">
                                                <input type="checkbox" id="flexCheckDefault{{ App\Models\User::roleHasPermissions($roles, $permissions) ? 'checked' : '' }}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                                <label for="flexCheckDefault{{ $group->group_name }}" class="cursor-pointer ml-2">{{ $group->group_name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $permission)
                                            <div class="flex items-center mb-2">
                                                <input type="checkbox" name="permission[]" id="flexCheckDefault{{ $permission->id }}" value="{{ $permission->id }}" {{ $roles->hasPermissionTo($permission->name) ? 'checked' : '' }} class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded">
                                                <label for="flexCheckDefault{{ $permission->id }}" class="cursor-pointer ml-2">{{ $permission->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="flex border-t border-slate-200/80 px-7 py-5 md:justify-end">
                                        <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 rounded-md font-medium text-primary dark:border-primary w-full border-primary/50 px-10 md:w-auto">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
<script>
    $('#CheckDefaultmain').click(function() {
        if ($(this).is(':checked')) {
            $('input[type= checkbox]').prop('checked', true);
        } else {
            $('input[type= checkbox]').prop('checked', false);
        }
    })
</script>
@endpush

@endsection
