@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <!-- Categories List (Vertical Full Width) -->
    <div class="space-y-8 px-32 mt-28">
        @foreach ($categories as $category)
            <!-- Dynamic Category Cards -->
            @include('components.categories.card_category', [
                'path' => route('categories.show', $category->id_222290),
                'title' => $category->nama_222290,
                'desc' => $category->deskripsi_222290,
                'image' => Str::startsWith($category->path_img_222290, 'http')
                    ? $category->path_img_222290
                    : asset('storage/' . $category->path_img_222290),
            ])
        @endforeach
    </div>
@endsection
