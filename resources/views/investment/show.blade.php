@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{route('investment.create')}}">
                @csrf

                <div class="card ">
                    <div class="card-header ">{{ __('Ultimo Investimento') }}</div>
                    <div class="card-body ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data Aplicação</th>
                                    <th>Moeda</th>
                                    <th>Valor</th>
                                    <th>Valor em Reais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$investiments->last()?->date_application_br}}</td>
                                    <td>{{$investiments->last()?->currency?->code}}</td>
                                    <td>{{$investiments->last()?->value}}</td>
                                    <td style="font-weight: bold;">{{$investiments->last()?->value_br}}</td>
                                </tr>
                            </tbody>

                        </table>
                        <a href="{{route('investment.create')}}" class="btn btn-primary" type="button">Novo
                            Investimento</a>
                    </div>
                </div>

                <hr>

                <fieldset>
                    <legend>Historico de aplicações</legend>

                    <div class="card">
                        <div class="card-header">{{ __('Investimentos') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Data Aplicação</th>
                                                <th>Moeda</th>
                                                <th>Valor</th>
                                                <th>Valor em Reais</th>
                                                <th>Edição</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($investiments as $investiment)
                                            <tr>
                                                <td>{{date('d/m/Y', strtotime($investiment->date_application)) }}</td>
                                                <td>{{$investiment->currency->code}}</td>
                                                <td>{{$investiment->value}}</td>      
                                                <td style="font-weight: bold;">{{$investiment->value_br}}</td>       
                                                <td><a href="{{route('investment.update', $investiment->id)}}" class="btn btn-xs btn-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('investment.delete', $investiment->id)}}" class="btn btn-xs btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path
                                                                d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" style="font-weight: bold;" >
                                                    <div class="alert alert-secondary" style="margin-bottom: -25px;" >
                                                        Investimento Total: {{number_format($investiments->sum('value'), 2, ',', '') }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <hr>

            </form>
        </div>
    </div>
</div>

@endsection