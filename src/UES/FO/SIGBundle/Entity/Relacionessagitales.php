<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relacionessagitales
 *
 * @ORM\Table(name="relacionessagitales", indexes={@ORM\Index(name="codexpediente", columns={"codexpediente"})})
 * @ORM\Entity
 */
class Relacionessagitales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idrelacionessagitales", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrelacionessagitales;

    /**
     * @var integer
     *
     * @ORM\Column(name="molarderecha", type="integer", nullable=false)
     */
    private $molarderecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="molarizquierda", type="integer", nullable=false)
     */
    private $molarizquierda;

    /**
     * @var integer
     *
     * @ORM\Column(name="caninaderecha", type="integer", nullable=false)
     */
    private $caninaderecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="caninaizquierda", type="integer", nullable=false)
     */
    private $caninaizquierda;

    /**
     * @var \Datosgenerales
     *
     * @ORM\ManyToOne(targetEntity="Datosgenerales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codexpediente", referencedColumnName="codexpediente")
     * })
     */
    private $codexpediente;



    /**
     * Get idrelacionessagitales
     *
     * @return integer 
     */
    public function getIdrelacionessagitales()
    {
        return $this->idrelacionessagitales;
    }

    /**
     * Set molarderecha
     *
     * @param integer $molarderecha
     * @return Relacionessagitales
     */
    public function setMolarderecha($molarderecha)
    {
        $this->molarderecha = $molarderecha;

        return $this;
    }

    /**
     * Get molarderecha
     *
     * @return integer 
     */
    public function getMolarderecha()
    {
        return $this->molarderecha;
    }

    /**
     * Set molarizquierda
     *
     * @param integer $molarizquierda
     * @return Relacionessagitales
     */
    public function setMolarizquierda($molarizquierda)
    {
        $this->molarizquierda = $molarizquierda;

        return $this;
    }

    /**
     * Get molarizquierda
     *
     * @return integer 
     */
    public function getMolarizquierda()
    {
        return $this->molarizquierda;
    }

    /**
     * Set caninaderecha
     *
     * @param integer $caninaderecha
     * @return Relacionessagitales
     */
    public function setCaninaderecha($caninaderecha)
    {
        $this->caninaderecha = $caninaderecha;

        return $this;
    }

    /**
     * Get caninaderecha
     *
     * @return integer 
     */
    public function getCaninaderecha()
    {
        return $this->caninaderecha;
    }

    /**
     * Set caninaizquierda
     *
     * @param integer $caninaizquierda
     * @return Relacionessagitales
     */
    public function setCaninaizquierda($caninaizquierda)
    {
        $this->caninaizquierda = $caninaizquierda;

        return $this;
    }

    /**
     * Get caninaizquierda
     *
     * @return integer 
     */
    public function getCaninaizquierda()
    {
        return $this->caninaizquierda;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Relacionessagitales
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
