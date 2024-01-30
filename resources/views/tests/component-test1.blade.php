<x-tests.app>
    <x-slot name="header">ヘッダー１</x-slot>
    Component1
    <x-tests.card title="タイトル1" content="コンテンツ1" :message="$message" />
    <x-tests.card title="タイトル1" />
    <x-tests.card title="CSS変更" class="bg-red-300" />
</x-tests.app>
