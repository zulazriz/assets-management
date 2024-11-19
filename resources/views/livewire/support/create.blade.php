<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">New Support</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-new" wire:submit.prevent="create">
            <div class="modal-body row g-3">
                <div class="col col-md-12">
                    <div>
                        <label>Subject <span class="text-danger">*</span></label>
                        <input wire:model="support.subject" type="text" class="form-control"
                            placeholder="Enter your subject" required>
                    </div>
                    @include('components.error-input', ['field' => 'support.subject'])
                </div>
                <div class="col col-md-12">
                    <div>
                        <label>Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="3" wire:model="support.message" placeholder="Enter your message"></textarea>
                    </div>
                    @include('components.error-input', ['field' => 'support.message'])
                </div>
                <div class="col col-md-12">
                    <div>
                        <label>Attachments</label>
                        <input wire:model="support.attachments" type="file" class="form-control" multiple>
                    </div>
                    @include('components.error-input', ['field' => 'support.attachments'])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button wire:loading.attr="disabled" type="submit" wire:loading.attr="disabled"
                        class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
