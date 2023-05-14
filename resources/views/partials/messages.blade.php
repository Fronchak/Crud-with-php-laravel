<div class="my-3" id="session-container">
    @if(!empty($_SESSION["flash_message"]))
        <div
            class="alert {{ empty($_SESSION['flash_message_type']) ? 'alert-primary' : $_SESSION['flash_message_type'] }}"
            role="alert">
            {{ $_SESSION["flash_message"] }}
        </div>
    @endif
</div>
