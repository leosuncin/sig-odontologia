<?php

namespace UES\FO\SIGBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

class ParametrosTactico1
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
     * La enfermedad seleccionada
     * 
     * @var varchar
     *
     *@Assert\Choice(choices = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14}, message = "Escoja una enfermedad valida")
     */
    private $enfermedad;




/**
     * El perfil
     * 
     * @var int
     *
     *
     */
    private $perfil;

    /**
     * El tipo de perfil
     * 
     * @var int
     *
     * 
     */
    private $tipo;



/**
     * Los milimetros de la desviacion en mx
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3, 4}, message = "Escoja los milimetros validos")
     */
    private $milimetrosmx;




/**
     * Los milimetros de la desviacion en md
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3, 4}, message = "Escoja los milimetros validos")
     */
    private $milimetrosmd;





/**
     * La orientacion de la desviacion en mx
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2}, message = "Escoja una orientacion valida valido")
     */
    private $orientacionmx;




/**
     * La orientacion de la desviacion en md
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2}, message = "Escoja una orientacion valida valido")
     */
    private $orientacionmd;







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
                'fecha_fin',
                'La fecha de finalización debe ser posterior a la de inicio',
                array(),
                null
            );
    }






/**
     * set enfermedad
     * @param \varchar $enfermedad
     */
    public function setEnfermedad(\varchar $enfermedad)
    {
        $this->enfermedad = $enfermedad;
        return $this;
    }

    /**
     * get enfermedad
     * @return \varchar
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }






/**
     * set perfil
     * @param \int $perfil
     */
    public function setPerfil(\int $perfil)
    {
        $this->perfil = $perfil;
        return $this;
    }

    /**
     * get perfil
     * @return \int
     */
    public function getPerfil()
    {
        return $this->perfil;
    }







/**
     * set tipo
     * @param \int $tipo
     */
    public function setTipo(\int $perfil)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * get tipo
     * @return \int
     */
    public function getTipo()
    {
        return $this->tipo;
    }




/**
     * set milimetrosmx
     * @param \int $milimetrosmx
     */
    public function setMilimetrosMx(\int $milimetrosmx)
    {
        $this->milimetrosmx = $milimetrosmx;
        return $this;
    }

    /**
     * get milimetrosmx
     * @return \int
     */
    public function getMilimetrosMx()
    {
        return $this->milimetrosmx;
    }






/**
     * set milimetrosmd
     * @param \int $milimetrosmd
     */
    public function setMilimetrosMd(\int $milimetrosmd)
    {
        $this->milimetrosmd = $milimetrosmd;
        return $this;
    }

    /**
     * get milimetrosmd
     * @return \int
     */
    public function getMilimetrosMd()
    {
        return $this->milimetrosmd;
    }






/**
     * set orientacionmx
     * @param \int $orientacionmx
     */
    public function setOrientacionMx(\int $orientacionmx)
    {
        $this->orientacionmx = $orientacionmx;
        return $this;
    }

    /**
     * get orientacionmx
     * @return \int
     */
    public function getOrientacionMx()
    {
        return $this->orientacionmx;
    }




/**
     * set orientacionmd
     * @param \int $orientacionmd
     */
    public function setOrientacionMd(\int $orientacionmd)
    {
        $this->orientacionmd = $orientacionmd;
        return $this;
    }

    /**
     * get orientacionmx
     * @return \int
     */
    public function getOrientacionMd()
    {
        return $this->orientacionmd;
    }





}
