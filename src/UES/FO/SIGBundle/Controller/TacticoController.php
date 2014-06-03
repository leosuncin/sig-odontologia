<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/tactico")
 */
class TacticoController extends Controller
{
    /**
     * @Route("/enfermedades-padecidas", name="enfermedades-padecidas")
     * @Method("GET")
     * @Template()
     */
    public function enfermedadesPadecidasAction()
    {
        $form = $this->createReportFormEnfermedadesPadecidas();
        return array('form'=> $form->createView());
    }
/**
     * @Route(
     *     "/enfermedades-padecidas",
     *     name="validar-enfermedades-padecidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:enfermedadesPadecidas.html.twig")
     */

public function validateEnfermedadesPadecidasAction(Request $request)
    {
        $form = $this->createReportFormEnfermedadesPadecidas();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $fecha_inicio = $data['fecha_inicio'];
            $fecha_fin = $data['fecha_fin'];
            if($fecha_inicio > $fecha_fin){
                $form->get('fecha_fin')->addError(new \Symfony\Component\Form\FormError('La fecha de finalización debe ser mayor que la de inicio'));
                return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $data = $form->getData();
                return $this->redirect($this->generateUrl('reporte-enfermedades-padecidas', array('fecha_inicio' => date_format($data['fecha_inicio'], 'd-m-y'), 'fecha_fin'=>date_format($data['fecha_fin'], 'd-m-y'), '_format'=>'pdf')));
            }
        } else {
            return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        return array('form'=> $form->createView());
    }















    /**
     * @Route(
     *     "/enfermedades-padecidas.{_format}",
     *     name="reporte-enfermedades-padecidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteEnfermedadesPadecidasAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo = 0, \varchar $enfermedad)
    { 
    

        $parametros = new ParametrosTactico1();// Crear una instancia del modelo de parámetros
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setEnfermedad($enfermedad);

        $errores = $this->get('validator')->validate($parametros);// Validar la instancia sí sus atributos son correctos
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);// Si hay un error, no continua con la generación del reporte y muestra el error
        }

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        //AQUI FALTAN LAS VARIABLES DE SALIDA Y REALIZAR EL PROCESO ALMACENADO EN LA BD
        $stmt = $conn->prepare('CALL pr_reporte_enfermedades(:fecha_inicio, :fecha_fin, :sexo, :enfermedad)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':enfermedad', $enfermedad, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        //ESTO LO DEBO DE CAMBIAR
        $stmt = $conn->query('SELECT @cant_ninios, @cant_ninias, @cant_total');// Consultar el resultado de la ejecución
        $result = $stmt->fetchAll();// Obtener los valores del resultado

        return array(// Pasar las variables a la vista del reporte
            'titulo'       => 'Reporte de Enfermedades Padecidas',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            //ESTO LO DEBO DE CAMBIAR
            'cant_ninias'  => $result[0]['@cant_ninias'],
            'cant_ninios'  => $result[0]['@cant_ninios'],
            'cant_total'   => $result[0]['@cant_total']
        );

}

    /**
     * @Route("/tipo-perfil", name="tipo-perfil")
     * @Method("GET")
     * @Template()
     */



    public function tipoPerfilAction()
    {


        $form = $this->createReportFormTipoPerfil();
        return array('form'=> $form->createView());

    }

    /**
     * @Route(
     *     "/tipo-perfil",
     *     name="validar-tipo-perfil",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:tipoPerfil.html.twig")
     */

    public function validateTipoPerfilAction(Request $request)
    {
        $form = $this->createReportFormTipoPerfil();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $fecha_inicio = $data['fecha_inicio'];
            $fecha_fin = $data['fecha_fin'];
            if($fecha_inicio > $fecha_fin){
                $form->get('fecha_fin')->addError(new \Symfony\Component\Form\FormError('La fecha de finalización debe ser mayor que la de inicio'));
                return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $data = $form->getData();
                return $this->redirect($this->generateUrl('reporte-tipo-perfil', array('fecha_inicio' => date_format($data['fecha_inicio'], 'd-m-y'), 'fecha_fin'=>date_format($data['fecha_fin'], 'd-m-y'), '_format'=>'pdf')));
            }
        } else {
            return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        return array('form'=> $form->createView());
    }

    /**
     * @Route(
     *     "/tipo-perfil.{_format}",
     *     name="reporte-tipo-perfil",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteTipoPerfilAction($request)
    {
        return array(
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        );
    }

    /**
     * @Route("/lineas-medias", name="lineas-medias")
     * @Method("GET")
     * @Template()
     */
    public function lineasMediasAction()
    {

        $form = $this->createReportFormLineasMedias();
        return array('form'=> $form->createView());
    }

/**
     * @Route(
     *     "/lineas-medias",
     *     name="validar-lineas-medias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:lineasMedias.html.twig")
     */

public function validateLineasMediasAction(Request $request)
    {
        $form = $this->createReportFormLineasMedias();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $fecha_inicio = $data['fecha_inicio'];
            $fecha_fin = $data['fecha_fin'];
            if($fecha_inicio > $fecha_fin){
                $form->get('fecha_fin')->addError(new \Symfony\Component\Form\FormError('La fecha de finalización debe ser mayor que la de inicio'));
                return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $data = $form->getData();
                return $this->redirect($this->generateUrl('reporte-enfermedades-padecidas', array('fecha_inicio' => date_format($data['fecha_inicio'], 'd-m-y'), 'fecha_fin'=>date_format($data['fecha_fin'], 'd-m-y'), '_format'=>'pdf')));
            }
        } else {
            return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        return array('form'=> $form->createView());
    }
















    /**
     * @Route(
     *     "/lineas-medias.{_format}",
     *     name="reporte-lineas-medias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteLineasMediasAction($request)

    {
         return array(
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        );
    }

    /**
     * @Route("/sobre-mordidas", name="sobre-mordidas")
     * @Template()
     */
    public function sobreMordidaAction()
    {
    }

    /**
     * @Route(
     *     "/sobre-mordidas.{_format}",
     *     name="reporte-sobre-mordidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteSobreMordidaAction($request)
    {
    }

    /**
     * @Route("/mordidas-cruzadas", name="mordidas-cruzadas")
     * @Template()
     */
    public function mordidasCruzadasAction()
    {
    }

    /**
     * @Route(
     *     "/mordidas-cruzadas.{_format}",
     *     name="reporte-mordidas-cruzadas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteMordidasCruzadasAction($request)
    {
    }

    /**
     * @Route("/estadios-nolla", name="estadios-nolla")
     * @Template()
     */
    public function estadiosNollaAction()
    {
    }

    /**
     * @Route(
     *     "/estadios-nolla.{_format}",
     *     name="reporte-estadios-nolla",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteEstadiosNollaAction($request)
    {
    }




  private function getFormErrors(\Symfony\Component\Form\Form $form) {        
        $result = [];

        // Looking for own errors.
        $errors = $form->getErrors();
        if (count($errors)) {
            $result['errors'] = [];
            foreach ($errors as $error) {
                $result['errors'][] = $error->getMessage();
            }
        }

        // Looking for invalid children and collecting errors recursively.
        if ($form->count()) {
            $childErrors = [];
            foreach ($form->all() as $child) {
                if (!$child->isValid()) {
                    $childErrors[$child->getName()] = $this->getFormErrors($child);
                }
            }
            if (count($childErrors)) {
                $result['childrens'] = $childErrors;
            }
        }

        return $result;
    }













private function createReportFormEnfermedadesPadecidas()
    {
        $constraints = array(
            new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )),
            new Assert\Date(array(
                'message' => 'Ingrese una fecha valida'
            ))
        );

        $formBuilder = $this->createFormBuilder()
            ->add('fecha_inicio', 'date', array(
                'label'           => 'Fecha de inicio',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/01/2007',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('fecha_fin', 'date', array(
                'label'           => 'Fecha de fin',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/10/2009',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
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
                )));





        $formBuilder->add('actions', 'form_actions');
            $formBuilder->get('actions')
                ->add('generar', 'submit')
                ->add('limpiar', 'reset');

        $formBuilder
                ->setAction($this->generateUrl('validar-enfermedades-padecidas'))
                ->setMethod('POST');

        return $formBuilder->getForm();
    }






private function createReportFormTipoPerfil()
    {
        $constraints = array(
            new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )),
            new Assert\Date(array(
                'message' => 'Ingrese una fecha valida'
            ))
        );

        $formBuilder = $this->createFormBuilder()
            ->add('fecha_inicio', 'date', array(
                'label'           => 'Fecha de inicio',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/01/2007',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('fecha_fin', 'date', array(
                'label'           => 'Fecha de fin',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/10/2009',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('sexo', 'choice',
                array(
                    'label'   => 'Sexo',
                    'choices' => array(
                        0 => 'Ambos',
                        1 => 'Masculino',
                        2 => 'Femenino'
                )))

            ->add('perfil', 'choice',
                array(
                    'label'   => 'Perfil',
                    'choices' => array(
                        0 => 'Facial Frontal',
                        1 => 'Perfil Total',
                        2 => 'Perfil del 1/3 inferior',
                )))



           ->add('tipo', 'choice',
                array(
                    'label'   => 'Tipo',
                    'choices' => array(
                        0 => 'Facial Frontal',
                        1 => 'Perfil Total',
                        2 => 'Perfil del 1/3 inferior',
                )));





        $formBuilder->add('actions', 'form_actions');
            $formBuilder->get('actions')
                ->add('generar', 'submit')
                ->add('limpiar', 'reset');

        $formBuilder
                ->setAction($this->generateUrl('validar-tipo-perfil'))
                ->setMethod('POST');

        return $formBuilder->getForm();
    }



private function createReportFormLineasMedias()
    {
        $constraints = array(
            new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )),
            new Assert\Date(array(
                'message' => 'Ingrese una fecha valida'
            ))
        );

        $formBuilder = $this->createFormBuilder()
            ->add('fecha_inicio', 'date', array(
                'label'           => 'Fecha de inicio',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/01/2007',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('fecha_fin', 'date', array(
                'label'           => 'Fecha de fin',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/10/2009',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('sexo', 'choice',
                array(
                    'label'   => 'Sexo',
                    'choices' => array(
                        0 => 'Ambos',
                        1 => 'Masculino',
                        2 => 'Femenino'
                )))

            ->add('lineamedia', 'choice',
                array(
                    'label'   => 'Línea Media',
                    'choices' => array(
                        0 => 'Mx',
                        1 => 'Md',
                        
                )))

            ->add('direcciondesviacion', 'choice',
                array(
                    'label'   => 'Dirección desviación',
                    'choices' => array(
                        0 => 'Izquierda',
                        1 => 'Central',
                        2 => 'Derecha',
                )))



           ->add('milimetros', 'choice',
                array(
                    'label'   => 'Milimetros de la desviación',
                    'choices' => array(
                        0 => '1',
                        1 => '2',
                        2 => '3',
                        3 => '4',
                        4 => '5',
                )));





        $formBuilder->add('actions', 'form_actions');
            $formBuilder->get('actions')
                ->add('generar', 'submit')
                ->add('limpiar', 'reset');

        $formBuilder
                ->setAction($this->generateUrl('validar-lineas-medias'))
                ->setMethod('POST');

        return $formBuilder->getForm();
    }






}
