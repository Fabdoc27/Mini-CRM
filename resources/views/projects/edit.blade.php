<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Project Form --}}
                    <form method="post" action="{{ route('projects.update', $project) }}" class="space-y-6">
                        @method('PUT')
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                                :value="old('title', $project->title)" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block w-full mt-1" type="text" name="description"
                                :value="old('description', $project->description)" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Deadline -->
                        <div>
                            <x-input-label for="deadline_at" :value="__('Deadline')" />
                            <x-text-input id="deadline_at" class="block w-full mt-1" type="date" name="deadline_at"
                                :value="old('deadline_at', $project->deadline_at)" required autofocus autocomplete="deadline_at" />
                            <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                        </div>

                        <!-- Assigned User -->
                        <div>
                            <x-input-label for="user_id" :value="__('Assigned User')" />
                            <select id="user_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @selected(old('user_id', $project->user_id) == $user->id)>
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <!-- Assigned Client -->
                        <div>
                            <x-input-label for="client_id" :value="__('Client')" />
                            <select id="client_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @selected(old('client_id', $project->client_id) == $client->id)>
                                        {{ $client->company_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="status">
                                @foreach (\App\Enums\ProjectStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', $project->status->value) == $status->value)>
                                        {{ $status->value }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
