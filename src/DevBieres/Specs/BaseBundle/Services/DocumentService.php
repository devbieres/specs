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

class DocumentService extends BaseService implements IEntityFormService
{

    /**
     * Service instance for the document version
	 */
    private $versionService;
	public function getVersionService() { return $this->versionService; }
    public function setVersionService($value) { $this->versionService = $value; }

    /**
     * Service instance for the document counter
	 */
    private $counterService;
	public function getCounterService() { return $this->counterService; }
    public function setCounterService($value) { $this->counterService = $value; }

	/**
     * FullName
	 */
    protected function getFullEntityName() { return 'DevBieres\Specs\BaseBundle\Entity\Document'; }

    /**
	 * Get the document form
	 */
	public function getForm() { return new \DevBieres\Specs\BaseBundle\Form\DocumentType(); }

	/**
	 * When created a new Document : create a new version
	 * TODO : Le mettre en place via un event Doctrine ?
	 */
	protected function postSave($entity) {
       // Depending of the number of version ...
       $versions = $entity->getVersions();
	   if(count($versions) <= 0) {
			   $this->getVersionService()->createDocumentFirstOne($entity);
	   } // 

	} // /postSave

	/**
	 * Calculate the counter for a document
	 * @param Document $document
	 * TODO : le déplacer dans le service counter ... rien à faire la
	 */
	public function calculateDocumentCounter($document) {
			// Get the counter ?
			$counter = $document->getCounter();
			// If null ?
			if(null === $counter) {
					$counter = $this->getCounterService()->getNew();
					$counter->setDocument($document);
			} // /null

			// TODO Passer par des services ou repo est suffisant ?
			$counter->setNbActors($this->getRepo('DevBieresSpecsBaseBundle:Actor')->getCountForDocumentId( $document->getId() ));
			$counter->setNbFonctions($this->getRepo('DevBieresSpecsBaseBundle:Fonction')->getCountForDocumentId( $document->getId() ));
			$counter->setNbRules($this->getRepo('DevBieresSpecsBaseBundle:Rule')->getCountForDocumentId( $document->getId() ));
			$counter->setNbEntities($this->getRepo('DevBieresSpecsBaseBundle:Entity')->getCountForDocumentId( $document->getId() ));

			// Save
			$this->getCounterService()->save($counter);

	} // /calculateDocument

} // /DocumentService
