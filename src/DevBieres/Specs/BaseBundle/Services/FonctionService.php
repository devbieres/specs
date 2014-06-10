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

class FonctionService extends BaseService implements IEntityFormService
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
    protected function getFullEntityName() { return 'DevBieres\Specs\BaseBundle\Entity\Fonction'; }

    /**
	 * Get the document form
	 */
	public function getForm() { return new \DevBieres\Specs\BaseBundle\Form\FonctionType(); }

	/**
	 * Return all fonctions for document
	 * @param Document $document
	 */
    public function findAllForDocument($document) {
          return $this->getRepo()->findAllForDocumentId($document->getId());
	} // /findAllForDocument


	/**
	 * Get a new code for a fonction
	 * @param Document $document 
	 */
	public function getNewCode($document) {
			// Repo
			$max = $this->getRepo()->findMaxFonctionCode($document->getId());
			// Depeding
			if(null === $max) { $max = 0; }
			else {
			   $max = substr($max, 1);
			}
			// +1
			$n = $max + 1;
			// Number of char
			$c = count($n);
			// Build the code
			return sprintf("F%s%s", str_repeat("0", 5 - $c), $n);

	} // /getNewCode

} // /ActorService
