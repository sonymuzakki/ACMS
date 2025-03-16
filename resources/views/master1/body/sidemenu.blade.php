<div class="side-menu__content h-full box bg-white/[0.95] rounded-none xl:rounded-xl z-20 relative w-[275px] duration-300 transition-[width] group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] overflow-hidden flex flex-col">
    <div
        class="flex-none hidden xl:flex items-center z-10 px-5 h-[65px] w-[275px] overflow-hidden relative duration-300 group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px]">
        <a class="flex items-center transition-[margin] duration-300 group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-0 group-[.side-menu--collapsed]:xl:ml-2"
            href="#">
            <div
                class="flex h-[34px] w-[34px] items-center justify-center rounded-lg bg-gradient-to-b from-theme-1 to-theme-2/80 transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:xl:-rotate-180">
                <div class="relative h-[16px] w-[16px] -rotate-45 [&_div]:bg-white">
                    <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                    <div class="absolute inset-0 m-auto h-[120%] w-[21%] rounded-full"></div>
                    <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                </div>
            </div>
            <div
                class="ml-3.5 font-medium transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0">
                ECHO
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
                    <a href="{{ route('master.json') }}"
                        class="side-menu__link {{ Route::is('master.json') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="gantt-chart-square"
                            class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Stock</div>
                    </a>
                </li>
                {{-- @endif --}}

                {{-- @if(Auth::user()->can('stock.menu'))
                    <li class="side-menu__divider">
                        STOCK
                    </li>
                    <li>
                        <a href="{{ route('master.json') }}"
                            class="side-menu__link {{ Route::is('master.json') ? 'side-menu__link--active' : '' }}">
                            <i data-tw-merge="" data-lucide="gantt-chart-square"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">Stock</div>
                        </a>
                    </li>
                @else
                    <p>User does not have the 'stock.menu' permission.</p>
                @endif --}}

                <li class="side-menu__divider">
                    ADMINISTRASI
                </li>
                <li>
                    <a href="{{ route('users.index') }}"
                        class="side-menu__link {{ Route::is('users.index') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="user-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">User</div>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('roles.index') }}" class="side-menu__link {{ Route::is('roles.index') ? 'side-menu__link--active' : '' }}">
                        <i class="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon "></i>
                        <div class="side-menu__link__title">Role</div>
                    </a>
                </li> --}}
                <li>
                    <a href="javascript:;" class="side-menu__link  {{ Route::is('permission.index1','all.roles.permission1','roles.index') ? 'side-menu__link--active' : '' }}">
                        <i data-tw-merge="" data-lucide="table2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                        <div class="side-menu__link__title">Role & Permission</div>
                        <i data-tw-merge="" data-lucide="chevron-down"
                            class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                    </a>
                    <!-- BEGIN: Second Child -->
                    <ul class="hidden">

                        <li>
                            <a href="{{ route('roles.index') }}" class="side-menu__link">
                                {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                                <i class="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon "></i>
                                <div class="side-menu__link__title">Role</div>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('permission.index1') }}" class="side-menu__link ">
                                <i data-tw-merge="" data-lucide="layout-panel-top"
                                    class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">
                                    Permission
                                </div>
                            </a>
                            <!-- BEGIN: Third Child -->
                            <!-- END: Third Child -->
                        </li>
                        <li>
                            <a href="{{ route('all.roles.permission1') }}" class="side-menu__link ">
                                <i data-tw-merge="" data-lucide="layout-panel-left"
                                    class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
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

            {{-- <li>
                <a href="echo-file-manager-list.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-right-inactive"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Manager List</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-file-manager-grid.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-top-close"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Manager Grid</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-point-of-sale.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-top-inactive"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Point of Sale</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-chat.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="mail-open" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Chat</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-calendar.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="calendar-range"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Calendar</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li> --}}

            <li class="side-menu__divider">
                MASTER
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link  {{ Route::is('permission.index1','all.roles.permission1','roles.index') ? 'side-menu__link--active' : '' }}">
                    <i data-tw-merge="" data-lucide="table2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Master</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">

                    <li>
                        <a href="{{ route('index.barang') }}" class="side-menu__link">
                            {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                            <i data-tw-merge="" data-lucide="layout-panel-top" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">Barang</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('index.pembayaran') }}" class="side-menu__link">
                            {{-- <i data-tw-merge="" data-lucide="fa-solid fa-users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i> --}}
                            <i data-tw-merge="" data-lucide="layout-panel-top" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">Pembayaran</div>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('permission.index1') }}" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-top"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Permission
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="{{ route('all.roles.permission1') }}" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-left"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
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

            <li>
                <a href="{{ route('master.merk') }}"
                    class="side-menu__link {{ Route::is('master.merk') ? 'side-menu__link--active' : '' }}">
                    <i data-tw-merge="" data-lucide="gantt-chart-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Merk</div>
                </a>
            </li>
            {{-- <li>
                <a href="echo-creative.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="album" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Creative</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dynamic.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="activity-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Dynamic</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-interactive.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="keyboard" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Interactive</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li> --}}
            {{-- <li class="side-menu__divider">
                USER MANAGEMENT
            </li>
            <li>
                <a href="echo-users.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Users</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-departments.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="cake-slice" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Departments</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-add-user.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package-plus" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Add User</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                PERSONAL DASHBOARD
            </li>
            <li>
                <a href="echo-profile-overview.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="presentation"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Profile Overview</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-events.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="calendar-range"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Events</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-achievements.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="medal" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Achievements</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-contacts.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="tablet-smartphone"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Contacts</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-default.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="snail" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Default</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                GENERAL SETTINGS
            </li>
            <li>
                <a href="echo-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="briefcase" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Profile Info</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-email-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="mail-check"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Email Settings</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-security.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="fingerprint"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Security</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-preferences.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="radar" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Preferences</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-two-factor-authentication.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="door-open" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Two-factor Authentication</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-device-history.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="keyboard" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Device History</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-notification-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="ticket" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Notification Settings</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-connected-services.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="bus-front" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Connected Services</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-social-media-links.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="podcast" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Social Media Links</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-account-deactivation.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package-x" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Account Deactivation</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                ACCOUNT
            </li>
            <li>
                <a href="echo-billing.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="percent-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Billing</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-invoice.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="database-zap"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Invoice</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                E-COMMERCE
            </li>
            <li>
                <a href="echo-categories.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-marked"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Categories</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-add-product.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="compass" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Add Product</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="table2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Products</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-product-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-top"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Product List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-product-grid.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-left"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Product Grid
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="sigma-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Transactions</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-transaction-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="divide-square"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Transaction List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-transaction-detail.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="plus-square"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Transaction Detail
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="file-archive"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Sellers</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-seller-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="file-image"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Seller List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-seller-detail.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="file-box"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Seller Detail
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-reviews.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="goal" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Reviews</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                AUTHENTICATIONS
            </li>
            <li>
                <a href="echo-login.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-key" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Login</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-register.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-lock" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Register</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                COMPONENTS
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="layout-panel-left"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Table</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-regular-table.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="flip-vertical"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Regular Table
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-tabulator.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="flip-horizontal"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Tabulator
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="memory-stick"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Overlay</div>
                    <i data-tw-merge="" data-lucide="chevron-down"
                        class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-modal.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="menu-square"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Modal
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-slideover.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="newspaper"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Slide Over
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-notification.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="panel-bottom"
                                class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Notification
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tab.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tab</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-accordion.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="pocket" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Accordion</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-button.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="plus-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Button</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-alert.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="presentation"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Alert</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-progress-bar.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="shield-ellipsis"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Progress Bar</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tooltip.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="clapperboard"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tooltip</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dropdown.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="flip-vertical"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Dropdown</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-typography.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="file-type2"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Typography</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-icon.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="aperture" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Icon</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-loading-icon.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="droplets" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Loading Icon</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-regular-form.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="gallery-horizontal-end"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Regular Form</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-datepicker.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="microwave" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Datepicker</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tom-select.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="disc3" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tom Select</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-file-upload.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="sandwich" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Upload</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-wysiwyg-editor.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="hop-off" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Wysiwyg Editor</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-validation.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="clipboard-type"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Validation</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-chart.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="pie-chart" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Chart</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-slider.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="kanban-square"
                        class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Slider</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-image-zoom.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="image" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Image Zoom</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li> --}}
            <!-- END: First Child -->
        </ul>
    </div>
</div>

{{-- <div class="side-menu__content h-full box bg-white/[0.95] rounded-none xl:rounded-xl z-20 relative w-[275px] duration-300 transition-[width] group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] overflow-hidden flex flex-col">
    <div class="flex-none hidden xl:flex items-center z-10 px-5 h-[65px] w-[275px] overflow-hidden relative duration-300 group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px]">
        <a class="flex items-center transition-[margin] duration-300 group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-0 group-[.side-menu--collapsed]:xl:ml-2" href="#">
            <div class="flex h-[34px] w-[34px] items-center justify-center rounded-lg bg-gradient-to-b from-theme-1 to-theme-2/80 transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:xl:-rotate-180">
                <div class="relative h-[16px] w-[16px] -rotate-45 [&_div]:bg-white">
                    <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                    <div class="absolute inset-0 m-auto h-[120%] w-[21%] rounded-full"></div>
                    <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                </div>
            </div>
            <div class="ml-3.5 font-medium transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0">
                ECHO
            </div>
        </a>
        <a class="toggle-compact-menu ml-auto hidden h-[20px] w-[20px] items-center justify-center rounded-full border border-slate-600/40 transition-[opacity,transform] hover:bg-slate-600/5 group-[.side-menu--collapsed]:xl:rotate-180 group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0 3xl:flex" href="#">
            <i data-tw-merge="" data-lucide="arrow-left" class="h-3.5 w-3.5 stroke-[1.3]"></i>
        </a>
    </div>
    <div class="scrollable-ref w-full h-full z-20 px-5 overflow-y-auto overflow-x-hidden pb-3 [-webkit-mask-image:-webkit-linear-gradient(top,rgba(0,0,0,0),black_30px)] [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent [&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/30">
        <ul class="scrollable">
            <!-- BEGIN: First Child -->
            <li class="side-menu__divider">
                DASHBOARDS
            </li>
            <li>
                <a href="echo-dashboard-overview-1.html" class="side-menu__link side-menu__link--active ">
                    <i data-tw-merge="" data-lucide="gauge-circle" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">E-Commerce</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-2.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="activity-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">CRM</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-3.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="album" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Hospital</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-4.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-marked" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Factory</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-5.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="hard-drive" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Banking</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-6.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="mouse-pointer-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Cafe</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-7.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="shield-half" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Crypto</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dashboard-overview-8.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="building" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Hotel</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                APPS
            </li>
            <li>
                <a href="echo-inbox.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="gantt-chart-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Inbox</div>
                    <div class="side-menu__link__badge">
                        4
                    </div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-file-manager-list.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-right-inactive" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Manager List</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-file-manager-grid.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-top-close" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Manager Grid</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-point-of-sale.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="panel-top-inactive" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Point of Sale</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-chat.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="mail-open" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Chat</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-calendar.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="calendar-range" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Calendar</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                UI WIDGETS
            </li>
            <li>
                <a href="echo-creative.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="album" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Creative</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dynamic.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="activity-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Dynamic</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-interactive.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="keyboard" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Interactive</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                USER MANAGEMENT
            </li>
            <li>
                <a href="echo-users.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Users</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-departments.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="cake-slice" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Departments</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-add-user.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package-plus" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Add User</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                PERSONAL DASHBOARD
            </li>
            <li>
                <a href="echo-profile-overview.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="presentation" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Profile Overview</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-events.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="calendar-range" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Events</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-achievements.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="medal" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Achievements</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-contacts.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="tablet-smartphone" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Contacts</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-profile-overview-default.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="snail" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Default</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                GENERAL SETTINGS
            </li>
            <li>
                <a href="echo-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="briefcase" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Profile Info</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-email-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="mail-check" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Email Settings</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-security.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="fingerprint" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Security</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-preferences.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="radar" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Preferences</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-two-factor-authentication.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="door-open" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Two-factor Authentication</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-device-history.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="keyboard" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Device History</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-notification-settings.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="ticket" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Notification Settings</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-connected-services.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="bus-front" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Connected Services</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-social-media-links.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="podcast" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Social Media Links</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-settings-account-deactivation.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package-x" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Account Deactivation</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                ACCOUNT
            </li>
            <li>
                <a href="echo-billing.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="percent-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Billing</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-invoice.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="database-zap" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Invoice</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                E-COMMERCE
            </li>
            <li>
                <a href="echo-categories.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-marked" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Categories</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-add-product.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="compass" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Add Product</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="table2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Products</div>
                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-product-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-top" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Product List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-product-grid.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="layout-panel-left" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Product Grid
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="sigma-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Transactions</div>
                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-transaction-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="divide-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Transaction List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-transaction-detail.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="plus-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Transaction Detail
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="file-archive" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Sellers</div>
                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-seller-list.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="file-image" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Seller List
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-seller-detail.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="file-box" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Seller Detail
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-reviews.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="goal" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Reviews</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                AUTHENTICATIONS
            </li>
            <li>
                <a href="echo-login.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-key" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Login</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-register.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="book-lock" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Register</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                COMPONENTS
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="layout-panel-left" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Table</div>
                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-regular-table.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="flip-vertical" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Regular Table
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-tabulator.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="flip-horizontal" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Tabulator
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="javascript:;" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="memory-stick" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Overlay</div>
                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-[1] w-5 h-5 side-menu__link__chevron"></i>
                </a>
                <!-- BEGIN: Second Child -->
                <ul class="hidden">
                    <li>
                        <a href="echo-modal.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="menu-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Modal
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-slideover.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="newspaper" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Slide Over
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li>
                        <a href="echo-notification.html" class="side-menu__link ">
                            <i data-tw-merge="" data-lucide="panel-bottom" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                            <div class="side-menu__link__title">
                                Notification
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                </ul>
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tab.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="package2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tab</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-accordion.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="pocket" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Accordion</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-button.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="plus-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Button</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-alert.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="presentation" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Alert</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-progress-bar.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="shield-ellipsis" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Progress Bar</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tooltip.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="clapperboard" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tooltip</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-dropdown.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="flip-vertical" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Dropdown</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-typography.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="file-type2" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Typography</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-icon.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="aperture" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Icon</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-loading-icon.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="droplets" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Loading Icon</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-regular-form.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="gallery-horizontal-end" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Regular Form</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-datepicker.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="microwave" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Datepicker</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-tom-select.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="disc3" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Tom Select</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-file-upload.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="sandwich" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">File Upload</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-wysiwyg-editor.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="hop-off" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Wysiwyg Editor</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-validation.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="clipboard-type" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Validation</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-chart.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="pie-chart" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Chart</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-slider.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="kanban-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Slider</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="echo-image-zoom.html" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="image" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Image Zoom</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <!-- END: First Child -->
        </ul>
    </div>
</div> --}}
