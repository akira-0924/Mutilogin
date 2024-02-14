<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    <form
                        method="POST"
                        action="{{ route('owner.products.store')}}"
                    >
                    @csrf
                    <div class="-m-2">
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <select name="category">
                                    @foreach ($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->secondary as $secondary)
                                        <option value="{{ $secondary->id }}">
                                            {{ $secondary->name }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                            </div>
                            <x-select-image name="image1" />
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="flex justify-around p-2 w-full mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.products.index')}}'"class="text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録する</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a data-micromodal-trigger="modal-1" href='javascript:;'>Open Modal Dialog</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>