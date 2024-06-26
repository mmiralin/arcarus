<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\UserSectionContent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSectionContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('containedUsers', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name', // Asumiendo que User tiene un campo 'name'
                'disabled' => false,
                'label' => 'Usuario',
                'multiple' => true, // Permitir múltiples usuarios si es necesario
                'expanded' => false, // Mostrar como checkboxes
            ])
            ->add('description', TextType::class, [
                'label' => 'Descripción',
                'required' => false,
            ])
            ->add('orderNumber', IntegerType::class, [
                'label' => 'Número de Orden',
                'attr' => [
                    'min' => 0,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserSectionContent::class,
        ]);
    }
}
