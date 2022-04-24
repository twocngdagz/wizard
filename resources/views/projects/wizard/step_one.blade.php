<div class="mb-4">
    <x-select
        label="Choose your product"
        :options="['CMS', 'CRM', 'ERP']"
        wire:model.defer="state.type"
    />
</div>
<div class="mb-4">
    <x-textarea wire:model="state.description" label="Solution Description" />
</div>
<div class="mb-4">
    <x-tag-input wire:model.defer="state.audience" label="Choose your audience"></x-tag-input>
</div>
