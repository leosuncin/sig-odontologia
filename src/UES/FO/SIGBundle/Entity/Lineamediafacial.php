<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lineamediafacial
 *
 * @ORM\Table(name="LINEAMEDIAFACIAL", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Lineamediafacial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDLINEAMEDIAFACIAL", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlineamediafacial;

    /**
     * @var integer
     *
     * @ORM\Column(name="MX", type="integer", nullable=false)
     */
    private $mx;

    /**
     * @var integer
     *
     * @ORM\Column(name="MXDESVIACION", type="integer", nullable=false)
     */
    private $mxdesviacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="MD", type="integer", nullable=false)
     */
    private $md;

    /**
     * @var integer
     *
     * @ORM\Column(name="MDDESVIACION", type="integer", nullable=false)
     */
    private $mddesviacion;

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
     * Get idlineamediafacial
     *
     * @return integer 
     */
    public function getIdlineamediafacial()
    {
        return $this->idlineamediafacial;
    }

    /**
     * Set mx
     *
     * @param integer $mx
     * @return Lineamediafacial
     */
    public function setMx($mx)
    {
        $this->mx = $mx;

        return $this;
    }

    /**
     * Get mx
     *
     * @return integer 
     */
    public function getMx()
    {
        return $this->mx;
    }

    /**
     * Set mxdesviacion
     *
     * @param integer $mxdesviacion
     * @return Lineamediafacial
     */
    public function setMxdesviacion($mxdesviacion)
    {
        $this->mxdesviacion = $mxdesviacion;

        return $this;
    }

    /**
     * Get mxdesviacion
     *
     * @return integer 
     */
    public function getMxdesviacion()
    {
        return $this->mxdesviacion;
    }

    /**
     * Set md
     *
     * @param integer $md
     * @return Lineamediafacial
     */
    public function setMd($md)
    {
        $this->md = $md;

        return $this;
    }

    /**
     * Get md
     *
     * @return integer 
     */
    public function getMd()
    {
        return $this->md;
    }

    /**
     * Set mddesviacion
     *
     * @param integer $mddesviacion
     * @return Lineamediafacial
     */
    public function setMddesviacion($mddesviacion)
    {
        $this->mddesviacion = $mddesviacion;

        return $this;
    }

    /**
     * Get mddesviacion
     *
     * @return integer 
     */
    public function getMddesviacion()
    {
        return $this->mddesviacion;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Lineamediafacial
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
