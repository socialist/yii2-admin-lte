<?php

namespace socialist\adminlte\assets;

use yii\web\AssetBundle;

class SummernoteAsset extends AssetBundle {
	public $sourcePath = '@bower/summernote/dist';

	public $css = [
		'summernote.css',
	];

	public $js = [
		'summernote.min.js'
	];
}