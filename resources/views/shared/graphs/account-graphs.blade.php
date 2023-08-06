<div id="account-graphs" class="row mt-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Account Balance</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <div class="card m-1">
                                <div class="card-body">
                                    <h5 class="card-title">Debits</h5>
                                    <p class="card-subtitle mb-0 text-body-secondary">
                                        {{ $account->currency }} ${{ $balance_breakdown['debits'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-1">
                                <div class="card-body">
                                    <h5 class="card-title">Credits</h5>
                                    <p class="card-subtitle mb-0 text-body-secondary">
                                        {{ $account->currency }} ${{ $balance_breakdown['credits'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="card m-1">
                                <div class="card-body">
                                    <h5 class="card-title">Balance</h5>
                                    <p class="card-subtitle mb-0 text-primary">
                                        <strong>{{ $account->currency }} ${{ $balance_breakdown['balance'] }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <canvas id="account-balance-chart" width="100" height="100">Loading...</canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Transaction Types</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <ul class="list-group text-start">
                                @foreach($transactions_breakdown as $data)
                                <li class="list-group-item">{{ $data->type }}: <b>{{ $account->currency }} ${{ $data->total }}</b></li>
                                @endforeach
                              </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <canvas id="transaction-types-chart" width="100" height="100">Loading...</canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var balance_breakdown = @json($balance_breakdown);
        var transactions_breakdown = @json($transactions_breakdown);
    </script>

<script src="{{ mix('js/components/account-graphs.js') }}" @endpush
