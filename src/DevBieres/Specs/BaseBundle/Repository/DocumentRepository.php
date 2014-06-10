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

class DocumentRepository extends \Doctrine\ORM\EntityRepository
{

		/**
		 * Get the document and its counter (if exist)
		 * @param integer $id
		 */
		public function findOneById($id) {

				// Request
				$sql = "SELECT d, c, v FROM DevBieresSpecsBaseBundle:Document d
						   LEFT JOIN d.currentVersion v
						   LEFT JOIN d.counter c
						   WHERE d.id = :id";
				// Query
				$q = $this->getEntityManager()->createQuery($sql)->setParameter('id', $id);

				// Execute
				return $q->getSingleResult();

		} // / findOneById

} 
