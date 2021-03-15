<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\AbstractType;
Use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quel nom désirez-vous mettre à votre adresse?'
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
            ])
            ->add('lastname', TextType::class, [
                'label' => ' Votre nom',
            ])
            ->add('company', TextType::class, [
                'label' => 'Votre société',
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'label' => 'Votre adresse',
            ])
            ->add('postal', TextType::class, [
                'label' => 'Votre code postal',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Votre téléphone',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
