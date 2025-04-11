<x-main-layout>
    <!-- Introduction Section -->
    <section class="text-center px-4 mb-16 transition-colors duration-300">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6 transition-colors duration-300">
            Welcome to my site!
        </h1>
        <p class="text-xl text-gray-700 dark:text-gray-100 mb-2 transition-colors duration-300">
            Hey, I'm Eryk. I'm learning to build systems, software, and tools to make life better.
            Welcome to my dev hub — explore my projects below, or use the links above.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-100 transition-colors duration-300">
            Currently, I'm learning Laravel, server management, and game dev.
        </p>
    </section>

    <!-- Card Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 gap-10 px-6 mx-auto sm:w-[500px] transition-colors duration-300">
        <!-- GitHub Card -->
        <x-link-card
            title="Github"
            href="https://github.com/XenoRoss"
            image="/images/github-mark.svg"
            :openNewTab="true"
        />
        
        <!-- Blog Card -->
        <x-link-card
            title="Blog"
            href="{{ route('blog.index') }}"
            image="/images/book-open-02.svg"
            :openNewTab="false"
        />
        
        <!-- itch.io Card -->
        <x-link-card
            title="itch.io"
            href="https://xenoross.itch.io/"
            image="/images/itchio-textless-black.svg"
            :openNewTab="true"
        />

        <!-- About Card -->
        <x-link-card
            title="About"
            href="{{ route('about') }}"
            image="/images/message-question-square.svg"
            :openNewTab="false"
        />
    </section>
</x-main-layout>
