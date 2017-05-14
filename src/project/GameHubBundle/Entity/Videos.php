<?php
/**
 * Created by PhpStorm.
 * User: Fakher_XoX
 * Date: 10/04/2017
 * Time: 09:21
 */

namespace project\GameHubBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Videos
 *
 * @ORM\Table(name="videos", indexes={@ORM\Index(name="id_chaine", columns={"id_chaine"})})
 * @ORM\Entity(repositoryClass="project\GameHubBundle\Repository\PublicationRepository")

 * @Vich\Uploadable
 */

class Videos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPub;
    /**
     * @var string
     *
     * @ORM\Column(name="desc_video", type="text", length=65535, nullable=false)
     */
    private $desc;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=150, nullable=false)
     */
    private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50, nullable=false)
     */
    private $url;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @var \Chaine
     *
     * @ORM\ManyToOne(targetEntity="Chaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_chaine", referencedColumnName="id_chaine")
     * })
     */
    private $id_chaine;
    /**
     * @Vich\UploadableField(mapping="media", fileNameProperty="url")
     *@Assert\File(
     *     maxSize="500M",
     *  mimeTypes={
     *         "application/mp4", "video/mp4"})
     * @var File
     */
    private $mediaFile;

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
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
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
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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
     * @return File
     */
    public function getMediaFile()
    {
        return $this->mediaFile;
    }

    /**
     *  @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $video
     *  @return Chaine
     */
    public function setMediaFile(File $video= null)
    {
        $this->mediaFile = $video;
        if ($video) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdChaine()
    {
        return $this->id_chaine;
    }

    /**
     * @param mixed $id_chaine
     */
    public function setIdChaine($id_chaine)
    {
        $this->id_chaine = $id_chaine;
    }



}