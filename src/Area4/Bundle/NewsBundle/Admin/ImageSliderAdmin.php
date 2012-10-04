<?php

namespace Area4\Bundle\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ImageSliderAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('image','file',array('label'=>'Imagen','help'=>'No sobrepasar los 2 Mb'))
            ->add('url','url',array('label'=>'Link'))
            ->add('visible','checkbox',array('label'=>'Visible'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('visible',null,array('label'=>'Visible'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
    	//add(<campo>,<tipoDato>,array())
        $listMapper
            ->addIdentifier('id')
            ->add('visible',null,array('label'=>'Visible'))
            ->add('url',null,array('label'=>'Link'))
            ->add('image',null,array('label'=>'Imagen'))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        /*$errorElement
            ->with('title')
                ->assertMaxLength(array('limit' => 200))
            ->end()
        ;*/
    }
}