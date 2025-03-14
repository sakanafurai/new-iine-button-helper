<?php

class newIineButton extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'iineURL' => '',
			'useUniqueButtonName' => true,
			'countLimitNumber' => '10',
			'buttonShape' => 'default',
			'showIcon' => true,
			'showCounts' => true,
			'popupDirection' => 'up',
			'thanksMessage' => 'ありがとうございます！',
			'thanksMessage2' => '',
			'thanksMessage3' => '',
			'thanksImageURL' => '',
			'thanksImageURL2' => '',
			'thanksImageURL3' => '',
			'iconFontSource' => 'google',
			'jQuerySource' => 'bludit'
		);
	}

	public function form()
	{
		global $L;

		$html .= '<h4 class="mt-3">基本設定</h3>';
		$html .= '<div>';
		$html .= '<label>いいねボタン・改のディレクトリ</label>';
		$html .= '<input name="iineURL" class="form-control" type="url" pattern="http.*://.*" dir="auto" value="' . $this->getValue('iineURL') . '" placeholder="http://yourdomain/newiine_app">';
		$html .= '<span class="tip">いいねボタン改をインストールしたディレクトリのURLを入力してください。CSSおよびJavaScriptのパスは自動で補完されます。</span>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>ページごとに個別のボタン名を使用する</label>';
		$html .= '<select name="useUniqueButtonName">';
		$html .= '<option value="true" ' . ($this->getValue('useUniqueButtonName') === true ? 'selected' : '') . '>有効</option>';
		$html .= '<option value="false" ' . ($this->getValue('useUniqueButtonName') === false ? 'selected' : '') . '>無効</option>';
		$html .= '</select>';
		$html .= '<span class="tip">有効にすると、ページごとにボタン名としてページのスラッグを使用します。いいね数もページごとに集計されます。無効にすると、サイト内すべてのボタン名が「Bludit」になり、サイト全体で合計のいいね数が集計されます。</span>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>1日あたりのいいね上限回数</label>';
		$html .= '<input name="countLimitNumber" class="form-control" type=number min="1" dir="auto" value="' . $this->getValue('countLimitNumber') . '">';
		$html .= '<span class="tip">いいねボタン改の管理画面で設定した回数よりもこちらに入力した回数が優先して適用されます。</span>';
		$html .= '</div>';

		$html .= '<hr>';

		$html .= '<h4 class="mt-3">ボタンの見た目</h3>';
		$html .= '<div>';
		$html .= '<label>ボタンの形状</label>';
		$html .= '<select name="buttonShape">';
		$html .= '<option value="default" ' . ($this->getValue('buttonShape') === 'default' ? 'selected' : '') . '>デフォルト</option>';
		$html .= '<option value="rounded" ' . ($this->getValue('buttonShape') === 'rounded' ? 'selected' : '') . '>丸形</option>';
		$html .= '</select>';
		$html .= '</div>';


		$html .= '<div>';
		$html .= '<label>アイコンを表示</label>';
		$html .= '<select name="showIcon">';
		$html .= '<option value="true" ' . ($this->getValue('showIcon') === true ? 'selected' : '') . '>有効</option>';
		$html .= '<option value="false" ' . ($this->getValue('showIcon') === false ? 'selected' : '') . '>無効</option>';
		$html .= '</select>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>いいね数を表示</label>';
		$html .= '<select name="showCounts">';
		$html .= '<option value="true" ' . ($this->getValue('showCounts') === true ? 'selected' : '') . '>有効</option>';
		$html .= '<option value="false" ' . ($this->getValue('showCounts') === false ? 'selected' : '') . '>無効</option>';
		$html .= '</select>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>ポップアップの表示方向</label>';
		$html .= '<select name="popupDirection">';
		$html .= '<option value="up" ' . ($this->getValue('popupDirection') === 'up' ? 'selected' : '') . '>上</option>';
		$html .= '<option value="down" ' . ($this->getValue('popupDirection') === 'down' ? 'selected' : '') . '>下</option>';
		$html .= '</select>';
		$html .= '</div>';

		$html .= '<hr>';

		$html .= '<h4 class="mt-3">お礼のメッセージ</h4>';
		$html .= '<h5 class="mt-3">お礼のメッセージ1</h5>';
		$html .= '<div>';
		$html .= '<label>メッセージの内容</label>';
		$html .= '<input name="thanksMessage" class="form-control" type="text" dir="auto" value="' . $this->getValue('thanksMessage') . '">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>メッセージの画像</label>';
		$html .= '<input name="thanksImageURL" class="form-control" type="url" pattern="http.*://.*" dir="auto" value="' . $this->getValue('thanksImageURL') . '">';
		$html .= '<span class="tip">お礼のメッセージに使用する画像のURLを入力します。空欄の場合、デフォルトの画像を使用します。</span>';
		$html .= '</div>';

		$html .= '<h5 class="mt-3">お礼のメッセージ2</h5>';
		$html .= '<div>';
		$html .= '<label>メッセージの内容</label>';
		$html .= '<input name="thanksMessage2" class="form-control" type="text" dir="auto" value="' . $this->getValue('thanksMessage2') . '">';
		$html .= '</div>';
		$html .= '<span class="tip">メッセージの内容を複数設定すると、ランダムで選んだ内容が表示されます。</span>';

		$html .= '<div>';
		$html .= '<label>メッセージの画像</label>';
		$html .= '<input name="thanksImageURL2" class="form-control" type="url" pattern="http.*://.*" dir="auto" value="' . $this->getValue('thanksImageURL2') . '">';
		$html .= '<span class="tip">設定しない場合は「お礼のメッセージ1」で設定したURLを使用します。</span>';
		$html .= '</div>';

		$html .= '<h5 class="mt-3">お礼のメッセージ3</h5>';
		$html .= '<div>';
		$html .= '<label>メッセージの内容</label>';
		$html .= '<input name="thanksMessage3" class="form-control" type="text" dir="auto" value="' . $this->getValue('thanksMessage3') . '">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>メッセージの画像</label>';
		$html .= '<input name="thanksImageURL3" class="form-control" type="url" pattern="http.*://.*" dir="auto" value="' . $this->getValue('thanksImageURL3') . '">';
		$html .= '<span class="tip">設定しない場合は「お礼のメッセージ1」で設定したURLを使用します。</span>';
		$html .= '</div>';

		$html .= '<hr>';

		$html .= '<h4 class="mt-3">高度な設定</h4>';
		$html .= '<div>';
		$html .= '<label>Material Iconsアイコンフォントの取得元</label>';
		$html .= '<select name="iconFontSource">';
		$html .= '<option value="google" ' . ($this->getValue('iconFontSource') === 'google' ? 'selected' : '') . '>Google Fonts</option>';
		$html .= '<option value="jsdelivr" ' . ($this->getValue('iconFontSource') === 'jsdelivr' ? 'selected' : '') . '>jsDelivr</option>';
		'>Google Fonts</option>';
		$html .= '<option value="none" ' . ($this->getValue('iconFontSource') === 'none' ? 'selected' : '') . '>読み込まない（テーマで読み込み済み）</option>';
		$html .= '</select>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>jQueryの取得元</label>';
		$html .= '<select name="jQuerySource">';
		$html .= '<option value="googleapis" ' . ($this->getValue('jQuerySource') === 'googleapis' ? 'selected' : '') . '>Google</option>';
		$html .= '<option value="jquerycom" ' . ($this->getValue('jQuerySource') === 'jquerycom' ? 'selected' : '') . '>jQuery.com</option>';
		$html .= '<option value="bludit" ' . ($this->getValue('jQuerySource') === 'bludit' ? 'selected' : '') . '>Bludit内蔵</option>';
		'>Google Fonts</option>';
		$html .= '<option value="none" ' . ($this->getValue('jQuerySource') === 'none' ? 'selected' : '') . '>読み込まない（テーマで読み込み済み）</option>';
		$html .= '</select>';
		$html .= '</div>';

		return $html;
	}

	public function siteHead()
	{
	  global $page;

	  if ($this->getValue('showIcon') && $this->getValue('iconFontSource') == 'google') {
		$iconFontSource = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">'.PHP_EOL;
	  } elseif ($this->getValue('showIcon') && $this->getValue('iconFontSource') == 'jsdelivr') {
		$iconFontSource = '<link href="https://cdn.jsdelivr.net/npm/material-icons@1.13.12/iconfont/material-icons.min.css" rel="stylesheet">'.PHP_EOL;
		} else {
		$iconFontSource = '';
		}

	  // フォントとボタン用のCSSを読み込み
	  return $iconFontSource .
	  '<link rel="stylesheet" href="' .($this->getValue('iineURL')). '/newiine.css">'.PHP_EOL;
	}

	public function pageEnd()
	{
	  global $url;
	  global $WHERE_AM_I;

	  // page not foundのときにボタンを表示しない
	  if ($url->notFound()) {
		return false;
	  }

	  // ページのときだけボタンを表示
	  if ($WHERE_AM_I === 'page' OR 'home') {
	  global $page;
	  return $this->buttonContent();
	  }
		return false;
	}

	private function buttonContent()
	{
	  global $page;

	  // ボタン名の設定
	  $buttonName = '';
	  if ($this->getValue('useUniqueButtonName')) {
		$buttonName = $page->slug();
	  } else {
		$buttonName = 'Bludit';
	  }

	  // いいねの回数制限
	  $countLimitNumber = $this->getValue('countLimitNumber');

	  // 「丸型のボタンを使用する（buttonShape）」が有効のとき、クラス「（スペース）newiine_type02」を追加
	  if ($this->getValue('buttonShape') == 'rounded') {
		$isRounded = ' newiine_type02';
	  } else {
		$isRounded = '';
		}

	  // 「アイコンを表示（showIcon）」が有効のとき、アイコンの表示を追加
	  if ($this->getValue('showIcon')) {
		$showIcon = '<span class="material-icons-round">favorite</span>'.PHP_EOL;
	  } else {
		$showIcon = '';
		}

	  // 「いいね数を表示（showCounts）」が有効のとき、カウントの表示を追加
	  if ($this->getValue('showCounts')) {
		$showCounts = '<span class="newiine_count"></span>'.PHP_EOL;
		} else {
		$showCounts = '';
		}

	  // ポップアップの方向
	  if ($this->getValue('popupDirection') == 'up') {
		$popupDirection = '<div class="newiine_thanks newiine_thanks_up" style="display:none;">';
	  } elseif ($this->getValue('popupDirection') == 'down') {
		$popupDirection = '<div class="newiine_thanks newiine_thanks_down" style="display:none;">';
	  }

	  // お礼メッセージの内容
	  $thanksMessage = $this->getValue('thanksMessage');

	  // お礼メッセージの画像の取得元
	  if ($this->getValue('thanksImageURL')) {
		$thanksImageURL = $this->getValue('thanksImageURL');
	  } else {
		$thanksImageURL = $this->getValue('iineURL') . "/example.jpg";
	  }

	  if ($this->getValue('thanksImageURL2')) {
		$thanksImageURL2 = $this->getValue('thanksImageURL2');
	  } else {
		$thanksImageURL2 = $thanksImageURL;
	  }

	  if ($this->getValue('thanksImageURL3')) {
		$thanksImageURL3 = $this->getValue('thanksImageURL3');
	  } else {
		$thanksImageURL3 = $thanksImageURL;
	  }

	  if ($this->getValue('thanksMessage')) {
		$thanksMessage =
			'<div class="newiine_box">
			<img src="' . $thanksImageURL . '" alt="THANK YOU!">
			<p>' .$this->getValue('thanksMessage'). '</p>
			</div>'.PHP_EOL;
		}

	  if ($this->getValue('thanksMessage2')) {
		$thanksMessage2 =
	  '<div class="newiine_box">
	  <img src="' . $thanksImageURL2 . '" alt="THANK YOU!">
	  <p>' .$this->getValue('thanksMessage2'). '</p>
	  </div>'.PHP_EOL;
	  } else {
		$thanksMessage2 = '';
		}

	  if ($this->getValue('thanksMessage3')) {
		$thanksMessage3 =
		'<div class="newiine_box">
		<img src="' . $thanksImageURL3 . '" alt="THANK YOU!">
		<p>' .$this->getValue('thanksMessage3'). '</p>
		</div>'.PHP_EOL;
		} else {
			$thanksMessage3 = '';
		}


	// ページに出力するボタンのコード
	  $code = <<<EOF
	  <!-- いいねボタン改ここから -->
	  <button type="submit" class="newiine_btn$isRounded" data-iinename="$buttonName" data-iinecountlimit="$countLimitNumber">
	  $showIcon$showCounts<span>いいね</span>

	  <!-- お礼メッセージここから -->
	  $popupDirection$thanksMessage$thanksMessage2$thanksMessage3</div>
	  <!-- お礼メッセージここまで -->
	  </button>
	  <!-- いいねボタン改ここまで -->
	EOF;
	return $code;
	}

	public function siteBodyEnd()
	{
	  global $page;

	  if ($this->getValue('jQuerySource') == 'googleapis') {
		$jQuerySource = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>'.PHP_EOL;
	  } elseif ($this->getValue('jQuerySource') == 'jquerycom') {
		$jQuerySource = '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>'.PHP_EOL;
	  }	elseif ($this->getValue('jQuerySource') == 'bludit') {
		$jQuerySource = Theme::jquery();
	  } else {
		$jQuerySource = '';
		}

	  //いいねボタン・改のディレクトリを指定
	  $iineURL = $this->getValue('iineURL');

	// jQueryとスクリプトを読み込み
	  $script = <<<EOF
	  $jQuerySource
	  <script src="$iineURL/newiine.js"></script>
	EOF;

	  return $script;
	}
}
