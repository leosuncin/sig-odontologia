<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Tactico3Type extends AbstractType
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

            ->add('orientacionmx', 'choice',
                array(
                    'label'   => 'Orientacion Mx',
                    'choices' => array(
                         0 => 'Izquierda',
                        1 => 'Central',
                        2 => 'Derecha',
                        
                )))

            ->add('orientacionmd', 'choice',
                array(
                    'label'   => 'Orientacion Md',
                    'choices' => array(
                         0 => 'Izquierda',
                        1 => 'Central',
                        2 => 'Derecha',
                        
                )))
           ->add('milimetrosmx', 'choice',
                array(
                    'label'   => 'Milimetros desviación en Mx',
                    'choices' => array(
                        0 => '1',
                        1 => '2',
                        2 => '3',
                        3 => '4',
                        4 => '5',
                )))
           ->add('milimetrosmd', 'choice',
                array(
                    'label'   => 'Milimetros desviación en Md',
                    'choices' => array(
                        0 => '1',
                        1 => '2',
                        2 => '3',
                        3 => '4',
                        4 => '5',
                )))
->add('actions', 'form_actions');
            
            $builder->get('actions')
            ->add('generar', 'submit', array(
                'attr' => array(
                    'data-loading-text' => 'Preparando...'
            )))
            ->add('limpiar', 'reset');
    }// fin funcion buildForm


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UES\FO\SIGBundle\Model\ParametrosTactico1'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'parametros';
    }

}//fin clase
