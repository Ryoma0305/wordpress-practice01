<?php
//////////////////////////////////////////////
// Release
//////////////////////////////////////////////

// 詳細ページ
function getReleasesSinglePost($p){
  global $gVars;
  $ID = $p->ID;
  $thumb = getImageFromPostId('main_img', $ID) ?: $gVars['nophoto']["releases"];
  $category = get_the_terms( $ID, 'release_category');
  $category_name = $category ? $category[0]->name : '';
  $category_id = $category ? $category[0]->term_id : '';
  $time = get_the_time( 'Y-m-d' , $ID );
  $time_arr = explode("-", $time);
  $links = get_field("links", $ID);
  return [
    'title' => get_the_title($ID),
    'link' => get_permalink($ID),
    'links' => get_field("links",$ID),
    'category' => $category_name,
    'category_id' => $category_id,
    'thumb' => $thumb,
    'time' => $time,
    'time_arr' => $time_arr,
    'description' => get_field("description", $ID),
  ];
}

//////////////////////////////////////////////
// Case Study
//////////////////////////////////////////////

// 詳細ページ
function getCareersSinglePost($p){
	global $gVars;
	$ID = $p->ID;
	$category = get_the_terms( $ID, 'careers_category' );
	$category = $category ? $category[0]->name : '';
	$thumb = getImageFromPostId( 'main_img', $ID ) ?: $gVars['nophoto']["careers"];
	return [
		'title' => get_the_title($ID),
		'article_title' => get_field("article_title", $ID),
		'link'  => get_permalink($ID),
		"position" => get_field("position", $ID),
		'category' => $category,
		'thumb' => $thumb,
	];
}

// 一覧ページ
function getCareersListPost($p){
	global $gVars;
	$ID = $p->ID;
	$category = get_the_terms( $ID, 'careers_category' );
	$category = $category ? $category[0]->name : '';
	$thumb = getImageFromPostId( 'main_img', $ID , "medium_large") ?: $gVars['nophoto']["careers"];
	return [
		'title' => get_the_title($ID),
		'link'  => get_permalink($ID),
		"position" => get_field("position", $ID),
		'category' => $category,
		'thumb' => $thumb,
	];
}
