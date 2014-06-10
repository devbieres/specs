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

/**
 * Fonctionnalities
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\FonctionRepository")
 * @ORM\Table(name="specs_fonction")
 */
// TODO : Mettre un contrôle pour valider que les versions sont bien celles du document
class Fonction extends AbstractDocumentEntity implements IDocumentEntity
{

		/**
		 * @ORM\Column(type="string", length=6)
		 * @Assert\NotBlank()
		 * @Assert\Regex("/^F[0-9]{5}/")
		 * */
		protected $code;
		public function getCode() { return $this->code; }
		public function setCode($value) { $this->code = $value; }

		public function __toString() { return sprintf('%s - %s', $this->getCode(), $this->getLabel()); }
}
