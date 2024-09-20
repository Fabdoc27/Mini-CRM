<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Add Project --}}
                    <div class="mb-4 text-right">
                        <a href="{{ route('projects.create') }}">
                            <x-primary-button>Add new project</x-primary-button>
                        </a>
                    </div>

                    {{-- Project Table --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Assigned to
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Client
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deadline
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $project->title }}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $project->user->first_name }} {{ $project->user->last_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $project->client->company_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $project->deadline_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $project->status }}
                                        </td>
                                        <td class="px-6 py-4 space-x-4">
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                Edit
                                            </a>
                                            <form class="inline-flex" action="{{ route('projects.destroy', $project) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?')">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            No project avaiable.
                                        </th>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4 space-x-4"></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginate --}}
                    <div class="mt-4">{{ $projects->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
