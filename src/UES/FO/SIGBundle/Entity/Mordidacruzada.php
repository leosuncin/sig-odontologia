<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mordidacruzada
 *
 * @ORM\Table(name="MORDIDACRUZADA", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Mordidacruzada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDMORDIDACRUZADA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmordidacruzada;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUADSUPERIOR", type="integer", nullable=false)
     */
    private $cuadsuperior;

    /**
     * @var integer
     *
     * @ORM\Column(name="PIEZASUPERIOR", type="integer", nullable=false)
     */
    private $piezasuperior;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUADINFERIOR", type="integer", nullable=false)
     */
    private $cuadinferior;

    /**
     * @var integer
     *
     * @ORM\Column(name="PIEZAINFERIOR", type="integer", nullable=false)
     */
    private $piezainferior;

    /**
     * @var string
     *
     * @ORM\Column(name="INFERIOR", type="string", length=5, nullable=false)
     */
    private $inferior;

    /**
     * @var string
     *
     * @ORM\Column(name="SUPERIOR", type="string", length=5, nullable=false)
     */
    private $superior;

    /**
     * @var \Datosgenerales
     *
     * @ORM\ManyToOne(targetEntity="Datosgenerales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODEXPEDIENTE", referencedColumnName="CODEXPEDIENTE")
     * })
     */
    private $codexpediente;



    /**
     * Get idmordidacruzada
     *
     * @return integer 
     */
    public function getIdmordidacruzada()
    {
        return $this->idmordidacruzada;
    }

    /**
     * Set cuadsuperior
     *
     * @param integer $cuadsuperior
     * @return Mordidacruzada
     */
    public function setCuadsuperior($cuadsuperior)
    {
        $this->cuadsuperior = $cuadsuperior;

        return $this;
    }

    /**
     * Get cuadsuperior
     *
     * @return integer 
     */
    public function getCuadsuperior()
    {
        return $this->cuadsuperior;
    }

    /**
     * Set piezasuperior
     *
     * @param integer $piezasuperior
     * @return Mordidacruzada
     */
    public function setPiezasuperior($piezasuperior)
    {
        $this->piezasuperior = $piezasuperior;

        return $this;
    }

    /**
     * Get piezasuperior
     *
     * @return integer 
     */
    public function getPiezasuperior()
    {
        return $this->piezasuperior;
    }

    /**
     * Set cuadinferior
     *
     * @param integer $cuadinferior
     * @return Mordidacruzada
     */
    public function setCuadinferior($cuadinferior)
    {
        $this->cuadinferior = $cuadinferior;

        return $this;
    }

    /**
     * Get cuadinferior
     *
     * @return integer 
     */
    public function getCuadinferior()
    {
        return $this->cuadinferior;
    }

    /**
     * Set piezainferior
     *
     * @param integer $piezainferior
     * @return Mordidacruzada
     */
    public function setPiezainferior($piezainferior)
    {
        $this->piezainferior = $piezainferior;

        return $this;
    }

    /**
     * Get piezainferior
     *
     * @return integer 
     */
    public function getPiezainferior()
    {
        return $this->piezainferior;
    }

    /**
     * Set inferior
     *
     * @param string $inferior
     * @return Mordidacruzada
     */
    public function setInferior($inferior)
    {
        $this->inferior = $inferior;

        return $this;
    }

    /**
     * Get inferior
     *
     * @return string 
     */
    public function getInferior()
    {
        return $this->inferior;
    }

    /**
     * Set superior
     *
     * @param string $superior
     * @return Mordidacruzada
     */
    public function setSuperior($superior)
    {
        $this->superior = $superior;

        return $this;
    }

    /**
     * Get superior
     *
     * @return string 
     */
    public function getSuperior()
    {
        return $this->superior;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Mordidacruzada
     */
    public function setCodexpediente(\UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente = null)
    {
        $this->codexpediente = $codexpediente;

        return $this;
    }

    /**
     * Get codexpediente
     *
     * @return \UES\FO\SIGBundle\Entity\Datosgenerales 
     */
    public function getCodexpediente()
    {
        return $this->codexpediente;
    }
}
