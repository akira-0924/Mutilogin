@props(['status' => 'info'])
@php
if(session('status') === "info")
{ $bgColor = 'bg-blue-300';}
if(session('status') === 'alert')
{$bgColor = 'bg-red-500';}
@endphp
@if(session('message'))
<div id="toaster" style="border-radius: 6px" class="{{ $bgColor }} w-1/2 mx-auto p-2 text-white">
{{ session('message' )}}
</div>
@endif
<script>
let element = document.getElementById('toaster')
setTimeout(() => {
    element.style.display = 'none';
}, 2000);
</script>
