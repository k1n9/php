<?php
//视图类

class View
{
	protected $variable = array();
	protected $_controller;
	protected $_action;

	function __construct($controller, $action)
	{
		$this->_controller = $controller;
		$this->_action = $action;
	}

	//分配变量
	public function assign($name, $value)
	{
		$this->variable[$name] = $value;
	}

	//渲染显示
	public function render()
	{
		extract($this->variables);
		$defaultHeader = APP_PATH . 'app/views/header.php';
		$defaultFooter = APP_PATH . 'app/views/footer.php';
		$defaultLayout = APP_PATH . 'app/views/layout.php';

		$controllerHeader = APP_PATH . 'app/views/' . $this->_controller . '/header.php';
		$controllerFooter = APP_PATH . 'app/views/' . $this->controller . '/footer.php';
		$controllerLayout = APP_PATH . 'app/views/' . $this->_controller . '/' . $this->action . '.php';

		//页头文件
		if(file_exists($controllerHeader)){
			include $controllerHeader;
		}else{
			include $defaultHeader;
		}

		//页内容文件
		if(file_exists($controllerLayout)){
			include $controllerLayout;
		}else{
			include $defaultLayout;
		}

		//页脚文件
		if(file_exists($controllerFooter)){
			include $controllerFooter;
		}else{
			include $defaultFooter;
		}
	}
}