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
 * @ORM\Entity(repositoryClass="DevBieres\Specs\BaseBundle\Repository\EntityFieldRepository")
 * @ORM\Table(name="specs_entity_field")
 */
class EntityField extends EntityBase
{
    /**
     * @ORM\ManyToOne(targetEntity="EntityFieldType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
	 * @Assert\NotNull
     */
     protected $fieldType;
	 public function getFieldType() { return $this->fieldType; }
	 public function setFieldType($value) { $this->fieldType = $value; }

	 /**
	  * @ORM\ManyToOne(targetEntity="Entity", inversedBy="fields")
	  * @ORM\JoinColumn(name="entity_field", referencedColumnName="id")
	  */
     protected $entity;
	 public function getEntity() { return $this->entity; }
     public function setEntity($value) { $this->entity = $value; }


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

} // /EntityField

