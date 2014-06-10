<?php
namespace DevBieres\Specs\BaseBundle\Form\Transformer;
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

//use DevBieres\CommonBundle\Form\Transformer\AbstractEntityToIdTransformer;

/**
 * Transformer for Data Transformer
 * http://symfony.com/doc/current/cookbook/form/data_transformers.html (2.4)
 */
class DocumentToIdTransformer extends \DevBieres\CommonBundle\Form\Transformer\AbstractEntityToIdTransformer
{

		/**
		 * FullName of the Entity
		 */
		protected function getEntityFullName() { 
				return "DevBieresSpecsBaseBundle:Document";
		} // /getEntityFullName


} // /DocumentToIdTransformer
