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
 * History by version of a rule
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\RuleHistoryRepository")
 * @ORM\Table(name="specs_rule_history")
 */
class RuleHistory extends EntityBase
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


}
