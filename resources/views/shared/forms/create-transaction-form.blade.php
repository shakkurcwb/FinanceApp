<form method="post" action="{{ url('/transactions') }}" name="frmCreateTransaction">
    @csrf
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" id="type" name="type">
            <option selected></option>
            @foreach ($types as $type)
                <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}
                </option>
            @endforeach
        </select>
        @error('type')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option selected></option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                    {{ $status }}</option>
            @endforeach
        </select>
        @error('status')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="debit_account_id" class="form-label">Debit Account</label>
        <select class="form-select" id="debit_account_id" name="debit_account_id">
            <option selected></option>
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}"
                    {{ old('debit_account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}
                    ({{ $account->type }} - {{ $account->currency }} ${{ $account->balance }})</option>
            @endforeach
        </select>
        @error('debit_account_id')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="credit_account_id" class="form-label">Credit Account</label>
        <select class="form-select" id="credit_account_id" name="credit_account_id">
            <option selected></option>
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}"
                    {{ old('credit_account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}
                    ({{ $account->type }} - {{ $account->currency }} ${{ $account->balance }})</option>
            @endforeach
        </select>
        @error('credit_account_id')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="currency" class="form-label">Currency</label>
        <select class="form-select" id="currency" name="currency" value="{{ old('currency') }}">
            <option selected></option>
            @foreach ($currencies as $currency)
                <option value="{{ $currency }}" {{ old('currency') == $currency ? 'selected' : '' }}>
                    {{ $currency }}</option>
            @endforeach
        </select>
        @error('currency')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
        @error('amount')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="posting_date" class="form-label">Posting Date</label>
        <input type="date" class="form-control" id="posting_date" name="posting_date"
            value="{{ old('posting_date') }}">
        @error('posting_date')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="memo" class="form-label">Memo</label>
        <input type="text" class="form-control" id="memo" name="memo" value="{{ old('memo') }}">
        @error('memo')
            <div class="d-block invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>