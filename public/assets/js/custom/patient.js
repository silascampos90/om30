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

    patient.name = $("input[name=name]").val();
    patient.mother_name = $("input[name=motherName]").val();
    patient.cpf = removeDot($("input[name=cpf]").val());
    patient.cns = $("input[name=cns]").val();
    patient.cep = removeDot($("input[name=cep]").val());
    patient.address = $("input[name=address]").val();
    patient.complement = $("input[name=complement]").val();
    patient.number = $("input[name=number]").val();
    patient.district = $("input[name=district]").val();
    patient.state = $("input[name=state]").val();
    patient.city = $("input[name=city]").val();

    formData = new FormData();
    formData.append('name', $("input[name=name]").val());
    formData.append('foto', $('input[name=foto]')[0].files[0]);
    formData.append('mother_name', $("input[name=mother_name]").val());
    formData.append('cpf', $("input[name=cpf]").val());
    formData.append('cns', $("input[name=cns]").val());
    formData.append('cep', $("input[name=cep]").val());
    formData.append('address', $("input[name=address]").val());
    formData.append('complement', $("input[name=complement]").val());
    formData.append('number', $("input[name=number]").val());
    formData.append('district', $("input[name=district]").val());
    formData.append('state', $("input[name=state]").val());
    formData.append('city', $("input[name=city]").val());

    $.ajax({
        url: 'api/patient/store',
        type: 'POST',
        data: formData,
        success: function(data) {
            alert(data)
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
    // if (validarFormulario()) {
    //         $.ajax({
    //             type: 'post',
    //             url: 'api/patient/store',
    //             data: formData
    //         }).fail(function(res) {
    //             showToasfy('success', 'Sucesso', res.msg)

    //         }).done(function(res) {
    //             if (res.sucesso == true) {
    //                 showToasfy('success', 'Sucesso', res.msg)
    //             } else {
    //                 res.msg.map(function($dado) {
    //                     showToasfy('error', 'Erro', $dado);
    //                 })

    //             };
    //         });

    // }
});

$('#getAddresCep').click(function(e) {

e.preventDefault();

patient.cep = removeDot($("input[name=cep]").val());

    $('#loadSearch').show();
    $('#iconSearch').hide();
    $.ajax({
        method: 'post',
        url: 'api/patient/cep/find',
        data: patient
    }).fail(function(res, status) {

        showToasfy('success', 'Sucesso', res.msg)

    }).done(function(res, status) {
        $('#loadSearch').hide();
        $('#iconSearch').show();

        $("input[name=address]").val(res.data.logradouro);
        $("input[name=complement]").val(res.data.complemento);
        $("input[name=number]").val(res.data.numero);
        $("input[name=district]").val(res.data.bairro);
        $("input[name=state]").val(res.data.uf);
        $("input[name=city]").val(res.data.localidade);

         showToasfy('success', 'Sucesso', res.msg);

    });

});

function validarFormulario() {
    return $('#patientForm').valid();
}

