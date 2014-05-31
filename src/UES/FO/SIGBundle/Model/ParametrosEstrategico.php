<?php

namespace UES\FO\SIGBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

class ParametrosEstrategico
{
    /**
     * La fecha en que empieza el periodo de tiempo
     * 
     * @var \DateTime
     * 
     * @Assert\NotBlank(message = "El campo no puede quedar vacio")
     * @Assert\Date(message = "Ingrese una fecha valida")
     */
    private $fecha_inicio;

    /**
     * La fecha en que termina el periodo de tiempo
     *
     * @var \DateTime
     *
     * @Assert\NotBlank(message = "El campo no puede quedar vacio")
     * @Assert\Date(message = "Ingrese una fecha valida")
     */
    private $fecha_fin;

    /**
     * El sexo a filtrar
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2}, message = "Escoja un sexo valido")
     */
    private $sexo;

    /**
     * set fecha_inicio
     * @param \DateTime $fecha_inicio
     */
    public function setFechaInicio(\DateTime $fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
        return $this;
    }

    /**
     * get fecha_inicio
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * set fecha_fin
     * @param \DateTime $fecha_fin
     */
    public function setFechaFin(\DateTime $fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
        return $this;
    }

    /**
     * get fecha_fin
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * set sexo
     * @param int $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * get sexo
     * @return int
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Verifica que el periodo sea valido
     * 
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context)
    {
        if($this->fecha_fin < $this->fecha_inicio)
            $context->addViolationAt(
                'fecha_inicio',
                'La fecha de finalización debe ser posterior a la de inicio',
                array(),
                null
            );
    }
}