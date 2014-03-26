<?php

namespace Gestor\ServicioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArticlesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticlesRepository extends EntityRepository {

    public function findArticlesByAutorAndTitulo($autor, $titulo) {
        $em = $this->getEntityManager();
        $dql = "select a.id, a.titulo, c.autor
        from GestorServicioBundle:Comments c
        join c.article a
        where a.autor = :autor
        and a.titulo like :titulo";
        $query = $em->createQuery($dql);
        $query->setParameter('autor', $autor);
        $query->setParameter('titulo', '%' . $titulo . '%');
        $articulos = $query->getResult();
        return $articulos;
    }

}
