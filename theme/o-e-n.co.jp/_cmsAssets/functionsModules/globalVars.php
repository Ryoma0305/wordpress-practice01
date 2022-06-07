<?php
global $gVars;
//////////////////////////////////////////////
//  プロジェクトのグローバル変数
//////////////////////////////////////////////

$gVars = [
  'site_name'      => 'OEN OFFICIAL WEBSITE',
  'origin'         => 'https://www.o-e-n.co.jp',
  'ogtype'         => 'article',
  'ogp'            => 'https://www.o-e-n.co.jp/wp-content/themes/o-e-n.co.jp/_assets/images/common/ogp.png',
  'home_url'       => '',
	"breakpoint"     => 900,
  'posts_per_page' => [
    'careers'      => 10,
		'interview'    => 10,
		'releases'     => 10,
		'case-studies' => 10,
	]
];

$gVars["description"] = '世界中に熱狂を届ける。株式会社OENのコーポレートサイトです。私たちは新しい力とインターネットで、エンターテインメントが生み出す熱狂を世界中に届けていきます。エンターテインメント産業の新たな機会創出を応援します。';

$gVars["loop_movie"] = '/wp-content/themes/o-e-n.co.jp/_assets/movie/loop.mp4?v=1';

$gVars["loop_movie_poster"] = '';

$gVars["version"] = '1';

$gVars['contact'] = 'https://form.run/@cyberagent-1648174833';
$gVars['contact_recruit'] = 'https://form.run/@cyberagent-1648635120';

$gVars['nophoto'] = [
	'careers'      => "/wp-content/themes/o-e-n.co.jp/_assets/images/nophoto/careers/common.png",
	'releases'     => "/wp-content/themes/o-e-n.co.jp/_assets/images/nophoto/releases/common.png",
	'case-studies' => [
		"pc" => "/wp-content/themes/o-e-n.co.jp/_assets/images/nophoto/case-studies/pc.png",
		"sp" => "/wp-content/themes/o-e-n.co.jp/_assets/images/nophoto/case-studies/sp.png",
	],
];

