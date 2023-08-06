<form method="post" action="{{ url(sprintf('/accounts/%d', $account->id)) }}" name="frmEditAccount">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name') ?? $account->name }}">
        @error('name')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" id="type" name="type">
            <option selected></option>
            @foreach ($types as $type)
                <option value="{{ $type }}" {{ old('type') ?? $account->type == $type ? 'selected' : '' }}>
                    {{ $type }}</option>
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
                    {{ old('currency') ?? $account->currency == $currency ? 'selected' : '' }}>{{ $currency }}
                </option>
            @endforeach
        </select>
        @error('currency')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="balance" class="form-label">Balance</label>
        <input type="number" class="form-control" id="balance" name="balance"
            value="{{ old('balance') ?? $account->balance }}">
        @error('balance')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-danger" onclick="if (confirmDelete()) frmDeleteAccount.submit();">Delete</button>
    </div>
</form>
<form method="post" action="{{ url(sprintf('/accounts/%d', $account->id)) }}" name="frmDeleteAccount">
    @method('delete')
    @csrf
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this account?');
        }
    </script>
</form>