<?php

namespace Area4\Bundle\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class NewsAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title','text',array('label'=>'Titulo'))
            ->add('content','textarea',array('label'=>'Contenido'))
			->add('image','file',array('label'=>'Imagen principal','help'=>'No sobrepasar los 2 Mb'))
			->add('category','entity',array('label'=>'Categoria','class'=>'Area4NewsBundle:Category'))
            ->add('published','checkbox',array('label'=>'Publicado'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title',null,array('label'=>'Titulo'))
            ->add('category',null,array('label'=>'Categoria'))
            ->add('published',null,array('label'=>'Publicado'))
            ->add('published_by',null,array('label'=>'Publicado por'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
    	//add(<campo>,<tipoDato>,array())
        $listMapper
            ->add('published',null,array('label'=>'Publicado'))
            ->addIdentifier('title',null,array('label'=>'Titulo'))
            ->add('category',null,array('label'=>'Categoria'))
            ->add('published_by',null,array('label'=>'Publicado por'))
            //->add('_action')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('title')
                ->assertMaxLength(array('limit' => 200))
            ->end()
        ;
    }
}