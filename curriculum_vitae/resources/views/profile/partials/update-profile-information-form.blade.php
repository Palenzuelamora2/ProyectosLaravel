<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Nombre -->
    <div class="mt-4">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Correo electrónico (solo lectura) -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required readonly />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Campos de perfil -->
    <div class="mt-4">
        <x-input-label for="profesion" :value="__('Profesion')" />
        <x-text-input id="profesion" name="profesion" type="text" class="mt-1 block w-full" :value="old('profesion', $user->perfil->profesion ?? '')" />
    </div>

    <div class="mt-4">
        <x-input-label for="telefono" :value="__('Telefono')" />
        <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $user->perfil->telefono ?? '')" />
    </div>

    <div class="mt-4">
        <x-input-label for="sobre_mi" :value="__('Sobre Mi')" />
        <x-text-input id="sobre_mi" name="sobre_mi" type="text" class="mt-1 block w-full" :value="old('sobre_mi', $user->perfil->sobre_mi ?? '')" />
    </div>

    <div class="mt-4">
        <x-input-label for="sitio_web" :value="__('Sitio Web')" />
        <x-text-input id="sitio_web" name="sitio_web" type="text" class="mt-1 block w-full" :value="old('sitio_web', $user->perfil->sitio_web ?? '')" />
    </div>

    <div class="mt-4">
        <x-input-label for="linkedin" :value="__('LinkedIn')" />
        <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full" :value="old('linkedin', $user->perfil->linkedin ?? '')" />
    </div>

    <div class="mt-4">
        <x-input-label for="github" :value="__('GitHub')" />
        <x-text-input id="github" name="github" type="text" class="mt-1 block w-full" :value="old('github', $user->perfil->github ?? '')" />
    </div>

    <!-- Botón de guardar -->
    <div class="mt-6">
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
