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
            // ->add('sexo', 'choice',
            //     array(
            //         'label'   => 'Sexo',
            //         'choices' => array(
            //             0 => 'Ambos',
            //             1 => 'Masculino',
            //             2 => 'Femenino'
            //     )))
            ->add('pieza_estadio', 'choice',
                array(
                    'label'   => 'Seleccione la Pieza:',
                    'choices' => array(
                        1 => '1-1',
                        2 => '1-2',
                        3 => '1-3',
                        4 => '1-4',
                        5 => '1-5',
                        6 => '1-6',
                        7 => '1-7',
                        8 => '1-8',
                        9 => '2-1',
                        10 => '2-2',
                        11 => '2-3',
                        12 => '2-4',
                        13 => '2-5',
                        14 => '2-6',
                        15 => '2-7',
                        16 => '2-8',
                        17 => '3-1',
                        18 => '3-2',
                        19 => '3-3',
                        20 => '3-4',
                        21 => '3-5',
                        22 => '3-6',
                        23 => '3-7',
                        24 => '3-8',
                        25 => '4-1',
                        26 => '4-2',
                        27 => '4-3',
                        28 => '4-4',
                        29 => '4-5',
                        30 => '4-6',
                        31 => '4-7',
                        32 => '4-8'
                )))

                // ->add('estadio', 'choice',
                // array(
                //     'label'   => 'Valor de Estadio de Nolla de Pieza: ',
                //     'choices' => array(
                //         0 => '0',
                //         1 => '1',
                //         2 => '2',
                //         3 => '3',
                //         4 => '4',
                //         5 => '5',
                //         6 => '6',
                //         7 => '7',
                //         8 => '8',
                //         9 => '9',
                //         10=> '10'
                // )))
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
