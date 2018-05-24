<?php
// source: /home/gs011800/sub_generacia.xyz/hipsteri-test/app/config/config.neon 
// source: /home/gs011800/sub_generacia.xyz/hipsteri-test/app/config/config.local.neon 

class Container_4389210ba7 extends Nette\DI\Container
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
					'26_App_Model_PlaceModel',
					'27_App_Model_RentModel',
					'28_App_Model_RoleModel',
					'authenticator',
				],
			],
			'App\Forms\UserForms' => [1 => ['25_App_Forms_UserForms']],
			'App\Model\BaseModel' => [
				1 => [
					'26_App_Model_PlaceModel',
					'27_App_Model_RentModel',
					'28_App_Model_RoleModel',
					'authenticator',
				],
			],
			'App\Model\PlaceModel' => [1 => ['26_App_Model_PlaceModel']],
			'App\Model\RentModel' => [1 => ['27_App_Model_RentModel']],
			'App\Model\RoleModel' => [1 => ['28_App_Model_RoleModel']],
			'App\Model\UserModel' => [1 => ['authenticator']],
			'Nette\Security\IAuthenticator' => [1 => ['authenticator']],
			'App\Model\SignModel' => [1 => ['authenticator']],
			'Nette\Security\IAuthorizator' => [1 => ['security.authorizator']],
			'Nette\Security\Permission' => [1 => ['security.authorizator']],
			'Nette\Application\IPresenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
				],
			],
			'App\Presenters\ErrorPresenter' => [1 => ['application.1']],
			'App\Presenters\BasePresenter' => [
				1 => ['application.2', 'application.3', 'application.4', 'application.5'],
			],
			'Nette\Application\UI\Presenter' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\Application\UI\Control' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\Application\UI\Component' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\ComponentModel\Container' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\ComponentModel\Component' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\Application\UI\IRenderable' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\ComponentModel\IContainer' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\ComponentModel\IComponent' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\Application\UI\ISignalReceiver' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'Nette\Application\UI\IStatePersistent' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'ArrayAccess' => [['application.2', 'application.3', 'application.4', 'application.5']],
			'App\Presenters\RentPresenter' => [1 => ['application.2']],
			'App\Presenters\SignPresenter' => [1 => ['application.3']],
			'App\Presenters\Error4xxPresenter' => [1 => ['application.4']],
			'App\Presenters\PlacePresenter' => [1 => ['application.5']],
			'NetteModule\ErrorPresenter' => [1 => ['application.6']],
			'NetteModule\MicroPresenter' => [1 => ['application.7']],
			'Nette\DI\Container' => [1 => ['container']],
		],
		'services' => [
			'24_App_Forms_FormFactory' => 'App\Forms\FormFactory',
			'25_App_Forms_UserForms' => 'App\Forms\UserForms',
			'26_App_Model_PlaceModel' => 'App\Model\PlaceModel',
			'27_App_Model_RentModel' => 'App\Model\RentModel',
			'28_App_Model_RoleModel' => 'App\Model\RoleModel',
			'application.1' => 'App\Presenters\ErrorPresenter',
			'application.2' => 'App\Presenters\RentPresenter',
			'application.3' => 'App\Presenters\SignPresenter',
			'application.4' => 'App\Presenters\Error4xxPresenter',
			'application.5' => 'App\Presenters\PlacePresenter',
			'application.6' => 'NetteModule\ErrorPresenter',
			'application.7' => 'NetteModule\MicroPresenter',
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
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
			],
			'nette.presenter' => [
				'application.1' => 'App\Presenters\ErrorPresenter',
				'application.2' => 'App\Presenters\RentPresenter',
				'application.3' => 'App\Presenters\SignPresenter',
				'application.4' => 'App\Presenters\Error4xxPresenter',
				'application.5' => 'App\Presenters\PlacePresenter',
				'application.6' => 'NetteModule\ErrorPresenter',
				'application.7' => 'NetteModule\MicroPresenter',
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
			'appDir' => '/home/gs011800/sub_generacia.xyz/hipsteri-test/app',
			'wwwDir' => '/home/gs011800/sub_generacia.xyz/hipsteri-test/www',
			'debugMode' => FALSE,
			'productionMode' => TRUE,
			'consoleMode' => FALSE,
			'tempDir' => '/home/gs011800/sub_generacia.xyz/hipsteri-test/app/../temp',
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
	 * @return App\Model\PlaceModel
	 */
	public function createService__26_App_Model_PlaceModel()
	{
		$service = new App\Model\PlaceModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\RentModel
	 */
	public function createService__27_App_Model_RentModel()
	{
		$service = new App\Model\RentModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\RoleModel
	 */
	public function createService__28_App_Model_RoleModel()
	{
		$service = new App\Model\RoleModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\Presenters\RentPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\Presenters\RentPresenter($this->getService('27_App_Model_RentModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\Presenters\SignPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\Presenters\SignPresenter($this->getService('25_App_Forms_UserForms'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\Presenters\PlacePresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\Presenters\PlacePresenter($this->getService('26_App_Model_PlaceModel'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'),
			$this->getService('routing.router'));
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
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 1, NULL));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	/**
	 * @return App\Model\SignModel
	 */
	public function createServiceAuthenticator()
	{
		$service = new App\Model\SignModel($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\SQLiteJournal('/home/gs011800/sub_generacia.xyz/hipsteri-test/app/../temp/cache/journal.s3db');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('/home/gs011800/sub_generacia.xyz/hipsteri-test/app/../temp/cache',
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
		return new Container_4389210ba7_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
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
		$service->setExpiration('1 minutes');
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
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		Tracy\Debugger::setLogger($this->getService('tracy.logger'));
	}

}



final class Container_4389210ba7_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_4389210ba7 $container)
	{
		$this->container = $container;
	}


	public function create(): Latte\Engine
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('/home/gs011800/sub_generacia.xyz/hipsteri-test/app/../temp/cache/latte');
		$service->setAutoRefresh(FALSE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
