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
//use Symfony\Component\Validator\Constraints as Assert;
//use JMS\Serializer\Annotation as JMS;

//use DevBieres\CommonBundle\Entity\EntityBase;

/**
 * An Entity as an Entity means ...
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\EntityRepository")
 * @ORM\Table(name="specs_entity")
 */
class Entity extends AbstractDocumentEntity implements IDocumentEntity
{
    /**
     * @ORM\OneToMany(targetEntity="EntityField", mappedBy="entity")
	 */
    protected $fields;
	public function getFields() { return $this->fields; }
    public function setFields($value) { $this->fields = $value; }

	/**
	 * Return the label
	 */
    public function __toString() { return $this->getLabel(); }

	/**
	 * Construct
	 */
	public function __construct() {
			$this->fields = new \Doctrine\Common\Collections\ArrayCollection();
	} // /_construct

} // /Entity
