<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facialfrontal
 *
 * @ORM\Table(name="facialfrontal")
 * @ORM\Entity
 */
class Facialfrontal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfacialfrontal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfacialfrontal;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrefacialfrontal", type="string", length=20, nullable=false)
     */
    private $nombrefacialfrontal;



    /**
     * Get idfacialfrontal
     *
     * @return integer 
     */
    public function getIdfacialfrontal()
    {
        return $this->idfacialfrontal;
    }

    /**
     * Set nombrefacialfrontal
     *
     * @param string $nombrefacialfrontal
     * @return Facialfrontal
     */
    public function setNombrefacialfrontal($nombrefacialfrontal)
    {
        $this->nombrefacialfrontal = $nombrefacialfrontal;

        return $this;
    }

    /**
     * Get nombrefacialfrontal
     *
     * @return string 
     */
    public function getNombrefacialfrontal()
    {
        return $this->nombrefacialfrontal;
    }
}
