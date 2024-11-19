@if ($is_livewire ?? false)
    <label class="custom-input-file input-group w-full">
        <span class="input-group-text">Choose File</span>
        <p class="form-control m-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            {{ $text_input ?? 'No file chosen' }}</p>
        <input type="file" class="form-control d-none" wire:model="{{ $name }}"
            {{ @$required && !$text_input ? 'required' : '' }}>
    </label>
@else
    <label class="custom-input-file input-group w-full">
        <span class="input-group-text">Choose File</span>
        <p class="form-control m-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            {{ $text_input ?? 'No file chosen' }}</p>
        <input type="file" class="form-control d-none" name="{{ $name }}"
            onchange="event.target.previousElementSibling.innerHTML = event.target.files[0].name"
            {{ @$required ? 'required' : '' }}>
    </label>
@endif
