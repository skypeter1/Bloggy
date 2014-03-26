<?php

namespace Gestor\ServicioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gestor\ServicioBundle\Entity\Articles;
use Gestor\ServicioBundle\Form\ArticlesType;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\Form\FormBuilder;

class DefaultController extends Controller {

    public function indexAction($name) {
        //return $this->render('GestorServicioBundle:Default:index.html.twig', array('name' => $name));
        $producto = false;
        if (!$producto) {
            throw $this->createNotFoundException("No existe el producto");
        }
        return $this->render();
    }

    public function loginAction() {
        return $this->render("GestorServicioBundle:Registro:login.html.twig");
    }

    public function homeAction() {
        $usuarios = array(
            array('id' => 1, 'nombres' => 'Peter Arboleda', 'edad' => 28),
            array('id' => 2, 'nombres' => 'Sergey bin', 'edad' => 28),
            array('id' => 1, 'nombres' => 'Ted Stanley', 'edad' => 30)
        );
        return $this->render("GestorServicioBundle:Registro:home.html.twig", array('users' => $usuarios));
    }

    public function reportsAction() {
        return $this->render("GestorServicioBundle:Registro:reports.html.twig");
    }

    public function contactoAction() {
        return $this->render("GestorServicioBundle:Registro:contacto.html.twig");
    }

    public function dqlAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $articulos = $em->getRepository('GestorServicioBundle:Articles')->findArticlesByAutorAndTitulo('Nikki Sixx', 'Entrada');
        return $this->render("GestorServicioBundle:Blog:dql.html.twig", array('articulos' => $articulos));
    }

    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();
        //  $articulos = $em->getRepository('GestorServicioBundle:Articles')->findAll();
        $articulos = $em->getRepository('GestorServicioBundle:Articles')->findAll();
        return $this->render("GestorServicioBundle:Blog:listar.html.twig", array('articulos' => $articulos));
    }

    public function crearAction() {
        $articulo = new Articles();
        $articulo->setAutor("Kurt Cobain");
        // $articulo->setTitulo("Entrada");
        $articulo->setContenido("contenido de la entrada");
        $articulo->setCategoria("ejemplo");
        $articulo->setUpdated(new \DateTime());
        $articulo->setSlug("contenido");
        $articulo->setCreado(new \DateTime());
        $errores = $this->get('validator')->validate($articulo);
        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo $error->getMessage();
            }

            return new Response();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($articulo);

        $em->flush();
        return $this->render("GestorServicioBundle:Blog:articulo.html.twig", array('articulo' => $articulo));
    }

    public function editarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $articulo = $em->getRepository('GestorServicioBundle:Articles')->find($id);
        $articulo->setTitle('Articulo de ejemplo 1 - modificado');
        $articulo->setUpdated(new \DateTime());
        $em->persist($articulo);
        $em->flush();
        return $this->render('GestorServicioBundle:Blog:articulo.html.twig', array('articulo' => $articulo));
    }

    public function borrarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $articulo = $em->getRepository('GestorServicioBundle:Articles')->find($id);
        $em->remove($articulo);
        $em->flush();
        return $this->redirect(
                        $this->generateUrl('articulo_listar')
        );
    }

    public function newAction() {

        $request = $this->get('request');
        $articulo = new Articles();
        $articulo->setUpdated(new \DateTime());
        $articulo->setContenido("contenido de la entrada");
        $articulo->setCreado(new \DateTime());
        $articulo->setSlug("slug contenido");
        $articulo->setCategoria("varios");
        // $form = $this->get('form.factory')->create(new ArticlesType());
        $form = $this->createForm(new ArticlesType(), $articulo);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($articulo);
                $em->flush();
                return $this->redirect($this->generateUrl('articulo_listar'));
            }
        }
        return $this->render('GestorServicioBundle:Blog:new.html.twig', array('form' => $form->createView(),
        ));
    }

}
