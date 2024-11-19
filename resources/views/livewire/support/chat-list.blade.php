<!-- chatlist -->
<div class="chatlist">
    <div class="modal-dialog-scrollable">
        <div class="modal-content">
            <div class="chat-header">
                <div class="msg-search mb-2">
                    <input wire:model.live="by_subject" type="text" class="form-control" id="inlineFormInputGroup"
                        placeholder="Search by subject" aria-label="search" style="width: 100%;">
                </div>
                <div>
                    <select wire:model.live="by_status" class="form-select">
                        <option value>All</option>
                        <option value="sent">Sent</option>
                        <option value="reviewed">Reviewed</option>
                        <option value="closed">Closed</option>
                        <option value="solved">Solved</option>
                    </select>
                </div>
            </div>

            <hr>

            <div class="modal-body">
                <!-- chat-list -->
                <div class="chat-list">
                    @if (!count($filtered_supports))
                        <div class="text-center text-secondary">Support not found</div>
                    @else
                        @foreach ($filtered_supports as $support)
                            <div onclick="Livewire.dispatch('view-support', {'support': {{ $support['id'] }}})" class="d-flex align-items-center mb-3" style="cursor: pointer;">
                                <div class="flex-shrink-0">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ url('assets/img/default-user.jpg') }}"
                                        style="height: 45px; width: 45px;" alt="User Image">
                                    {{-- <span class="active"></span> --}}
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3>{{ $support['initiate_user']['name'] }}</h3>
                                    <p
                                        style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                        {{ $support['subject'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- chat-list -->
            </div>
        </div>
    </div>
</div>
<!-- chatlist -->
