# いいねボタン・改ヘルパー

New iine button helper plugin for Bludit CMS.<br>
This plugin is only available in Japanese language.

do様で配布している「[いいねボタン・改](https://do.gt-gt.org/product/newiine/)」をBludit CMSに設置するためのプラグインです。<br>
pageEnd（ページ下）に設置します。

**※いいねボタン・改のインストールが別途必要です。**

## 設定方法
プラグインを[ダウンロード](https://github.com/sakanafurai/new-iine-button-helper/releases/download/1.2.0/new-iine-button-helper.zip)

1. zipファイルを解凍し、```new-iine-button-helper```フォルダを```bludit```ディレクトリ内の```bl-plugin```ディレクトリにコピーする。
2. Bluditの管理画面の『プラグイン』のページで「いいねボタン・改ヘルパー」を有効化する。
3. 「いいねボタン・改ヘルパー」の設定ボタンを押す。
4. 『いいねボタン・改のディレクトリ』に、いいねボタン・改をインストールしているディレクトリを入力する。
5. 必要に応じてほかの項目の設定を変更し、「保存」ボタンを押して変更を保存する。
6. 『ウェブサイト』からサイトを開き、ボタンが設定したとおりに表示されているか確認する。

## 設定できる項目

* ページごとに個別のボタン名を使用する<br>
（有効にした場合、ページのスラッグを使用。無効の場合は「Bludit」）
* 1日あたりのいいねの上限回数
* ボタンの形状
* アイコンの表示・非表示
* いいね数の表示
* ポップアップの表示方向（上／下）
* お礼のメッセージは文章・画像ともに3つまで登録可
* Material Iconsアイコンフォントの取得元<br>
（Google FontsまたはjsDelivr。テーマで既に読み込み済みの場合、新たに読み込まない設定も可能。）
* jQueryの取得元<br>
（Google、jquery.comまたはBludit内蔵のjQueryから選択できます。テーマで既に読み込み済みの場合、新たに読み込まない設定も可能。）

ボタンをカスタマイズしている場合、設定項目によっては正しく動作しない場合があります。

## ライセンス
MIT
