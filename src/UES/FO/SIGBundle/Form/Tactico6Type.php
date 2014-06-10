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
               
                ->add('pieza_estadio', 'choice',
                array(
                    'label'   => 'Pieza dental de Estudio: ',
                    'choices' => array(
                        0 => 'e51',
                        1 => 'e52',
                        2 => 'e53',
                        3 => 'e54',
                        4 => 'e55',
                        5 => 'e61',
                        6 => 'e62',
                        7 => 'e63',
                        8 => 'e64',
                        9 => 'e65',
                        10 => 'e71',
                        11 => 'e72',
                        12 => 'e73',
                        13 => 'e74',
                        14 => 'e75',
                        15 => 'e81',
                        16 => 'e82',
                        17 => 'e83',
                        18 => 'e84',
                        19 => 'e85',
                )))

                ->add('estadio', 'choice',
                array(
                    'label'   => 'Valor de Estadio de Nolla de Pieza: ',
                    'choices' => array(
                        0 => '0',
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                        6 => '6',
                        7 => '7',
                        8 => '8',
                        9 => '9',
                        10=> '10'
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
