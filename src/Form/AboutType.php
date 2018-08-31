<?php

namespace App\Form;

use App\Entity\About;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AboutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Text', TextareaType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Text'
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'data_class' => null,
                'required' => true,
            ])
            ->add('resume', FileType::class, [
                'label' => 'Resume',
                'data_class' => null,
                'required' => true,
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $about = $event->getData();
                $form = $event->getForm();

                // checks if the about object is "new"
                // If no data is passed to the form, the data is "null".
                // This should be considered a new "about"
                if (!$about || null === $about->getId()) {
                    $form->add('image', FileType::class, [
                        'label' => 'Image',
                        'data_class' => null,
                        'required' => true,
                    ]);
                    $form->add('resume', FileType::class, [
                        'label' => 'Resume',
                        'data_class' => null,
                        'required' => true,
                    ]);
                } else {
                    $form->add('image', FileType::class, [
                        'label' => 'Image',
                        'data_class' => null,
                        'required' => false,
                    ]);
                    $form->add('resume', FileType::class, [
                        'label' => 'Resume',
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
            'data_class' => About::class,
        ]);
    }
}
