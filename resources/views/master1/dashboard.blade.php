@extends('master1.master')
@section('title', 'Dashboard')
@section('br1', 'Dashboard')
@section('main')

    <div
        class="content transition-[margin,width] duration-100 xl:pl-3.5 pt-[54px] pb-16 relative z-10 group mode content--compact xl:ml-[275px] mode--light [&.content--compact]:xl:ml-[91px]">
        <div class="mt-16 px-5">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12 2xl:col-span-9">
                        <div>
                            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    Performance Insights
                                </div>
                            </div>
                            <div class="mt-3.5">
                                <div class="box box--stacked flex flex-col gap-3 p-3 xl:flex-row">
                                    <div>
                                        <div
                                            class="relative z-10 flex flex-1 flex-col items-center gap-5 overflow-hidden rounded-[0.6rem] bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85] px-10 py-12 before:absolute before:left-0 before:top-0 before:-ml-[35%] before:hidden before:h-[130%] before:w-full before:-rotate-[38deg] before:bg-gradient-to-b before:from-black/[0.08] before:to-transparent before:content-[''] lg:flex-row xl:w-[300px] xl:flex-col xl:items-start xl:gap-14 xl:py-9 before:xl:block">
                                            <div>
                                                <div
                                                    class="flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/10">
                                                    <i data-tw-merge="" data-lucide="credit-card"
                                                        class="stroke-[1] h-6 w-6 fill-white/10 text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center text-base text-white lg:text-left">
                                                    Total Pendapatan
                                                </div>
                                                <div class="mt-2 flex items-center justify-center lg:justify-start">
                                                    <div class="text-2xl font-medium text-white">
                                                        $92,464.00
                                                    </div>
                                                    <div
                                                        class="ml-2.5 flex items-center rounded-full border border-success/50 bg-success/50 py-[2px] pl-[7px] pr-1 text-xs font-medium text-white/90">
                                                        12%
                                                        <i data-tw-merge="" data-lucide="chevron-up"
                                                            class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-center leading-normal text-white/70 xl:text-left">
                                                    The total revenue generated from room bookings and hotel
                                                    services.
                                                </div>
                                            </div>
                                            <div class="w-52 lg:ml-auto xl:ml-0 xl:w-full">
                                                <a data-tw-merge="" href="#"
                                                    class="transition duration-200 border shadow-sm inline-flex items-center font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed rounded-full relative w-full justify-start border-white/20 bg-white/10 px-4 py-2.5 text-white hover:bg-white/[0.15]">Show
                                                    full reports
                                                    <div
                                                        class="absolute right-0 mr-0.5 flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/10">
                                                        <i data-tw-merge="" data-lucide="arrow-right"
                                                            class="stroke-[1] h-4 w-4"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex w-full flex-col rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 sm:px-8 sm:py-7">
                                        <div
                                            class="mt-6 flex flex-1 flex-col gap-y-5 sm:mb-4 sm:mt-8 md:flex-row lg:mt-6 xl:mb-0">
                                            <div class="grid grid-cols-2 gap-5 md:-mb-4 md:-mt-2 xl:gap-0">
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4,135</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                                                            -5%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Room Type Distribution - Standard
                                                        </span>
                                                        <a data-placement="top"
                                                            title="Percentage of Standard rooms occupied"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">9,538</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                                                            -6%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-Out Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked out today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4.5</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                                                            4%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Average Guest Rating
                                                        </span>
                                                        <a data-placement="top" title="Average rating given by guests"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">2,442</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                                                            10%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-In Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked in today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-5 md:mx-auto md:-mb-4 md:-mt-2 xl:gap-0">
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4,135</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                                                            -5%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Room Type Distribution - Standard
                                                        </span>
                                                        <a data-placement="top"
                                                            title="Percentage of Standard rooms occupied"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">9,538</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                                                            -6%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-Out Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked out today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4.5</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs">
                                                            4%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Average Guest Rating
                                                        </span>
                                                        <a data-placement="top" title="Average rating given by guests"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">2,442</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs">
                                                            10%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-In Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked in today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-5 md:-mb-4 md:-mt-2 xl:gap-0">
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4,135</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs">
                                                            -5%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Room Type Distribution - Standard
                                                        </span>
                                                        <a data-placement="top"
                                                            title="Percentage of Standard rooms occupied"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">9,538</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs">
                                                            -6%
                                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-Out Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked out today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">4.5</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                                                            4%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Average Guest Rating
                                                        </span>
                                                        <a data-placement="top" title="Average rating given by guests"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-2 flex flex-1 flex-col justify-center sm:col-span-1 md:col-span-2">
                                                    <div class="mb-1.5 flex items-center">
                                                        <div class="text-base">2,442</div>
                                                        <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                                                            10%
                                                            <i data-tw-merge="" data-lucide="chevron-up"
                                                                class="stroke-[1] ml-px h-4 w-4"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center text-slate-500">
                                                        <span class="truncate sm:max-w-[9rem]">
                                                            Checked-In Guests
                                                        </span>
                                                        <a data-placement="top" title="Number of guests checked in today"
                                                            class="tooltip cursor-pointer"><i data-tw-merge=""
                                                                data-lucide="info"
                                                                class="ml-1.5 h-3.5 w-3.5 stroke-[1.3] text-slate-400"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 2xl:col-span-3">
                        <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                            <div class="col-span-12 lg:col-span-4 2xl:col-span-12">
                                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                    <div class="text-base font-medium group-[.mode--light]:text-white">
                                        Current Balance
                                    </div>
                                </div>
                                <div class="box box--stacked mt-3.5 p-5">
                                    <div data-tw-merge="" data-tw-placement="bottom-end"
                                        class="dropdown absolute right-0 top-0 mr-5 mt-5"><button
                                            data-tw-toggle="dropdown" aria-expanded="false"
                                            class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge=""
                                                data-lucide="more-vertical"
                                                class="stroke-[1] h-6 w-6 fill-slate-400/70 stroke-slate-400/70"></i>
                                        </button>
                                        <div data-transition="" data-selector=".show"
                                            data-enter="transition-all ease-linear duration-150"
                                            data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave="transition-all ease-linear duration-150"
                                            data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            class="dropdown-menu absolute z-[9999] hidden">
                                            <div data-tw-merge=""
                                                class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                <a
                                                    class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                                        data-tw-merge="" data-lucide="copy"
                                                        class="stroke-[1] mr-2 h-4 w-4"></i>
                                                    Copy Link</a>
                                                <a
                                                    class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                                        data-tw-merge="" data-lucide="trash"
                                                        class="stroke-[1] mr-2 h-4 w-4"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                                        <i data-tw-merge="" data-lucide="box"
                                            class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                                    </div>
                                    <div class="mb-6 mt-8 lg:mb-7 lg:mt-16 2xl:mb-5 2xl:mt-7">
                                        <div class="text-base text-slate-500">Available</div>
                                        <div class="mt-1 flex items-center text-2xl font-medium">
                                            <span class="text-[1.3rem]">$</span>
                                            <span class="ml-px mr-1.5">435,220,00</span>
                                            <span class="mt-0.5 text-base">USD</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-12">
                                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                    <div
                                        class="text-base font-medium lg:group-[.mode--light]:text-white 2xl:group-[.mode--light]:text-current">
                                        Money In
                                    </div>
                                </div>
                                <div class="box box--stacked mt-3.5 p-5">
                                    <div data-tw-merge="" data-tw-placement="bottom-end"
                                        class="dropdown absolute right-0 top-0 mr-5 mt-5"><button
                                            data-tw-toggle="dropdown" aria-expanded="false"
                                            class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge=""
                                                data-lucide="more-vertical"
                                                class="stroke-[1] h-6 w-6 fill-slate-400/70 stroke-slate-400/70"></i>
                                        </button>
                                        <div data-transition="" data-selector=".show"
                                            data-enter="transition-all ease-linear duration-150"
                                            data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave="transition-all ease-linear duration-150"
                                            data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            class="dropdown-menu absolute z-[9999] hidden">
                                        </div>
                                    </div>
                                    <div class="mb-5 border-b border-dashed border-slate-300/70 pb-5">
                                        <div class="text-base text-slate-500">Total received</div>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center text-xl font-medium">
                                                <span class="mr-px">$</span>2,176,221
                                                <span class="ml-1.5 text-sm">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-auto h-[80px]">
                                        <canvas class="chart report-bar-chart-3 relative z-10 -ml-1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-12">
                                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                    <div
                                        class="text-base font-medium lg:group-[.mode--light]:text-white 2xl:group-[.mode--light]:text-current">
                                        Money Out
                                    </div>
                                </div>
                                <div class="box box--stacked mt-3.5 p-5">
                                    <div data-tw-merge="" data-tw-placement="bottom-end"
                                        class="dropdown absolute right-0 top-0 mr-5 mt-5"><button
                                            data-tw-toggle="dropdown" aria-expanded="false"
                                            class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge=""
                                                data-lucide="more-vertical"
                                                class="stroke-[1] h-6 w-6 fill-slate-400/70 stroke-slate-400/70"></i>
                                        </button>
                                        <div data-transition="" data-selector=".show"
                                            data-enter="transition-all ease-linear duration-150"
                                            data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave="transition-all ease-linear duration-150"
                                            data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                            data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                            class="dropdown-menu absolute z-[9999] hidden">
                                        </div>
                                    </div>
                                    <div class="mb-5 border-b border-dashed border-slate-300/70 pb-5">
                                        <div class="text-base text-slate-500">
                                            Total sent or spent
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center text-xl font-medium">
                                                <span class="mr-px">$</span>4,176,132
                                                <span class="ml-1.5 text-sm">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-auto h-[80px]">
                                        <canvas class="chart report-bar-chart-4 relative z-10 -ml-1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 flex flex-col gap-y-10 2xl:col-span-9">
                        <div>
                            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium 2xl:group-[.mode--light]:text-white">
                                    Quick Links
                                </div>
                            </div>
                            <div class="box box--stacked mt-3.5">
                                <div
                                    class="grid grid-cols-2 gap-y-5 border-b px-5 py-10 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-primary/10 bg-primary/10">
                                            <i data-tw-merge="" data-lucide="credit-card"
                                                class="stroke-[1] h-6 w-6 fill-primary/10 text-primary"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Business Tools</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                                            <i data-tw-merge="" data-lucide="wallet-cards"
                                                class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Invoicing</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                                            <i data-tw-merge="" data-lucide="airplay"
                                                class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Request Money</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-success/10 bg-success/10">
                                            <i data-tw-merge="" data-lucide="banknote"
                                                class="stroke-[1] h-6 w-6 fill-success/10 text-success"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Send Money</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-pending/10 bg-pending/10">
                                            <i data-tw-merge="" data-lucide="users"
                                                class="stroke-[1] h-6 w-6 fill-pending/10 text-pending"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Share Profile</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-primary/10 bg-primary/10">
                                            <i data-tw-merge="" data-lucide="shopping-bag"
                                                class="stroke-[1] h-6 w-6 fill-primary/10 text-primary"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Checkout</div>
                                    </a>
                                    <a class="flex flex-col items-center" href="#">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-warning/10 bg-warning/10">
                                            <i data-tw-merge="" data-lucide="circle-dollar-sign"
                                                class="stroke-[1] h-6 w-6 fill-warning/10 text-warning"></i>
                                        </div>
                                        <div class="mt-3 text-slate-500">Accept Payments</div>
                                    </a>
                                </div>
                                {{-- <div
                                    class="flex flex-col items-center gap-5 rounded-b-lg bg-slate-50 px-6 pb-6 pt-5 md:flex-row">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                                        <i data-tw-merge="" data-lucide="box"
                                            class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                                    </div>
                                    <div class="text-center md:text-left">
                                        <div class="mt-1 text-lg font-medium">Invoicing</div>
                                        <div class="mt-1 leading-relaxed text-slate-600">
                                            Send an invoice or estimate in minutes. Customers can pay with
                                            cards or Tailwise.
                                        </div>
                                    </div>
                                    <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row md:ml-auto">
                                        <a data-tw-merge="" href="#"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed rounded-full w-full sm:w-36">Not
                                            Now</a>
                                        <a data-tw-merge="" href="#"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&:hover:not(:disabled)]:bg-primary/10 rounded-full w-full border-primary/50 sm:w-36">Learn
                                            More</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
