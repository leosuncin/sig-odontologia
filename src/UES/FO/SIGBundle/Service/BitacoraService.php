<?php

namespace UES\FO\SIGBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use UES\FO\SIGBundle\Entity\Bitacora;

class BitacoraService {
    private $em;
    private $user;

    public function __construct(EntityManager $em, $context)
    {
        $this->em = $em;
        $usuario = $context->getToken()->getUser();
        if(is_object($usuario))
            $this->user = $usuario;
    }

    public function actividad($message)
    {
        $actividad = new Bitacora();
        $actividad->setAccion($message)
            ->setFechayhora(new \DateTime('NOW', new \DateTimeZone('America/El_Salvador')))
            ->setIdusuario($this->user);
        $this->em->persist($actividad);
        $this->em->flush();
        return $this;
    }
}