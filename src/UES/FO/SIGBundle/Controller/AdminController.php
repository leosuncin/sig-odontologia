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
use UES\FO\SIGBundle\Form\RespaldoType;
use UES\FO\SIGBundle\Form\Util\FormUtils;
use UES\FO\SIGBundle\Model\ParametrosAdmin;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/actividad/{index}", name="actividad-sistema")
     * @Template()
     */
    public function actividadAction($index = 0)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SIGBundle:Bitacora');
        $entities = $repo->findBy(array(), null, 10, $index);
        return array(
            'title' => 'Registro de actividad',
            'entities' => $entities,
            'index' => $index
            );
    }

    /**
     * @Route("/gestion-bd", name="gestion-bd")
     * @Method("GET")
     * @Template()
     */
    public function respaldarBDAction()
    {
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new RespaldoType(), // clase formulario de Symfony
            new ParametrosAdmin(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-respaldo'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Respaldar Base de Datos', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/gestion-bd",
     *     name="validar-respaldo",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Admin:respaldarBD.html.twig")
     * @Pdf()
     */
    public function validateRespaldo(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosAdmin();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new AdminType(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-respaldo'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            if($data->getTipo() == 0) {
                $factory = $this->get('backup_restore.factory');
                $backupInstance = $factory->getBackupInstance('doctrine.dbal.default_connection');
                $backupInstance->backupDatabase('/home/xscharlie', 'new_bak.sql');
            }
        }
        // en caso de que la información enviada tenga errores
        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('title' => 'Reporte de Cantidad de Citas', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }

    }

}


