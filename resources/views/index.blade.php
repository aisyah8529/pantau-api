<x-layouts.app>
    <div class="flex flex-col justify-center items-center min-h-screen">
        <img class="mb-5" src="{{ url('pantau.jpeg') }}" style="width: 15%">
        <span>{{ config('app.name') }} (v{{ config('app.version') }}, {{ config('app.env') }})</span>
        <span>Up & Running</span>
    </div>
</x-layouts.app>