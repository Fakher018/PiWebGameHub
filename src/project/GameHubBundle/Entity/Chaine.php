<?php

namespace project\GameHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chaine
 *
 * @ORM\Table(name="chaine", indexes={@ORM\Index(name="id_membre", columns={"id_membre"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Chaine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_chaine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idChaine;

    /**
     * @var string
     *
     * @ORM\Column(name="nomC", type="string", length=50, nullable=false)
     */
    private $nomc;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="console", type="string", length=30, nullable=false)
     */
    private $console;

    /**
     * @var string
     *
     * @ORM\Column(name="url_pdp", type="string", length=255, nullable=true)
     */
    private $urlPdp;

    /**
     * @var string
     *
     * @ORM\Column(name="url_chaine", type="string", length=255, nullable=true)
     */
    private $urlChaine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="membre_depuis", type="date", nullable=false)
     */
    private $membreDepuis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modif", type="datetime", nullable=true)
     */
    private $dateModif;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="text", length=65535, nullable=false)
     */
    private $signature;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre", referencedColumnName="id_membre")
     * })
     */
    private $id_membre;

    /**
     * @Vich\UploadableField(mapping="media", fileNameProperty="urlPdp")
     *@Assert\File(
     *     maxSize="5M",
     *  mimeTypes={
     *         "image/png", "image/jpeg", "image/pjpeg"})
     * @var File
     */
    private $imageFile;





    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *  @return Chaine
     */
    public function setImageFile(File $image= null)
    {
        $this->imageFile = $image;
        if ($image)
            $this->membreDepuis = new \DateTimeImmutable();

        return $this;
    }



    /**
     * @return int
     */
    public function getIdChaine()
    {
        return $this->idChaine;
    }

    /**
     * @param int $idChaine
     */
    public function setIdChaine($idChaine)
    {
        $this->idChaine = $idChaine;
    }

    /**
     * @return string
     */
    public function getNomc()
    {
        return $this->nomc;
    }

    /**
     * @param string $nomc
     */
    public function setNomc($nomc)
    {
        $this->nomc = $nomc;
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
    public function getConsole()
    {
        return $this->console;
    }

    /**
     * @param string $console
     */
    public function setConsole($console)
    {
        $this->console = $console;
    }

    /**
     * @return string
     */
    public function getUrlPdp()
    {
        return $this->urlPdp;
    }

    /**
     * @param string $urlPdp
     */
    public function setUrlPdp($urlPdp)
    {
        $this->urlPdp = $urlPdp;
    }

    /**
     * @return string
     */
    public function getUrlChaine()
    {
        return $this->urlChaine;
    }

    /**
     * @param string $urlChaine
     */
    public function setUrlChaine($urlChaine)
    {
        $this->urlChaine = $urlChaine;
    }

    /**
     * @return \DateTime
     */
    public function getMembreDepuis()
    {
        return $this->membreDepuis;
    }

    /**
     * @param \DateTime $membreDepuis
     */
    public function setMembreDepuis($membreDepuis)
    {
        $this->membreDepuis = $membreDepuis;
    }

    /**
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * @param \DateTime $dateModif
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return \MembrePro
     */
    public function getIdMembre()
    {
        return $this->id_membre;
    }

    /**
     * @param \MembrePro $id_membre
     */
    public function setIdMembre($id_membre)
    {
        $this->id_membre = $id_membre;
    }




}

