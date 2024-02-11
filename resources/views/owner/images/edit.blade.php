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
                        action="{{ route('owner.images.update', ['image' => $image->id]) }}"
                    >
                    @csrf
                    @method('PUT')
                    <div class="-m-2">
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value=
                                    @if (!is_null($image->title))
                                       {{ $image->title }}
                                    @else
                                       {{ 'タイトルなし' }}
                                    @endif

                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <x-thumbnail :filename="$image->filename" type="products"/>
                            </div>
                            <div class="flex justify-around p-2 w-full mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.images.index')}}'"class="text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">更新する</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form
                        id="delete_{{$image->id}}"
                        action="{{ route('owner.images.destroy', ['image' => $image->id]) }}"
                        method="POST"
                        class="mt-2"
                    >
                    @csrf
                    @method('delete')
                    <div class="flex justify-around p-2 w-full mt-4">
                        <a
                            href="#"
                            data-id="{{ $image->id }}"
                            onclick="deletePost(this)"
                            class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">
                        削除する
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
function deletePost(e) {
'use strict';
if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
}
</script>