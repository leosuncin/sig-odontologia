<?php

namespace UES\FO\SIGBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        if($index == 0)
            $this->get('bitacora')->actividad('Se consulto la actividad del sistema');
        $em       = $this->getDoctrine()->getManager();
        $repo     = $em->getRepository('SIGBundle:Bitacora');
        $entities = $repo->findBy(array(), array('fechayhora' => 'DESC'), 10, $index);
        return array(
            'title'    => 'Registro de actividad',
            'entities' => $entities,
            'index'    => $index
        );
    }

    /**
     * @Route("/gestion-bd", name="gestion-bd")
     * @Method("GET")
     * @Template()
     */
    public function showBackupsAction()
    {
        $backupDir = $this->container->getParameter('backup_dir');
        $backup_dir = opendir($backupDir);
        $backups = array();
        while ($backup = readdir($backup_dir)) {
            if(!is_dir($backup) && $backup != '.' && $backup != '..') {
                $fecha = new \DateTime();
                array_push($backups, array(
                    'nombre' => str_replace('.sql', '', $backup),
                    'fecha'  => $fecha->setTimestamp(filemtime($backupDir.'/'.$backup))
                ));
            }
        }
        closedir($backup_dir);
        if (count($backups) == 0) {
            $this->get('braincrafted_bootstrap.flash')->info('No se han creado respaldos de la base de datos');
        }
        //array_multisort($backups, SORT_DESC);
        //die(var_dump($backups));
        $this->get('bitacora')->actividad('Se consulto los respaldos de la base de datos');
        return array(
            'title'   => 'Gestión de la base de datos',
            'backups' => $backups
        );
    }

    /**
     * @Route("/gestion-bd/backup", name="backup-create")
     * @Template("SIGBundle:Admin:showBackups.html.twig")
     */
    public function createBackupAction()
    {
        $time   = new \DateTime('NOW', new \DateTimeZone('America/El_Salvador'));
        $backup = $this->get('backup_restore.factory')->getBackupInstance('doctrine.dbal.default_connection');
        $backup->backupDatabase($this->container->getParameter('backup_dir'), $time->getTimestamp().'.sql');
        $this->get('braincrafted_bootstrap.flash')->success('Se creo el respaldo de la base de datos');
        $this->get('bitacora')->actividad('Se creo un respaldo de la base datos «'.$time->format('U').'»');
        return $this->redirect($this->generateUrl('gestion-bd'));
    }

    /**
     * @Route("/gestion-bd/{backup}/restore", name="backup-restore")
     * @Template("SIGBundle:Admin:showBackups.html.twig")
     */
    public function restoreBDAction($backup)
    {
        $restore = $this->get('backup_restore.factory')->getRestoreInstance('doctrine.dbal.default_connection');
        $restore->restoreDatabase($this->container->getParameter('backup_dir').'/'.$backup.'.sql');
        $this->get('braincrafted_bootstrap.flash')->success('Se restauro la base de datos respecto a «'.$backup.'»');
        $this->get('bitacora')->actividad('Se restauro la base de datos respecto a «'.$backup.'»');
        return $this->redirect($this->generateUrl('gestion-bd'));
    }

    /**
     * @Route("/gestion-bd/{backup}/del", name="backup-delete")
     * @Template("SIGBundle:Admin:showBackups.html.twig")
     */
    public function deleteBackupAction($backup)
    {
        $flash    = $this->get('braincrafted_bootstrap.flash');
        $filename = $this->container->getParameter('backup_dir').'/'.$backup.'.sql';
        $bitacora = $this->get('bitacora');
        if(unlink($filename)) {
            $flash->success('Se elimino el archivo de respaldo «'.$backup.'»');
            $bitacora->actividad('Se elimino el archivo de respaldo «'.$backup.'»');
        } else {
            $flash->error('No se pudo eliminar el respaldo «'.$backup.'»');
            $bitacora->actividad('No se pudo eliminar el respaldo «'.$backup.'»');
        }
        return $this->redirect($this->generateUrl('gestion-bd'));
    }

    /**
     * @Route("/gestion-bd/{backup}/save", name="backup-save")
     */
    public function downloadBackupAction($backup)
    {
        $filename    = $this->container->getParameter('backup_dir').'/'.$backup.'.sql';
        $backup_file = fopen($filename, 'r');
        $response    = new Response();
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-type', mime_content_type($filename));
        $response->headers->set('Content-Disposition', 'attachment; filename="'.basename($filename).'";');
        $response->headers->set('Content-length', filesize($filename));
        $response->sendHeaders();
        $response->setContent(readfile($filename));
        return $response;
    }
}
