<?php

namespace UES\FO\SIGBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;

class PeriodoValidator extends ConstraintValidator
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if(get_class($constraint) == 'UES\FO\SIGBundle\Validator\Constraints\FechaInicio') {
            $limite = $this->em->getRepository('SIGBundle:Datosgenerales')->minFechaRegistro();
            if($value < $limite)
                $this->context->addViolation(
                    $constraint->message,
                    array('%limite%' => $limite->format('d/m/Y'))
                );
        }
        if(get_class($constraint) == 'UES\FO\SIGBundle\Validator\Constraints\FechaFin') {
            $limite = $this->em->getRepository('SIGBundle:Datosgenerales')->maxFechaRegistro();
            if($value > $limite)
                $this->context->addViolation(
                    $constraint->message,
                    array('%limite%' => $limite->format('d/m/Y'))
                );
        }
    }
}
