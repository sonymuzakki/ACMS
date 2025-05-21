<div class="side-menu__content h-full box bg-white/[0.95] rounded-none xl:rounded-xl z-20 relative w-[275px] duration-300 transition-[width] group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] overflow-hidden flex flex-col">
    <div
        class="flex-none hidden xl:flex items-center z-10 px-5 h-[65px] w-[275px] overflow-hidden relative duration-300 group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px]">
        <a class="flex items-center transition-[margin] duration-300 group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-0 group-[.side-menu--collapsed]:xl:ml-2"
            href="#">
            {{-- <div class="flex h-[34px] w-[34px] items-center justify-center rounded-lg bg-gradient-to-b from-theme-1 to-theme-2/80 transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:xl:-rotate-180">
                <div class="relative h-[16px] w-[16px] -rotate-45 [&_div]:bg-white">
                    <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                    <div class="absolute inset-0 m-auto h-[120%] w-[21%] rounded-full"></div>
                    <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                </div>
            </div> --}}
            <div class="ml-3.5 font-medium transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0">
                Aretha Cell
            </div>
        </a>
        <a class="toggle-compact-menu ml-auto hidden h-[20px] w-[20px] items-center justify-center rounded-full border border-slate-600/40 transition-[opacity,transform] hover:bg-slate-600/5 group-[.side-menu--collapsed]:xl:rotate-180 group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0 3xl:flex"
            href="#">
            <i data-tw-merge="" data-lucide="arrow-left" class="h-3.5 w-3.5 stroke-[1.3]"></i>
        </a>
    </div>
    <div
        class="scrollable-ref w-full h-full z-20 px-5 overflow-y-auto overflow-x-hidden pb-3 [-webkit-mask-image:-webkit-linear-gradient(top,rgba(0,0,0,0),black_30px)] [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent [&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/30">
        <ul class="scrollable">
            <!-- BEGIN: First Child -->
                <li class="side-menu__divider">
                    DASHBOARDS
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__link {{ Route::is('dashboard') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="activity-square"
                            class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Dashboard</div>
                    </a>
                </li>

                {{-- @if(Auth::user()->hasPermissionTo('stock')) --}}
                <li class="side-menu__divider">
                    STOCK
                </li>
                <li>
                    <a href="{{ route('stock.index') }}"
                        class="side-menu__link {{ Route::is('master.json') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="gantt-chart-square"
                            class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Stock</div>
                    </a>
                </li>
                {{-- @endif --}}

                {{-- @if(Auth::user()->can('stock.menu')) --}}
                    <li class="side-menu__divider">
                        FINANCE
                    </li>

                    <li>
                        <a href="{{ route('finance.index') }}" class="side-menu__link {{ Route::is('finance.index') ? 'side-menu__link--active' : '' }}">
                            <i data-tw-merge="" data-lucide="Wallet"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">Pembelian</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('finance.penjualan.index') }}" class="side-menu__link {{ Route::is('finance.penjualan.index') ? 'side-menu__link--active' : '' }}">
                            <i data-tw-merge="" data-lucide="Dollar-Sign"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">Penjualan</div>
                        </a>
                    </li>
                {{-- @else
                    <p>User does not have the 'stock.menu' permission.</p>
                @endif --}}

                <li class="side-menu__divider">
                    ADMINISTRASI
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="side-menu__link {{ Route::is('users.index') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="user-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">User</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu__link  {{ Route::is('permission.index1','all.roles.permission1','roles.index') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="User-Check" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Role & Permission</div>
                        <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                    </a>
                    <!-- BEGIN: Second Child -->
                    <ul class="hidden">
                        <li>
                            <a href="{{ route('roles.index') }}" class="side-menu__link">
                                <i data-tw-merge="" data-lucide="Shield-check" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Role</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('permission.index1') }}" class="side-menu__link ">
                                <i data-tw-merge="" data-lucide="lock" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">
                                    Permission
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all.roles.permission1') }}" class="side-menu__link ">
                                <i data-tw-merge="" data-lucide="Settings" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">
                                    Permission Role Setup
                                </div>
                            </a>
                            <!-- BEGIN: Third Child -->
                            <!-- END: Third Child -->
                        </li>
                    </ul>
                    <!-- END: Second Child -->
                </li>

            <!-- Master Data -->
                <li class="side-menu__divider">
                    MASTER DATA
                </li>
                <li>
                    <a href="javascript:;" class="side-menu__link  {{ Route::is('index.pembayaran','index.satuan','index.kategori','index.brand','index.supplier','index.pelanggan','index.produk','index.jenis_transaksi') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="table2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Master</div>
                        <i data-tw-merge="" data-lucide="chevron-down"
                            class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                    </a>
                    <!-- BEGIN: Second Child -->
                    <ul class="hidden">

                        <li>
                            <a href="{{ route('index.produk') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="box" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Produk</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.pembayaran') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="Building2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Bank</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.satuan') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="ruler" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Satuan</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.kategori') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide ="Tags" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Kategori</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.brand') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="bookmark" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Brand</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.supplier') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="truck" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Supplier</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.pelanggan') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="Users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">pelanggan</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.jenis_transaksi') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i data-tw-merge="" data-lucide="Clipboard-List" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Jenis Transaksi</div>
                            </a>
                        </li>
                    </ul>
                    <!-- END: Second Child -->
                </li>
            <!-- End Master Data -->

            <li>
                <a href="{{ route('master.merk') }}"
                    class="side-menu__link {{ Route::is('master.merk') ? 'side-menu__link--active' : '' }}">
                    <i data-tw-merge="" data-lucide="gantt-chart-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Merk</div>
                </a>
            </li>
        </ul>
    </div>
</div>
