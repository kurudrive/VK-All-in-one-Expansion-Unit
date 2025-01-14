<?php
/**
 * Class WpTitleTest
 *
 * @package vektor-inc/vk-all-in-one-expansion-unit
 */

/**
 * wp title test case.
 */
class WpTitleTest extends WP_UnitTestCase {

	/**
	 * PHP Unit テストにあたって、各種投稿やカスタム投稿タイプ、カテゴリーを登録します。
	 *
	 * @return array $test_posts : 作成した投稿の記事idなどを配列で返します。
	 */
	public static function create_test_posts() {

		$test_posts = array();

		/******************************************
		 * テスト用投稿の登録 */

		// 通常の投稿 Test Post を投稿.
		$post                  = array(
			'post_title'   => 'Test Post',
			'post_status'  => 'publish',
			'post_content' => 'content',
		);
		$test_posts['post_id'] = wp_insert_post( $post );

		// 固定ページ Parent Page を投稿.
		$post                         = array(
			'post_title'   => 'Parent Page',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => 'content',
		);
		$test_posts['parent_page_id'] = wp_insert_post( $post );

		// 投稿トップ用の固定ページ Post Top を投稿.
		$post                       = array(
			'post_title'   => 'Post Top',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => 'content',
		);
		$test_posts['home_page_id'] = wp_insert_post( $post );

		// フロントページ用の固定ページ Front Page を投稿.
		$post                        = array(
			'post_title'   => 'Front Page',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => 'content',
		);
		$test_posts['front_page_id'] = wp_insert_post( $post );

		// カスタム投稿タイプ event の投稿 Test Event を投稿.
		$post                   = array(
			'post_title'   => 'Test Event',
			'post_type'    => 'event',
			'post_status'  => 'publish',
			'post_content' => 'Test Event',
		);
		$test_posts['event_id'] = wp_insert_post( $post );

		return $test_posts;
	}

	/**
	 * test_vkExUnit_get_wp_head_title
	 */
	public function test_vkExUnit_get_wp_head_title() {

		$test_posts = self::create_test_posts();
		$sep        = ' | ';

		/*
		Test Array
		/*--------------------------------*/
		$test_array = array(

			// 投稿ページ / カスタムタイトル : 指定あり / サイト名追加 : 無し
			// Return : カスタムタイトル
			array(
				'target_url'    => get_permalink( $test_posts['post_id'] ),
				'target_id'     => $test_posts['post_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Post Custom Title',
						'add_site_title' => false,
					),
				),
				'expected'      => 'Post Custom Title',
			),
			// 投稿ページ / カスタムタイトル : 指定あり / サイト名追加 : あり
			// Return : カスタムタイトル + セパレータ + サイト名
			array(
				'target_url'    => get_permalink( $test_posts['post_id'] ),
				'target_id'     => $test_posts['post_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Post Custom Title',
						'add_site_title' => true,
					),
				),
				'expected'      => 'Post Custom Title' . $sep . 'Site name',
			),
			// 投稿ページ / カスタムタイトル : 指定なし / サイト名追加 : なし
			// Return : 投稿タイトル + セパレータ + サイト名
			array(
				'target_url'    => get_permalink( $test_posts['post_id'] ),
				'target_id'     => $test_posts['post_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => null,
						'add_site_title' => false,
					),
				),
				'expected'      => 'Test Post' . $sep . 'Site name',
			),
			// 固定ページ / カスタムタイトル : 指定あり / サイト名追加 : なし
			// Return : カスタムタイトル
			array(
				'target_url'    => get_permalink( $test_posts['parent_page_id'] ),
				'target_id'     => $test_posts['parent_page_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Custom Page Title',
						'add_site_title' => false,
					),
				),
				'expected'      => 'Custom Page Title',
			),
			// 固定ページ / カスタムタイトル : 指定あり / サイト名追加 : あり
			// Return : カスタムタイトル + セパレータ + サイト名
			array(
				'target_url'    => get_permalink( $test_posts['parent_page_id'] ),
				'target_id'     => $test_posts['parent_page_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Custom Page Title',
						'add_site_title' => true,
					),
				),
				'expected'      => 'Custom Page Title' . $sep . 'Site name',
			),
			// トップページ / カスタムタイトル : 指定なし / サイト名追加 : なし
			// Return : メイン設定画面でのカスタムタイトル
			array(
				'target_url'    => home_url( '/' ),
				'target_id'     => $test_posts['front_page_id'],
				'options'       => array(
					'blogname'          => 'Site name',
					'vkExUnit_wp_title' => array(
						'extend_frontTitle' => 'ExUnit Front Page Title',
					),
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => null,
						'add_site_title' => false,
					),
				),
				'expected'      => 'ExUnit Front Page Title',
			),
			/***********************************************************
			 * トップページ仕様変更
			 *
			 * @since 9.84.0.0
			 */
			// トップページ / カスタムタイトル : 指定あり / サイト名追加 : なし
			// Return : トップページに指定した固定ページで指定したカスタムタイトル
			array(
				'target_url'    => home_url( '/' ),
				'target_id'     => $test_posts['front_page_id'],
				'options'       => array(
					'blogname'          => 'Site name',
					'page_on_front'     => $test_posts['front_page_id'],
					'show_on_front'     => 'page',
					'page_for_posts'    => $test_posts['home_page_id'],
					'vkExUnit_wp_title' => array(
						'extend_frontTitle' => 'ExUnit Front Page Title',
					),
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Front Page Custom Title',
						'add_site_title' => false,
					),
				),
				'expected'      => 'Front Page Custom Title',
			),

			// eventの投稿ページ / カスタムタイトル : 指定あり / サイト名追加 : 無し
			// Return : カスタムタイトル
			array(
				'target_url'    => get_permalink( $test_posts['event_id'] ),
				'target_id'     => $test_posts['event_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Event Custom Title',
						'add_site_title' => false,
					),
				),
				'expected'      => 'Event Custom Title',
			),
			// eventの投稿ページ / カスタムタイトル : 指定あり / サイト名追加 : あり
			// Return : カスタムタイトル + セパレータ + サイト名
			array(
				'target_url'    => get_permalink( $test_posts['event_id'] ),
				'target_id'     => $test_posts['event_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => 'Event Custom Title',
						'add_site_title' => true,
					),
				),
				'expected'      => 'Event Custom Title' . $sep . 'Site name',
			),
			// eventの投稿ページ / カスタムタイトル : 指定なし / サイト名追加 : なし
			// Return : 投稿タイトル + セパレータ + サイト名
			array(
				'target_url'    => get_permalink( $test_posts['event_id'] ),
				'target_id'     => $test_posts['event_id'],
				'options'       => array(
					'blogname' => 'Site name',
				),
				'custom_fields' => array(
					'veu_head_title' => array(
						'title'          => null,
						'add_site_title' => false,
					),
				),
				'expected'      => 'Test Event' . $sep . 'Site name',
			),
		);

		print PHP_EOL;
		print '------------------------------------' . PHP_EOL;
		print 'test_head_title' . PHP_EOL;
		print '------------------------------------' . PHP_EOL;

		foreach ( $test_array as $value ) {
			if ( ! empty( $value['options'] ) && is_array( $value['options'] ) ) {
				foreach ( $value['options'] as $option_key => $option_value ) {
					update_option( $option_key, $option_value );
				}
			}

			if ( ! empty( $value['custom_fields'] ) && is_array( $value['custom_fields'] ) ) {
				foreach ( $value['custom_fields'] as $cf_key => $cf_value ) {
					update_post_meta( $value['target_id'], $cf_key, $cf_value );
				}
			}

			// Move to test page
			$this->go_to( $value['target_url'] );

			$actual = vkExUnit_get_wp_head_title();

			// print PHP_EOL;
			// print $value['target_url'] . PHP_EOL;
			// print 'expected::::' . $value['expected'] . PHP_EOL;
			// print 'actual  ::::' . $actual . PHP_EOL;

			$this->assertEquals( $value['expected'], $actual );

			if ( ! empty( $value['options'] ) && is_array( $value['options'] ) ) {
				foreach ( $value['options'] as $option_key => $option_value ) {
					delete_option( $option_key );
				}
			}
			if ( ! empty( $value['custom_fields'] ) && is_array( $value['custom_fields'] ) ) {
				foreach ( $value['custom_fields'] as $cf_key => $cf_value ) {
					delete_post_meta( $value['target_id'], $cf_key );
				}
			}
		}
	}
}
