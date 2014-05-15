<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estadiosdenolla
 *
 * @ORM\Table(name="ESTADIOSDENOLLA", indexes={@ORM\Index(name="CODEXPEDIENTE", columns={"CODEXPEDIENTE"})})
 * @ORM\Entity
 */
class Estadiosdenolla
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDESTADIO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idestadio;

    /**
     * @var integer
     *
     * @ORM\Column(name="E51", type="integer", nullable=false)
     */
    private $e51;

    /**
     * @var integer
     *
     * @ORM\Column(name="E52", type="integer", nullable=false)
     */
    private $e52;

    /**
     * @var integer
     *
     * @ORM\Column(name="E53", type="integer", nullable=false)
     */
    private $e53;

    /**
     * @var integer
     *
     * @ORM\Column(name="E54", type="integer", nullable=false)
     */
    private $e54;

    /**
     * @var integer
     *
     * @ORM\Column(name="E55", type="integer", nullable=false)
     */
    private $e55;

    /**
     * @var integer
     *
     * @ORM\Column(name="E61", type="integer", nullable=false)
     */
    private $e61;

    /**
     * @var integer
     *
     * @ORM\Column(name="E62", type="integer", nullable=false)
     */
    private $e62;

    /**
     * @var integer
     *
     * @ORM\Column(name="E63", type="integer", nullable=false)
     */
    private $e63;

    /**
     * @var integer
     *
     * @ORM\Column(name="E64", type="integer", nullable=false)
     */
    private $e64;

    /**
     * @var integer
     *
     * @ORM\Column(name="E65", type="integer", nullable=false)
     */
    private $e65;

    /**
     * @var integer
     *
     * @ORM\Column(name="E71", type="integer", nullable=false)
     */
    private $e71;

    /**
     * @var integer
     *
     * @ORM\Column(name="E72", type="integer", nullable=false)
     */
    private $e72;

    /**
     * @var integer
     *
     * @ORM\Column(name="E73", type="integer", nullable=false)
     */
    private $e73;

    /**
     * @var integer
     *
     * @ORM\Column(name="E74", type="integer", nullable=false)
     */
    private $e74;

    /**
     * @var integer
     *
     * @ORM\Column(name="E75", type="integer", nullable=false)
     */
    private $e75;

    /**
     * @var integer
     *
     * @ORM\Column(name="E81", type="integer", nullable=false)
     */
    private $e81;

    /**
     * @var integer
     *
     * @ORM\Column(name="E82", type="integer", nullable=false)
     */
    private $e82;

    /**
     * @var integer
     *
     * @ORM\Column(name="E83", type="integer", nullable=false)
     */
    private $e83;

    /**
     * @var integer
     *
     * @ORM\Column(name="E84", type="integer", nullable=false)
     */
    private $e84;

    /**
     * @var integer
     *
     * @ORM\Column(name="E85", type="integer", nullable=false)
     */
    private $e85;

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
     * Get idestadio
     *
     * @return integer 
     */
    public function getIdestadio()
    {
        return $this->idestadio;
    }

    /**
     * Set e51
     *
     * @param integer $e51
     * @return Estadiosdenolla
     */
    public function setE51($e51)
    {
        $this->e51 = $e51;

        return $this;
    }

    /**
     * Get e51
     *
     * @return integer 
     */
    public function getE51()
    {
        return $this->e51;
    }

    /**
     * Set e52
     *
     * @param integer $e52
     * @return Estadiosdenolla
     */
    public function setE52($e52)
    {
        $this->e52 = $e52;

        return $this;
    }

    /**
     * Get e52
     *
     * @return integer 
     */
    public function getE52()
    {
        return $this->e52;
    }

    /**
     * Set e53
     *
     * @param integer $e53
     * @return Estadiosdenolla
     */
    public function setE53($e53)
    {
        $this->e53 = $e53;

        return $this;
    }

    /**
     * Get e53
     *
     * @return integer 
     */
    public function getE53()
    {
        return $this->e53;
    }

    /**
     * Set e54
     *
     * @param integer $e54
     * @return Estadiosdenolla
     */
    public function setE54($e54)
    {
        $this->e54 = $e54;

        return $this;
    }

    /**
     * Get e54
     *
     * @return integer 
     */
    public function getE54()
    {
        return $this->e54;
    }

    /**
     * Set e55
     *
     * @param integer $e55
     * @return Estadiosdenolla
     */
    public function setE55($e55)
    {
        $this->e55 = $e55;

        return $this;
    }

    /**
     * Get e55
     *
     * @return integer 
     */
    public function getE55()
    {
        return $this->e55;
    }

    /**
     * Set e61
     *
     * @param integer $e61
     * @return Estadiosdenolla
     */
    public function setE61($e61)
    {
        $this->e61 = $e61;

        return $this;
    }

    /**
     * Get e61
     *
     * @return integer 
     */
    public function getE61()
    {
        return $this->e61;
    }

    /**
     * Set e62
     *
     * @param integer $e62
     * @return Estadiosdenolla
     */
    public function setE62($e62)
    {
        $this->e62 = $e62;

        return $this;
    }

    /**
     * Get e62
     *
     * @return integer 
     */
    public function getE62()
    {
        return $this->e62;
    }

    /**
     * Set e63
     *
     * @param integer $e63
     * @return Estadiosdenolla
     */
    public function setE63($e63)
    {
        $this->e63 = $e63;

        return $this;
    }

    /**
     * Get e63
     *
     * @return integer 
     */
    public function getE63()
    {
        return $this->e63;
    }

    /**
     * Set e64
     *
     * @param integer $e64
     * @return Estadiosdenolla
     */
    public function setE64($e64)
    {
        $this->e64 = $e64;

        return $this;
    }

    /**
     * Get e64
     *
     * @return integer 
     */
    public function getE64()
    {
        return $this->e64;
    }

    /**
     * Set e65
     *
     * @param integer $e65
     * @return Estadiosdenolla
     */
    public function setE65($e65)
    {
        $this->e65 = $e65;

        return $this;
    }

    /**
     * Get e65
     *
     * @return integer 
     */
    public function getE65()
    {
        return $this->e65;
    }

    /**
     * Set e71
     *
     * @param integer $e71
     * @return Estadiosdenolla
     */
    public function setE71($e71)
    {
        $this->e71 = $e71;

        return $this;
    }

    /**
     * Get e71
     *
     * @return integer 
     */
    public function getE71()
    {
        return $this->e71;
    }

    /**
     * Set e72
     *
     * @param integer $e72
     * @return Estadiosdenolla
     */
    public function setE72($e72)
    {
        $this->e72 = $e72;

        return $this;
    }

    /**
     * Get e72
     *
     * @return integer 
     */
    public function getE72()
    {
        return $this->e72;
    }

    /**
     * Set e73
     *
     * @param integer $e73
     * @return Estadiosdenolla
     */
    public function setE73($e73)
    {
        $this->e73 = $e73;

        return $this;
    }

    /**
     * Get e73
     *
     * @return integer 
     */
    public function getE73()
    {
        return $this->e73;
    }

    /**
     * Set e74
     *
     * @param integer $e74
     * @return Estadiosdenolla
     */
    public function setE74($e74)
    {
        $this->e74 = $e74;

        return $this;
    }

    /**
     * Get e74
     *
     * @return integer 
     */
    public function getE74()
    {
        return $this->e74;
    }

    /**
     * Set e75
     *
     * @param integer $e75
     * @return Estadiosdenolla
     */
    public function setE75($e75)
    {
        $this->e75 = $e75;

        return $this;
    }

    /**
     * Get e75
     *
     * @return integer 
     */
    public function getE75()
    {
        return $this->e75;
    }

    /**
     * Set e81
     *
     * @param integer $e81
     * @return Estadiosdenolla
     */
    public function setE81($e81)
    {
        $this->e81 = $e81;

        return $this;
    }

    /**
     * Get e81
     *
     * @return integer 
     */
    public function getE81()
    {
        return $this->e81;
    }

    /**
     * Set e82
     *
     * @param integer $e82
     * @return Estadiosdenolla
     */
    public function setE82($e82)
    {
        $this->e82 = $e82;

        return $this;
    }

    /**
     * Get e82
     *
     * @return integer 
     */
    public function getE82()
    {
        return $this->e82;
    }

    /**
     * Set e83
     *
     * @param integer $e83
     * @return Estadiosdenolla
     */
    public function setE83($e83)
    {
        $this->e83 = $e83;

        return $this;
    }

    /**
     * Get e83
     *
     * @return integer 
     */
    public function getE83()
    {
        return $this->e83;
    }

    /**
     * Set e84
     *
     * @param integer $e84
     * @return Estadiosdenolla
     */
    public function setE84($e84)
    {
        $this->e84 = $e84;

        return $this;
    }

    /**
     * Get e84
     *
     * @return integer 
     */
    public function getE84()
    {
        return $this->e84;
    }

    /**
     * Set e85
     *
     * @param integer $e85
     * @return Estadiosdenolla
     */
    public function setE85($e85)
    {
        $this->e85 = $e85;

        return $this;
    }

    /**
     * Get e85
     *
     * @return integer 
     */
    public function getE85()
    {
        return $this->e85;
    }

    /**
     * Set codexpediente
     *
     * @param \UES\FO\SIGBundle\Entity\Datosgenerales $codexpediente
     * @return Estadiosdenolla
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
