<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfiluntercioinferior
 *
 * @ORM\Table(name="PERFILUNTERCIOINFERIOR")
 * @ORM\Entity
 */
class Perfiluntercioinferior
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPERFILUNTERCIOINFERIOR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperfiluntercioinferior;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBREPERFILUNTERCIOINFERIOR", type="string", length=20, nullable=false)
     */
    private $nombreperfiluntercioinferior;



    /**
     * Get idperfiluntercioinferior
     *
     * @return integer 
     */
    public function getIdperfiluntercioinferior()
    {
        return $this->idperfiluntercioinferior;
    }

    /**
     * Set nombreperfiluntercioinferior
     *
     * @param string $nombreperfiluntercioinferior
     * @return Perfiluntercioinferior
     */
    public function setNombreperfiluntercioinferior($nombreperfiluntercioinferior)
    {
        $this->nombreperfiluntercioinferior = $nombreperfiluntercioinferior;

        return $this;
    }

    /**
     * Get nombreperfiluntercioinferior
     *
     * @return string 
     */
    public function getNombreperfiluntercioinferior()
    {
        return $this->nombreperfiluntercioinferior;
    }
}
