<?php

namespace Gestor\ServicioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;

class RegistroController extends Controller
{
    
      public function loginAction()
    {
        return $this->render("GestorServicioBundle:Registro:registro.html.twig");
    }
    
      public function homeAction()
    {
        return $this->render("GestorServicioBundle:Registro:registro.html.twig");
    }
    
      public function reportsAction()
    {
        return $this->render("GestorServicioBundle:Registro:registro.html.twig");
    }
    
        public function contactoAction()
    {
        return $this->render("GestorServicioBundle:Registro:registro.html.twig");
    }
    
      public function registroAction()
    {
        return $this->render("GestorServicioBundle:Registro:registro.html.twig");
    }

}
