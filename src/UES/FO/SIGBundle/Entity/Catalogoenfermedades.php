<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogoenfermedades
 *
 * @ORM\Table(name="CATALOGOENFERMEDADES")
 * @ORM\Entity
 */
class Catalogoenfermedades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDENFERMEDAD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idenfermedad;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBREENFERMEDAD", type="string", length=20, nullable=false)
     */
    private $nombreenfermedad;



    /**
     * Get idenfermedad
     *
     * @return integer 
     */
    public function getIdenfermedad()
    {
        return $this->idenfermedad;
    }

    /**
     * Set nombreenfermedad
     *
     * @param string $nombreenfermedad
     * @return Catalogoenfermedades
     */
    public function setNombreenfermedad($nombreenfermedad)
    {
        $this->nombreenfermedad = $nombreenfermedad;

        return $this;
    }

    /**
     * Get nombreenfermedad
     *
     * @return string 
     */
    public function getNombreenfermedad()
    {
        return $this->nombreenfermedad;
    }
}
