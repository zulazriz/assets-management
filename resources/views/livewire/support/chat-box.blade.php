<div>
    @if ($support)
        <!-- chatbox -->
        <div class="chatbox">
            <div class="modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="msg-head">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <span class="chat-icon"><img class="img-fluid"
                                            src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                            alt="image title"></span>
                                    <div class="flex-shrink-0">
                                        <img class="img-fluid rounded-circle"
                                            src="{{ url('assets/img/default-user.jpg') }}"
                                            style="height: 45px; width: 45px;" alt="user img">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h3>{{ $support['initiate_user']['name'] }}</h3>
                                        <p
                                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                            {{ $support['subject'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->role == 'admin')
                                <div class="col-md-4">
                                    <select wire:model.live="support.status" class="form-select">
                                        <option value="sent">Sent</option>
                                        <option value="reviewed">Reviewed</option>
                                        <option value="closed">Closed</option>
                                        <option value="solved">Solved</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body d-flex flex-column-reverse">
                        @if (!count($support['lines']))
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <p class="text-secondary">Messages not found</p>
                            </div>
                        @else
                            <div>
                                <div class="msg-body">
                                    <ul class="px-4">
                                        @foreach ($support['lines'] as $line)
                                            <li
                                                class="{{ $line['sender_user_id'] == Auth::user()->id ? 'reply' : 'sender' }}">
                                                <p>{{ $line['message'] }}</p>
                                                <div class="additional">
                                                    @foreach ($line['attachments'] as $attachment)
                                                        @if ($attachment)
                                                            @include('livewire.support.chat-attachment', [
                                                                'file_name' => $attachment,
                                                                'file_url' => FileHelper::getUrlFile($attachment),
                                                            ])
                                                        @endif
                                                    @endforeach
                                                    <span class="d-block">{{ $line['created_at'] }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="send-box">
                        <form wire:submit.prevent="send">
                            <input wire:model="message" type="text" class="form-control" aria-label="message…"
                                placeholder="Write message…">

                            <button type="submit"><i class="bi bi-send-fill" aria-hidden="true"></i>
                                Send</button>
                        </form>

                        <!-- <div class="send-btns">
                            <div class="attach">
                                <div class="button-wrapper">
                                    <span class="label">
                                        <img class="img-fluid"
                                            src="https://mehedihtml.com/chatbox/assets/img/upload.svg"
                                            alt="image title"> attached file
                                    </span><input type="file" name="upload" id="upload"
                                        class="upload-box" placeholder="Upload File"
                                        aria-label="Upload File">
                                </div>

                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Select template</option>
                                    <option>Template 1</option>
                                    <option>Template 2</option>
                                </select>

                                <div class="add-apoint">
                                    <a href="#" data-toggle="modal"
                                        data-target="#exampleModal4"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewbox="0 0 16 16" fill="none">
                                            <path
                                                d="M8 16C3.58862 16 0 12.4114 0 8C0 3.58862 3.58862 0 8 0C12.4114 0 16 3.58862 16 8C16 12.4114 12.4114 16 8 16ZM8 1C4.14001 1 1 4.14001 1 8C1 11.86 4.14001 15 8 15C11.86 15 15 11.86 15 8C15 4.14001 11.86 1 8 1Z"
                                                fill="#7D7D7D" />
                                            <path
                                                d="M11.5 8.5H4.5C4.224 8.5 4 8.276 4 8C4 7.724 4.224 7.5 4.5 7.5H11.5C11.776 7.5 12 7.724 12 8C12 8.276 11.776 8.5 11.5 8.5Z"
                                                fill="#7D7D7D" />
                                            <path
                                                d="M8 12C7.724 12 7.5 11.776 7.5 11.5V4.5C7.5 4.224 7.724 4 8 4C8.276 4 8.5 4.224 8.5 4.5V11.5C8.5 11.776 8.276 12 8 12Z"
                                                fill="#7D7D7D" />
                                        </svg> Appoinment</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- chatbox -->
    @else
        <div class="chatbox">
            <div class="modal-dialog-scrollable">
                <div class="modal-content d-flex justify-content-center align-items-center">
                    <h3>Support messages</h3>
                    <p class="lead">You can select one of the supports in the list to view the messages</p>
                </div>
            </div>
        </div>
    @endif
</div>
