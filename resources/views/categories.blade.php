<!-- resources/views/categories/index.blade.php -->

<x-layout>
    <main class="px-32 py-24">
        <!-- Categories List (Vertical Full Width) -->
        <div class="space-y-8">
            @foreach ($categories as $category)
                <!-- Dynamic Category Cards -->
                <x-categories.card_category :path="route('categories.show', $category->id_222290)" title="{{ $category->nama_222290 }}"
                    desc="{{ $category->deskripsi_222290 }}" image="{{ $category->path_img_222290 }}">
                </x-categories.card_category>
            @endforeach
        </div>
    </main>
</x-layout>
