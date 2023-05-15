@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Zgłoszenie</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Zgłoszenie</div>
                        <div class="panel-body">
                            <table class="item show data">
                                <tbody>
                                <tr>
                                    <td>Imię: </td>
                                    <td>{{ $opinion->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>Nazwisko: </td>
                                    <td>{{ $opinion->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail: </td>
                                    <td>{{ $opinion->email }}</td>
                                </tr>
                                <tr>
                                    <td>Numer zgłoszenia: </td>
                                    <td>{{ $opinion->application_id }}</td>
                                </tr>
                                <tr>
                                    <td>Link do opinii: </td>
                                    <td>{{ $opinion->url }}</td>
                                </tr>
                                <tr>
                                    <td>Gratis: </td>
                                    <td>{{ $opinion->free->name }}</td>
                                </tr>
                                <tr>
                                    <td>Treść opinii: </td>
                                    <td>{{ $opinion->content }}</td>
                                </tr>
                                <tr>
                                    <td>Legal 1: </td>
                                    <td>@if($opinion->legal_1) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 2: </td>
                                    <td>@if($opinion->legal_2) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 3: </td>
                                    <td>@if($opinion->legal_3) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 4: </td>
                                    <td>@if($opinion->legal_4) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Dodano: </td>
                                    <td>{{ $opinion->created_at }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.main-->
    </div>
@endsection
