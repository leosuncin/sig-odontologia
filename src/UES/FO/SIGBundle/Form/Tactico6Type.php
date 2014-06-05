<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Tactico6Type extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_inicio', 'date', array(
                'label'           => 'Fecha de inicio',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder' => 'Por ejemplo: 17/01/2007',
                    'class'       => 'datepicker'
                )
                ))
            ->add('fecha_fin', 'date', array(
                'label'           => 'Fecha de fin',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder' => 'Por ejemplo: 17/10/2009',
                    'class'       => 'datepicker'
                )
                ))
            ->add('sexo', 'choice',
                array(
                    'label'   => 'Sexo',
                    'choices' => array(
                        0 => 'Ambos',
                        1 => 'Masculino',
                        2 => 'Femenino'
                )))
               
                ->add('estadio', 'choice',
                array(
                    'label'   => 'Valor de Estadio de Nolla: ',
                    'choices' => array(
                        0 => '0',
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                        6 => '6',
                        7 => '7',
                        8 => '8'
                )))
            ->add('actions', 'form_actions');
            
            $builder->get('actions')
            ->add('generar', 'submit', array(
                'attr' => array(
                    'data-loading-text' => 'Preparando...'
            )))
            ->add('limpiar', 'reset');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    /*public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(                                           //este metodo lo descomentare cuando Jo agregue el archivo
            'data_class' => 'UES\FO\SIGBundle\Model\ParametrosTactico'          // ParametrosEstrategico
        ));
    }*/

    /**
     * @return string
     */
    public function getName()
    {
        return 'parametros';
    }
}
