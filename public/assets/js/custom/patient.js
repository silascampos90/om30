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

    if (validarFormulario()) {
            $.ajax({
                method: 'post',
                url: 'api/patient/store',
                data: patient
            }).fail(function(res) {
                showToasfy('success', 'Sucesso', res.msg)

            }).done(function(res) {
                if (res.sucesso == true) {
                    showToasfy('success', 'Sucesso', res.msg)
                } else {
                    res.msg.map(function($dado) {
                        showToasfy('error', 'Erro', $dado);
                    })

                };
            });

    }
});

function validarFormulario() {
    return $('#patientForm').valid();
}

