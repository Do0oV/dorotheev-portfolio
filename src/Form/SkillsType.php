<?php

namespace App\Form;

use App\Entity\Skills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SkillsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('image', FileType::class, [
                'label' => ' ',
                'data_class' => null,
                'required' => true,
            ])
            ->add('genre')
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $skill = $event->getData();
                $form = $event->getForm();

                // checks if the skill object is "new"
                // If no data is passed to the form, the data is "null".
                // This should be considered a new "skill"
                if (!$skill || null === $skill->getId()) {
                    $form->add('image', FileType::class, [
                        'label' => ' ',
                        'data_class' => null,
                        'required' => true,
                    ]);
                } else {
                    $form->add('image', FileType::class, [
                        'label' => ' ',
                        'data_class' => null,
                        'required' => false,
                    ]);
                }
            })
        ;
    }

    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Skills::class,
        ]);
    }
}
