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

class FonctionRepository extends \Doctrine\ORM\EntityRepository
{

	/**
	 * Return the list of fonction for the document
	 * @param int $docid
	 */
	public function findAllForDocumentId($docid) {
			// Request DQL
			$sql = "SELECT f, v FROM DevBieresSpecsBaseBundle:Fonction f
					INNER JOIN f.versionCreated v
					INNER JOIN f.document d
					WHERE d.id = :doc_id";

			// Request
			$q = $this->getEntityManager()->createQuery($sql)
				      ->setParameter('doc_id', $docid);

	        // Return
			return $q->execute();		
	} // /findAllForDocument

	/**
	 * Get the number of fonctions of the document
	 * @param integer $docid
	 */
	public function getCountForDocumentId($docid) {
		// Request 
        $sql = "SELECT COUNT(f.id) FROM DevBieresSpecsBaseBundle:Fonction f
				INNER JOIN f.document d
				WHERE d.id = :docid";
		// Query
		$q = $this->getEntityManager()->createQuery($sql)->setParameter('docid', $docid);
		// Execute
		return $q->getSingleScalarResult();
	} // /getCountForDocumentId

	/**
	 * Return the max code for the document
	 * @param integer $docid
	 */
	public function findMaxFonctionCode($docid) {
		// Request 
        $sql = "SELECT MAX(f.code) FROM DevBieresSpecsBaseBundle:Fonction f
				INNER JOIN f.document d
				WHERE d.id = :docid";
		// Query
		$q = $this->getEntityManager()->createQuery($sql)->setParameter('docid', $docid);
		// Execute
		return $q->getSingleScalarResult();
	} // /findMaxFonctionCode
} 
