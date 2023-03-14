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
                    <form action="" enctype="multipart/form-data" id="patientForm" class="" method="post">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-2 col-md-3">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="{{ URL::asset($patient->foto) }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                        alt="user-profile-image">
                                    </div>
                                <div>
                                    <input type="file" name="foto" id="foto" class="form-control" id="basiInput" >
                                </div>

                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Nome do Paciente</label>
                                    <input type="text" name="name" class="form-control" id="basiInput"
                                        placeholder="Nome do Paciente" value="{{$patient->name}}" required>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Nome da Mãe</label>
                                    <input type="text" class="form-control" name="motherName"
                                        placeholder="Nome da mãe do paciente" value="{{$patient->mother_name}}" required>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-md-2">
                                <div>
                                    <label for="placeholderInput" class="form-label">CPF</label>
                                    <input type="text" name="cpf" class="form-control" id="patient_cpf"
                                        placeholder="CPF do paciente" value="{{$patient->cpf}}" required>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-md-2">
                                <div class="has-validation">
                                    <label for="valueInput" class="form-label">CNS</label>
                                    <input type="text" id="patientCns" onchange="" maxlength="15" class="form-control" name="cns"
                                        placeholder="Número do cartão nacional do sus" value="{{$patient->cns}}" required>
                                        <div id="patientCnsError" class="invalid-feedback">
                                            Cartão do SUS inválido.
                                        </div>
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
                                        <input type="text" name="cep" class="form-control rounded-end flag-input"
                                            placeholder="Cep da Residência" value="{{$patient->cep}}" id="patient_cep" required/>
                                        <button class="btn btn-light border" id="getAddresCep" type="button" title="Pesquisar Endereço" >
                                            <span id="iconSearch" class="mdi mdi-home-search-outline">
                                            </span>
                                            <div style="display: none" id="loadSearch" class="loader">
                                                <div class="loader-wheel">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-5 col-md-6">
                                <div>
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" name="address" value="{{$patient->address}}" placeholder="Endereço"
                                         required>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-6">
                                <div>
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complement" value="{{$patient->complement}}" placeholder="Complemento"
                                        >
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-6">
                                <div>
                                    <label for="number" class="form-label">Número</label>
                                    <input type="text" class="form-control" name="number" value="{{$patient->number}}" placeholder="Bairro"
                                         required>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" name="district" value="{{$patient->district}}" placeholder="Bairro"
                                         required>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" name="state" value="{{$patient->state}}" placeholder="Bairro"
                                        >
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="city" value="{{$patient->city}}" placeholder="Cidade"
                                       required>
                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                        </div>
                        <input type="hidden" class="form-control" name="id" value="{{$patient->id}}"  />
                        <div class="">
                            <div class="" style="display: flex;justify-content: end; margin-top: 10px;">
                                <button type="button" style="margin-right: 10px" class="btn btn-warning waves-effect waves-light">Cancelar</button>
                                <button type="button" id="patientUpdate" class="btn btn-primary waves-effect waves-light">Atualizar</button>
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
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/custom/patient.js') }}"></script>
@endsection
