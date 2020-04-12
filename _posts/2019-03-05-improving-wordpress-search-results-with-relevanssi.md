---
layout: post
title: "Improving WordPress Search Results with Relevanssi"
date: 2019-03-05
image: /assets/images/posts/relevanssi-search.webp
---
I've been managing 17 WordPress sites for the past few years and one thing I've noticed is the default search built into WordPress isn't flexible and doesn't always return the most accurate results. I use Advanced Custom Fields heavily for each of the sites and have noticed the default search doesn't search into these fields; it only searches titles and what's in the page's main content box. Since most of the pages on our sites don't use those, I needed to find a better option.

I looked into managed search solutions such as Algolia and Elasticsearch, but for my needs, those went above and beyond, not to mention were costly. I looked at other WordPress plugins, but since I use the Multisite feature on each site, almost none of the plugins were able to search across the WordPress network. Then I came across [Relevanssi](https://www.relevanssi.com/){:target="_blank"}. Relevanssi offers two versions, free and paid, and promises to look into ACF fields and give more flexibility on searches. It allows me to add custom weights to titles, body fields, custom post types, add synonyms for related words, offers "Did you mean ___?" functionality and best of all, searches across a WordPress network.

After playing around with several settings, I was able to get the search results displaying nearly how I wanted. My two criteria were to have Pages appear above Posts, and to only display Posts newer than the previous two years. To do this though, I had to add some additional customization to my functions.php file. Luckily, the Relevanssi documentation is extremely helpful and detailed, plus the plugin author replies to each comment on support document pages.

Here's what I ended up with in my functions.php file to display Pages above Posts, then return results newer than two years:

<pre>
add_filter('relevanssi_hits_filter', 'products_first');
  function products_first($hits) {
    $types = array();

    $types['page'] = array();
    $types['post'] = array();

    // Split the post types in array $types
    if (!empty($hits)) {
      foreach ($hits[0] as $hit) {

        $date_cutoff = date('Y-m-d h:i:s', strtotime('-2 years'));
        if($hit->post_date > $date_cutoff && $hit->post_type == 'post') {
          array_push($types[$hit->post_type], $hit);
        }

        if($hit->post_type == 'page') {
          array_push($types[$hit->post_type], $hit);
        }
      }
    }

    // Merge back to $hits in the desired order
    $hits[0] = array_merge($types['page'], $types['post']);
    return $hits;
  }
</pre>

I also noticed that sometimes, plural versions of words weren't displaying properly either. Sometimes searching for "car" would return different results than "cars." To get around this, I added a bit more code, found directly from the [documentation](https://www.relevanssi.com/knowledge-base/simple-french-plurals/):

<pre>add_filter( 'relevanssi_stemmer', 'relevanssi_french_plural_stemmer' );
    function relevanssi_french_plural_stemmer( $term ) {
      $len  = strlen( $term );
      $end1 = substr( $term, -1, 1 );

      if ( 's' === $end1 && $len > 3 ) {
        $term = substr( $term, 0, -1 );
      } elseif ( 'x' === $end1 && $len > 3 ) {
        $term = substr( $term, 0, -1 );
      }

      return $term;
    }</pre>

I couldn't be happier with this plugin and hope it solves any problems you might have.