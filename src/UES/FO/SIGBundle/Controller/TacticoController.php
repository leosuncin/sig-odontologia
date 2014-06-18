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
use UES\FO\SIGBundle\Form\Tactico1Type;
use UES\FO\SIGBundle\Form\Tactico2Type;
use UES\FO\SIGBundle\Form\Tactico3Type;
use UES\FO\SIGBundle\Form\Util\FormUtils;
use UES\FO\SIGBundle\Model\ParametrosTactico1;
use UES\FO\SIGBundle\Form\Tactico4Type;  
use UES\FO\SIGBundle\Form\Tactico5Type;  
use UES\FO\SIGBundle\Form\Tactico6Type; 
use UES\FO\SIGBundle\Model\ParametrosTactico2;
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
        //$form = $this->createReportFormEnfermedadesPadecidas();
        //return array('form'=> $form->createView());

            $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico1Type(), // clase formulario de Symfony
            new ParametrosTactico1(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-enfermedades-padecidas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de enfermedades padecidas', 'form'=> $form->createView());
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
          $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosTactico1();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new Tactico1Type(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-enfermedades-padecidas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-enfermedades-padecidas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'enfermedad'   => $data->getEnfermedad(),
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
            return array('title' => 'Reporte de enfermedades padecidas', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }
    }
    /**
     * 
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{enfermedad}/reporteEnfermedadesPadecidas.{_format}",
     *     name="reporte-enfermedades-padecidas",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "enfermedad"="1|2|3|4|5|6|7|8|9|10|11|12|13|14"
     *       
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteEnfermedadesPadecidasAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $enfermedad)
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
         /*Es Nina, nino o ambos?*/
         $mensaje = "vacia";
         $e="vacio";

        if($sexo==0)
            $mensaje = "Niños y Niñas";
        else if($sexo==1)
            $mensaje = "Niños";
        else
            $mensaje = "Niñas";

       
       if ($enfermedad==1)
        $e="Alergias"; 
       if ($enfermedad==2)
        $e="Desmayos"; 
       if ($enfermedad==3)
        $e="Presión Sanguínea Alta"; 
       if ($enfermedad==4)
        $e="Sinusitis"; 
       if ($enfermedad==5)
       $e="Hepatitis"; 
       if ($enfermedad==6)
        $e="Transtornos de la Sangre"; 
       if ($enfermedad==7)
        $e="Asma"; 
       if ($enfermedad==8)
        $e="Artritis"; 
       if ($enfermedad==9)
        $e="Enfermedades Venéreas"; 
       if ($enfermedad==10)
        $e="Diabetes"; 
       if ($enfermedad==11)
        $e="Gastritis"; 
       if ($enfermedad==12)
        $e="SIDA"; 
       if ($enfermedad==13)
        $e="Transtornos Renales"; 
       if ($enfermedad==14)
        $e="Tuberculosis"; 


        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        $stmt = $conn->prepare('CALL pr_reporte_enfermedades2(:fecha_inicio, :fecha_fin, :sexo, :enfermedad, @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':enfermedad', $enfermedad, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        $stmt = $conn->query('SELECT @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11');
        $result = $stmt->fetchAll();// Obtener los valores del resultado
      

        return array(// Pasar las variables a la vista del reporte
           'titulo'       => "Reporte de Enfermedades Padecidas",
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'enfermedad'   => $enfermedad,
            'sexo'         => $sexo,
            'mensaje'      => $mensaje,
            'e'            => $e,
            'cant4anios'  => $result[0]['@totalx4'],
            'cant4nina'  => $result[0]['@total2x4'],
            'cant5anios'  => $result[0]['@totalx5'],
            'cant5nina'  => $result[0]['@total2x5'],
            'cant6anios'  => $result[0]['@totalx6'],
            'cant6nina'  => $result[0]['@total2x6'],
            'cant7anios'  => $result[0]['@totalx7'],
            'cant7nina'  => $result[0]['@total2x7'],
            'cant8anios'  => $result[0]['@totalx8'],
            'cant8nina'  => $result[0]['@total2x8'],
            'cant9anios'  => $result[0]['@totalx9'],
            'cant9nina'  => $result[0]['@total2x9'],
            'cant10anios'  => $result[0]['@totalx10'],
            'cant10nina'  => $result[0]['@total2x10'],
            'cant11anios'  => $result[0]['@totalx11'],
            'cant11nina'  => $result[0]['@total2x11']            
        );

    }   

    /**
     * @Route("/tipo-perfil", name="tipo-perfil")
     * @Method("GET")
     * @Template()
     */
    public function tipoPerfilAction()
    {
            $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico2Type(), // clase formulario de Symfony
            new ParametrosTactico1(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-tipo-perfil'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de tipo de perfil', 'form'=> $form->createView());

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

        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosTactico1();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new Tactico2Type(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-tipo-perfil'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-tipo-perfil', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'perfil'   => $data->getPerfil(),
                    'tipo'   => $data->getTipo(),
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
            return array('title' => 'Reporte de Tipo de Perfil', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }
    }

    /**
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{perfil}/{tipo}/reporteTipoPerfil.{_format}",
     *     name="reporte-tipo-perfil",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "perfil"="1|2|3",
     *         "tipo"="1|2|3",
     *         
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteTipoPerfilAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $perfil, $tipo)
    {
        
        $parametros = new ParametrosTactico1();// Crear una instancia del modelo de parámetros
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setPerfil($perfil);
        $parametros->setTipo($tipo);

        $errores = $this->get('validator')->validate($parametros);// Validar la instancia sí sus atributos son correctos
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);// Si hay un error, no continua con la generación del reporte y muestra el error
        }
/*Es Nina, nino o ambos?*/
         $mensaje = "vacia";

        if($sexo==0)
            $mensaje = "Niños y Niñas";
        else if($sexo==1)
            $mensaje = "Niños";
        else
            $mensaje = "Niñas";

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        $stmt = $conn->prepare('CALL pr_reporte_tipos_perfil2(:fecha_inicio, :fecha_fin, :sexo, :perfil, :tipo, @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':perfil', $perfil, \PDO::PARAM_INT);
        $stmt->bindParam(':tipo', $tipo, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        $stmt = $conn->query('SELECT @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11');
        $result = $stmt->fetchAll();// Obtener los valores del resultado


        return array(// Pasar las variables a la vista del reporte
            'titulo'       => "Reporte de Tipo de Perfil",
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'perfil'    => $perfil,
             'tipo'    => $tipo,
             'sexo'     =>$sexo,
             'mensaje'    => $mensaje,
            'cant4anios'  => $result[0]['@totalx4'],
            'cant4nina'  => $result[0]['@total2x4'],
            'cant5anios'  => $result[0]['@totalx5'],
            'cant5nina'  => $result[0]['@total2x5'],
            'cant6anios'  => $result[0]['@totalx6'],
            'cant6nina'  => $result[0]['@total2x6'],
            'cant7anios'  => $result[0]['@totalx7'],
            'cant7nina'  => $result[0]['@total2x7'],
            'cant8anios'  => $result[0]['@totalx8'],
            'cant8nina'  => $result[0]['@total2x8'],
            'cant9anios'  => $result[0]['@totalx9'],
            'cant9nina'  => $result[0]['@total2x9'],
            'cant10anios'  => $result[0]['@totalx10'],
            'cant10nina'  => $result[0]['@total2x10'],
            'cant11anios'  => $result[0]['@totalx11'],
            'cant11nina'  => $result[0]['@total2x11']    
        );
    }

    /**
     * @Route("/lineas-medias", name="lineas-medias")
     * @Method("GET")
     * @Template()
     */
    public function lineasMediasAction()
    {

        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico3Type(), // clase formulario de Symfony
            new ParametrosTactico1(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-lineas-medias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de lineas medias', 'form'=> $form->createView());
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
         $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
         $data = new ParametrosTactico1();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new Tactico3Type(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-lineas-medias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-lineas-medias', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'orientacionmx'   => $data->getOrientacionMx(),
                    'orientacionmd'   => $data->getOrientacionMd(),
                    'milimetrosmx'   => $data->getMilimetrosMx(),
                    'milimetrosmd'   => $data->getMilimetrosMd(),  
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
            return array('title' => 'Reporte de lineas medias', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }
    }

/**
     * 
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{orientacionmx}/{orientacionmd}/{milimetrosmx}/{milimetrosmd}/reporteLineasMedias.{_format}",
     *     name="reporte-lineas-medias",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "orientacionmx"="1|2|3",
     *         "orientacionmd"="1|2|3",
     *         "milimetrosmx"="1|2|3|4|5",
     *         "milimetrosmd"="1|2|3|4|5",
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteLineasMediasAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $orientacionmx, $orientacionmd, $milimetrosmx, $milimetrosmd)

    {
        $parametros = new ParametrosTactico1();// Crear una instancia del modelo de parámetros
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setOrientacionMx($orientacionmx);
        $parametros->setOrientacionMd($orientacionmd);
        $parametros->setMilimetrosMx($milimetrosmx);
        $parametros->setMilimetrosMd($milimetrosmd);

        $errores = $this->get('validator')->validate($parametros);// Validar la instancia sí sus atributos son correctos
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);// Si hay un error, no continua con la generación del reporte y muestra el error
        }
        
         /*Es Nina, nino o ambos?*/
        if($sexo==0)
            $mensaje = "Niños y Niñas";
        else if($sexo==1)
            $mensaje = "Niños";
        else
            $mensaje = "Niñas";

        if ($orientacionmx==1)
        $omx="Izquierda"; 
        if ($orientacionmx==2)
        $omx="Centro"; 
        if ($orientacionmx==3)
        $omx="Derecha"; 

        if ($orientacionmd==1)
        $omd="Izquierda"; 
        if ($orientacionmd==2)
        $omd="Centro"; 
        if ($orientacionmd==3)
        $omd="Derecha"; 


        if($milimetrosmx==1)
        $mmx="1";
        if($milimetrosmx==2)
        $mmx="2";
        if($milimetrosmx==3)
        $mmx="3";
        if($milimetrosmx==4)
        $mmx="4";
        if($milimetrosmx==5)
        $mmx="5";

         if($milimetrosmd==1)
        $mmd="1";
        if($milimetrosmd==2)
        $mmd="2";
        if($milimetrosmd==3)
        $mmd="3";
        if($milimetrosmd==4)
        $mmd="4";
        if($milimetrosmd==5)
        $mmd="5";



        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        $stmt = $conn->prepare('CALL pr_reporte_lineas_medias2(:fecha_inicio, :fecha_fin, :sexo, :orientacionmx, :orientacionmd, :milimetrosmx, :milimetrosmd, @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':orientacionmx', $orientacionmx, \PDO::PARAM_INT);
        $stmt->bindParam(':orientacionmd', $orientacionmd, \PDO::PARAM_INT);
        $stmt->bindParam(':milimetrosmx', $milimetrosmx, \PDO::PARAM_INT);
        $stmt->bindParam(':milimetrosmd', $milimetrosmd, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        $stmt = $conn->query('SELECT @totalx4, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @total2x4, @total2x5, @total2x6, @total2x7, @total2x8, @total2x9, @total2x10, @total2x11');
        $result = $stmt->fetchAll();// Obtener los valores del resultado

        return array(// Pasar las variables a la vista del reporte
            'titulo'       => "Reporte de Lineas Medias",
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'orientacionmx'    => $orientacionmx,
             'orientacionmd'    => $orientacionmd,
              'milimetrosmx'    => $milimetrosmx,
              'milimetrosmd'    => $milimetrosmd,
              'sexo'     =>  $sexo,
               'mensaje'    => $mensaje,
               'milimetrosmx'     =>  $mmx,
               'milimetrosmd'     =>  $mmd,
               'desviacionmx'     =>  $omx,
               'desviacionmd'     =>  $omd,
            
            'cant4anios'  => $result[0]['@totalx4'],
            'cant4nina'  => $result[0]['@total2x4'],
            'cant5anios'  => $result[0]['@totalx5'],
            'cant5nina'  => $result[0]['@total2x5'],
            'cant6anios'  => $result[0]['@totalx6'],
            'cant6nina'  => $result[0]['@total2x6'],
            'cant7anios'  => $result[0]['@totalx7'],
            'cant7nina'  => $result[0]['@total2x7'],
            'cant8anios'  => $result[0]['@totalx8'],
            'cant8nina'  => $result[0]['@total2x8'],
            'cant9anios'  => $result[0]['@totalx9'],
            'cant9nina'  => $result[0]['@total2x9'],
            'cant10anios'  => $result[0]['@totalx10'],
            'cant10nina'  => $result[0]['@total2x10'],
            'cant11anios'  => $result[0]['@totalx11'],
            'cant11nina'  => $result[0]['@total2x11'],
        );
    }

    /**
     * @Route("/sobre-mordidas", name="sobre-mordidas")
     * @Method("GET")
     * @Template()
     */
    public function sobreMordidaAction()
    {
        //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico4Type(), // clase formulario de Symfony
            new ParametrosTactico2(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-sobre-mordidas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Sobre Mordida', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/sobre-mordidas",
     *     name="validar-sobre-mordidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:sobreMordida.html.twig")
     * @Pdf()
     */
    public function validateSobreMordidaAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        $data = new ParametrosTactico2();
        $form = $this->createForm(
            new Tactico4Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-sobre-mordidas'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-sobre-mordidas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'milihorizontal' => $data->getMiliHorizontal(),
                    'milivertical'   => $data->getMiliVertical(),
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
            return array('title' => 'Reporte de sobreMordida', 'form'=> $form->createView());
        }
    }

   /**
     * Genera el reporte de sobre mordida
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/{milihorizontal}/{milivertical}/reporteSobreMordida.{_format}",
     *     name="reporte-sobre-mordidas",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2",
     *         "milihorizontal"="0|1|2|3|4",
     *         "milivertical"="0|1|2|3|4"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteSobreMordidaAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo, $milihorizontal, $milivertical)
    {
        $parametros = new ParametrosTactico2();
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);
        $parametros->setMiliHorizontal($milihorizontal);
        $parametros->setMiliVertical($milivertical);
        $errores = $this->get('validator')->validate($parametros);
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);
        }
        /*Es Nina, nino o ambos?*/
        if($sexo==0)
            $mensaje = "Ninos y Ninas";
        else if($sexo==1)
            $mensaje = "Ninos";
        else
            $mensaje = "Ninas";

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $conn->prepare('CALL pr_reporte_sobremordidas(:fecha_inicio, :fecha_fin, :sexo, :milihorizontal, :milivertical, @totalx4, @totalx4nina, @totalx5, @totalx5nina, @totalx6, @totalx6nina, @totalx7, @totalx7nina, @totalx8, @totalx8nina, @totalx9, @totalx9nina, @totalx10, @totalx10nina, @totalx11, @totalx11nina, @totalx12, @totalx12nina)');
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->bindParam(':milihorizontal', $milihorizontal, \PDO::PARAM_INT);
        $stmt->bindParam(':milivertical', $milivertical, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->query('SELECT @totalx4,@totalx4nina,@totalx5nina,@totalx6nina,@totalx7nina,@totalx8nina,@totalx9nina,@totalx10nina,@totalx11nina,@totalx12nina, @totalx5, @totalx6, @totalx7, @totalx8, @totalx9, @totalx10, @totalx11, @totalx12');
        $result = $stmt->fetchAll();

        return array(
            'titulo'       => 'Reporte de Sobremordidas',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'mensaje'      => $mensaje,
            'cant4anios'  => $result[0]['@totalx4'],
            'cant4nina'  => $result[0]['@totalx4nina'],
            'cant5anios'  => $result[0]['@totalx5'],
            'cant5nina'  => $result[0]['@totalx5nina'],
            'cant6anios'  => $result[0]['@totalx6'],
            'cant6nina'  => $result[0]['@totalx6nina'],
            'cant7anios'  => $result[0]['@totalx7'],
            'cant7nina'  => $result[0]['@totalx7nina'],
            'cant8anios'  => $result[0]['@totalx8'],
            'cant8nina'  => $result[0]['@totalx8nina'],
            'cant9anios'  => $result[0]['@totalx9'],
            'cant9nina'  => $result[0]['@totalx9nina'],
            'cant10anios'  => $result[0]['@totalx10'],
            'cant10nina'  => $result[0]['@totalx10nina'],
            'cant11anios'  => $result[0]['@totalx11'],
            'cant11nina'  => $result[0]['@totalx11nina'],
            'cant12anios'  => $result[0]['@totalx12'],
            'cant12nina'  => $result[0]['@totalx12nina']
        );
    }

    /**
     * @Route("/mordidas-cruzadas", name="mordidas-cruzadas")
     * @Method("GET")
     * @Template()
     */
    public function mordidasCruzadasAction()
    {
       //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico5Type(), // clase formulario de Symfony
            new ParametrosTactico2(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-mordidas-cruzadas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Mordidas Cruzadas', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/mordidasCruzadas",
     *     name="validar-mordidas-cruzadas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:mordidasCruzadas.html.twig")
     * @Pdf()
     */
    public function validateMordidasCruzadasAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        $data = new ParametrosTactico2();
        $form = $this->createForm(
            new Tactico5Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-mordidas-cruzadas'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-mordidas-cruzadas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'cuadrante'    => $data->getCuadrante(),
                    'pieza'        => $data->getPieza(),
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
            return array('title' => 'Reporte de Mordidas Cruzadas', 'form'=> $form->createView());
        }
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
     * @Method("GET")
     * @Template()
     */
    public function estadiosNollaAction()
    {
        //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico6Type(), // clase formulario de Symfony
            new ParametrosTactico2(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-estadios-nolla'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Estadios de Nolla', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/estadiosNolla",
     *     name="validar-estadios-nolla",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:estadiosNolla.html.twig")
     * @Pdf()
     */
    public function validateEstadiosDeNolla(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        $data = new ParametrosTactico2();
        $form = $this->createForm(
            new Tactico6Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-estadios-nolla'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-estadios-nolla', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    'estadio'      => $data->getEstadio(),
                    'pieza_estadio'=> $data->getPiezaEstadio(),
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
            return array('title' => 'Reporte de Estadios de Nolla', 'form'=> $form->createView());
        }
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
}// Fin de la clase
