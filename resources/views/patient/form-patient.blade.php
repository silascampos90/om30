@extends('layouts.master')
@section('title')
@lang('translation.basic-elements')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
    Formulário
@endslot
@slot('title')
    Cadastrar Usuário
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Cadastro</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="" id="patientForm" method="post">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Nome do Paciente</label>
                                    <input type="text" name="name" class="form-control" id="basiInput"
                                        placeholder="Nome do Paciente">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Nome da Mãe</label>
                                    <input type="text" class="form-control" name="motherName"
                                        placeholder="Nome da mãe do paciente">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="placeholderInput" class="form-label">CPF</label>
                                    <input type="text" name="cpf" class="form-control" id="placeholderInput"
                                        placeholder="CPF do paciente">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">CNS</label>
                                    <input type="text" class="form-control" name="cns"
                                        placeholder="Número do cartão nacional do sus">
                                </div>
                            </div>
                            <div class="card-header align-items-center d-flex">
                                <h5 style="font-size: 14px;" class="card-title mb-0 flex-grow-1">Endereço do paciente
                                </h5>
                            </div><!-- end card header -->
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label class="form-label">CEP</label>
                                    <div class="input-group" data-input-flag>
                                        <input type="text" class="form-control rounded-end flag-input" value=""
                                            placeholder="Cep da Residência"/>
                                        <button class="btn btn-light border" type="button" title="Pesquisar Endereço" ><span class="mdi mdi-home-search-outline"></span></button>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-5 col-md-6">
                                <div>
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" placeholder="Endereço"
                                        value="">
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-6">
                                <div>
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" placeholder="Complemnto"
                                        value="">
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-6">
                                <div>
                                    <label for="number" class="form-label">Número</label>
                                    <input type="text" class="form-control" name="number" placeholder="Bairro"
                                        value="">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" placeholder="Bairro"
                                        value="">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" name="estado" placeholder="Bairro"
                                        value="">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" placeholder="Cidade"
                                        value="">
                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                        </div>
                        <div class="">
                            <div class="" style="display: flex;justify-content: end; margin-top: 10px;">
                                <button type="button" style="margin-right: 10px" class="btn btn-warning waves-effect waves-light">Cancelar</button>
                                <button type="button" id="patientSave" class="btn btn-primary waves-effect waves-light">Salvar</button>
                            </div>
                        </div>
                    </form>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/custom/patient.js') }}"></script>
@endsection
