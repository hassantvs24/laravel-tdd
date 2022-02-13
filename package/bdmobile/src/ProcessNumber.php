<?php


namespace Naztech\BdMobile;


use Naztech\BdMobile\Exceptions\InvalidNumber;

class ProcessNumber
{
    /**
     * Example Mobile +8801675870047
     */
    private $pattern = '/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/';

    private function number_create($mobileNumber)
    {
        switch (strlen($mobileNumber))
        {
            case 11:
                return '+88'.$mobileNumber;
                break;
            case 15:
                return str_replace("0088","+88", $mobileNumber);
                break;
            default:
                return $mobileNumber;
        }
    }

    public function isValid($mobileNumber)
    {
        if (!preg_match($this->pattern, $mobileNumber))
        {
            throw new InvalidNumber('Invalid mobile number!!');
        }

        return true;
    }

    public function simple($mobileNumber)
    {
        $this->isValid($mobileNumber);
        return str_replace("+880","", $this->number_create($mobileNumber));// 1675870047
    }

    public function normal($mobileNumber)
    {
        $this->isValid($mobileNumber);
        return str_replace("+88","", $this->number_create($mobileNumber));// 01675870047
    }

    public function extend($mobileNumber)
    {
        $this->isValid($mobileNumber);
        return str_replace("+","", $this->number_create($mobileNumber));// 8801675870047
    }

    public function full($mobileNumber)
    {
        $this->isValid($mobileNumber);
        return $this->number_create($mobileNumber);// +8801675870047
    }

    public function fullex($mobileNumber)
    {
        $this->isValid($mobileNumber);
        return str_replace("+","00", $this->number_create($mobileNumber));// 008801675870047
    }

}
