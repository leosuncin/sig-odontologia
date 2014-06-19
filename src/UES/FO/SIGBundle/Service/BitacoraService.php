<?php

namespace UES\FO\SIGBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContextInterface;
use UES\FO\SIGBundle\Entity\Bitacora;

class BitacoraService {
    private $em;
    private $user;

    public function __construct(EntityManager $em, SecurityContextInterface $context)
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
            ->setIdusuario($this->user);
        $this->em->persist($actividad);
        $this->em->flush();
        return $this;
    }
}