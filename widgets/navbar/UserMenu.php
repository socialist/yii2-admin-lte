<?php
namespace socialist\adminlte\widgets\navbar;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * 
 */

class UserMenu extends Widget
{
	/**
	 * app\models\User должен быть унаследован от socialist\adminlte\components\User
	 * @var socialist\adminlte\components\User
	 */
	public $user;

	public $userData = [];

	public $signInUrl = ['/user/login'];

	public $signInLabel = 'Sign in';

	public $signUpUrl = ['/user/signup'];

	public $signOutUrl = ['/user/logout'];

	public $profileUrl = ['user/profile'];

	public $signUpLabel = 'Sign up';

	public $canRegister = true;

	public $avatar;

	public $userLinks = [];

	private $issetData = false;

	private $assetsUrl;


	public function init()
	{
		if($this->user) {
			$this->userData = $this->user->getUserData();
			$this->avatar = $this->user->getAvatar();
		}


		$this->assetsUrl = Yii::$app->assetManager->getBundle('socialist\adminlte\assets\AdminAsset')->baseUrl;
		$this->avatar = (empty($this->avatar)) ? $this->assetsUrl . '/dist/img/avatar04.png' : $this->avatar;
	}
	
	public function run()
	{
		return Html::tag('li', $this->getMenu(), ['class' => ['dropdown', 'user', 'user-menu']]);
	}

	protected function getMenu()
	{
		return (Yii::$app->user->isGuest) ? $this->guestMenu() : $this->userMenu();
	}

	protected function guestMenu()
	{
		if($this->canRegister) {
			return $this->render('menu', [
				'menuType' => 'messages',
				'items' => [
					Html::a(Html::tag('i', '', ['class' => 'fa fa-user']) . $this->signInLabel, $this->signInUrl),
					Html::a(Html::tag('i', '', ['class' => 'fa fa-user-plus']) . $this->signUpLabel, $this->signUpUrl),
				]
			]);
		}
		return Html::a(Html::tag('i', '', ['class' => 'fa fa-sign-in']), '#', ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
	}

	protected function userMenu()
	{
		return $this->render('user', [
			'signOutLink' => Url::to($this->signOutUrl),
			'profileLink' => Url::to($this->profileUrl),
			'avatar' 	  => Url::to($this->avatar),
			'userData'    => $this->userData,
			'userLinks'   => $this->userLinks,
		]);
	}
}