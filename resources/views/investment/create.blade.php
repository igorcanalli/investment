@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('investment.create')}}">
                @csrf
                <div class="card">
                    <div class="card-header">{{ __('Gerar Investimento') }}</div>

                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row">
                            @foreach($currencys as $currency)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{strtoupper($currency->code)}}:</label>
                                    <input type="text" value="{{$currency->value}}" class="form-control" readonly>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pwd">Data do Investimento:</label>
                                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="date_application" name="date_application">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="investment">Investimento (Em USD):</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color:#fff">
                                            <select id="currency_id" name="currency_id">
                                                @foreach($currencys as $currency)
                                                <option value="{{$currency->id}}">{{$currency->code}}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                        <input id="value" name="value" type="text" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary"> Aplicar</button>
                                <a href="{{route('investment.show')}}" class="btn btn-warning"> Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@push('js')

<script src="{{asset('js/jquery.mask.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#value').mask('##000.00',{reverse:true});
    });
</script>

@endpush

@endsection