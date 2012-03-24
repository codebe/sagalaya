<?php

namespace sagalaya\extensions\command\generator;

use Zend\Code\Generator\ClassGenerator;
use lithium\util\Inflector;

class ControllerTest extends Generator {
	
	public function build($model) {
		$class = new ClassGenerator(Inflector::pluralize("{$model->config->name}") . 'ControllerTest');
		$class->setExtendedClass('\lithium\test\Unit');
		$class->setNamespaceName($this->namespace);
	
		return $class;
	}
}