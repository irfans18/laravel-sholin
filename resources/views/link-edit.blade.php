<!-- resources/views/edit.blade.php -->
<x-guest-layout>
    <form method="POST" action="{{ route('link.edit', $link->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-white font-medium">Name</label>
            <div class="mt-1">
                <input type="text" name="name" id="name" value="{{ $link->name }}"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="mt-4">
            <label for="url" class="block text-white font-medium text-gray-700">URL</label>
            <div class="mt-1">
                <input type="text" name="url" id="url" value="{{ $link->url }}"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="mt-4">
            <label for="visit_count" class="block text-white font-medium text-gray-700">Visit Count</label>
            <div class="mt-1">
                <input disabled type="number" name="visit_count" id="visit_count" value="{{ $link->visits }}"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
    </form>
</x-guest-layout>
