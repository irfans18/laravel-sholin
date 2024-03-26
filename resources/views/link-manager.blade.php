<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form action="{{ route('link.store') }}" method="post">
                            @csrf
                            <div class="flex justify-center">
                                <input type="text" name="name" class="w-1/2 text-black rounded-full"
                                    placeholder="gimme a name">
                                <button type="submit"
                                    class="bg-blue-600 mx-2 px-4 text-white text-2xl font-bold rounded-full">
                                    +
                                </button>
                            </div>
                        </form>

                        {{-- big screen --}}
                        <div class="my-3 md:flex mx-12">
                            <table class="w-full ">
                                <thead class="bg-gray-600">
                                    <tr>
                                        <th class="text-sm px-4 py-3 lowercase w-1">#</th>
                                        <th class="text-sm px-4 py-3 lowercase text-start w-2/8">name</th>
                                        <th class="text-sm px-4 py-3 lowercase w-1/2">url</th>
                                        <th class="text-sm text-left px-4 py-3 lowercase w-1/12">visits</th>
                                        <th colspan="2" class="text-sm text-center px-4 py-3 lowercase w-1/12">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($links as $item)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr class="hover:bg-green-50/10">
                                            <td class="text-sm px-4 py-3 lowercase w-1">
                                                <button wire:click="editModal({{ $item }})"
                                                    class=" underline hover:cursor-pointer">
                                                    {{ $i }}
                                            </td>
                                            <td class="text-sm px-4 py-3 lowercase w-2/8">{{ $item->name }}</td>
                                            <td class="text-sm px-4 py-3 lowercase w-1/2">
                                                <span>real :</span><a class="underline italic text-purple-500"
                                                    href=" {{ $item->url }} " target="_blank">{{ $item->url }}</a>
                                                <hr>
                                                <span>pretty : </span><a class="underline italic text-purple-500"
                                                    href=" {{ env('APP_URL') . '/' . $item->name }} "
                                                    target="_blank">{{ env('APP_URL') . '/' . $item->name }}</a>
                                            </td>
                                            <td class="text-sm px-4 py-3 lowercase w-1/12">{{ $item->visits }}</td>
                                            <td class="text-sm px-4 py-3 lowercase w-1/12">
                                                <a href="{{ route('link.edit', [$item->id] ) }}">
                                                    <x-primary-button value="{{ $item}}" onclick="editModal({{ $item }})">
                                                        Edit
                                                    </x-primary-button>
                                                </a>
                                            </td>
                                            <td class="text-sm px-4 py-3 lowercase w-1/12">
                                                <a href="{{ route('link.delete', [$item->id] ) }}">
                                                    <x-danger-button onclick="deleteModal({{ $item->id }})">
                                                        Delete
                                                    </x-danger-button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- {{ $links->links() }} --}}



                        {{-- end modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function editModal(item) {
        //     alert(item)
        // }
    </script>
</x-app-layout>
