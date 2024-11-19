<div class="modal fade" id="{{ $modal_id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5>Are you sure you want to Delete {{ $title }}?</h5>
                    <p>If deleted, this {{ $title }} will no longer be accessible and cannot be recovered.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const {{ str_replace(' ', '', $title) }}FormDelete = document.querySelector('#{{ $modal_id }} form');
    const {{ str_replace(' ', '', $title) }}DeleteButtons = document.querySelectorAll(
        '[data-bs-target="#{{ $modal_id }}"]');
    for (const deleteButton of Array.from({{ str_replace(' ', '', $title) }}DeleteButtons)) {
        deleteButton.addEventListener('click', function() {
            const url = deleteButton.getAttribute('data-url');
            const isLivewire = @json($is_livewire ?? false);
            if (isLivewire) {
                {{ str_replace(' ', '', $title) }}FormDelete.setAttribute('wire:submit.prevent', url);
            } else {
                {{ str_replace(' ', '', $title) }}FormDelete.action = url;
            }
        })
    }
</script>
