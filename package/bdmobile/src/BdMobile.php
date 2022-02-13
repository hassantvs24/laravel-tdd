<?php


namespace Naztech\BdMobile;


class BdMobile
{
    protected $process;

    public function __construct()
    {
        $this->process = new ProcessNumber();
    }

    public function valid($number)
    {
        return $this->process->isValid($number);
    }

    public function simple($number)
    {
        return $this->process->simple($number);
    }

    public function normal($number)
    {
        return $this->process->normal($number);
    }

    public function extend($number)
    {
        return $this->process->extend($number);
    }

    public function full($number)
    {
        return $this->process->full($number);
    }

    public function fullex($number)
    {
        return $this->process->fullex($number);
    }
}
