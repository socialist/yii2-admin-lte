<?php
namespace socialist\adminlte\widgets;

use Yii;
use yii\base\Widget;

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
	
	public function init()
	{
		parent::init();
		if(count($this->logoText) === 0) {
			$this->logoText = [
				'logoLg'   => Yii::$app->name,
				'logoMini' => substr(Yii::$app->name, 0, 1),
			];
		}
	}

	public function run()
	{
		return $this->render($this->templateFile, [
			'logo'       => $this->logoText,
			'widgets'    => $this->navbarWidgets,
			'searchForm' => $this->searchForm,
		]);
	}
}