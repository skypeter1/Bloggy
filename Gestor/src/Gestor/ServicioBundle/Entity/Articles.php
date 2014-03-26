<?php

namespace Gestor\ServicioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Articles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gestor\ServicioBundle\Entity\ArticlesRepository")
 */
class Articles {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     * @Assert\NotNull(message="Debe escribir un titulo")
     * 
     * 
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255)
     * 
     * 
     *
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date")
     */
    private $creado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="date")
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Articles
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Articles
     */
    public function setAutor($autor) {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor() {
        return $this->autor;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Articles
     */
    public function setContenido($contenido) {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido() {
        return $this->contenido;
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     * @return Articles
     */
    public function setCreado($creado) {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get creado
     *
     * @return \DateTime 
     */
    public function getCreado() {
        return $this->creado;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Articles
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Articles
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set categor�a
     *
     * @param string $categor�a
     * @return Articles
     */
    public function setCategoria($categoria) {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categor�a
     *
     * @return string 
     */
    public function getCategoria() {
        return $this->categoria;
    }

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="article")
     */
    private $comments;

    public function __construct() {
        $this->comments = new \Doctrine\Common\Collections\
                ArrayCollection();
    }

    public function addComments(\Gestor\ServicioBundle\Entity\Comments $comments) {
        $this->comments[] = $comments;
    }

    public function getComments() {
        return $this->comments;
    }

}
