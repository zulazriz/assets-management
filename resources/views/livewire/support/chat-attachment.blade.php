<style>
    .attachment {
        font-size: 14px;
        line-height: 1.5;
        font-weight: 400;
        padding: 15px;
        display: inline-block;
        margin-top: 4px;
    }

    .sender .attachment {
        color: #000;
        background: #f5f5f5;
        border-bottom-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .reply .attachment {
        color: #fff;
        background: #4b7bec;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .reply .attachment a {
        color: #fff;
    }
</style>

<div class="attachment">
    <i class="bi bi-file-earmark"></i>
    <span>{{ $file_name }}</span>
    <a href="{{ $file_url }}" class="ms-4" download><i class="bi bi-download"></i></a>
</div>