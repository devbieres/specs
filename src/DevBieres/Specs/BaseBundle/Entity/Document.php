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
 * Main contener of the specs
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\DocumentRepository")
 * @ORM\Table(name="specs_document")
 */
class Document extends EntityBase
{

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\NotBlank()
		 * @Assert\Length(min="3")
		 * */
		protected $label;
		public function getLabel() { return $this->label; }
		public function setLabel($value) { $this->label = $value; }


		/**
		 * A document may have multiple version : not sure about the rule at the present time
		 * @ORM\OneToMany(targetEntity="DocumentVersion", mappedBy="document", cascade={"remove"})
		 * */
		protected $versions;
		public function getVersions() { return $this->versions; }
		public function setVersions($value) { $this->versions = $value; }

		/**
		 * The current version of the document
		 * @ORM\ManyToOne(targetEntity="DocumentVersion")
		 * @ORM\JoinColumn(name="current_version_id", referencedColumnName="id")
		 */
        protected $currentVersion;
		public function getCurrentVersion() { return $this->currentVersion; }
		public function setCurrentVersion($value) { $this->currentVersion = $value; }

		/**
		 * @ORM\OneToOne(targetEntity="DocumentCounter", mappedBy="document")
		 */
		protected $counter;
		public function getCounter() { return $this->counter; }
		public function setCounter($value) { $this->counter = $value; }

		/**
		 * Constructor
		 */
		public function __construct() {
				$this->version = new \Doctrine\Common\Collections\ArrayCollection();
		}  // /__construct

		/**
		 * Convert ...
		 */
		public function __toString() { return $this->getLabel(); }
}
