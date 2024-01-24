<?php


use Illuminate\Support\Str;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use src\Application\Company\Requests\CreateCompanyRequest;
use src\Application\Company\Services\CreateCompanyService;



new class extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:50')]
    public string $name;

    #[Validate('required|min:3|max:150')]
    public string $address;

    #[Validate('required|min:3|max:255')]
    public string $description;

    #[Validate('required|image|max:1024')]
    public $logo;
    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = '';
        $this->address = '';
        $this->description = '';
    }

    public function boot(CreateCompanyService $createCompanyService)
    {
        $this->createCompanyService = $createCompanyService;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function createCompany(): void
    {
        $validated = $this->validate();
        $logoFileName = Str::slug($this->name) . '.' . $this->logo->extension();
        $this->logo->storeAs(path: 'company-logo', name: $logoFileName);

        $validated['logo'] = $logoFileName;
        $validated['user_id'] = Auth::user()->id;

        $company = $this->createCompanyService->execute(CreateCompanyRequest::fromArray($validated));

        $this->dispatch('company-updated', company: $company);
        redirect()->to('/dashboard');
    }
}; ?>


<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Company Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add a company information and description") }}
        </p>
    </header>

    <form wire:submit="createCompany" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="address" id="address" name="address" type="text" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input wire:model="description" id="address" name="description" type="text" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            @if ($logo)
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-none mx-auto" src="{{ $logo->temporaryUrl() }}" alt="" width="384" height="512">
            @endif
            <x-input-label for="logo" :value="__('Logo')" />
            <input type="file" wire:model="logo" id="logo" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('file')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="company-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
