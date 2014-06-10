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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

use DevBieres\CommonBundle\Entity\EntityBase;

/**
 * Store counter for a document
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\DocumentCounterRepository")
 * @ORM\Table(name="specs_document_counter")
 */
class DocumentCounter extends EntityBase
{
		/**
		 * @ORM\OneToOne(targetEntity="Document", inversedBy="counter")
		 * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
		 * @Assert\NotNull()
		 */
	    protected $document;	
		public function getDocument() { return $this->document; }
		public function setDocument($value) { $this->document = $value; }

		/**
		 * @ORM\Column(type="integer")
		 * @Assert\Range(min=0)
		 */
		protected $nbActors;
		public function getNbActors() { return $this->nbActors; }
		public function setNbActors($value) { $this->nbActors = $value; }


		/**
		 * @ORM\Column(type="integer")
		 * @Assert\Range(min=0)
		 */
		protected $nbFonctions;
		public function getNbFonctions() { return $this->nbFonctions; }
		public function setNbFonctions($value) { $this->nbFonctions = $value; }


		/**
		 * @ORM\Column(type="integer")
		 * @Assert\Range(min=0)
		 */
		protected $nbRules;
		public function getNbRules() { return $this->nbRules; }
		public function setNbRules($value) { $this->nbRules = $value; }

		/**
		 * @ORM\Column(type="integer")
		 * @Assert\Range(min=0)
		 */
		protected $nbEntities;
		public function getNbEntities() { return $this->nbEntities; }
		public function setNbEntities($value) { $this->nbEntities = $value; }

}
