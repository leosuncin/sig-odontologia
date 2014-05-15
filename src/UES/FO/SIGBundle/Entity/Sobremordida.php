<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sobremordida
 *
 * @ORM\Table(name="SOBREMORDIDA", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Sobremordida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDSOBREMORDIDA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsobremordida;

    /**
     * @var integer
     *
     * @ORM\Column(name="HORIZONTAL", type="integer", nullable=false)
     */
    private $horizontal;

    /**
     * @var integer
     *
     * @ORM\Column(name="VERTICAL", type="integer", nullable=false)
     */
    private $vertical;

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
     * Get idsobremordida
     *
     * @return integer 
     */
    public function getIdsobremordida()
    {
        return $this->idsobremordida;
    }

    /**
     * Set horizontal
     *
     * @param integer $horizontal
     * @return Sobremordida
     */
    public function setHorizontal($horizontal)
    {
        $this->horizontal = $horizontal;

        return $this;
    }

    /**
     * Get horizontal
     *
     * @return integer 
     */
    public function getHorizontal()
    {
        return $this->horizontal;
    }

    /**
     * Set vertical
     *
     * @param integer $vertical
     * @return Sobremordida
     */
    public function setVertical($vertical)
    {
        $this->vertical = $vertical;

        return $this;
    }

    /**
     * Get vertical
     *
     * @return integer 
     */
    public function getVertical()
    {
        return $this->vertical;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Sobremordida
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
