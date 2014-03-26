<?php

namespace Gestor\ServicioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\Form\FormBuilder;

class ArticlesType extends AbstractType 
{
    //$form = new FormBuilder();
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder->add('titulo')
                ->add('autor')
                ->add('creado');
    }

    public function getName() {
        return 'articles_form';
    }

}
