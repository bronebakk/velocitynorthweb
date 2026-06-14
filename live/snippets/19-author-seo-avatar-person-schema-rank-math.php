<?php
/**
 * Code Snippet #19 — Author SEO — avatar + Person schema (Rank Math)
 * Sets the real author avatar and completes the Person schema (sameAs LinkedIn, jobTitle, image).
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

/**
 * Author identity for SEO: real avatar + complete Person schema (Rank Math).
 * Single-author site — targets user ID 1.
 */
define('VN_AUTHOR_UID', 1);
define('VN_AUTHOR_PHOTO', 'https://velocitynorth.ai/wp-content/uploads/2026/06/yann-skaalen.png');
define('VN_AUTHOR_LINKEDIN', 'https://www.linkedin.com/in/skaalen/');
define('VN_AUTHOR_JOBTITLE', 'Co-founder & Partner, Velocity North');

// 1) Use the uploaded headshot as this author's avatar everywhere (archive, schema, comments)
add_filter('get_avatar_data', function ($args, $id_or_email) {
    $uid = 0;
    if (is_numeric($id_or_email))               { $uid = (int) $id_or_email; }
    elseif ($id_or_email instanceof WP_User)    { $uid = (int) $id_or_email->ID; }
    elseif ($id_or_email instanceof WP_Post)    { $uid = (int) $id_or_email->post_author; }
    elseif ($id_or_email instanceof WP_Comment) { $uid = (int) $id_or_email->user_id; }
    elseif (is_string($id_or_email)) { $u = get_user_by('email', $id_or_email); if ($u) { $uid = $u->ID; } }
    if ($uid === (int) VN_AUTHOR_UID) {
        $args['url'] = VN_AUTHOR_PHOTO;
        $args['found_avatar'] = true;
    }
    return $args;
}, 10, 2);

// 2) Enrich the author Person node in Rank Math's JSON-LD graph
add_filter('rank_math/json_ld', function ($data, $jsonld) {
    foreach ($data as $key => $node) {
        $type = isset($node['@type']) ? $node['@type'] : '';
        $is_person = ($type === 'Person') || (is_array($type) && in_array('Person', $type, true));
        if (!$is_person) { continue; }
        // jobTitle
        $data[$key]['jobTitle'] = VN_AUTHOR_JOBTITLE;
        // sameAs: drop the bogus self-URL, add LinkedIn
        $same = isset($node['sameAs']) ? (array) $node['sameAs'] : array();
        $same = array_filter($same, function ($u) { return strpos($u, 'velocitynorth.ai') === false; });
        $same[] = VN_AUTHOR_LINKEDIN;
        $data[$key]['sameAs'] = array_values(array_unique($same));
        // image -> real headshot
        $data[$key]['image'] = array(
            '@type'   => 'ImageObject',
            'url'     => VN_AUTHOR_PHOTO,
            'caption' => isset($node['name']) ? $node['name'] : 'Yann A. Skaalen',
        );
    }
    return $data;
}, 99, 2);
