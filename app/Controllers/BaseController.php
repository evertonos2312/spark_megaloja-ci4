<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['funcoes', 'html', 'form', 'url', 'Sys_helper'];
	public $ns_model;
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\ResponseInterface
	 */
	protected $response;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: 
		$this->parser = \Config\Services::parser();
		$this->session = \Config\Services::session();
		$this->SetInitialData();
	}

	public function display($view, $data = false)
	{
		if(!$data){
			$data = array();
		}
		echo $this->parser->setData($data)->render('_common/header');

		echo $this->parser->setData($data)->render($view);
		
		echo $this->parser->setData($data)->render('_common/footer');


		
	}
	
	public function SetInitialData()
	{
		//Initial data for view, assuming this it's gonna be used in all pages
		
		$uri = service('uri');
		$pagina = $uri->getSegment(1);
		$id_categoria = count($uri->getSegments()) === 3 ? $uri->getSegments()[2] : null;

		$dataArr = array(
			'app_url' => base_url().'/',
			'title' => '',
			'uri' => $uri,
			'pagina' => $pagina,
			'id_categoria' => $id_categoria,
			'msg' => $this->session->getFlashdata('msg'),
			'isLoggedIn' => $this->session->get('auth_user'),
			'admin' => false
		);
		$this->parser->setData($dataArr);
		
	}

	public function SetMdl()
	{
		//Let's call for MDL (model) for short code in Controllers
		$namespace_call = ($this->ns_model) ? $this->ns_model : '\\App\\Models\\'.$this->module_name.'\\'.$this->module_name.'model';
		if(class_exists($namespace_call)){
			$this->mdl = new $namespace_call();
		}
	}
}
