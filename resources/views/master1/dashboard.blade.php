@extends('master1.master')
@section('title','Dashboard')
@section('br1','Dashboard')
@section('main')

<div class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
    <div class="mt-16 px-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div>
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                Trust UC Statistic
                            </div>
                            <!-- Filter Dashboard -->
                            <!-- <ul data-tw-merge="" role="tablist" class="p-0.5 border dark:border-darkmode-400 flex box w-auto rounded-[0.6rem] border-slate-200 bg-white group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] md:ml-auto">
                                <li id="example-1-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                                    <button data-tw-merge="" data-tw-target="#example-1" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 active w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Daily</button>
                                </li>
                                <li id="example-2-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                                    <button data-tw-merge="" data-tw-target="#example-2" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Monthly</button>
                                </li>
                                <li id="example-3-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                                    <button data-tw-merge="" data-tw-target="#example-3" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Yearly</button>
                                </li>
                            </ul> -->
                        </div>
                        <div class="tab-content box box--stacked mt-3.5">
                            <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-1" role="tabpanel" aria-labelledby="example-1-tab" class="tab-pane active flex flex-col gap-2 p-1.5 leading-relaxed xl:flex-row">
                                <div class="grid w-full grid-cols-3 gap-2">
                                    <div class="box relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border-0 border-slate-200/60 bg-slate-50 bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85] p-5 before:absolute before:right-0 before:top-0 before:-mr-[62%] before:h-[130%] before:w-full before:rotate-45 before:bg-gradient-to-b before:from-black/[0.15] before:to-transparent before:content-[''] sm:col-span-2 xl:col-span-1">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/10">
                                            <i data-tw-merge="" data-lucide="database" class="stroke-[1] h-6 w-6 fill-white/10 text-white"></i>
                                        </div>
                                        <div class="mt-12 flex items-center">
                                            <div class="text-2xl font-medium text-white">
                                                {{ $mobil }}
                                            </div>
                                            <!-- Persen up down -->
                                            <!-- <div class="ml-3.5 flex items-center rounded-full border border-success/50 bg-success/50 py-[2px] pl-[7px] pr-1 text-xs font-medium text-white/90">
                                                12%
                                                <i data-tw-merge="" data-lucide="chevron-up" class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div> -->
                                        </div>
                                        <div class="mt-1 text-base text-white/70">
                                            TOTAL UNIT
                                        </div>
                                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown absolute right-0 top-0 mr-5 mt-5"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-6 w-6 fill-white/70 stroke-white/70"></i>
                                            </button>
                                            <!-- Action -->
                                            <!-- <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                    <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="copy" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                        Copy
                                                        Link</a>
                                                    <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="trash" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                        Delete</a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-primary/10 bg-primary/10">
                                            <i data-tw-merge="" data-lucide="app-window" class="stroke-[1] h-6 w-6 fill-primary/10 text-primary"></i>
                                        </div>
                                        <div class="mt-12 flex items-center">
                                            <div class="text-2xl font-medium">{{ $mobilSold }}</div>
                                            <!-- <div class="ml-3.5 flex items-center rounded-full border border-danger/50 bg-danger/70 py-[2px] pl-[7px] pr-1 text-xs font-medium text-white/90">
                                                3%
                                                <i data-tw-merge="" data-lucide="chevron-down" class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div> -->
                                        </div>
                                        <div class="mt-1 text-base text-slate-500">
                                            TOTAL UNIT SOLDOUT
                                        </div>
                                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown absolute right-0 top-0 mr-5 mt-5"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-6 w-6 fill-slate-400/70 stroke-slate-400/70"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                                            <i data-tw-merge="" data-lucide="box" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                                        </div>
                                        <div class="mt-12 flex items-center">
                                            <div class="text-2xl font-medium">{{ $mobilAvailable }}</div>
                                        </div>
                                        <div class="mt-1 text-base text-slate-500">
                                            TOTAL UNIT AVAILABLE
                                        </div>
                                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown absolute right-0 top-0 mr-5 mt-5"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-6 w-6 fill-slate-400/70 stroke-slate-400/70"></i>
                                            </button>
                                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-2" role="tabpanel" aria-labelledby="example-2-tab" class="tab-pane p-5 leading-relaxed"></div>
                            <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-3" role="tabpanel" aria-labelledby="example-3-tab" class="tab-pane p-5 leading-relaxed"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
