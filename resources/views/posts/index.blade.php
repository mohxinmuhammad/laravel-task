<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700">Title</th>
                <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700">Content</th>
                <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $post->content }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 hover:underline mx-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
