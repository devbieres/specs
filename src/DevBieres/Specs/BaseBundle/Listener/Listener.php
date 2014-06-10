<?php
namespace DevBieres\Specs\BaseBundle\Listener;

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

use Doctrine\ORM\Event\LifecycleEventArgs;
use DevBieres\Specs\BaseBundle\Entity\IDocumentEntity;

/**
 * TODO : mettre cela dans un traitement asynchrone.
 */
class Listener {

	/**
	 * Container 
	 */
	private $container;

	/**
	 * Construct
	 */
	public function __construct($container) {
              $this->container = $container;
	}

	/**
	 * Insert
	 */
	public function postPersist(LifecycleEventArgs $args) {
		// Entity
		$entity = $args->getEntity();

		// En fonction du type
        if($entity instanceof IDocumentEntity) { $this->calculateDocumentCounter($entity); }

	} // postPersist

	/**
	 * Update
	 */
	public function postUpdate(LifecycleEventArgs $args) {
		// Entity
		$entity = $args->getEntity();
		
		// IDocumentEntity
        if($entity instanceof IDocumentEntity) { $this->calculateDocumentCounter($entity); }
	} // postUpdate


	/**
	 * Delete
	 */
	public function postRemove(LifecycleEventArgs $args) {
		// Entity
		$entity = $args->getEntity();

		// IDocumentEntity
        if($entity instanceof IDocumentEntity) { $this->calculateDocumentCounter($entity); }

	} // postDelete


	/**
	 * Update the counter of the document 
	 */
	protected function calculateDocumentCounter(IDocumentEntity $entity) {

		// Updating the document
        $this->container->get('dvb.specs.document')->calculateDocumentCounter($entity->getDocument());

	} // calculateForActions

}
