<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plantratamiento
 *
 * @ORM\Table(name="PLANTRATAMIENTO", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Plantratamiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPLAN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplan;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRETRATAMIENTO", type="string", length=30, nullable=false)
     */
    private $nombretratamiento;

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
     * Get idplan
     *
     * @return integer 
     */
    public function getIdplan()
    {
        return $this->idplan;
    }

    /**
     * Set nombretratamiento
     *
     * @param string $nombretratamiento
     * @return Plantratamiento
     */
    public function setNombretratamiento($nombretratamiento)
    {
        $this->nombretratamiento = $nombretratamiento;

        return $this;
    }

    /**
     * Get nombretratamiento
     *
     * @return string 
     */
    public function getNombretratamiento()
    {
        return $this->nombretratamiento;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Plantratamiento
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
