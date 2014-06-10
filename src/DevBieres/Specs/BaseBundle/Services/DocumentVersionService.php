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

class DocumentVersionService extends BaseService 
{

	/**
     * FullName
	 */
	protected function getFullEntityName() { return 'DevBieres\Specs\BaseBundle\Entity\DocumentVersion'; }

	/**
	 * Create the first version of a document
	 */
	public function createDocumentFirstOne($document) {
          // New Entity
		  $v = $this->getNew();
		  // Set value 
		  $v->setDocument($document);
		  $v->setCode("0.0.1");
		  // Save the version
		  $v = $this->save($v);
		  // Update the doc
		  $document->setCurrentVersion($v);
		  $this->save($document);

	} // /createDocumentFirstOne	
} // /DocumentVersionService
