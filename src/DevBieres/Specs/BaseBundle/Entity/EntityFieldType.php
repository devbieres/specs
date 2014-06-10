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
 * An Entity as an Entity means ...
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\EntityFieldTypeRepository")
 * @ORM\Table(name="specs_entity_field_type")
 */
class EntityFieldType extends EntityBase
{

		/**
		 * @ORM\Column(type="string", length=6)
		 * @Assert\NotBlank()
		 * */
		protected $code;
		public function getCode() { return $this->code; }
		public function setCode($value) { $this->code = $value; }

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\NotBlank()
		 * */
		protected $label;
		public function getLabel() { return $this->label; }
		public function setLabel($value) { $this->label = $value; }

		/**
		 * Return the Label
		 */
		public function __toString() { return $this->getLabel(); }
} // /EntityFieldType
