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
                        0 => 'Alergias',
                        1 => 'Desmayos',
                        2 => 'Presión sanguínea alta',
                        3 => 'Sinusitis',
                        4 => 'Hepatitis',
                        5 => 'Transtornos de la sangre',
                        6 => 'Asma',
                        7 => 'Artritis',
                        8 => 'Enfermedades Venereas',
                        9 => 'Diabetes',
                        10 => 'Gastritis',
                        11 => 'SIDA',
                        12 => 'Transtornos renales',
                        13 => 'Tuberculosis',
                        14 => 'Otras',
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
