<nav x-data="{ open: false }" class="bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo dengan icon dan gradient text -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center transition-transform hover:scale-105 duration-300">
                        <i class="bi bi-shop-window text-3xl text-white mr-2"></i>
                        <span class="text-white font-bold text-xl">Admin Panel</span>
                    </a>
                </div>

                <!-- Navigation Links Desktop -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                              {{ request()->routeIs('dashboard', 'admin.dashboard', 'superadmin.dashboard') 
                                 ? 'bg-white/20 text-white backdrop-blur-sm' 
                                 : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <i class="bi bi-speedometer2 mr-2"></i>
                        Dashboard
                    </a>

                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                        
                        <a href="{{ route('admin.categories.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('admin.categories.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-tags mr-2"></i>
                            Kategori
                        </a>
                        
                        <a href="{{ route('admin.products.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('admin.products.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-box-seam mr-2"></i>
                            Produk
                        </a>

                        <a href="{{ route('admin.tables.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('admin.tables.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-table mr-2"></i>
                            Meja
                        </a>

                        <a href="{{ route('admin.orders.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('admin.orders.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-receipt mr-2"></i>
                            Pesanan
                        </a>

                        <a href="{{ route('admin.reports.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('admin.reports.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-bar-chart-line mr-2"></i>
                            Laporan
                        </a>
                    @endif
                    
                    @if(auth()->user()->role == 'superadmin')
                        <a href="{{ route('superadmin.admins.index') }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300
                                  {{ request()->routeIs('superadmin.admins.*') 
                                     ? 'bg-white/20 text-white backdrop-blur-sm' 
                                     : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <i class="bi bi-people mr-2"></i>
                            Manajemen Admin
                        </a>
                    @endif

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border-2 border-white/30 text-sm leading-4 font-semibold rounded-lg text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 hover:border-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all duration-300 shadow-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mr-2 border border-white/30">
                                    <span class="text-white font-bold text-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                            <svg class="fill-current h-4 w-4 ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-indigo-50">
                            <p class="text-xs text-gray-500 font-medium">Signed in as</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1">{{ Auth::user()->email }}</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 mt-2 rounded-full text-xs font-semibold bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-sm">
                                <i class="bi bi-shield-check mr-1"></i>
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center hover:bg-purple-50 transition-colors duration-200">
                            <i class="bi bi-person-circle text-purple-600 mr-2"></i>
                            <span class="font-medium">Profile</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" 
                                onclick="event.preventDefault(); this.closest('form').submit();" 
                                class="flex items-center text-red-600 hover:bg-red-50 transition-colors duration-200">
                                <i class="bi bi-box-arrow-right mr-2"></i>
                                <span class="font-medium">Log Out</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none transition duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu Mobile -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-white/20 bg-white/5 backdrop-blur-md">
        <div class="pt-2 pb-3 space-y-1">
            
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                      {{ request()->routeIs('dashboard', 'admin.dashboard', 'superadmin.dashboard') 
                         ? 'bg-white/20 text-white' 
                         : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                <i class="bi bi-speedometer2 text-lg mr-3"></i>
                Dashboard
            </a>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                <a href="{{ route('admin.categories.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('admin.categories.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-tags text-lg mr-3"></i>
                    Kategori
                </a>
                
                <a href="{{ route('admin.products.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('admin.products.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-box-seam text-lg mr-3"></i>
                    Produk
                </a>

                <a href="{{ route('admin.tables.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('admin.tables.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-table text-lg mr-3"></i>
                    Meja
                </a>

                <a href="{{ route('admin.orders.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('admin.orders.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-receipt text-lg mr-3"></i>
                    Pesanan
                </a>

                <a href="{{ route('admin.reports.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('admin.reports.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-bar-chart-line text-lg mr-3"></i>
                    Laporan
                </a>
            @endif
            
            @if(auth()->user()->role == 'superadmin')
                <a href="{{ route('superadmin.admins.index') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg mx-2 transition-all duration-200
                          {{ request()->routeIs('superadmin.admins.*') 
                             ? 'bg-white/20 text-white' 
                             : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-people text-lg mr-3"></i>
                    Manajemen Admin
                </a>
            @endif

        </div>

        <!-- Responsive Settings Mobile -->
        <div class="pt-4 pb-3 border-t border-white/20">
            <div class="px-4">
                <div class="flex items-center mb-3">
                    <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mr-3 border-2 border-white/30">
                        <span class="text-white font-bold text-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-white/70">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                    <i class="bi bi-shield-check mr-1"></i>
                    {{ ucfirst(Auth::user()->role) }}
                </span>
            </div>

            <div class="mt-3 space-y-1 px-2">
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center px-4 py-3 text-base font-medium rounded-lg text-white/80 hover:bg-white/10 hover:text-white transition-all duration-200">
                    <i class="bi bi-person-circle text-lg mr-3"></i>
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center px-4 py-3 text-base font-medium rounded-lg text-red-300 hover:bg-red-500/20 hover:text-red-200 transition-all duration-200">
                        <i class="bi bi-box-arrow-right text-lg mr-3"></i>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>