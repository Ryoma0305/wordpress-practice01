<?php
//////////////////////////////////////////////
//  ダッシュボード カスタマイズ
//////////////////////////////////////////////

function add_dashboard_widgets()
{
    wp_add_dashboard_widget('dashboard_widget_description', '管理画面INDEX', 'add_links_welcome_panel');
    global $wp_meta_boxes;
    $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
    $widget_backup = array('dashboard_widget_description' => $normal_dashboard['dashboard_widget_description']);
    unset($normal_dashboard['dashboard_widget_description']);
    $sorted_dashboard = array_merge($widget_backup, $normal_dashboard);
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');

remove_action('welcome_panel', 'wp_welcome_panel');
function remove_dashboard_widgets()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']); // サイトヘルス
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


function add_links_welcome_panel()
{
    ?>
	<div class="welcome_panel_header">
		<a class="welcome_panel_header_link" href="/wp-content/themes/o-e-n.co.jp/_manual_1msfjvd3a03mbazgg6kDe_babxx27/oen_cms.pdf" target="_blank" rel="noopener">
		■ マニュアルのダウンロードはこちら</a>
	</div>
	<div class="welcome_panel_sections">
		<!-- ● -->
    <div class="welcome_panel_section">
      <h2>Release</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/works/?release'>/works/?release</a></h3>
      <ul>
				<li>記事は公開日順（降順）に並びます</li>
				<li>タイトルを改行する場合は<b>&lt;br&gt;</b>タグを挿入してください</li>
      </ul>
      <p><a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit.php?post_type=releases">記事一覧</a></p>
    </div>
    <!-- ● -->
		<div class="welcome_panel_section">
      <h2>Job Opening(募集職種)</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/careers/'>/careers/</a></h3>
      <ul>
        <li>１記事 = 1事業部の単位になります</li>
        <li>事業部の並び替えは公開日順（降順）になりますので修正してソートしてください</li>
				<li><b>TOPページでは「募集職種」が０件の事業部は表示されません。</b></li>
				<li><b>TOPページでは「募集停止」チェックがある事業部は表示されません。</b></li>
			</ul>
      <p><a class="button button-primary post-foo" target="_blank" href="edit.php?post_type=jobs">募集職種一覧</a></p>
    </div>
		<!-- ● -->
    <div class="welcome_panel_section">
      <h2>Case Study 作成</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/works/'>/works/</a></h3>
      <ul>
				<li><b>実績の作成、編集が可能です。</b></li>
				<li>実績を作成後、<b>右の「Case Study 選択」でサイトに表示したい実績を選択してください。</b></li>
				<li>タイトルを改行する場合は<b>&lt;br&gt;</b>タグを挿入してください。</li>
			</ul>
      <p><a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit.php?post_type=case-studies">実績一覧</a></p>
    </div>
		<!-- ● -->
    <div class="welcome_panel_section">
      <h2>Case Study 選択</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/'>top</a></h3>
			<h3>【url】<a target="_blank" rel="noreferrer" href='/works/'>/works/</a></h3>
      <ul>
				<li><b>「トップページとcase studyトップ（共に同じものを表示）」</b>に出す実績を最大5件選択します。</li>
				<li><b>「Case Study 作成」</b>で作成した実績からページに表示したいものをこちらで選択します。</li>
			</ul>
      <p><a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="admin.php?page=case-studies-select">実績選択</a></p>
    </div>
		<!-- ● -->
    <div class="welcome_panel_section">
      <h2>Interview</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/careers/'>/careers/</a></h3>
      <ul>
        <li>記事の並び替えは公開日順（降順）になりますので修正してソートしてください</li>
      </ul>
      <p><a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit.php?post_type=careers">記事一覧</a></p>
    </div>
		<!-- ● -->
    <div class="welcome_panel_section">
		<?php // スラッグからIDを取得して表示
			$about_ID = get_page_by_path('about'); // 投稿オブジェクトの取得
			$about_ID = isset($about_ID->ID) ? $about_ID->ID : ""; // 投稿オブジェクトからIDを取得
		?>
			<h2>About Us</h2>
      <h3>【url】<a target="_blank" rel="noreferrer" href='/about/'>/about/</a></h3>
      <ul>
				<li><b>「Our Business」</b>と<b>「Company Profile」</b>を更新出来ます</li>
				<li>ページは削除しないでください</li>
      </ul>
      <p><a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="post.php?post=<?php echo $about_ID; ?>&action=edit">編集ページ</a></p>
    </div>
		<!-- ● -->
		<!-- ● -->
    <div class="welcome_panel_section">
		<?php
		?>
			<h2>各カテゴリ編集</h2>
			<h3>【Releaseの記事カテゴリーを編集】</h3>
			<p>
				<a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit-tags.php?taxonomy=releases_category&post_type=releases">Release カテゴリー</a>
			</p>
			<h3>【Case Studyの実績カテゴリーを編集】</h3>
			<p>
				<a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit-tags.php?taxonomy=case-studies_category&post_type=case-studies">Case Study カテゴリー</a>
			</p>
			<h3>【Interviewのインタビュイーのカテゴリを編集】</h3>
			<p>
				<a class="button button-primary post-foo" rel="noreferrer" target="_blank" href="edit-tags.php?taxonomy=careers_category&post_type=careers">Interview カテゴリー</a>
			</p>
		</div>
		<!-- ● -->
	</div>
    <?php
}
