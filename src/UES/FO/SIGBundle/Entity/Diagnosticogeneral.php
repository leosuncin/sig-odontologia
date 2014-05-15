<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnosticogeneral
 *
 * @ORM\Table(name="DIAGNOSTICOGENERAL", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Diagnosticogeneral
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDCITA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcita;

    /**
     * @var integer
     *
     * @ORM\Column(name="TRATAMIENTO", type="integer", nullable=false)
     */
    private $tratamiento;

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
     * Get idcita
     *
     * @return integer 
     */
    public function getIdcita()
    {
        return $this->idcita;
    }

    /**
     * Set tratamiento
     *
     * @param integer $tratamiento
     * @return Diagnosticogeneral
     */
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;

        return $this;
    }

    /**
     * Get tratamiento
     *
     * @return integer 
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Diagnosticogeneral
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
