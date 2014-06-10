<?php
namespace UES\FO\SIGBundle\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

class ParametrosTactico2
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
     * milimetros horizontales escogidos
     * 
     * @var int
     *
     *@Assert\Choice(choices = {0, 1, 2, 3, 4}, message = "Escoja milimetros horizontales de sobremordida")
     */
    private $milihorizontal;

/**
     * milimetros verticales mordidas cruzadas
     * 
     * @var int
     *
     *@Assert\Choice(choices = {0, 1, 2, 3, 4}, message = "Escoja milimetros verticales de sobremordida")
     */
    private $milivertical;

    /**
     * El cuadrante en mordidas cruzadas
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3}, message = "Escoja cuadrantes de mordidas cruzadas")
     */
    private $cuadrante;

/**
     * La pieza en Mordidas Cruzadas
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3, 4}, message = "Escoja las piezas en mordidas cruzadas")
     */
    private $pieza;

/**
     * Los estadios de nolla de 0-10
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19}, message = "La pieza Con Estadio de Nolla a Buscar")
     */
    private $pieza_estadios;

/**
     * Los estadios de nolla de 0-10
     * 
     * @var int
     *
     * @Assert\Choice(choices = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10}, message = "Escoja numero de Estadio de Nolla a muestrear")
     */
    private $estadios;

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
     * set milihorizontal
     * @param \int $milihorizontal
     */
    public function setMiliHorizontal($milihorizontal)
    {
        $this->milihorizontal = $milihorizontal;
        return $this;
    }

    /**
     * get milihorizontal
     * @return \int
     */
    public function getMiliHorizontal()
    {
        return $this->milihorizontal;
    }

/**
     * set perfil
     * @param \int $milivertical
     */
    public function setMiliVertical($milivertical)
    {
        $this->milivertical = $milivertical;
        return $this;
    }

    /**
     * get milivertical
     * @return \int
     */
    public function getMiliVertical ()
    {
        return $this->milivertical;
    }

/**
     * set cuadrante
     * @param \int $cuadrante
     */
    public function setCuadrante($cuadrante)
    {
        $this->cuadrante = $cuadrante;
        return $this;
    }

/**
     * get cuadrante
     * @return \int
     */
    public function getCuadrante()
    {
        return $this->cuadrante;
    }

/**
     * set pieza
     * @param \int $pieza
     */
    public function setPieza($pieza)
    {
        $this->pieza = $pieza;
        return $this;
    }

/**
     * get pieza
     * @return \int
     */
    public function getPieza()
    {
        return $this->pieza;
    }

/**
     * set estadios
     * @param \int $estadios
     */
    public function setEstadio($estadios)
    {
        $this->estadios = $estadios;
        return $this;
    }

/**
     * get estadios
     * @return \int
     */
    public function getEstadio()
    {
        return $this->estadios;
    }

/**
     * set pieza_estadios
     * @param \int $estadios
     */
    public function setPiezaEstadio($pieza_estadios)
    {
        $this->pieza_estadios = $pieza_estadios;
        return $this;
    }

/**
     * get pieza_estadios
     * @return \int
     */
    public function getPiezaEstadio()
    {
        return $this->pieza_estadios;
    }
}