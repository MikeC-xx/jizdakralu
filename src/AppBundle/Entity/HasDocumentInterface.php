<?php

namespace AppBundle\Entity;

interface HasDocumentInterface
{
    public function addDocument(Document $document);

    public function removeDocument(Document $document);

    public function getDocuments();

    public function setDocuments(ArrayCollection $documents);
}
