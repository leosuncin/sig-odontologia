<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitacora
 *
 * @ORM\Table(name="bitacora", indexes={@ORM\Index(name="idusuario", columns={"idusuario"})})
 * @ORM\Entity
 */
class Bitacora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idaccion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=50, nullable=false)
     */
    private $accion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechayhora", type="datetime", nullable=false)
     */
    private $fechayhora;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")
     * })
     */
    private $idusuario;



    /**
     * Get idaccion
     *
     * @return integer 
     */
    public function getIdaccion()
    {
        return $this->idaccion;
    }

    /**
     * Set accion
     *
     * @param string $accion
     * @return Bitacora
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string 
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set fechayhora
     *
     * @param \DateTime $fechayhora
     * @return Bitacora
     */
    public function setFechayhora($fechayhora)
    {
        $this->fechayhora = $fechayhora;

        return $this;
    }

    /**
     * Get fechayhora
     *
     * @return \DateTime 
     */
    public function getFechayhora()
    {
        return $this->fechayhora;
    }

    /**
     * Set idusuario
     *
     * @param \UES\FO\SIGBundle\Entity\Usuario $idusuario
     * @return Bitacora
     */
    public function setIdusuario(\UES\FO\SIGBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \UES\FO\SIGBundle\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
