<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citas
 *
 * @ORM\Table(name="CITAS", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Citas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="NUMCITA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numcita;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHACITA", type="date", nullable=false)
     */
    private $fechacita;

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
     * Get numcita
     *
     * @return integer 
     */
    public function getNumcita()
    {
        return $this->numcita;
    }

    /**
     * Set fechacita
     *
     * @param \DateTime $fechacita
     * @return Citas
     */
    public function setFechacita($fechacita)
    {
        $this->fechacita = $fechacita;

        return $this;
    }

    /**
     * Get fechacita
     *
     * @return \DateTime 
     */
    public function getFechacita()
    {
        return $this->fechacita;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Citas
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
