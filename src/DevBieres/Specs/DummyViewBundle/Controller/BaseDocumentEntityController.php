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
 * Based class for the controller of some entities associated to document (Actor, Fonction, Rule ...)
 */
abstract class BaseDocumentEntityController extends Controller
{
	
	/**
	 * Return the sub menu
	 */
	abstract protected function getSubMenu();

	/**
	 * Return an actor service instance
	 */
	abstract protected function getService();

	/**
	 * Return a document service instance
	 */
	protected function getDocService() { return $this->get('dvb.specs.document'); }

	/**
	 * Function for the index : simply get the list
	 */
    protected function _indexAction($docid)
	{
			/* Get the active document = default of findAll() */
			$document = $this->getDocService()->findOneById($docid);
			/* Get the actors associate with the document */
			$cols = $this->getService()->findAllForDocument($document);

			/* Return */
			return array( 
					'document' => $document,
					'cols' => $cols,
					'submenu' => $this->getSubMenu()
			);
	} // /indexAction


	/**
	 * Handle the action around the form
	 */
	protected function _formAction(
			Request $request,
			$method,
			$url_action,
			$url_return,
			$document_id,
			$id = -1)
	{
			// Look for the document
			$document = $this->getDocService()->findOneById($document_id);
			if (!$document) {
				// TODO : Mettre un retour vers une page par défaut ?
                throw $this->createNotFoundException('Unable to find Document entity.');
			}

			// Get an Entity
			// If from create or update
			if($id == -1) { 
			     // Create a new Entity
			     $o = $this->getService()->getNew();
				 // Affectation
				 $this->setNewAffectation($o,$document);
		   	} else {
                 $o = $this->getService()->findOneById($id);
			} // /getEntity

			// Create the form
			$form = $this->createForm(
               $this->getService()->getForm(),
			   $o,
			   array(
				   'action' => $this->generateUrl($url_action, array('docid' => $document_id, 'id' => ($id == -1) ? "" : $id)),
				   'method' => $method,
				   'em' => $this->getDoctrine()->getManager()
			    )
		    ); // /createForm

			// ONLY IF POST or PUT
			if($request->getMethod()[0] == 'P') {

		         // Bind the form to the request
		         $form->handleRequest($request);

		         // Is the form valid ?
		        if($form->isValid()) {
			        $this->getService()->save($o);
				    return $this->redirect(
						$this->generateUrl($url_return, array('docid' => $document_id))
				    );
				} // /isValid
			} // /Method = POST || PUT

			// Return the infos
			return array(
					'document' => $document,
					'form' => $form->createView(),
					'submenu' => $this->getSubMenu()
			); // /return

	} // /formAction

	/**
	 * Handle the affectation on entity if new
	 * @param Entity $o
	 * @param Document $document
	 */
	protected function setNewAffectation($o, $document) {
        $o->setDocument($document);
		$o->setVersionCreated($document->getCurrentVersion());
		return $o;
	} // /setNewAffectation

	/**
	 * Internal delete
	 */
	protected function _deleteAction(Request $request, $docid, $id, $route) {
          $this->getService()->delete($id);
		  return $this->redirect(
				$this->generateUrl($route, array('docid' => $docid))
    		);
	} // /deleteAction
}
