<x-main-layout>
    <div> <!-- Main introduction section -->
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white text-center mb-16">
            Welcome to my site!
        </h1>
        <p class="text-xl text-gray-700 dark:text-gray-100 text-center mb-2">
            Hey, I'm Eryk. I'm learning to build systems, software, and tools to make life better. Welcome to my dev hub - explore my projects below, or use the links above.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-100 text-center mb-2">
            Currently, I'm learning Laravel, server management, and game dev.
        </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:w-[500px] gap-10 px-6 mx-auto">
        <!-- Card 1 - Github -->
        <a href="https://github.com/XenoRoss" target="_blank" class="group block">
            <div class="bg-gray-500 rounded-lg text-center p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <img src="/images/github-mark.svg" alt="GitHub Logo" class="mx-auto w-20 h-20 grayscale group-hover:grayscale-0 transition duration-300" />
                <p class="mt-4 text-white text-lg group-hover:text-blue-300 transition">
                    My GitHub
                </p>
            </div>
        </a>
        <!-- Card 2 - Blog -->
        <a href="{{ route('home') }}" target="_blank" class="group block">
            <div class="bg-gray-500 rounded-lg text-center p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-auto w-20 h-20 grayscale group-hover:grayscale-0 transition duration-300">
                    <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                </svg>
                <p class="mt-4 text-white text-lg group-hover:text-blue-300 transition">
                    My Blog
                </p>
            </div>
        </a>
    </div>
</x-main-layout>