<?php
// source: C:\xampp\htdocs\TP\app/config/config.neon 
// source: C:\xampp\htdocs\TP\app/config/config.local.neon 

class Container_fa55422927 extends Nette\DI\Container
{
	protected $meta = [
		'types' => [
			'Nette\Application\Application' => [1 => ['application.application']],
			'Nette\Application\IPresenterFactory' => [1 => ['application.presenterFactory']],
			'Nette\Application\LinkGenerator' => [1 => ['application.linkGenerator']],
			'Nette\Caching\Storages\IJournal' => [1 => ['cache.journal']],
			'Nette\Caching\IStorage' => [1 => ['cache.storage']],
			'Nette\Database\Connection' => [1 => ['database.default.connection']],
			'Nette\Database\IStructure' => [1 => ['database.default.structure']],
			'Nette\Database\Structure' => [1 => ['database.default.structure']],
			'Nette\Database\IConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Conventions\DiscoveredConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Context' => [1 => ['database.default.context']],
			'Nette\Http\RequestFactory' => [1 => ['http.requestFactory']],
			'Nette\Http\IRequest' => [1 => ['http.request']],
			'Nette\Http\Request' => [1 => ['http.request']],
			'Nette\Http\IResponse' => [1 => ['http.response']],
			'Nette\Http\Response' => [1 => ['http.response']],
			'Nette\Http\Context' => [1 => ['http.context']],
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => [1 => ['latte.latteFactory']],
			'Nette\Application\UI\ITemplateFactory' => [1 => ['latte.templateFactory']],
			'Nette\Mail\IMailer' => [1 => ['mail.mailer']],
			'Nette\Application\IRouter' => [1 => ['routing.router']],
			'Nette\Security\IUserStorage' => [1 => ['security.userStorage']],
			'Nette\Security\User' => [1 => ['security.user']],
			'Nette\Http\Session' => [1 => ['session.session']],
			'Tracy\ILogger' => [1 => ['tracy.logger']],
			'Tracy\BlueScreen' => [1 => ['tracy.blueScreen']],
			'Tracy\Bar' => [1 => ['tracy.bar']],
			'App\Forms\FormFactory' => [1 => ['24_App_Forms_FormFactory']],
			'Nette\Object' => [
				1 => [
					'25_App_Forms_UserForms',
					'26_App_Model_BookModel',
					'27_App_Model_FacilityModel',
					'28_App_Model_ForgotModel',
					'29_App_Model_PlaceModel',
					'30_App_Model_ProfilModel',
					'31_App_Model_ReceptionistModel',
					'32_App_Model_RoleModel',
					'authenticator',
					'34_App_Model_ValidModel',
				],
			],
			'App\Forms\UserForms' => [1 => ['25_App_Forms_UserForms']],
			'App\Model\BaseModel' => [
				1 => [
					'26_App_Model_BookModel',
					'27_App_Model_FacilityModel',
					'28_App_Model_ForgotModel',
					'29_App_Model_PlaceModel',
					'30_App_Model_ProfilModel',
					'31_App_Model_ReceptionistModel',
					'32_App_Model_RoleModel',
					'authenticator',
					'34_App_Model_ValidModel',
				],
			],
			'App\Model\BookModel' => [1 => ['26_App_Model_BookModel']],
			'App\Model\FacilityModel' => [1 => ['27_App_Model_FacilityModel']],
			'App\Model\UserModel' => [
				1 => [
					'28_App_Model_ForgotModel',
					'authenticator',
					'34_App_Model_ValidModel',
				],
			],
			'App\Model\ForgotModel' => [1 => ['28_App_Model_ForgotModel']],
			'App\Model\PlaceModel' => [1 => ['29_App_Model_PlaceModel']],
			'App\Model\ProfilModel' => [1 => ['30_App_Model_ProfilModel']],
			'App\Model\ReceptionistModel' => [1 => ['31_App_Model_ReceptionistModel']],
			'App\Model\RoleModel' => [1 => ['32_App_Model_RoleModel']],
			'Nette\Security\IAuthenticator' => [1 => ['authenticator']],
			'App\Model\SignModel' => [1 => ['authenticator']],
			'App\Model\ValidModel' => [1 => ['34_App_Model_ValidModel']],
			'Nette\Security\IAuthorizator' => [1 => ['security.authorizator']],
			'Nette\Security\Permission' => [1 => ['security.authorizator']],
			'App\Presenters\BasePresenter' => [
				1 => [
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\Presenter' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\Control' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\Component' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\ComponentModel\Container' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\ComponentModel\Component' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\IRenderable' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\ComponentModel\IContainer' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\ComponentModel\IComponent' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\ISignalReceiver' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\UI\IStatePersistent' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'ArrayAccess' => [
				[
					'application.1',
					'application.2',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
				],
			],
			'Nette\Application\IPresenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
				],
			],
			'App\Presenters\BookPresenter' => [1 => ['application.1']],
			'App\Presenters\Error4xxPresenter' => [1 => ['application.2']],
			'App\Presenters\ErrorPresenter' => [1 => ['application.3']],
			'App\Presenters\FacilityPresenter' => [1 => ['application.4']],
			'App\Presenters\ForgotPresenter' => [1 => ['application.5']],
			'App\Presenters\PlacePresenter' => [1 => ['application.6']],
			'App\Presenters\ProfilPresenter' => [1 => ['application.7']],
			'App\Presenters\ReceptionistPresenter' => [1 => ['application.8']],
			'App\Presenters\SignPresenter' => [1 => ['application.9']],
			'App\Presenters\ValidPresenter' => [1 => ['application.10']],
			'NetteModule\ErrorPresenter' => [1 => ['application.11']],
			'NetteModule\MicroPresenter' => [1 => ['application.12']],
			'Nette\DI\Container' => [1 => ['container']],
		],
		'services' => [
			'24_App_Forms_FormFactory' => 'App\Forms\FormFactory',
			'25_App_Forms_UserForms' => 'App\Forms\UserForms',
			'26_App_Model_BookModel' => 'App\Model\BookModel',
			'27_App_Model_FacilityModel' => 'App\Model\FacilityModel',
			'28_App_Model_ForgotModel' => 'App\Model\ForgotModel',
			'29_App_Model_PlaceModel' => 'App\Model\PlaceModel',
			'30_App_Model_ProfilModel' => 'App\Model\ProfilModel',
			'31_App_Model_ReceptionistModel' => 'App\Model\ReceptionistModel',
			'32_App_Model_RoleModel' => 'App\Model\RoleModel',
			'34_App_Model_ValidModel' => 'App\Model\ValidModel',
			'application.1' => 'App\Presenters\BookPresenter',
			'application.10' => 'App\Presenters\ValidPresenter',
			'application.11' => 'NetteModule\ErrorPresenter',
			'application.12' => 'NetteModule\MicroPresenter',
			'application.2' => 'App\Presenters\Error4xxPresenter',
			'application.3' => 'App\Presenters\ErrorPresenter',
			'application.4' => 'App\Presenters\FacilityPresenter',
			'application.5' => 'App\Presenters\ForgotPresenter',
			'application.6' => 'App\Presenters\PlacePresenter',
			'application.7' => 'App\Presenters\ProfilPresenter',
			'application.8' => 'App\Presenters\ReceptionistPresenter',
			'application.9' => 'App\Presenters\SignPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'authenticator' => 'App\Model\SignModel',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'routing.router' => 'Nette\Application\IRouter',
			'security.authorizator' => 'Nette\Security\Permission',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		],
		'tags' => [
			'inject' => [
				'application.1' => TRUE,
				'application.10' => TRUE,
				'application.11' => TRUE,
				'application.12' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
				'application.9' => TRUE,
			],
			'nette.presenter' => [
				'application.1' => 'App\Presenters\BookPresenter',
				'application.10' => 'App\Presenters\ValidPresenter',
				'application.11' => 'NetteModule\ErrorPresenter',
				'application.12' => 'NetteModule\MicroPresenter',
				'application.2' => 'App\Presenters\Error4xxPresenter',
				'application.3' => 'App\Presenters\ErrorPresenter',
				'application.4' => 'App\Presenters\FacilityPresenter',
				'application.5' => 'App\Presenters\ForgotPresenter',
				'application.6' => 'App\Presenters\PlacePresenter',
				'application.7' => 'App\Presenters\ProfilPresenter',
				'application.8' => 'App\Presenters\ReceptionistPresenter',
				'application.9' => 'App\Presenters\SignPresenter',
			],
		],
		'aliases' => [
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		],
	];


	public function __construct()
	{
		parent::__construct([
			'appDir' => 'C:\xampp\htdocs\TP\app',
			'wwwDir' => 'C:\xampp\htdocs\TP\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'consoleMode' => FALSE,
			'tempDir' => 'C:\xampp\htdocs\TP\app/../temp',
		]);
	}


	/**
	 * @return App\Forms\FormFactory
	 */
	public function createService__24_App_Forms_FormFactory()
	{
		$service = new App\Forms\FormFactory;
		return $service;
	}


	/**
	 * @return App\Forms\UserForms
	 */
	public function createService__25_App_Forms_UserForms()
	{
		$service = new App\Forms\UserForms($this->getService('security.user'));
		return $service;
	}


	/**
	 * @return App\Model\BookModel
	 */
	public function createService__26_App_Model_BookModel()
	{
		$service = new App\Model\BookModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\FacilityModel
	 */
	public function createService__27_App_Model_FacilityModel()
	{
		$service = new App\Model\FacilityModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\ForgotModel
	 */
	public function createService__28_App_Model_ForgotModel()
	{
		$service = new App\Model\ForgotModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\PlaceModel
	 */
	public function createService__29_App_Model_PlaceModel()
	{
		$service = new App\Model\PlaceModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\ProfilModel
	 */
	public function createService__30_App_Model_ProfilModel()
	{
		$service = new App\Model\ProfilModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\ReceptionistModel
	 */
	public function createService__31_App_Model_ReceptionistModel()
	{
		$service = new App\Model\ReceptionistModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\RoleModel
	 */
	public function createService__32_App_Model_RoleModel()
	{
		$service = new App\Model\RoleModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\ValidModel
	 */
	public function createService__34_App_Model_ValidModel()
	{
		$service = new App\Model\ValidModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Presenters\BookPresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\Presenters\BookPresenter($this->getService('26_App_Model_BookModel'),
			$this->getService('security.user'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ValidPresenter
	 */
	public function createServiceApplication__10()
	{
		$service = new App\Presenters\ValidPresenter($this->getService('25_App_Forms_UserForms'),
			$this->getService('authenticator'), $this->getService('34_App_Model_ValidModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__11()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__12()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'),
			$this->getService('routing.router'));
		return $service;
	}


	/**
	 * @return App\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\Presenters\FacilityPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\Presenters\FacilityPresenter($this->getService('27_App_Model_FacilityModel'),
			$this->getService('security.user'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ForgotPresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\Presenters\ForgotPresenter($this->getService('25_App_Forms_UserForms'),
			$this->getService('28_App_Model_ForgotModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\PlacePresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\Presenters\PlacePresenter($this->getService('security.user'), $this->getService('29_App_Model_PlaceModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ProfilPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new App\Presenters\ProfilPresenter($this->getService('security.user'), $this->getService('authenticator'),
			$this->getService('30_App_Model_ProfilModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ReceptionistPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new App\Presenters\ReceptionistPresenter($this->getService('31_App_Model_ReceptionistModel'),
			$this->getService('security.user'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\SignPresenter
	 */
	public function createServiceApplication__9()
	{
		$service = new App\Presenters\SignPresenter($this->getService('25_App_Forms_UserForms'),
			$this->getService('authenticator'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'));
		$service->catchExceptions = TRUE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('application.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'),
			$this->getService('http.request')->getUrl(), $this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, 'C:\xampp\htdocs\TP\app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	/**
	 * @return App\Model\SignModel
	 */
	public function createServiceAuthenticator()
	{
		$service = new App\Model\SignModel($this->getService('database.default.context'), $this->getService('34_App_Model_ValidModel'));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\SQLiteJournal('C:\xampp\htdocs\TP\app/../temp/cache/journal.s3db');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\xampp\htdocs\TP\app/../temp/cache',
			$this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=sql.generacia.xyz:3306;dbname=ma018801db',
			'ma018800', 'H!pst3r!*2016', ['lazy' => TRUE]);
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'),
			$this->getService('database.default.structure'), $this->getService('database.default.conventions'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		trigger_error('Service http.context is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_fa55422927_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'),
			$this->getService('http.request'), $this->getService('security.user'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = App\RouterFactory::createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\Permission
	 */
	public function createServiceSecurity__authorizator()
	{
		$service = new Nette\Security\Permission;
		$service->addRole('guest');
		$service->addRole('employee');
		$service->addRole('receptionist');
		$service->addRole('facility');
		$service->addRole('admin');
		$service->addResource('Sign');
		$service->addResource('Place');
		$service->allow('employee', 'Sign');
		$service->allow('employee', 'Place');
		$service->allow('receptionist');
		$service->allow('facility');
		$service->allow('admin');
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('authenticator'),
			$this->getService('security.authorizator'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('2 days');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		$this->getService('session.session')->start();
		Tracy\Debugger::setLogger($this->getService('tracy.logger'));
		if ($tmp = $this->getByType("Nette\Http\Session", FALSE)) { $tmp->start(); Tracy\Debugger::dispatch(); };
	}

}



final class Container_fa55422927_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_fa55422927 $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\xampp\htdocs\TP\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
