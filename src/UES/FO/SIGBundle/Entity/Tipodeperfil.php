<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipodeperfil
 *
 * @ORM\Table(name="tipodeperfil", indexes={@ORM\Index(name="codexpediente", columns={"codexpediente"}), @ORM\Index(name="idperfiluntercioinferior", columns={"idperfiluntercioinferior"}), @ORM\Index(name="idfacialfrontal", columns={"idfacialfrontal"}), @ORM\Index(name="idperfiltotal", columns={"idperfiltotal"})})
 * @ORM\Entity
 */
class Tipodeperfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtipodeperfil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipodeperfil;

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
     * @var \Perfiluntercioinferior
     *
     * @ORM\ManyToOne(targetEntity="Perfiluntercioinferior")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idperfiluntercioinferior", referencedColumnName="idperfiluntercioinferior")
     * })
     */
    private $idperfiluntercioinferior;

    /**
     * @var \Facialfrontal
     *
     * @ORM\ManyToOne(targetEntity="Facialfrontal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfacialfrontal", referencedColumnName="idfacialfrontal")
     * })
     */
    private $idfacialfrontal;

    /**
     * @var \Perfiltotal
     *
     * @ORM\ManyToOne(targetEntity="Perfiltotal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idperfiltotal", referencedColumnName="idperfiltotal")
     * })
     */
    private $idperfiltotal;



    /**
     * Get idtipodeperfil
     *
     * @return integer 
     */
    public function getIdtipodeperfil()
    {
        return $this->idtipodeperfil;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Tipodeperfil
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
     * Set idperfiluntercioinferior
     *
     * @param \UES\FO\SIGBundle\Entity\Perfiluntercioinferior $idperfiluntercioinferior
     * @return Tipodeperfil
     */
    public function setIdperfiluntercioinferior(\UES\FO\SIGBundle\Entity\Perfiluntercioinferior $idperfiluntercioinferior = null)
    {
        $this->idperfiluntercioinferior = $idperfiluntercioinferior;

        return $this;
    }

    /**
     * Get idperfiluntercioinferior
     *
     * @return \UES\FO\SIGBundle\Entity\Perfiluntercioinferior 
     */
    public function getIdperfiluntercioinferior()
    {
        return $this->idperfiluntercioinferior;
    }

    /**
     * Set idfacialfrontal
     *
     * @param \UES\FO\SIGBundle\Entity\Facialfrontal $idfacialfrontal
     * @return Tipodeperfil
     */
    public function setIdfacialfrontal(\UES\FO\SIGBundle\Entity\Facialfrontal $idfacialfrontal = null)
    {
        $this->idfacialfrontal = $idfacialfrontal;

        return $this;
    }

    /**
     * Get idfacialfrontal
     *
     * @return \UES\FO\SIGBundle\Entity\Facialfrontal 
     */
    public function getIdfacialfrontal()
    {
        return $this->idfacialfrontal;
    }

    /**
     * Set idperfiltotal
     *
     * @param \UES\FO\SIGBundle\Entity\Perfiltotal $idperfiltotal
     * @return Tipodeperfil
     */
    public function setIdperfiltotal(\UES\FO\SIGBundle\Entity\Perfiltotal $idperfiltotal = null)
    {
        $this->idperfiltotal = $idperfiltotal;

        return $this;
    }

    /**
     * Get idperfiltotal
     *
     * @return \UES\FO\SIGBundle\Entity\Perfiltotal 
     */
    public function getIdperfiltotal()
    {
        return $this->idperfiltotal;
    }
}
