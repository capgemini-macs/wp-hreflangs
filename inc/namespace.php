<?php

namespace CG\Hreflangs;

function create_hreflangs()
{

	$idOriginalSite = get_current_blog_id();
	$idPost = get_the_id();
	$postmeta = get_post_meta($idPost);
	$sites = get_sites();

	// if this is child site
	if (array_key_exists('ea-syncable-import-src-id', $postmeta)) {
		if (array_key_exists('ea-syncable-import-src-site-canonical', $postmeta) && array_key_exists('ea-syncable-import-src-id-canonical', $postmeta)) {
			switch_to_blog($postmeta['ea-syncable-import-src-site-canonical'][0]);
			$idPost = $postmeta['ea-syncable-import-src-id-canonical'][0];
			$postmeta = get_post_meta($idPost);
		}
	}

	// print main url
	$url = get_permalink($idPost);
	if (!empty($url)) {
		echo '<link rel="alternate" href="' . esc_url($url) . '" hreflang="x-default" />' . "\n";
	}

	// print synced sites urls
	for ($idSyncedSite = 1; $idSyncedSite < count($sites); $idSyncedSite++) {
		if (array_key_exists('ea-syncable-post-synced-to-' . $idSyncedSite, $postmeta)) {
			$idSyncedPost = $postmeta['ea-syncable-post-synced-to-' . $idSyncedSite][0];

			if (false === checkIfBlogExists($idSyncedSite, $sites)) {
				break;
			}
			switch_to_blog($idSyncedSite);

			if (false === get_post_status($idSyncedPost)) {
				continue;
			}

			$url = get_permalink($idSyncedPost);
			if (!empty($url) && !strpos($url, 'preview=true')) {
				$hreflang = trim(get_site($idSyncedSite)->path, '/');
				echo '<link rel="alternate" href="' . esc_url($url) . '" hreflang="' . esc_html($hreflang) . '" />' . "\n";
			}
		}
	}
	switch_to_blog($idOriginalSite);
}

add_action('wp_head', __NAMESPACE__ . '\\create_hreflangs');


function checkIfBlogExists($id, $array)
{
	foreach ($array as $key => $val) {
		if ((int)$val->blog_id === $id) {
			return true;
		}
	}
	return false;
}
