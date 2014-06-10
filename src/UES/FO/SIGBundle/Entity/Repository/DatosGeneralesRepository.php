<?php

namespace UES\FO\SIGBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class DatosGeneralesRepository extends EntityRepository
{
    public function minFechaRegistro()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT MIN(d.fecharegistro) FROM SIGBundle:Datosgenerales d');
        return new \DateTime($query->getSingleResult()['1']);
    }

    public function maxFechaRegistro()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT MAX(c.fechacita) FROM SIGBundle:Citas c');
        return new \DateTime($query->getSingleResult()['1']);
    }

    public function periodoRegistro()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT MIN(d.fecharegistro) AS inicio, MAX(c.fechacita) AS fin FROM SIGBundle:Datosgenerales d, SIGBundle:Citas c');
        return $query->getArrayResult();
    }
}
