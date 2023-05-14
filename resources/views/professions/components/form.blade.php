<div class="form-container">
    <form
        method="post"
        action="{{ $isUpdate ? route('professions.update', $profession->id) : route('professions.store') }}">
        @if($isUpdate)
            @method("PUT")
        @endif
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}"
                name="name"
                id="name"
                placeholder="Name"
                value="{{ $name }}"
            />
            <div class="invalid-feedback d-block">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">
                {{ $isUpdate ? 'Update' : 'Register' }}
            </button>
        </div>
    </form>
</div>
