<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Client Form --}}
                    <form method="post" action="{{ route('clients.update', $client) }}" class="space-y-6">
                        @method('PUT')
                        @csrf

                        <!-- Contact Name -->
                        <div>
                            <x-input-label for="contact_name" :value="__('Contact Name')" />
                            <x-text-input id="contact_name" class="block w-full mt-1" type="text" name="contact_name"
                                :value="old('contact_name', $client->contact_name)" required autofocus autocomplete="contact_name" />
                            <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                        </div>

                        <!-- Contact Email -->
                        <div class="mt-4">
                            <x-input-label for="contact_email" :value="__('Contact Email')" />
                            <x-text-input id="contact_email" class="block w-full mt-1" type="email"
                                name="contact_email" :value="old('contact_email', $client->contact_email)" required autocomplete="contact_email" />
                            <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                        </div>

                        <!-- Contact Phone -->
                        <div class="mt-4">
                            <x-input-label for="contact_phone_number" :value="__('Contact Phone Number')" />
                            <x-text-input id="contact_phone_number" class="block w-full mt-1" type="text"
                                name="contact_phone_number" :value="old('contact_phone_number', $client->contact_phone_number)" required
                                autocomplete="contact_phone_number" />
                            <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                        </div>

                        <!-- Company Name -->
                        <div class="mt-4">
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" class="block w-full mt-1" type="text" name="company_name"
                                :value="old('company_name', $client->company_name)" required autocomplete="company_name" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>

                        <!-- Company Address -->
                        <div class="mt-4">
                            <x-input-label for="company_address" :value="__('Company Address')" />
                            <x-text-input id="company_address" class="block w-full mt-1" type="text"
                                name="company_address" :value="old('company_address', $client->company_address)" required autocomplete="company_address" />
                            <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                        </div>

                        <!-- Company City -->
                        <div class="mt-4">
                            <x-input-label for="company_city" :value="__('Company City')" />
                            <x-text-input id="company_city" class="block w-full mt-1" type="text" name="company_city"
                                :value="old('company_city', $client->company_city)" required autocomplete="company_city" />
                            <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                        </div>

                        <!-- Company Zip -->
                        <div class="mt-4">
                            <x-input-label for="company_zip" :value="__('Company Zip')" />
                            <x-text-input id="company_zip" class="block w-full mt-1" type="text" name="company_zip"
                                :value="old('company_zip', $client->company_zip)" required autocomplete="company_zip" />
                            <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                        </div>

                        <!-- Company Vat -->
                        <div class="mt-4">
                            <x-input-label for="company_vat" :value="__('Company Vat')" />
                            <x-text-input id="company_vat" class="block w-full mt-1" type="number" name="company_vat"
                                :value="old('company_vat', $client->company_vat)" required autocomplete="company_vat" />
                            <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
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
