@extends('layouts.master')
@section('title')
@lang('translation.basic-elements')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
    Formulário
@endslot
@slot('title')
    Lista de Usuários
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Cadastro</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <table id="patientList" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>CNS</th>
                            <th>CIDADE</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $pat )
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                        value="option1">
                                </div>
                            </th>

                            <td>{{$pat['id']}}</td>
                            <td>{{$pat['name']}}</td>
                            <td>{{$pat['cpf']}}</td>
                            <td>{{$pat['cns']}}</td>
                            <td>{{$pat['city']}}</td>
                            <td>
                                <div>
                                    <a href="{{route('show.patient', ['id'=> $pat['id']] )}}"
                                        class="btn btn-sm btn-warning waves-effect waves-light">
                                        <i class="mdi mdi-human-edit">
                                        </i>
                                        Editar
                                    </a>
                                    <button type="button" id="deletarPatient" onclick="saudacao({{$pat['id']}},'{{$pat['name']}}')" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/custom/patient.js') }}"></script>
@endsection
