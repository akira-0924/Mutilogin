<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            期限切れオーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">

                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr class="py-6">
                                    <th class="px-4 py-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限が切れた日</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expiredOwners as $owner)
                                <tr>
                                    <td class="px-4 py-4">{{ $owner->name }}</td>
                                    <td class="px-4 py-3">{{ $owner->email }}</td>
                                    <td class="px-4 py-3">{{ $owner->deleted_at->diffForHumans() }}</td>
                                    <td class="px-4 py-3">
                                        <form
                                            id="delete_{{$owner->id}}"
                                            action="{{ route('admin.expired-owners.destroy', ['owner'=> $owner->id])}}"
                                            method="POST"
                                        >
                                            @csrf
                                            <a href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">完全に削除</a>
                                        </form>
                                            {{-- <a href=“#” data-id="{{ $owner->id }}" onclick="deletePost(this)" >削除</a> --}}
                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </section>
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