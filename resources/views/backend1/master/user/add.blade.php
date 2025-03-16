@extends('master1.master')
@section('title', 'Trust UC - Data Mobil')
@section('br1', 'Users')
@section('br2', 'Add')
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

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
                                <form id="user-form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Name</div>
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
                                            <input type="text" placeholder="Nama" name="name" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                        </div>
                                    </div>

                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Email</div>
                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Please provide a valid email address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <input type="email" placeholder="Email" name="email" class="w-full text-sm border-slate-200 shadow-sm rounded-md" autofocus>
                                        </div>
                                    </div>

                                    {{-- <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Password</div>
                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Please provide a secure password minimal 8 character
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <input type="password" placeholder="******" name="password" id="password" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                            <input data-tw-merge type="checkbox" id="showPassword" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" value="">
                                            <label data-tw-merge for="showPassword" class="cursor-pointer ml-2">Show Password</label>
                                        </div>


                                    </div> --}}
                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Password</div>
                                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Please provide a secure password minimal 8 characters.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <input type="password" placeholder="******" name="password" id="password" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                        </div>
                                    </div>


                                    <div class="mt-5 block flex-col pt-5 sm:flex xl:flex-row xl:items-center">
                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Role</div>
                                                </div>
                                                <div class="mt-1.5 text-xs text-slate-500/80 xl:mt-3">
                                                    Choose your Role.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                            <select name="role_id" class="w-full text-sm border-slate-200 shadow-sm rounded-md">
                                                <option value="" >Select Option ..</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

@push('childs-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
    $('#user-form').on('submit', function(e) {
        e.preventDefault(); // Mencegah pengiriman formulir secara default

        var formData = new FormData(this); // Ambil data formulir

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                toastr.success('Data berhasil disimpan!');
                // Opsional: reset form atau lakukan tindakan lain
                $('#user-form')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                toastr.error('Gagal menyimpan data.');
            }
        });
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    });
</script>

@endpush

@endsection
