<?php

namespace UES\FO\SIGBundle\Controller;

use Ps\PdfBundle\Annotation\Pdf;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use UES\FO\SIGBundle\Form\EstrategicoType;
use UES\FO\SIGBundle\Form\Estrategico2Type;
use UES\FO\SIGBundle\Form\Util\FormUtils;
use UES\FO\SIGBundle\Model\ParametrosEstrategico;

/**
 * @Route("/estrategico")
 */
class EstrategicoController extends Controller
{
    /**
     * @Route("/relacion-sagital", name="relacion-sagital")
     * @Method("GET")
     * @Template()
     */
    public function relacionSagitalAction()
    {
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Estrategico2Type(), // clase formulario de Symfony
            new ParametrosEstrategico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-relacion-sagital'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Relaciones Sagitales', 'form'=> $form->createView());
    }


    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/relacion-sagital",
     *     name="validar-relacion-sagital",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:relacionSagital.html.twig")
     * @Pdf()
     */
    public function validateSagitalesAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosEstrategico();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new Estrategico2Type(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-relacion-sagital'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-relacion-sagital', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'edad'         => $data->getEdad(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));// sí la petición es AJAX responder con un JSON con la URL
            } else {
                return new RedirectResponse($route);// sí la petición no es AJAX redirigir el navegador al visor
            }
        }
        // en caso de que la información enviada tenga errores
        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('title' => 'Reporte de Relaciones Sagitales', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }

      
    }

    /** 
     *Genera el reporte de relaciones sagitales
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{edad}/reporteRelacionSagital.{_format}",
     *     name="reporte-relacion-sagital",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "edad"="0|1|2|3|4|5|6|7|8|9|10"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */

    public function reporteRelacionSagitalAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $edad)
    {
        $parametros = new ParametrosEstrategico();
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setEdad($edad);
        $molarDerecha = 0;
        $molarIzquierda = 0;
        $caninaDerecha = 0;
        $caninaIzquierda = 0;

        $errores = $this->get('validator')->validate($parametros);
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);
        }

        //conversion de parametro edad a la edad propiamente dicha
        $edad = $edad + 3;

        //********************************************************
        //      AMBOS SEXOS 
        
        //      Todos los dientes
        for ($i=0; $i < 4; $i++) { 
            $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');
            $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
            $conn = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $conn->prepare('CALL pr_reporte_relaciones_sagitales(:fecha_inicio, :fecha_fin, :sexo, :edad, :diente, @masC1, @masC2, @masC3, @masCC, @masNE, @femC1, @femC2, @femC3, @femCC, @femNE, @edadC1, @edadC2, @edadC3, @edadCC, @edadNE)');
            $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);
            $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
            $stmt->bindParam(':edad', $edad, \PDO::PARAM_INT);
            $stmt->bindParam(':diente', $i, \PDO::PARAM_INT);
            $stmt->execute();
            $stmt = $conn->query('SELECT @masC1, @masC2, @masC3, @masCC, @masNE, @femC1, @femC2, @femC3, @femCC, @femNE, @edadC1, @edadC2, @edadC3, @edadCC, @edadNE');
            $result = $stmt->fetchAll();
            $datos = array('valor1' => $result[0]['@masC1'], 
                           'valor2' => $result[0]['@masC2'],
                           'valor3' => $result[0]['@masC3'],
                           'valor4' => $result[0]['@masCC'],
                           'valor5' => $result[0]['@masNE'],
                           'valor6' => $result[0]['@femC1'], 
                           'valor7' => $result[0]['@femC2'],
                           'valor8' => $result[0]['@femC3'],
                           'valor9' => $result[0]['@femCC'],
                           'valor10' => $result[0]['@femNE'],
                           'valor11' => $result[0]['@edadC1'], 
                           'valor12' => $result[0]['@edadC2'],
                           'valor13' => $result[0]['@edadC3'],
                           'valor14' => $result[0]['@edadCC'],
                           'valor15' => $result[0]['@edadNE']
                          );
            switch ($i) {
                case 0:
                    $molarDerecha=$datos;
                    break;
                case 1:
                    $molarIzquierda=$datos;
                    break;
                case 2:
                    $caninaDerecha=$datos;
                    break;
                case 3:
                    $caninaIzquierda=$datos;
                    break;
            }
    }//del for 
     return array(
            'titulo'       => 'Reporte Cantidad de Citas',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'edad'         => $edad,
            'sexo'         => $sexo,
            'molarDerecha' => $molarDerecha,
            'molarIzquierda' => $molarIzquierda,
            'caninaDerecha' => $caninaDerecha,
            'caninaIzquierda' => $caninaIzquierda
        );

    }//fin

    /**
     * @Route("/cantidad-citas", name="cantidad-citas")
     * @Method("GET")
     * @Template()
     */
    public function citasAction()
    {
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Estrategico2Type(), // clase formulario de Symfony
            new ParametrosEstrategico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-cantidad-citas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Cantidad de Citas', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/cantidad-citas",
     *     name="validar-cantidad-citas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:citas.html.twig")
     * @Pdf()
     */
    public function validateCitasAction(Request $request)    
    {
        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosEstrategico();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new Estrategico2Type(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-cantidad-citas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-cantidad-citas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'edad'         => $data->getEdad(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));// sí la petición es AJAX responder con un JSON con la URL
            } else {
                return new RedirectResponse($route);// sí la petición no es AJAX redirigir el navegador al visor
            }
        }
        // en caso de que la información enviada tenga errores
        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('title' => 'Reporte de Cantidad de Citas', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }

      
    }


     /**
     * Genera el reporte de cantidad de citas
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{edad}/reporteCitas.{_format}",
     *     name="reporte-cantidad-citas",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "edad"="0|1|2|3|4|5|6|7|8|9|10"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */

    public function reporteCitasAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $edad)
    {
        $parametros = new ParametrosEstrategico();
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setEdad($edad);

        $errores = $this->get('validator')->validate($parametros);
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);
        }

        //conversion de parametro edad a la edad propiamente dicha
        $edad = $edad + 3;

        //********************************************************

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $conn->prepare('CALL pr_reporte_cantidad_citas(:fecha_inicio, :fecha_fin, :sexo, :edad, @totalxmasc, @totalxfem, @totalxedad, @totalxfecha)');
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':edad', $edad, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->query('SELECT @totalxmasc, @totalxfem, @totalxedad, @totalxfecha');
        $result = $stmt->fetchAll();

        return array(
            'titulo'       => 'Reporte Cantidad de Citas',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'edad'         => $edad,
            'sexo'         => $sexo,
            'totalxmasc'   => $result[0]['@totalxmasc'],
            'totalxfem'    => $result[0]['@totalxfem'],
            'totalxedad'   => $result[0]['@totalxedad'],
            'totalxfecha'  => $result[0]['@totalxfecha']
        );
    }

    /**
     * Muestra el formulario de parámetros para el reporte de plan de tratamiento
     *
     * @Route("/plan-tratamiento", name="plan-tratamiento")
     * @Method("GET")
     * @Template()
     */
    public function tratamientoAction()
    {
        $form = $this->createForm(
            new EstrategicoType(),
            new ParametrosEstrategico(),
            array(
                'action' => $this->generateUrl('validar-plan-tratamiento'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));
        return array('title' => 'Reporte de plan de tratamiento', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/plan-tratamiento",
     *     name="validar-plan-tratamiento",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:tratamiento.html.twig")
     * @Pdf()
     */
    public function validateTratamientoAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        $data = new ParametrosEstrategico();
        $form = $this->createForm(
            new EstrategicoType(),
            $data,
            array(
                'action' => $this->generateUrl('validar-plan-tratamiento'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-plan-tratamiento', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));
            } else {
                return new RedirectResponse($route);
            }
        }

        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);
        } else {
            return array('title' => 'Reporte de plan de tratamiento', 'form'=> $form->createView());
        }
    }

    /**
     * Genera el reporte de plan de tratamiento
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/plan-tratamiento.{_format}",
     *     name="reporte-plan-tratamiento",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteTratamientoAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo = 0)
    {
        $parametros = new ParametrosEstrategico();
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);

        $errores = $this->get('validator')->validate($parametros);
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);
        }

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $conn->prepare('CALL pr_reporte_tratamiento(:fecha_inicio, :fecha_fin, :sexo, @cant_ninios, @cant_ninias, @cant_total)');
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->query('SELECT @cant_ninios, @cant_ninias, @cant_total');
        $result = $stmt->fetchAll();
        $this->get('bitacora')->actividad('Creo el reporte de plan de tratamiento');
        return array(
            'titulo'       => 'Reporte de plan de tratamiento',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'cant_ninias'  => $result[0]['@cant_ninias'],
            'cant_ninios'  => $result[0]['@cant_ninios'],
            'cant_total'   => $result[0]['@cant_total']
        );
    }

    /**
     * Muestra el formulario de parámetros para el reporte de asistencias generales
     *
     * @Route("/asistencias", name="asistencias")
     * @Method("GET")
     * @Template()
     */
    public function asistenciaAction()
    {
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new EstrategicoType(), // clase formulario de Symfony
            new ParametrosEstrategico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-asistencias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de asistencias generales', 'form'=> $form->createView());
    }

    /**
     * Validar la información del formulario enviado por método POST
     *
     * @Route(
     *     "/asistencias",
     *     name="validar-asistencias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:asistencia.html.twig")
     */
    public function validateAsistenciaAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosEstrategico();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new EstrategicoType(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-asistencias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-asistencias', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));// sí la petición es AJAX responder con un JSON con la URL
            } else {
                return new RedirectResponse($route);// sí la petición no es AJAX redirigir el navegador al visor
            }
        }
        // en caso de que la información enviada tenga errores
        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('title' => 'Reporte de asistencias generales', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }
    }

    /**
     * Genera el reporte de asistencias generales
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/asistencias.{_format}",
     *     name="reporte-asistencias",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteAsistenciaAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo = 0)
    {
        $parametros = new ParametrosEstrategico();// Crear una instancia del modelo de parámetros
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);

        $errores = $this->get('validator')->validate($parametros);// Validar la instancia sí sus atributos son correctos
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);// Si hay un error, no continua con la generación del reporte y muestra el error
        }

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        $stmt = $conn->prepare('CALL pr_reporte_asistencias(:fecha_inicio, :fecha_fin, :sexo, @cant_ninios, @cant_ninias, @cant_total)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        $stmt = $conn->query('SELECT @cant_ninios, @cant_ninias, @cant_total');// Consultar el resultado de la ejecución
        $result = $stmt->fetchAll();// Obtener los valores del resultado
        $this->get('bitacora')->actividad('Creo el reporte de asistencias generales');
        return array(// Pasar las variables a la vista del reporte
            'titulo'       => 'Reporte de asistencias generales',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'cant_ninias'  => $result[0]['@cant_ninias'],
            'cant_ninios'  => $result[0]['@cant_ninios'],
            'cant_total'   => $result[0]['@cant_total']
        );
    }

    /**
     * Muestra el formulario de parámetros para el reporte de casos referidos
     *
     * @Route("/casos-referidos", name="casos-referidos")
     * @Method("GET")
     * @Template()
     */
    public function casosAction()
    {
        $form = $this->createForm(
            new EstrategicoType(),
            new ParametrosEstrategico(),
            array(
                'action' => $this->generateUrl('validar-casos-referidos'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));
        return array('title' => 'Reporte de casos referidos', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/casos-referidos",
     *     name="validar-casos-referidos",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:casos.html.twig")
     * @Pdf()
     */
    public function validateCasosAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        $data = new ParametrosEstrategico();
        $form = $this->createForm(
            new EstrategicoType(),
            $data,
            array(
                'action' => $this->generateUrl('validar-casos-referidos'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-casos-referidos', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));
            } else {
                return new RedirectResponse($route);
            }
        }

        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);
        } else {
            return array('title' => 'Reporte de casos referidos', 'form'=> $form->createView());
        }
    }

    /**
     * Genera el reporte de casos referidos
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/casos-referidos.{_format}",
     *     name="reporte-casos-referidos",
     *     options={"expose"=true}
     * )
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteCasosAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo = 0)
    {
        $parametros = new ParametrosEstrategico();
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);

        $errores = $this->get('validator')->validate($parametros);
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);
        }

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $conn->prepare('CALL pr_reporte_casos(:fecha_inicio, :fecha_fin, :sexo, @cant_ninios, @cant_ninias, @cant_total)');
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->query('SELECT @cant_ninios, @cant_ninias, @cant_total');
        $result = $stmt->fetchAll();
        $this->get('bitacora')->actividad('Creo el reporte de casos referidos');
        return array(
            'titulo'       => 'Reporte de casos referidos',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'cant_ninias'  => $result[0]['@cant_ninias'],
            'cant_ninios'  => $result[0]['@cant_ninios'],
            'cant_total'   => $result[0]['@cant_total']
        );
    }
}
