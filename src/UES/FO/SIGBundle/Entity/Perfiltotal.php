<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfiltotal
 *
 * @ORM\Table(name="PERFILTOTAL")
 * @ORM\Entity
 */
class Perfiltotal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPERFILTOTAL", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperfiltotal;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBREPERFILTOTAL", type="string", length=20, nullable=false)
     */
    private $nombreperfiltotal;



    /**
     * Get idperfiltotal
     *
     * @return integer 
     */
    public function getIdperfiltotal()
    {
        return $this->idperfiltotal;
    }

    /**
     * Set nombreperfiltotal
     *
     * @param string $nombreperfiltotal
     * @return Perfiltotal
     */
    public function setNombreperfiltotal($nombreperfiltotal)
    {
        $this->nombreperfiltotal = $nombreperfiltotal;

        return $this;
    }

    /**
     * Get nombreperfiltotal
     *
     * @return string 
     */
    public function getNombreperfiltotal()
    {
        return $this->nombreperfiltotal;
    }
}
