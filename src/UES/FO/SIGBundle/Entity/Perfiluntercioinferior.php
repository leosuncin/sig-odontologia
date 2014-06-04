<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfiluntercioinferior
 *
 * @ORM\Table(name="perfiluntercioinferior")
 * @ORM\Entity
 */
class Perfiluntercioinferior
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idperfiluntercioinferior", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperfiluntercioinferior;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreperfiluntercioinferior", type="string", length=20, nullable=false)
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
