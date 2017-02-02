<?php
namespace socialist\adminlte\widgets;

use socialist\adminlte\base\Config;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;


/**
* 
*/
class Navigation extends Widget
{
	public $widgets = [];

	public $sideMenu = [];

	public $logoText = [];

	public $templateFile = 'navi';

	public $navbarWidgets = [];

	public $user;

	public $searchForm = [
		'show'  => true,
		'url'   => '/',
		'label' => 'Search...'
	];

	public $route;
	public $params;

	protected $defaultFontIcon = 'circle-o';
	protected $assetsUrl;
	
	public function init()
	{
		parent::init();

		if ($this->route === null && Yii::$app->controller !== null) {
			$this->route = '/' . Yii::$app->controller->getRoute();
		}
		if($this->params === null) {
			$this->params = Yii::$app->request->getQueryParams();
		}

		if(count($this->logoText) === 0) {
			$this->logoText = [
				'logoLg'   => Yii::$app->name,
				'logoMini' => substr(Yii::$app->name, 0, 1),
			];
		}

        if (count($this->sideMenu) == 0) {
            $this->sideMenu = Config::get('sideMenu');
        }

		if(!isset($this->sideMenu['title'])) {
			$this->sideMenu['title'] = 'MAIN NAVIGATION';
		}

        $user = Config::get('user');
        if($user) {
            $this->user['username'] = $user->getUsername();
            $avatar = $user->getAvatar();
			$this->assetsUrl = Yii::$app->assetManager->getBundle('socialist\adminlte\assets\AdminAsset')->baseUrl;
			$this->user['avatarUrl'] = (empty($avatar)) ? $this->assetsUrl . '/dist/img/avatar04.png' : $avatar;
		}
	}

	public function run()
	{
		return $this->render($this->templateFile, [
			'logo'          => $this->logoText,
			'widgets'       => $this->navbarWidgets,
			'searchForm'    => $this->searchForm,
			'sideMenuTitle' => $this->sideMenu['title'],
			'sideMenuItems' => $this->buildSideMenu($this->sideMenu['items']),
			'user'			=> $this->user,
		]);
	}

	private function buildSideMenu($items)
	{
		if(!is_array($items)) {
			return null;
		}
		$list = '';


		foreach ($items as $item) {
			if(isset($item['show']) && $item['show'] === false) {
				continue;
			}

			$fontIcon = (isset($item['icon'])) ? $item['icon'] : $this->defaultFontIcon;
			$icon = Html::tag('i', '', ['class' => 'fa fa-' . $fontIcon]);
			$label = Html::tag('span', $item['label']);
			$label = $icon . ' ' . $label;

		

			if(isset($item['items'])) {
				$ul = Html::tag('ul', $this->buildSideMenu($item['items']), ['class' => 'treeview-menu']);
				$badge = Html::tag('i', '', ['class' => 'fa fa-angle-left pull-right']);
				$link = Html::a($label.$badge, $item['url']);
				$active = ($this->isChildActive($item['items'])) ? 'active' : '';

				$list .= Html::tag('li', $link . $ul, ['class' => "treeview {$active}"]);
			} else {
				$badge = (isset($item['count']) && $item['count'] > 0)
							? Html::tag('span', $item['count'], ['class' => 'label label-primary pull-right'])
							: '';
				$link = Html::a($label.$badge, $item['url']);

				$active = ($this->route == $item['url'][0]) ? ['class' => 'active'] : [];

				$list .= Html::tag('li', $link, $active);
			}
		}

		return $list;
	}

	private function isChildActive($items)
	{
		foreach ($items as $item) {
			if($this->route == $item['url'][0]) {
				return true;
			} else if(isset($item['items'])) {
				return $this->isChildActive($item['items']);
			}
		}

		return false;
	}
}