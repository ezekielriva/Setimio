<?php

namespace Area4\Bundle\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text',array('label'=>'Titulo'))
            ->add('content','textarea',array('label'=>'Contenido'))
            //->add('created_at')
            //->add('updated_at')
            ->add('image','file',array('label'=>'Imagen principal'))
            //->add('tags',null,array('label'=>'Etiquetas'))
            ->add('category','entity',array('label'=>'Categoria','class'=>'Area4NewsBundle:Category'))
            ->add('published','checkbox',array('label'=>'Publicado'))
            //->add('published_by')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Area4\Bundle\NewsBundle\Entity\News'
        ));
    }

    public function getName()
    {
        return 'area4_bundle_newsbundle_newstype';
    }
}
