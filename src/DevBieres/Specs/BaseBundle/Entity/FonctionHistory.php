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
 * By version : History of a fonction
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\FonctionHistoryRepository")
 * @ORM\Table(name="specs_fonction_history")
 */
// TODO : mettre un contrôle pour valider que version et fonction dans le même document
class FonctionHistory extends EntityBase
{

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\NotBlank()
		 * */
		protected $label;
		public function getLabel() { return $this->label; }
		public function setLabel($value) { $this->label = $value; }

		/**
		 * @ORM\Column(type="text")
		 */
		protected $description = "";
		public function getDescription() { return $this->description; }
		public function setDescription($value) { $this->description = $value; }

		/**
		 * The function has been created in this version
		 * @ORM\ManyToOne(targetEntity="DocumentVersion")
		 * @ORM\JoinColumn(name="version_id", referencedColumnName="id")
		 * @Assert\NotNull()
		 */
        protected $version;
		public function getVersion() { return $this->version; }
		public function setVersion($value) { $this->version = $value; }

		/**
		 * @ORM\ManyToOne(targetEntity="Fonction")
		 * @ORM\JoinColumn(name="fonction_id", referencedColumnName="id")
		 * @Assert\NotNull()
		 */
        protected $fonction;
		public function getFonction() { return $this->fonction; }
		public function setFonction($value) { $this->fonction = $value; }

}
