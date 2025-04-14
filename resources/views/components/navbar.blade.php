@props(['showCreate' => false])

<nav class="fixed top-0 left-0 right-0 w-full overflow-x-hidden z-50">
    <div class="bg-gray-200 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:justify-between py-2">

                <!-- Left side (can be replaced with logo) -->
                <a href="{{ route('home') }}"
                   class="text-xl font-semibold text-gray-900 dark:text-white transition-colors duration-300">
                    Home
                </a>

                <!-- Right side (links + hamburger) -->
                <div class="flex flex-col sm:flex-row sm:justify-end space-y-2 sm:space-y-0 sm:space-x-4">

                    @if($showCreate)
                        @auth
                            <a href="{{ route('blog.create') }}"
                               class="text-xl font-semibold text-gray-900 dark:text-white transition-colors duration-300">
                                Create Post
                            </a>
                        @endauth
                    @endif

                    <a href="{{ route('blog.index') }}"
                       class="text-xl font-semibold text-gray-900 dark:text-white transition-colors duration-300">
                        Blog
                    </a>

                    <!-- Hamburger Button -->
                    <div class="relative" x-data="{ menuOpen: false }">
                        <button @click="menuOpen = !menuOpen"
                                class="rounded transition-colors duration-200 ease-in-out"
                                :class="{ 'bg-gray-300 dark:bg-gray-900': menuOpen }">
                            <svg class="w-7 h-7 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="menuOpen"
                             @click.outside="menuOpen = false"
                             x-transition
                             class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded shadow-lg z-50 transition-colors duration-300">
                            <ul class="flex flex-col">
                                <li>
                                    <button @click="dark = !dark"
                                            class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-white transition-colors duration-200">
                                        Toggle Dark Mode
                                    </button>
                                </li>
                                <!-- Add more dropdown items as needed -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
