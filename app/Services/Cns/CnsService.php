<?php

namespace App\Services\Cns;

class CnsService implements CnsServiceContracts
{
    /**
     * @inheritdoc
     */
    public function validateCnsNumber($date)
    {
    }


    public boolean validaCns(string $cns){
        if ($cns.trim().length() != 15){
        return(false);
        }

        // $soma;
        // float resto, dv;
        // String pis = new String("");
        // String resultado = new String("");
        $pis = $cns.substring(0,11);

        $soma = ((Integer.valueOf(pis.substring(0,1)).intValue()) * 15) +
        ((Integer.valueOf(pis.substring(1,2)).intValue()) * 14) +
        ((Integer.valueOf(pis.substring(2,3)).intValue()) * 13) +
        ((Integer.valueOf(pis.substring(3,4)).intValue()) * 12) +
        ((Integer.valueOf(pis.substring(4,5)).intValue()) * 11) +
        ((Integer.valueOf(pis.substring(5,6)).intValue()) * 10) +
        ((Integer.valueOf(pis.substring(6,7)).intValue()) * 9) +
        ((Integer.valueOf(pis.substring(7,8)).intValue()) * 8) +
        ((Integer.valueOf(pis.substring(8,9)).intValue()) * 7) +
        ((Integer.valueOf(pis.substring(9,10)).intValue()) * 6) +
        ((Integer.valueOf(pis.substring(10,11)).intValue()) * 5);

        resto = soma % 11;
        dv = 11 - resto;

        if (dv == 11){
        dv = 0;
        }

        if (dv == 10){
        soma = ((Integer.valueOf(pis.substring(0,1)).intValue()) * 15) +
        ((Integer.valueOf(pis.substring(1,2)).intValue()) * 14) +
        ((Integer.valueOf(pis.substring(2,3)).intValue()) * 13) +
        ((Integer.valueOf(pis.substring(3,4)).intValue()) * 12) +
        ((Integer.valueOf(pis.substring(4,5)).intValue()) * 11) +
        ((Integer.valueOf(pis.substring(5,6)).intValue()) * 10) +
        ((Integer.valueOf(pis.substring(6,7)).intValue()) * 9) +
        ((Integer.valueOf(pis.substring(7,8)).intValue()) * 8) +
        ((Integer.valueOf(pis.substring(8,9)).intValue()) * 7) +
        ((Integer.valueOf(pis.substring(9,10)).intValue()) * 6) +
        ((Integer.valueOf(pis.substring(10,11)).intValue()) * 5) + 2;

        resto = soma % 11;
        dv = 11 - resto;
        resultado = pis + "001" + String.valueOf((int)dv);
        }
        else{
        resultado = pis + "000" + String.valueOf((int)dv);
        }

        if (! cns.equals(resultado)){
        return(false);
        }
        else{
        return(true);
        }
        }


}
