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

class DocumentController extends Controller
{
	/**
	 * Return a document service instance
	 */
	protected function getService() { return $this->get('dvb.specs.document'); }

    /**
     * @Route("/", name="documents")
     * @Template()
     */
    public function indexAction()
	{
			/* Get the active document = default of findAll() */
			$cols = $this->getService()->findAll();

			return array(
					'cols' => $cols
			);
	} // /indexAction


	/**
	 * Handle the new or the create action
	 */
	protected function formAction(
			Request $request, 
			$method = "POST", 
			$url_action ='document_create', 
			$url_return = '',
			$id=-1
	) {
			// Get an  Entity
			if($id == -1) {
					$entity = $this->getService()->getNew();
			} else {
                    $entity = $this->getService()->findOneById($id);
					if (!$entity) {
						// TODO : Mettre un retour vers une page par défaut ?
                        throw $this->createNotFoundException('Unable to find Document entity.');
                    }
			}

			// Get the form
			$form = $this->createForm(
					$this->getService()->getForm(),
					$entity,
					array(
							'action' => $this->generateUrl($url_action, array('id' => (($id != -1) ? $id : ""))),
							'method' => $method
					)
			); // /form

			// ONLY IF POST or PUT
			if($request->getMethod()[0] == 'P') {
			    // Handle the request
			    $form->handleRequest($request);

			    // First Validation
			    if($form->isValid()) {
					// Record threw the service
					$entity = $this->getService()->save($entity);
                    // If empty
					if( empty( $url_return )) { $url_return = $this->generateUrl('documents'); }
					// Return
					return $this->redirect($url_return);
				} // /FV
			} // /if post

			// Back to the template
		    return array(
				'document' => $entity,
				'form' => $form->createView(),
				'submenu' => 'edit'
			);
	} // /newcreateAction


	/**
	 * New action
	 * @Route("/new", name="document_new")
	 * @Method("GET")
	 * @Template("DevBieresSpecsDummyViewBundle:Document:new.html.twig")
	 */
    public function newAction(Request $request) {
			return $this->formAction($request);
	} // /newAction	

	/**
	 * Create Action
	 * @Route("/create", name="document_create")
	 * @Method("POST")
	 * @Template("DevBieresSpecsDummyViewBundle:Document:new.html.twig")
	 */
	public function createAction(Request $request) {
			return $this->formAction($request);
	} // /createAction

	/**
	 * Edit Action
	 * @Route("/{id}/edit", name="document_edit")
	 * @Method("GET")
	 * @Template("DevBieresSpecsDummyViewBundle:Document:edit.html.twig")
	 */
	public function editAction(Request $request, $id) {

			return $this->formAction(
					$request,
					"PUT", 
					"document_update",
					$this->generateUrl('document_show', array('id' => $id)),
					$id);

	} // /editAction

	/**
	 * Update action
	 * @Route("/{id}/update", name="document_update")
	 * @Method("PUT")
	 * @Template("DevBieresSpecsDummyViewBundle:Document:edit.html.twig")
	 */
	public function updateAction(Request $request, $id) {

			return $this->formAction(
					$request,
					"PUT", "document_update",
					$this->generateUrl('document_show', array('id' => $id)),
					$id);

	} // /updateAction

	/**
	 * @Route("/{id}/delete", name="document_delete")
	 * TODO : passer par la méthode delete
	 * @Method("GET")
	 */
	public function deleteAction(Request $request, $id) {
          $this->getService()->delete($id);
		  return $this->redirect(
				$this->generateUrl('documents')
    		);
	} // /deleteAction


	/**
	 * @Route("/{id}", name="document_show")
	 * @Method("GET")
	 * @Template("DevBieresSpecsDummyViewBundle:Document:edit.html.twig")
	 */
	public function showAction(Request $request, $id) {
			// Same as edit
			return $this->editAction($request, $id);
	} // /showAction
}
