<?php

namespace UES\FO\SIGBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use UES\FO\SIGBundle\Validator\Constraints as SigAssert;

class ParametrosAdmin
{
    

    /**
     * El tipo a filtrar
     *
     * @var int
     *
     * @Assert\Choice(choices = {0, 1}, message = "Escoja un tipo de acción valido")
     */
    protected $tipo;


    /**
     * set tipo
     * @param int $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * get tipo
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
