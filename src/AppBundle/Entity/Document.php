<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Uploadable\Uploadable as Uploadable;
use AdminBundle\Entity\BaseEntity;

/**
 * Document
 *
 * @ORM\Table(name="document", indexes={@ORM\Index(name="fulltext", columns={"file", "name", "mime_type", "description"}, flags={"fulltext"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocumentRepository")
 * @Gedmo\Uploadable()
 */
class Document extends BaseEntity implements Uploadable
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
     * @ORM\Column(name="file", type="string", length=255)
     * @Gedmo\UploadableFilePath()
     * @Assert\NotBlank()
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\UploadableFileName()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mime_type", type="string", length=50)
     * @Gedmo\UploadableFileMimeType()
     */
    private $mimeType;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="decimal", precision=10, scale=0)
     * @Gedmo\UploadableFileSize()
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $description;

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
     * Set file
     *
     * @param string $file
     *
     * @return Document
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Document
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

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return Document
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return Document
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    public function __toString()
    {
        return $this->getDescription();
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Document
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
     * Get web path
     *
     * @return string
     */
    public function getWebPath()
    {
        return '/documents/' . $this->getName();
    }

    public static function getIndexColumns()
    {
        return ['id', 'description', 'name', 'mimeType', 'size', 'webPath'];
    }
}
