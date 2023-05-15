<div class="form-container">
    <form
        method="post"
        action="{{ $isUpdate ? route('employees.update', $employee->id) : route('employees.store') }}"
        enctype="multipart/form-data"
    >
        @if($isUpdate)
            @method("PUT")
        @endif
        @csrf
        <div class="mb-3">
            <label for="firstName" class="form-label">First name</label>
            <input
                class="form-control {{ $errors->has('firstName') ? "is-invalid" : "" }}"
                name="firstName"
                id="firstName"
                placeholder="First name"
                value="{{ $firstName }}"
            />
            <div class="invalid-feedback d-block">
                {{ $errors->has('firstName') ? $errors->first('firstName') : '' }}
            </div>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last name</label>
            <input
                class="form-control {{ $errors->has('lastName') ? "is-invalid" : "" }}"
                name="lastName"
                id="lastName"
                placeholder="Last name"
                value="{{ $lastName }}"
            />
            <div class="invalid-feedback d-block">
                {{ $errors->has('lastName') ? $errors->first('lastName') : '' }}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="profession_id">Profession</label>
            <select
                class="form-select {{ $errors->has("profession_id") ? 'is-invalid' : '' }}"
                name="profession_id"
                id="profession_id"
            >
                <option value="0" selected disabled>Select the profession</option>
                @foreach($professions as $profession)
                    <option
                        value="{{ $profession->id }}"
                        {{ $profession_id == $profession->id ? 'selected' : '' }}
                    >{{ $profession->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback d-block">
                {{ $errors->has("profession_id") ? $errors->first("profession_id") : "" }}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="photo">Photo</label>
            <input
                class="form-control {{ $errors->has("photo") ? "is-invalid" : '' }}"
                name="photo"
                type="file"
                id="photo"
                placeholder="Upload the photo"
            />
            <div class="invalid-feedback d-block">
                {{ $errors->has("photo") ? $errors->first("photo") : "" }}
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">
                {{ $isUpdate ? 'Update' : 'Register' }}
            </button>
        </div>
    </form>
</div>
