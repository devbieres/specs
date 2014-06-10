<?php
namespace DevBieres\Specs\BaseBundle\Services;
/*
 * ----------------------------------------------------------------------------
 * « LICENCE BEERWARE » (Révision 42):
 * <thierry<at>lafamillebn<point>net> a créé ce fichier. Tant que vous conservez cet avertissement,
 * vous pouvez faire ce que vous voulez de ce truc. Si on se rencontre un jour et
 * que vous pensez que ce truc vaut le coup, vous pouvez me payer une bière en
 * retour. 
 * ----------------------------------------------------------------------------
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <thierry<at>lafamillebn<point>net> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return. 
 * ----------------------------------------------------------------------------
 * Plus d'infos : http://fr.wikipedia.org/wiki/Beerware
 * ----------------------------------------------------------------------------
*/

//use DevBieres\Specs\BaseBundle\Entity\Document;
use DevBieres\CommonBundle\Services\EntityService as BaseService;
use DevBieres\CommonBundle\Services\IEntityFormService;

class EntityService extends BaseService implements IEntityFormService
{

    /**
     * Service instance for the document
	 */
	/*
    private $documentService;
	public function getDocumentService() { return $this->documentService; }
    public function setDocumentService($value) { $this->documentService = $value; }
	 */

	/**
     * FullName
	 */
    protected function getFullEntityName() { return 'DevBieres\Specs\BaseBundle\Entity\Entity'; }

    /**
	 * Get the document form
	 */
	public function getForm() { return new \DevBieres\Specs\BaseBundle\Form\EntityType(); }

	/**
	 * Return all fonctions for document
	 * @param Document $document
	 */
    public function findAllForDocument($document) {
          return $this->getRepo()->findAllForDocumentId($document->getId());
	} // /findAllForDocument


} // /EntityService
