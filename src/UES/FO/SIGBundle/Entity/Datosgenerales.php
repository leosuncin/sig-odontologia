<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datosgenerales
 *
 * @ORM\Table(name="datosgenerales")
 * @ORM\Entity
 */
class Datosgenerales
{
    /**
     * @var string
     *
     * @ORM\Column(name="codexpediente", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codexpediente;

    /**
     * @var integer
     *
     * @ORM\Column(name="edadregistro", type="integer", nullable=false)
     */
    private $edadregistro;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=1, nullable=false)
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechanacimiento", type="date", nullable=false)
     */
    private $fechanacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecharegistro", type="date", nullable=false)
     */
    private $fecharegistro;



    /**
     * Get codexpediente
     *
     * @return string 
     */
    public function getCodexpediente()
    {
        return $this->codexpediente;
    }

    /**
     * Set edadregistro
     *
     * @param integer $edadregistro
     * @return Datosgenerales
     */
    public function setEdadregistro($edadregistro)
    {
        $this->edadregistro = $edadregistro;

        return $this;
    }

    /**
     * Get edadregistro
     *
     * @return integer 
     */
    public function getEdadregistro()
    {
        return $this->edadregistro;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return Datosgenerales
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechanacimiento
     *
     * @param \DateTime $fechanacimiento
     * @return Datosgenerales
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    /**
     * Get fechanacimiento
     *
     * @return \DateTime 
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Datosgenerales
     */
    public function setFecharegistro($fecharegistro)
    {
        $this->fecharegistro = $fecharegistro;

        return $this;
    }

    /**
     * Get fecharegistro
     *
     * @return \DateTime 
     */
    public function getFecharegistro()
    {
        return $this->fecharegistro;
    }
}
