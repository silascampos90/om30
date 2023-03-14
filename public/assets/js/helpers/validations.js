
$("#patient_cpf").mask('000.000.000-00', {
    reverse: true
  });

$("#patient_cep").mask('00.000-000', {
    reverse: true
  });


$(".icha0").removeClass('properties');

var validCns = false;

function removeDot(field)
{
    let regex = /\d/g;
    return field.match(regex).join("");
}

const initCns = [1,2];

function validateCns(cns)
{
    let init = cns.substring(0, 1);

    if(initCns.includes(Number(init))) {
        validaCNS(cns)
    } else {
        validaCnsProv(cns)
    }

}

function validaCnsProv(cns) {
	if (cns.length != 15) {
        validCns = false;
		$("#patientCns").addClass('input-invalid');
        $("#patientCnsError").show();
	}

	soma = ((Number(cns.substring(0, 1))) * 15)
			+ ((Number(cns.substring(1, 2))) * 14)
			+ ((Number(cns.substring(2, 3))) * 13)
			+ ((Number(cns.substring(3, 4))) * 12)
			+ ((Number(cns.substring(4, 5))) * 11)
			+ ((Number(cns.substring(5, 6))) * 10)
			+ ((Number(cns.substring(6, 7))) * 9)
			+ ((Number(cns.substring(7, 8))) * 8)
			+ ((Number(cns.substring(8, 9))) * 7)
			+ ((Number(cns.substring(9, 10))) * 6)
			+ ((Number(cns.substring(10, 11))) * 5)
			+ ((Number(cns.substring(11, 12))) * 4)
			+ ((Number(cns.substring(12, 13))) * 3)
			+ ((Number(cns.substring(13, 14))) * 2)
			+ ((Number(cns.substring(14, 15))) * 1);

	resto = soma % 11;

	if (resto != 0) {
        $("#patientCns").addClass('input-invalid');
	}
	else {
        $("#patientCns").removeClass('input-invalid');
		validCns = true
	}
}

function validaCNS(vlrCNS) {
    // Formulário que contem o campo CNS
    var soma = new Number;
    var resto = new Number;
    var dv = new Number;
    var pis = new String;
    var resultado = new String;
    if (vlrCNS.length != 15) {
        validCns = false;
		$("#patientCns").addClass('input-invalid');
        $("#patientCnsError").show();
    }
    pis = vlrCNS.substring(0,11);
    soma = (((Number(pis.substring(0,1))) * 15) +
            ((Number(pis.substring(1,2))) * 14) +
            ((Number(pis.substring(2,3))) * 13) +
            ((Number(pis.substring(3,4))) * 12) +
            ((Number(pis.substring(4,5))) * 11) +
            ((Number(pis.substring(5,6))) * 10) +
            ((Number(pis.substring(6,7))) * 9) +
            ((Number(pis.substring(7,8))) * 8) +
            ((Number(pis.substring(8,9))) * 7) +
            ((Number(pis.substring(9,10))) * 6) +
            ((Number(pis.substring(10,11))) * 5));

    resto = soma % 11;
    dv = 11 - resto;
    if (dv == 11) {
        dv = 0;
    }

    if (dv == 10) {
        soma = (((Number(pis.substring(0,1))) * 15) +
                ((Number(pis.substring(1,2))) * 14) +
                ((Number(pis.substring(2,3))) * 13) +
                ((Number(pis.substring(3,4))) * 12) +
                ((Number(pis.substring(4,5))) * 11) +
                ((Number(pis.substring(5,6))) * 10) +
                ((Number(pis.substring(6,7))) * 9) +
                ((Number(pis.substring(7,8))) * 8) +
                ((Number(pis.substring(8,9))) * 7) +
                ((Number(pis.substring(9,10))) * 6) +
                ((Number(pis.substring(10,11))) * 5) + 2);

        resto = soma % 11;
        dv = 11 - resto;
        resultado = pis + "001" + String(dv);

    } else {
        resultado = pis + "000" + String(dv);

    }

    if (vlrCNS != resultado) {
        $("#patientCns").addClass('input-invalid');
        $("#patientCnsError").show();
        validCns = false;
    } else {
       $("#patientCns").removeClass('input-invalid');
       validCns = true;
    }
}

$('#patientCns').focusin(function(){
    $("#patientCns").removeClass('input-invalid');
    $("#patientCnsError").hide();
})

