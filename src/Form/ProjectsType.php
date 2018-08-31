<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProjectsType extends AbstractType
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
            ->add('content')
            ->add('github')
            ->add('live')
            ->add('techno')
            ->add('date')
            ->add('display')
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $project = $event->getData();
                $form = $event->getForm();

                // checks if the project object is "new"
                // If no data is passed to the form, the data is "null".
                // This should be considered a new "project"
                if (!$project || null === $project->getId()) {
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
            'data_class' => Projects::class,
        ]);
    }
}
