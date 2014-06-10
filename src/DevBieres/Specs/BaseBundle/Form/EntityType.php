<?php
namespace DevBieres\Specs\BaseBundle\Form;
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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
	{

            // Init
			$em = $options['em'];
			$tDoc = new \DevBieres\Specs\BaseBundle\Form\Transformer\DocumentToIdTransformer($em);
			$tDocVersion = new \DevBieres\Specs\BaseBundle\Form\Transformer\DocumentVersionToIdTransformer($em);

			// Builder
			$builder
				->add('label','text',
						array(
								'label' => 'fonction.field.label',
								'required' => true
						)
				)
				->add('description', 'textarea',
				        array(
								'label' => 'fonction.field.description',
								'required' => true,
								'trim' => true,
								'attr' => array('rows' => 9)
						)
				);
				//->add('versionCreated', 'hidden', array('property_path' => 'versionCreated.id'));

			// Hidden Field
			$builder->add(
					$builder->create('document', 'hidden')->addModelTransformer($tDoc)
			);
			$builder->add(
					$builder->create('versionCreated', 'hidden')->addModelTransformer($tDocVersion)
			);
			
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
			$resolver
				->setDefaults(array(
                         'data_class' => 'DevBieres\Specs\BaseBundle\Entity\Entity'
				 ))
				 ->setRequired(array('em'))
				 ->setAllowedTypes(
						 array(
								 'em' => 'Doctrine\Common\Persistence\ObjectManager'
						 )
				 );
    } // /setDefaultOptions

    /**
     * @return string
     */
    public function getName()
    {
        return 'devbieres_specs_basebundle_fonction';
    }
}
