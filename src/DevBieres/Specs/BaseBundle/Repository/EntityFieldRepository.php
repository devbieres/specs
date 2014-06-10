<?php
namespace DevBieres\Specs\BaseBundle\Repository;
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

class EntityFieldRepository extends \Doctrine\ORM\EntityRepository
{

	/**
	 * Return the list of entity field for an entity
	 * @param int $entityid
	 */
	public function findAllForEntityId($entityid) {
			// Request DQL
			$sql = "SELECT ef, eft, e, v FROM DevBieresSpecsBaseBundle:EntityField ef
					INNER JOIN ef.entity e
					INNER JOIN ef.fieldType eft
					INNER JOIN e.versionCreated v
					WHERE e.id = :entity_id";

			// Request
			$q = $this->getEntityManager()->createQuery($sql)
				      ->setParameter('entity_id', $docid);

	        // Return
			return $q->execute();		
	} // /findAllForEntity

} 
