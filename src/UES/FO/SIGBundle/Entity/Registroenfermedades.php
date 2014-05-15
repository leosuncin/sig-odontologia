<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registroenfermedades
 *
 * @ORM\Table(name="REGISTROENFERMEDADES", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"}), @ORM\Index(name="IDENFERMEDAD", columns={"IDENFERMEDAD"})})
 * @ORM\Entity
 */
class Registroenfermedades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDREGISTRO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idregistro;

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
     * @var \Catalogoenfermedades
     *
     * @ORM\ManyToOne(targetEntity="Catalogoenfermedades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDENFERMEDAD", referencedColumnName="IDENFERMEDAD")
     * })
     */
    private $idenfermedad;



    /**
     * Get idregistro
     *
     * @return integer 
     */
    public function getIdregistro()
    {
        return $this->idregistro;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Registroenfermedades
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

    /**
     * Set idenfermedad
     *
     * @param \UES\FO\SIGBundle\Entity\Catalogoenfermedades $idenfermedad
     * @return Registroenfermedades
     */
    public function setIdenfermedad(\UES\FO\SIGBundle\Entity\Catalogoenfermedades $idenfermedad = null)
    {
        $this->idenfermedad = $idenfermedad;

        return $this;
    }

    /**
     * Get idenfermedad
     *
     * @return \UES\FO\SIGBundle\Entity\Catalogoenfermedades 
     */
    public function getIdenfermedad()
    {
        return $this->idenfermedad;
    }
}
