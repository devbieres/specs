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

class RuleRepository extends \Doctrine\ORM\EntityRepository
{

	/**
	 * Return the list of rules for the document
	 * @param int $docid
	 */
	public function findAllForDocumentId($docid) {
			// Request DQL
			$sql = "SELECT r, v FROM DevBieresSpecsBaseBundle:Rule r
					INNER JOIN r.versionCreated v
					INNER JOIN r.document d
					WHERE d.id = :doc_id";

			// Request
			$q = $this->getEntityManager()->createQuery($sql)
				      ->setParameter('doc_id', $docid);

	        // Return
			return $q->execute();		
	} // /findAllForDocument

	/**
	 * Get the number of rules of the document
	 * @param integer $docid
	 */
	public function getCountForDocumentId($docid) {
		// Request 
        $sql = "SELECT COUNT(r.id) FROM DevBieresSpecsBaseBundle:Rule r
				INNER JOIN r.document d
				WHERE d.id = :docid";
		// Query
		$q = $this->getEntityManager()->createQuery($sql)->setParameter('docid', $docid);
		// Execute
		return $q->getSingleScalarResult();
	} // getCountForDocumentId

	/**
	 * Return the max code for the document
	 * @param integer $docid
	 */
	public function findMaxRuleCode($docid) {
		// Request 
        $sql = "SELECT MAX(f.code) FROM DevBieresSpecsBaseBundle:Rule f
				INNER JOIN f.document d
				WHERE d.id = :docid";
		// Query
		$q = $this->getEntityManager()->createQuery($sql)->setParameter('docid', $docid);
		// Execute
		return $q->getSingleScalarResult();
	} // /findMaxFonctionCode
} 

