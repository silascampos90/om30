$(document).ready(function() {
    $('#patientList').DataTable();
});


const patient = {
    name: null,
    motherName: null,
    cpf: null,
    cns: null,
    cep: null,
    address: null,
    complement: null,
    number: null,
    district: null,
    state: null,
    city: null
}


$('#patientSave').click(function(e) {

    e.preventDefault();

    formData = new FormData();
    formData.append('name', $("input[name=name]").val());
    if( $('input[name=foto]').val() != '' ){
        formData.append('photo', $('input[name=foto]')[0].files[0]);
    }
    formData.append('mother_name', $("input[name=motherName]").val());
    formData.append('cpf', removeDot($("input[name=cpf]").val()));
    formData.append('cns', $("input[name=cns]").val());
    formData.append('cep', $("input[name=cep]").val());
    formData.append('address', $("input[name=address]").val());
    formData.append('complement', $("input[name=complement]").val());
    formData.append('number', $("input[name=number]").val());
    formData.append('district', $("input[name=district]").val());
    formData.append('state', $("input[name=state]").val());
    formData.append('city', $("input[name=city]").val());

    $.ajax({
        url: window.location.origin+'/api/patient/store',
        type: 'POST',
        data: formData,
        success: function(data) {
            showToasfy(data.message, 'success');
            setTimeout(function() {
                location.reload();
            }, 3000);
        },
        error: function (data, status, error) {
            showToasfy(data.responseJSON.message, 'error');
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });
});

$('#patientUpdate').click(function(e) {

    e.preventDefault();

    formData = new FormData();
    formData.append('name', $("input[name=name]").val());

    if( $('input[name=foto]').val() != '' ){
        formData.append('photo', $('input[name=foto]')[0].files[0]);
    }
    formData.append('mother_name', $("input[name=motherName]").val());
    formData.append('cpf', removeDot($("input[name=cpf]").val()));
    formData.append('cns', $("input[name=cns]").val());
    formData.append('cep', $("input[name=cep]").val());
    formData.append('address', $("input[name=address]").val());
    formData.append('complement', $("input[name=complement]").val());
    formData.append('number', $("input[name=number]").val());
    formData.append('district', $("input[name=district]").val());
    formData.append('state', $("input[name=state]").val());
    formData.append('city', $("input[name=city]").val());
    formData.append('id', $("input[name=id]").val());

    $.ajax({
        url: window.location.origin+'/api/patient/update',
        type: 'POST',
        data: formData,
        success: function(data, status) {
            showToasfy(data.message, 'success');
        },
        error: function (data, status, error) {
            showToasfy(data.responseJSON.message, 'error');
            setTimeout(function() {
                location.reload();
            }, 3000);
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });
});

$('#patientUpload').click(function(e) {

    e.preventDefault();

    formData = new FormData();
    formData.append('file', $('input[name=file]')[0].files[0]);

    $.ajax({
        url: window.location.origin+'/api/patient/file/upload',
        type: 'POST',
        data: formData,
        success: function(data, status) {
            showToasfy(data.message, 'success');
            setTimeout(function() {
                location.reload();
            }, 3000);
        },
        error: function (data, status, error) {
            showToasfy(data.responseJSON.message, 'error');
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });
});

$('#getAddresCep').click(function(e) {

e.preventDefault();

patient.cep = removeDot($("input[name=cep]").val());

    $('#loadSearch').show();
    $('#iconSearch').hide();
    $.ajax({
        method: 'post',
        url: window.location.origin+'/api/patient/cep/find',
        data: patient
    }).fail(function(res, status) {

        showToasfy('error', 'error', res.message)

    }).done(function(res, status) {
        $('#loadSearch').hide();
        $('#iconSearch').show();

        $("input[name=address]").val(res.data.logradouro);
        $("input[name=complement]").val(res.data.complemento);
        $("input[name=district]").val(res.data.bairro);
        $("input[name=state]").val(res.data.uf);
        $("input[name=city]").val(res.data.localidade);
    });

});


function validarFormulario() {
    return $('#patientForm').valid();
}

function saudacao(id, user) {
    Swal.fire({
        title: "Tem Certeza",
        text: "Que deseja deletar o Paciente "+user+" ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
        cancelButtonClass: 'btn btn-danger w-xs mt-2',
        confirmButtonText: "Sim, deletar!",
        cancelButtonText: "Cancelar",
        buttonsStyling: false,
        showCloseButton: true
    }).then(function (result) {
        if (result.value) {
            formData = new FormData();
            formData.append('id', id);

            $.ajax({
                url: window.location.origin+'/api/patient/remove',
                type: 'POST',
                data: formData,
                success: function(data, status) {
                    Swal.fire({
                        title: 'Romovido!',
                        text: 'Paciente Removido.',
                        icon: 'success',
                        confirmButtonClass: 'btn btn-primary w-xs mt-2',
                        buttonsStyling: false
                    })

                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                },
                error: function (data, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Paciente foi Removido.',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-primary w-xs mt-2',
                        buttonsStyling: false
                    })
                },
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() { // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                        myXhr.upload.addEventListener('progress', function() {
                            /* faz alguma coisa durante o progresso do upload */
                        }, false);
                    }
                    return myXhr;
                }
            });
        }
    });
}

