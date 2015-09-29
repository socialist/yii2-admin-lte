<?php
namespace socialist\adminlte\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;


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

	public $searchForm = [
		'show' => true,
	];

	public $route;
	public $params;

	protected $defaultFontIcon = 'circle-o';
	
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

		if(!isset($this->sideMenu['title'])) {
			$this->sideMenu['title'] = 'MAIN NAVIGATION';
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