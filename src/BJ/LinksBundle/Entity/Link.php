<?php

namespace BJ\LinksBundle\Entity;

use BJ\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity(repositoryClass="BJ\LinksBundle\Repository\LinkRepository")
 */
class Link
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    // Ici, la relation est une relation ManyToOne : plusieurs liens peuvent être liés à un seul auteur,
    // on renseigne donc l'entité correspondante (user)
    // L'entité Link est propriétaire de notre relation, puisque c'est elle qui va contenir un champs author_id en bdd
    // (en fait, c'est systématiquement le côté "Many" qui est propriétaire de la relation)
    // Dans notre cas, j'ai utilisé une relation bidirectionnelle : on peut obtenir l'auteur d'un lien ($link->getAuthor()),
    // mais aussi les liens d'un auteur ($user->getLinks()), d'où le "inversedBy".
    // L'attribut correspondant (links) se trouve dans l'entité User
    /**
     * @ORM\ManyToOne(targetEntity="BJ\UserBundle\Entity\User", inversedBy="links")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Link
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Link
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Link
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    // Ici, désormais, on lie les entités en passant un objet User en paramètre
    /**
     * Set author
     *
     * @param User $author
     *
     * @return Link
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Link
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

