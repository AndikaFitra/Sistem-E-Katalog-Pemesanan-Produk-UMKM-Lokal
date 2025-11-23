<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <i class="bi bi-shield-check text-2xl text-purple-600 mr-3"></i>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Superadmin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card dengan Gradient & Badge Superadmin -->
            <div class="bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 overflow-hidden shadow-xl rounded-2xl mb-8 transform hover:scale-[1.02] transition-all duration-300">
                <div class="p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                <h3 class="text-2xl font-bold mr-3">Selamat Datang, {{ Auth::user()->name }}! 👑</h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-400 text-purple-900">
                                    <i class="bi bi-star-fill mr-1"></i>
                                    SUPERADMIN
                                </span>
                            </div>
                            <p class="text-purple-100 text-lg">Anda memiliki akses penuh ke seluruh sistem</p>
                        </div>
                        <div class="hidden md:block">
                            <i class="bi bi-shield-shaded text-8xl text-white/20"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Total Admin -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl transform hover:scale-105 hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="bi bi-people text-2xl text-white"></i>
                            </div>
                            <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">
                                <i class="bi bi-person-check-fill mr-1"></i>
                                Aktif
                            </span>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Admin</h3>
                        <p class="text-4xl font-bold text-gray-900 mb-1">
                            {{ $totalAdmins }}
                        </p>
                        <p class="text-xs text-gray-500 flex items-center mt-2">
                            <i class="bi bi-shield-fill-check text-blue-500 mr-1"></i>
                            Admin terdaftar dalam sistem
                        </p>
                    </div>
                    <div class="bg-blue-50 px-6 py-3 border-t border-blue-100">
                        <a href="{{ route('superadmin.admins.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center justify-between group">
                            <span>Lihat Semua Admin</span>
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Admin Butuh Persetujuan -->
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl transform hover:scale-105 hover:shadow-2xl transition-all duration-300 border-2 border-red-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center shadow-lg animate-pulse">
                                <i class="bi bi-exclamation-circle text-2xl text-white"></i>
                            </div>
                            <span class="text-xs font-semibold text-red-600 bg-red-100 px-3 py-1 rounded-full animate-pulse">
                                <i class="bi bi-bell-fill mr-1"></i>
                                Perlu Aksi
                            </span>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Butuh Persetujuan</h3>
                        <p class="text-4xl font-bold text-red-600 mb-1">
                            {{ $pendingApprovals }}
                        </p>
                        <p class="text-xs text-gray-500 flex items-center mt-2">
                            <i class="bi bi-clock-history text-red-500 mr-1"></i>
                            Admin menunggu persetujuan Anda
                        </p>
                    </div>
                    <div class="bg-red-50 px-6 py-3 border-t border-red-100">
                        <a href="{{ route('superadmin.admins.index') }}" class="text-sm font-semibold text-red-600 hover:text-red-800 flex items-center justify-between group">
                            <span>Tinjau Sekarang</span>
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- System Overview Cards -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Total Kategori -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <i class="bi bi-tags-fill text-3xl text-green-600"></i>
                        <span class="text-2xl font-bold text-green-700">{{ \App\Models\Category::count() }}</span>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-700">Total Kategori</h4>
                    <p class="text-xs text-gray-500 mt-1">Kategori produk terdaftar</p>
                </div>

                <!-- Total Produk -->
                <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <i class="bi bi-box-seam-fill text-3xl text-purple-600"></i>
                        <span class="text-2xl font-bold text-purple-700">{{ \App\Models\Product::count() }}</span>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-700">Total Produk</h4>
                    <p class="text-xs text-gray-500 mt-1">Produk dalam sistem</p>
                </div>

                <!-- Total Pesanan -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <i class="bi bi-receipt-cutoff text-3xl text-orange-600"></i>
                        <span class="text-2xl font-bold text-orange-700">{{ \App\Models\Order::count() }}</span>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-700">Total Pesanan</h4>
                    <p class="text-xs text-gray-500 mt-1">Semua transaksi pesanan</p>
                </div>

            </div>

            <!-- Quick Actions untuk Superadmin -->
            <div class="mt-8 bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="bi bi-lightning-charge-fill text-yellow-500 mr-2"></i>
                    Aksi Superadmin
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ route('superadmin.admins.index') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl hover:from-blue-100 hover:to-cyan-100 transition-all duration-300 border border-blue-200 hover:border-blue-300 group">
                        <i class="bi bi-people-fill text-3xl text-blue-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-semibold text-gray-700">Kelola Admin</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl hover:from-green-100 hover:to-emerald-100 transition-all duration-300 border border-green-200 hover:border-green-300 group">
                        <i class="bi bi-graph-up-arrow text-3xl text-green-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-semibold text-gray-700">Lihat Laporan</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-orange-50 to-red-50 rounded-xl hover:from-orange-100 hover:to-red-100 transition-all duration-300 border border-orange-200 hover:border-orange-300 group">
                        <i class="bi bi-clipboard-data text-3xl text-orange-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-semibold text-gray-700">Monitor Pesanan</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>