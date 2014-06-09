<?php

namespace UES\FO\SIGBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class FechaFin extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public $message = 'La fecha de fin debe ser anterior a la fecha %limite%.';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'periodo_validator';
    }
}
