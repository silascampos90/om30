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
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Nome do Paciente</label>
                                <input type="text" name="name" class="form-control" id="basiInput" placeholder="Nome do Paciente">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="labelInput" class="form-label">Nome da Mãe</label>
                                <input type="text" class="form-control" id="labelInput" placeholder="Nome da mãe do paciente">
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
                                <input type="text" class="form-control" id="valueInput" placeholder="Número do cartão nacional do sus">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="readonlyPlaintext" class="form-label">Readonly Plain
                                    Text Input</label>
                                <input type="text" class="form-control-plaintext" id="readonlyPlaintext"
                                    value="Readonly input" readonly>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="readonlyInput" class="form-label">Readonly Input</label>
                                <input type="text" class="form-control" id="readonlyInput" value="Readonly input"
                                    readonly>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="disabledInput" class="form-label">Disabled Input</label>
                                <input type="text" class="form-control" id="disabledInput" value="Disabled input"
                                    disabled>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconInput" class="form-label">Input with Icon</label>
                                <div class="form-icon">
                                    <input type="email" class="form-control form-control-icon" id="iconInput"
                                        placeholder="example@gmail.com">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="iconrightInput" class="form-label">Input with Icon
                                    Right</label>
                                <div class="form-icon right">
                                    <input type="email" class="form-control form-control-icon" id="iconrightInput"
                                        placeholder="example@gmail.com">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputdate" class="form-label">Input Date</label>
                                <input type="date" class="form-control" id="exampleInputdate">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputtime" class="form-label">Input Time</label>
                                <input type="time" class="form-control" id="exampleInputtime">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputpassword" class="form-label">Input
                                    Password</label>
                                <input type="password" class="form-control" id="exampleInputpassword" value="44512465">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleFormControlTextarea5" class="form-label">Example
                                    Textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="formtextInput" class="form-label">Form Text</label>
                                <input type="password" class="form-control" id="formtextInput">
                                <div id="passwordHelpBlock" class="form-text">
                                    Must be 8-20 characters long.
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="colorPicker" class="form-label">Color Picker</label>
                                <input type="color" class="form-control form-control-color w-100" id="colorPicker"
                                    value="#364574">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="borderInput" class="form-label">Input Border
                                    Style</label>
                                <input type="text" class="form-control border-dashed" id="borderInput"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <label for="exampleDataList" class="form-label">Datalist example</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList"
                                placeholder="Search your country...">
                            <datalist id="datalistOptions">
                                <option value="Switzerland">
                                <option value="New York">
                                <option value="France">
                                <option value="Spain">
                                <option value="Chicago">
                                <option value="Bulgaria">
                                <option value="Hong Kong">
                            </datalist>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="exampleInputrounded" class="form-label">Rounded
                                    Input</label>
                                <input type="text" class="form-control rounded-pill" id="exampleInputrounded"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstnamefloatingInput"
                                    placeholder="Enter your firstname">
                                <label for="firstnamefloatingInput">Floating Input</label>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
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
@endsection