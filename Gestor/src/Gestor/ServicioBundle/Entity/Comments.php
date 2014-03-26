<?php

namespace Gestor\ServicioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gestor\ServicioBundle\Entity\CommentsRepository")
 */
class Comments {

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
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var integer
     *
     * @ORM\Column(name="reply_to", type="integer")
     */
    private $replyTo;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Comments
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
     * @return Comments
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
     * Set replyTo
     *
     * @param integer $replyTo
     * @return Comments
     */
    public function setReplyTo($replyTo) {
        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * Get replyTo
     *
     * @return integer 
     */
    public function getReplyTo() {
        return $this->replyTo;
    }

    /**
     * @ORM\ManyToOne(targetEntity= "Articles", inversedBy="comments")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * @return integer
     */
    private $article;

    public function setArticle(\Gestor\ServicioBundle\Entity\Articles $article) {
        $this->article = $article;
    }

    public function getArticle() {
        return $this->article;
    }

}
