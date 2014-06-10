<?php
namespace DevBieres\Specs\BaseBundle\Entity;
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

/**
 * Common Interface for all entity used by document container ...
 */
interface IDocumentEntity {
	/**
	 * Document
	 */
	public function getDocument();
	public function setDocument($document);

    /**
	 * Base data
	 */
	public function getLabel();
	public function getDescription();

	/**
	 * Handle Version
	 */
	public function getVersionCreated();
	public function setVersionCreated($value);
	public function getVersionDesactivated();
	public function setVersionDesactivated($value);

}
