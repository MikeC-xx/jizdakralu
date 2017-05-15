<?php

namespace AppBundle\Entity;

trait HasDocumentTrait
{
    /**
     * @var ArrayCollection
     */
    protected $documents;

    public function addDocument(Document $document)
    {
        $this->documents->add($document);

        return $this;
    }

    public function removeDocument(Document $document)
    {
        $this->documents->removeElement($document);
    }

    public function getDocuments()
    {
        return $this->documents;
    }

    public function setDocuments(ArrayCollection $documents)
    {
        $this->documents = $documents;

        return $this;
    }
}
