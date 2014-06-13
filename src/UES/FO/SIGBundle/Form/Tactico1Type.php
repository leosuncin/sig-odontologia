<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Tactico1Type extends AbstractType
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

            ->add('enfermedad', 'choice',
                array(
                    'label'   => 'Enfermedad',
                    'choices' => array(
                        1 => 'Alergias',
                        2 => 'Desmayos',
                        3 => 'Presión sanguínea alta',
                        4 => 'Sinusitis',
                        5 => 'Hepatitis',
                        6 => 'Transtornos de la sangre',
                        7 => 'Asma',
                        8 => 'Artritis',
                        9 => 'Enfermedades Venereas',
                        10 => 'Diabetes',
                        11 => 'Gastritis',
                        12 => 'SIDA',
                        13 => 'Transtornos renales',
                        14 => 'Tuberculosis',
                        
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
