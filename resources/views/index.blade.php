<x-layout>
    <x-slot name="title">
        Delafret: Jaunākās ziņas
    </x-slot>

    <x-suggested :articles="$latestArticles" />
</x-layout>