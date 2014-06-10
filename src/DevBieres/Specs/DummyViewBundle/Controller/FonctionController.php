<?php
namespace DevBieres\Specs\DummyViewBundle\Controller;
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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/document/{docid}/fonction")
 */
class FonctionController extends BaseDocumentEntityController
{
	
	/**
	 * Return the sub menu
	 */
	protected function getSubMenu() { return 'fonction'; }
	/**
	 * Return an service instance
	 */
	protected function getService() { return $this->get('dvb.specs.fonction'); }


	/**
	 * Set new affectation
	 * @param Fonction $e
	 * @param Document $document
	 */
	protected function setNewAffectation($o, $document) {
			// Base
			$o = parent::setNewAffectation($o, $document);
			// Code
			$o->setCode( $this->getService()->getNewCode($document));
			// return
			return $o;
	} // /setNewAffectation


    /**
     * @Route("/", name="fonctions")
     * @Template()
     */
    public function indexAction($docid)
	{
		return $this->_indexAction($docid);
	} // /indexAction

	/**
	 * @Route("/new", name="fonction_new")
	 * @Method("GET")
	 * @Template("DevBieresSpecsDummyViewBundle:Fonction:new.html.twig")
	 */
	public function newAction(Request $request, $docid) {
		return $this->_formAction(
			$request,
			'POST', 
			'fonction_create',
			'fonctions',
			$docid);
	} // /newAction

	/**
	 * @Route("/create", name="fonction_create")
	 * @Method("POST")
	 * @Template("DevBieresSpecsDummyViewBundle:Fonction:new.html.twig")
	 */
	public function createAction(Request $request, $docid) {
		return $this->_formAction(
			$request,
			'POST', 
			'fonction_create',
			'fonctions',
			$docid);
	} // /createAction

	/**
	 * Edit Action
	 * @Route("/{id}/edit", name="fonction_edit")
	 * @Method("GET")
	 * @Template("DevBieresSpecsDummyViewBundle:Fonction:edit.html.twig")
	 */
	public function editAction(Request $request, $docid, $id) {

			return $this->_formAction(
					$request,
					"PUT", 
					"fonction_update",
					"fonctions",
					$docid,
					$id);

	} // /editAction

	/**
	 * Update action
	 * @Route("/{id}/update", name="fonction_update")
	 * @Method("PUT")
	 * @Template("DevBieresSpecsDummyViewBundle:Fonction:edit.html.twig")
	 */
	public function updateAction(Request $request, $docid, $id) {

			return $this->_formAction(
					$request,
					"PUT", 
					"fonction_update",
					"fonctions",
					$docid,
					$id);

	} // /updateAction


	/**
	 * @Route("/{id}/delete", name="fonction_delete")
	 * TODO : passer par la méthode delete
	 * @Method("GET")
	 */
	public function deleteAction(Request $request, $docid, $id) {
			return $this->_deleteAction($request, $docid, $id, 'fonctions');
	} // /deleteAction
}
