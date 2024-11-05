<header class="max-w-screen-2xl mx-auto px-4 py-6">
    <nav class="flex justify-between items-center">

        {{-- Left Section --}}
        <div class="flex items-center md:gap-16 gap-4">
            {{-- Home Button / Icon --}}
            <a href="{{"" }}">
                <x-hi-mini-bars3-center-left class="w-6 h-6">
                    <!-- Replace with the HiMiniBars3CenterLeft icon SVG -->
                </x-hi-mini-bars3-center-left>
            </a>

            {{-- Search Input --}}
            <div class="relative sm:w-72 w-40 space-x-2">
                <svg class="absolute inline-block left-3 inset-y-2 w-5 h-5">
                    <!-- Replace with IoSearchOutline icon SVG -->
                </svg>
                <input type="text" placeholder="Search..."
                       class="bg-[#EAEAEA] w-full py-1 md:px-8 rounded-md focus:outline-none">
            </div>
        </div>

        {{-- Right Section --}}
        <div class="relative flex justify-between items-center space-x-2 md:space-x-3">

            {{-- User Dropdown or Login Button --}}
            <div>
                @auth
                    {{-- User Avatar & Dropdown --}}
                    <button onclick="toggleDropdown()">
                        <img src="{{ asset('path/to/avatar.png') }}" alt=""
                             class="w-7 h-7 rounded-full ring-2 ring-secondary">
                    </button>

                    {{-- Dropdown Menu --}}
                    <div id="userDropdown" class="hidden absolute right-0 w-48 mt-2 z-40 rounded-md bg-white shadow-lg">
                        <ul class="py-2">
                            @foreach($navigation as $item)
                                <li>
                                    <a href="{{ $item['url'] }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                                        {{ $item['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <a href="{{ "" }}">
                        <svg class="w-6 h-6">
                            <!-- Replace with HiOutlineUser icon SVG -->
                        </svg>
                    </a>
                @endauth
            </div>

            {{-- Wishlist Button --}}
            <button class="hidden sm:block">
                <svg class="w-6 h-6">
                    <!-- Replace with HiOutlineHeart icon SVG -->
                </svg>
            </button>

            {{-- Cart Button --}}
            <a href="{{ "" }}" class="flex items-center p-1 sm:px-6 px-2 rounded-md bg-primary">
                <svg class="w-6 h-6">
                    <!-- Replace with HiOutlineShoppingCart icon SVG -->
                </svg>
                <span class="text-sm font-semibold sm:ml-1">
{{--                    {{ Cart::count() ?? 0 }}--}}
                </span>
            </a>
        </div>
    </nav>
</header>

<script>
    function toggleDropdown() {
        let dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }
</script>

