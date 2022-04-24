<div class="flex wrap gap-4 mb-4">
    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">Do you have a coding language preference</label>
    <x-radio label="Yes" wire:model="state.is_language_preference" value="true"/>
    <x-radio label="No" wire:model="state.is_language_preference" value="false"/>
</div>
@if ($this->getState()['is_language_preference'] === "true")
    <div class="mb-4">
        <x-input label="If yes, what would it be:" wire:model="state.language_preference"></x-input>
    </div>
@endif
<div class="flex wrap gap-4 mb-4">
    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">Do you have a map of your software build-up?</label>
    <x-radio label="Yes" wire:model="state.is_software_buildup" value="true"/>
    <x-radio label="No" wire:model="state.is_software_buildup" value="false"/>
</div>
@if ($this->getState()['is_software_buildup'] === "false")
    <div class="flex wrap gap-4 mb-4">
        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">If no, would you like to have it created by Code Experts?</label>
        <x-radio label="Yes" wire:model="state.is_software_buildup_code_expert" value="true"/>
        <x-radio label="No" wire:model="state.is_software_buildup_code_expert" value="false"/>
    </div>
@else
    <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="pdf_software_buildup">
@endif
@if ($this->getState()['is_software_buildup_code_expert'] === "false")
    <div class="mb-4">
        <x-datetime-picker
            label="If no, Please select a date for sharing your final map"
            without-time
            placeholder="Please select a date"
            wire:model="state.final_map_date"
        />
    </div>
@endif
<div class="flex wrap gap-4 mb-4">
    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">Do you have your software design elements?</label>
    <x-radio label="Yes" wire:model="state.is_design_element" value="true"/>
    <x-radio label="No" wire:model="state.is_design_element" value="false"/>
</div>
@if ($this->getState()['is_design_element'] === "false")
    <div class="flex wrap gap-4 mb-4">
        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">If no, would you like to have it created by Code Experts?</label>
        <x-radio label="Yes" wire:model="state.is_design_element_code_expert" value="true"/>
        <x-radio label="No" wire:model="state.is_design_element_code_expert" value="false"/>
    </div>
@else
    <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="pdf_software_designs">
@endif
@if ($this->getState()['is_design_element_code_expert'] === "false")
    <div class="mb-4">
        <x-datetime-picker
            label="If no, Please select a date for sharing your final design elements"
            without-time
            placeholder="Please select a date"
            wire:model="state.final_design_element_date"
        />
    </div>
@endif

