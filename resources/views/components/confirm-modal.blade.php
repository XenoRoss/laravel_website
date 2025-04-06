<!-- Defines props that can be passed into the component (like title, action, etc.) -->
@props([
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'action' => '#',
    'method' => 'POST',
    'confirmLabel' => 'Confirm',    
])

<!-- Alpine creates a local state for showing/hiding the modal -->
<div x-data="{ showModal: false }" class="inline-block">
    <!-- Trigger button -->
    <div @click="showModal = true">
        {{ $trigger }}
    </div>

    <!-- Modal overlay -->
    <!-- This is used to toggle visibility -->
    <div x-show="showModal"
        @keydown.escape.window="showModal = false" 
        x-transition
         class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
         style="display: none;">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ $title }}</h2>
            <p class="text-gray-700 dark:text-gray-300 mb-6">{{ $message }}</p>

            <div class="flex justify-end space-x-4">
                <button @click="showModal = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-900 rounded">
                    Cancel
                </button>

                <form method="POST" action="{{ $action }}">
                    @csrf
                    @method($method)
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">
                        {{ $confirmLabel }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>