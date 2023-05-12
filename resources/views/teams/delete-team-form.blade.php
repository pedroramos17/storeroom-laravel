<x-action-section>
    <x-slot name="title">
        {{ __('Deletar equipe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Deletar permanentemente esta equipe.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('Uma vez que a equipe é deletada, todos os recursos e dados serão apagados permanentemente. Antes de deletar esta equipe, por favor baixe qualquer dado ou informação da equipe que você queira reter.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Deletar equipe') }}
            </x-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Deletar equipe') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Você está certo que quer deletar esta equipe? Uma vez que a equipe for apagada, todos os seus recursos e dados serão permanentemente apagados.') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Deletar equipe') }}
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    </x-slot>
</x-action-section>
