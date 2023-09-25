<?php
namespace Magento\Tasksecond\Block;

class Index extends \Magento\Framework\View\Element\Template

{

    //protected $_alumnoFactory;

    public function __construct(

        \Magento\Framework\View\Element\Template\Context $context

        //,

        //\Modules\Alumnos\Model\AlumnoFactory $alumnoFactory //Aqui instancia toda la funcionalidad del metodo crud creado Post

    )

    {

        //$this->_alumnoFactory = $alumnoFactory;

        parent::__construct($context);

    }

    /*public function getAlumnoCollection(){

        $alumno = $this->_alumnoFactory->create();

        return $alumno->getCollection();

    }*/

 

    public function getFlag($flag){

        return $flag;

    }

}