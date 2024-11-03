<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl">MES System</a>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="{{ route('production_orders.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Production Orders</a>
                        <a href="{{ route('inspections.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inspections</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile Dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm text-white focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="ml-4 text-gray-300 hover:text-white">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
