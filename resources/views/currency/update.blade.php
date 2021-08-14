@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @csrf
            <div class="card">
                <div class="card-header">
                    {{ __('Atualizar Moeda') }}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">USD:</label>
                                <input type="text" class="form-control"
                                    value="{{$currencys->where('code', 'USD')->first()?->value }}" name="code" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">EUR:</label>
                                <input type="text" class="form-control"
                                    value="{{$currencys->where('code', 'EUR')->first()?->value }}" name="code" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">BTC:</label>
                                <input type="text" class="form-control"
                                    value="{{$currencys->where('code', 'BTC')->first()?->value }}" name="code" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('currency.update')}}" class="btn btn-primary">Atualizar <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                </svg> </a>
                                <a class="btn btn-warning" href="{{route('investment.show')}}"> Retornar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection