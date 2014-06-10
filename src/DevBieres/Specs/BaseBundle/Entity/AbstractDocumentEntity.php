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
//use JMS\Serializer\Annotation as JMS;

use DevBieres\CommonBundle\Entity\EntityBase;

/**
 * Base class for some entities which describe a document (Actor, Fonction, Rule ...)
 */
abstract class AbstractDocumentEntity extends EntityBase implements IDocumentEntity
{

		/**
		 * Document
		 * @ORM\ManyToOne(targetEntity="Document", inversedBy="versions")
		 * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
		 * @Assert\NotNull()
		 */
	    protected $document;	
		public function getDocument() { return $this->document; }
		public function setDocument($value) { $this->document = $value; }

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\NotBlank()
		 * */
		protected $label;
		public function getLabel() { return $this->label; }
		public function setLabel($value) { $this->label = $value; }

		/**
		 * @ORM\Column(type="text")
		 * @Assert\NotBlank()
		 */
		protected $description;
		public function getDescription() { return $this->description; }
		public function setDescription($value) { $this->description = $value; }


		/**
		 * The function has been created in this version
		 * @ORM\ManyToOne(targetEntity="DocumentVersion")
		 * @ORM\JoinColumn(name="version_created_id", referencedColumnName="id")
		 * @Assert\NotNull()
		 */
        protected $versionCreated;
		public function getVersionCreated() { return $this->versionCreated; }
		public function setVersionCreated($value) { $this->versionCreated = $value; }

		/**
		 * The function has been desactivated in this version
		 * @ORM\ManyToOne(targetEntity="DocumentVersion")
		 * @ORM\JoinColumn(name="version_desactivated_id", referencedColumnName="id")
		 */
        protected $versionDesactivated;
		public function getVersionDesactivated() { return $this->versionDesactivated; }
		public function setVersionDesactivated($value) { $this->versionDesactivated = $value; }

}
