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
    Upload CSV Usuário
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Upload</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="" enctype="multipart/form-data" id="patientUpload" class="" method="post" >
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-10 col-md-10">
                                <div>
                                    <label for="basiInput" class="form-label">Arquivo</label>
                                    <input type="file" name="file" class="form-control" id="basiInput" required>
                                </div>

                            </div>
                            <div class="col-xxl-2 col-md-10">
                                <div class="" style="display: flex; margin-top: 26px;">
                                    <button type="button" id="patientUpload" class="btn btn-primary waves-effect waves-light">Upload</button>
                                </div>
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
