<?php

namespace Jack\DeckKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Card
 *
 * @Gedmo\Uploadable(filenameGenerator="SHA1")
 * @ORM\Table
 * @ORM\Entity(repositoryClass="Jack\DeckKeeperBundle\Entity\CardRepository")
 */
class Card
{
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="CardSet", inversedBy="cards")
     */
    private $cardSet;

    /**
     * @var string
     *
     * @ORM\Column(name="manaCost", nullable=true, type="string", length=255)
     */
    private $manaCost;

    /**
     * @var string
     *
     * @Gedmo\UploadableFileName
     * @ORM\Column(name="image", nullable=true, type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="type", nullable=true, type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="subType", nullable=true, type="string", length=255)
     */
    private $subType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", nullable=true, type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="artisticdescription", nullable=true, type="text")
     */
    private $artisticdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="rarity", nullable=true, type="string", length=255)
     */
    private $rarity;

    /**
     * @var integer
     *
     * @ORM\Column(name="power", nullable=true, type="integer")
     */
    private $power;

    /**
     * @var integer
     *
     * @ORM\Column(name="toughness", nullable=true, type="integer")
     */
    private $toughness;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", nullable=true, type="string", length=255)
     */
    private $artist;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", nullable=true, type="integer")
     */
    private $number;

    private $imageFile;

    /**

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Card
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set cardSet
     *
     * @return Card
     */
    public function setCardSet($cardSet)
    {
        $this->cardSet = $cardSet;

        return $this;
    }

    /**
     * Get cardSet
     */
    public function getCardSet()
    {
        return $this->cardSet;
    }

    /**
     * Set manaCost
     *
     * @param string $manaCost
     * @return Card
     */
    public function setManaCost($manaCost)
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    /**
     * Get manaCost
     *
     * @return string
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Card
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Card
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set subType
     *
     * @param string $subType
     * @return Card
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get subType
     *
     * @return string
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Card
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
     * Set artisticdescription
     *
     * @param string $artisticdescription
     * @return Card
     */
    public function setArtisticdescription($artisticdescription)
    {
        $this->artisticdescription = $artisticdescription;

        return $this;
    }

    /**
     * Get artisticdescription
     *
     * @return string
     */
    public function getArtisticdescription()
    {
        return $this->artisticdescription;
    }

    /**
     * Set rarity
     *
     * @param string $rarity
     * @return Card
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity
     *
     * @return string
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set power
     *
     * @param integer $power
     * @return Card
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set toughness
     *
     * @param integer $toughness
     * @return Card
     */
    public function setToughness($toughness)
    {
        $this->toughness = $toughness;

        return $this;
    }

    /**
     * Get toughness
     *
     * @return integer
     */
    public function getToughness()
    {
        return $this->toughness;
    }

    /**
     * Set artist
     *
     * @param string $artist
     * @return Card
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }


    /**
     * Set number
     *
     * @param integer $toughness
     * @return Card
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    public function getImageWebPath()
    {
        return '/uploads/' . $this->getImage();
    }

    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
}
