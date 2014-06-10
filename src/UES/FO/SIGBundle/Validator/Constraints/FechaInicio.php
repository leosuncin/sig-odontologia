<?php

namespace UES\FO\SIGBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class FechaInicio extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public $message = 'La fecha de inicio debe ser posterior a la fecha %limite%.';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'periodo_validator';
    }
}
