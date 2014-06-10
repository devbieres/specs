<?php
namespace DevBieres\Specs\BaseBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use DevBieres\Specs\BaseBundle\Entity\IDocumentEntity;

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
