<?php

namespace project\GameHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="id_chaine", columns={"id_chaine"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPub;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=500, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="jaimes", type="integer", nullable=true)
     */
    private $jaimes;

    /**
     * @var \Chaine
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\OneToOne(targetEntity="Chaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_chaine", referencedColumnName="id_chaine")
     * })
     */
    private $idChaine;

    /**
     * @return int
     */
    public function getIdPub()
    {
        return $this->idPub;
    }

    /**
     * @param int $idPub
     */
    public function setIdPub($idPub)
    {
        $this->idPub = $idPub;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getJaimes()
    {
        return $this->jaimes;
    }

    /**
     * @param int $jaimes
     */
    public function setJaimes($jaimes)
    {
        $this->jaimes = $jaimes;
    }

    /**
     * @return \Chaine
     */
    public function getIdChaine()
    {
        return $this->idChaine;
    }

    /**
     * @param \Chaine $idChaine
     */
    public function setIdChaine($idChaine)
    {
        $this->idChaine = $idChaine;
    }


}

