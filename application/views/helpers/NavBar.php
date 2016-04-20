<?php
/**
 * 
 * Enter description here ...
 * 
 * @author Ricardo Sim�o - ricardo.simao@fterceiro.pt
 * @copyright 2011 - Fernandes & Terceiro, SA
 * @copyright All right reserved.
 * @license Although this script is provided with source code it does NOT mean that this report is in the public domain.
 * 
 * @version 1.0 - Sep 18, 2012 12:49:58 PM
 * 
 * @category Printshop
 * @package 
 * 
 */
require_once 'Zend/View/Interface.php';
/**
 * NavBar helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_NavBar
{
    /**
     *
     * @var Zend_View_Interface
     */
    public $view;
    /**
     */
    
    protected  $formSearchdate;
    
    protected  $formSearchobra;
    
    public function NavBar ()
    {
        
        $this->formSearchdate = new Application_Form_Searchdate();
        $this->formSearchobra = new Application_Form_Searchobra();


	    $this->html = '<nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ozalides</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
          <ul class="nav navbar-nav">
            <li '.$this->_defineActive("index","index").'><a href="/"><i class="fa fa-home fa-white"></i> Home</a></li>
            <li '.$this->_defineActive("display", "index").'><a href="/display"><i class="fa fa-search fa-white"></i> Abertas</a></li>
            <li '.$this->_defineActive("display","today").'><a href="/display/today"><i class="fa fa-search fa-white"></i> Hoje</a></li>
          </ul>
          <form action="/display/date/" method="POST" class="navbar-form navbar-right" role="search" onsubmit="return checkSearchFormDate()" >
	                <div class="input-group" id="navbardateform">
	                    <input type="text" class="form-control" placeholder="Procurar por data" autocomplete="off" id="navbardateinput" name="dia">
	                    <span class="input-group-btn">
	                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
	                     </span>
			        </div>
		    </form>
		    <form action="/display/obra/" method="POST" class="navbar-form navbar-right" role="search"   onsubmit="return checkSearchFormJob()">
	                <div class="input-group" id="navbarjobform">
	                    <input type="text" class="form-control" placeholder="Procurar por obra" autocomplete="off" id="navbarjobinput" name="searchobra">
	                    <span class="input-group-btn">
	                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
	                     </span>
			        </div>
		    </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>';



       /* $this->html = '<nav class="navbar navbar-default navbar-inverse" role="navigation">
		<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></a> 
                 <span class="brand">Ozalides</span>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="/"><i class="icon-home icon-white"></i> Home</a></li>
                        <li><a href="/display"><i class="icon-search icon-white"></i> Abertas</a></li>
                        <li><a href="/display/today"><i class="icon-search icon-white"></i> Hoje</a></li>
                      </ul>
                    <ul class="nav pull-right">'. $this->formSearchdate->render() . $this->formSearchobra->render() .'</ul>
                  </div>
				<!--/.nav-collapse -->
			</div>

	</nav>';*/
        return $this->html;
    }
    /**
     * Sets the view field
     * 
     * @param $view Zend_View_Interface            
     */
    public function setView (Zend_View_Interface $view)
    {
        $this->view = $view;
    }

	private function _defineActive($ct, $at)
	{
		$request = Zend_Controller_Front::getInstance()->getRequest();

		$controller = $request->getControllerName();
		$action = $request->getActionName();


		if ($controller == $ct && $at == $action)
		{
			return 'class="active"';
		}



	}

}
