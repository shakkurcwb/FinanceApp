<form method="post" action="{{ url('/accounts') }}" name="frmCreateAccount">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" id="type" name="type">
            <option selected></option>
            @foreach ($types as $type)
                <option value="{{ $type }}"
                {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
        @error('type')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="currency" class="form-label">Currency</label>
        <select class="form-select" id="currency" name="currency">
            <option selected></option>
            @foreach ($currencies as $currency)
                <option value="{{ $currency }}"
                {{ old('currency') == $currency ? 'selected' : '' }}>{{ $currency }}</option>
            @endforeach
        </select>
        @error('currency')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="balance" class="form-label">Balance</label>
        <input type="number" class="form-control" id="balance" name="balance" value="{{ old('balance') }}">
        @error('balance')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>