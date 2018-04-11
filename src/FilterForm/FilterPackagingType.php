<?php
namespace App\FilterForm;

use App\DTO\TypeStorageDTOFilter ;
use App\DTOFilter\PackagingDTOFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SearchTypeStorageType
 *
 * @package Kelp\AppBundle\Form
 */
class FilterPackagingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = null)
    {
        $builder->add('text', TextType::class, ['required' => false]);
//            ->add('submit', SubmitType::class, ['label' => 'search']);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data', PackagingDTOFilter::class);
    }
}
