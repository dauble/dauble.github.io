<?php



  $data = array (
    'posts' =>
      array (
        'title' => 'Indianapolis Web Developer | David  M. Auble',
        'link' => '/',
        'item' =>
          array (
            0 =>
            array (
              'title' => 'Increase Page Views with jQuery Tabs and Google Analytics',
              'link' => '/post/increase-page-views-with-jquery-tabs-and-google-analytics.html',
              'pubDate' => 'Sun, 12 Dec 2010 01:44:44',
              'post_content' => 'If you\'re not in e-commerce, I\'m sure most of you have seen a decrease in website traffic, due to the holidays.  By now, most web developers use <a href="http://www.google.com/analytics">Google Analytics</a> to monitor traffic, keywords and other metrics.  With a combination of Analytics and Webmaster Tools, I\'ve been able to increase my web traffic significantly.

                One thing I noticed however, was when I started implementing <a href="http://jqueryui.com/demos/tabs/">jQuery Tabs</a> into a website, I noticed that my overall traffic was decreasing slightly, and I began to wonder which pages were being viewed most.  Turns out, with the help of a coworker and <a href="http://code.google.com/apis/analytics/docs/tracking/asyncTracking.html">asynchronous code from Google</a>, we\'ve been able to track "tab views".

                I present.. the code:
                <pre>
                $(document).ready(function () {
                if ($("#tabs").length != 0){
                $("#tabs").bind("tabsselect",function(event,ui) {
                _gaq.push([\'_trackPageview\', window.location.pathname + \'/\' + ui.tab.innerHTML]);
                });
                }
                });
                </pre>
                With this code, it will check to see if you have tabs, and if you\'ve selected a tab, it feeds another page view into Google.

                The output you will see in Google will be similar to: www.yourpage.com/about, with individual records for each tab title on the current page.',
              'image' => '/assets/images/posts/computer.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'async-google',
                  'data' => 'async google',
                ),
                1 =>
                array (
                  'permalink' => 'google-analytics',
                  'data' => 'google analytics',
                ),
                2 =>
                array (
                  'permalink' => 'javascript',
                  'data' => 'javascript',
                ),
                3 =>
                array (
                  'permalink' => 'jquery',
                  'data' => 'jQuery',
                ),
                4 =>
                array (
                  'permalink' => 'jquery-2',
                  'data' => 'jquery',
                ),
                5 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
                6 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            1 =>
            array (
              'title' => 'The Panda Effect',
              'link' => '/post/the-panda-effect.html',
              'pubDate' => 'Tue, 06 Dec 2011 02:26:32',
              'post_content' => 'By now, most businesses are implementing some form of basic SEO.  Whether it’s optimizing page titles and structure, or optimizing all pictures, content and folder structure, it’s important to build your site with SEO in mind.

                Most people agree that Google is the leading search engine (by a significant margin).  By receiving over 65% of all search traffic, Google has been busy at work with trying to return the most relevant results as quickly as possible.

                Recently, the search engine giant has released their latest version of their algorithm, Panda.  With the release of Panda came a series of changes and new factors that are taken into account when “grading” a website. The Panda release affects nearly 12% of all search results.

                Let’s take a look at some of the new factors Panda takes into account when crawling a website.
                <ul>
                  <li><strong>Focus on the basics: UI/UX</strong>
                It may sound scary, but Google’s web bots (the Googlebot) are becoming more human-like by “understanding” page layouts.  By taking factors such as bounce rate, time spent on each page and site, page response times and conversion rates, the Googlebot is able to determine if the page contains content that people are actually wanting to view.With this information, the Googlebot is able to make an educated guess as to how people are engaging with your website.</li>
                </ul>
                <ul>
                  <li><strong>Content Quality, Including Spelling</strong>
                Something our content writers always ask themselves is “How original is my content?”  It’s no secret that Google has virtually limitless space to store indexes of your content.  Because of this, it’s relatively easy for Google to determine the uniqueness of your content.  Pages with trustworthy and reliable content are favored more by the Googlebots, too.It seems trivial, but you would be surprised at the number of websites that have small spelling and grammar errors.  Googlebots recognize this and actually penalize sites with errors.  By looking through a website’s PageRank, or how reputable the website is, spelling and grammar affect this significantly.</li>
                  <li><strong>Ad Spacing and Layout</strong>
                If you’re like me, you probably despise ads.  Googlebots are no different.  If they deem your page to have too many ads, your website may become flagged as a link farm, or may be seen as a page that serves no purpose other than to advertise for other companies. Being flagged as a link farm will severely affect your rankings, as most link farm websites have no real value.</li>
                  <li><strong>Cleanliness of Code</strong>
                Any developer will agree that clean code is much easier to manage.  By writing clean code, it’s much easier to ensure your website renders the same way in any browser, regardless if it’s Internet Explorer or Chrome.  By validating your website against the W3C, this is your best ally in making sure everyone and Googlebots can view your website properly.</li>
                </ul>
                The Internet changes constantly. Google recognizes the inevitable changes and continually updates their algorithms.  Panda is the latest big change and certainly won’t be the last. By keeping these tips in mind, a website can please the “Google Gods” and improve its page rank.',
              'image' => '/assets/images/posts/panda-1.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'css3',
                  'data' => 'CSS3',
                ),
                1 =>
                array (
                  'permalink' => 'html5',
                  'data' => 'HTML5',
                ),
                2 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            2 =>
            array (
              'title' => 'Why It\'s Time to Update Your Browser',
              'link' => '/post/why-its-time-to-update-your-browser.html',
              'pubDate' => 'Mon, 23 Apr 2012 01:32:42',
              'post_content' => '&nbsp;

                Let me start with a little profanity: Internet Explorer.  Okay, so maybe it’s not the type of profanity you were initially thinking, but in the Internet world, Internet Explorer is one of the foulest, most cruel phrases anyone could say.  Why? Simple.  It’s terrible mainly due to its inability to follow simple web standards and user basics.

                I will be fair though, with the release of IE 9, Microsoft has finally begun listening to consumers and web developers alike, by releasing software that follows web standards a bit more strictly. The only new problem we, web developers, face are people who don’t, or simply refuse to update.

                Not using Internet Explorer? I’d like to give you a high five.  In case you’ve been living in Windows98 for the past several years, companies such as Apple, Google and Mozilla have made great strides in building better browsers to best Microsoft’s.

                It wasn’t until IE9 that Internet Explorer finally supported HTML5.  Google Chrome, Mozilla Firefox and Apple’s Safari have been supporting it since 2009, whereas IE was two years behind.

                HTML5 support isn’t the only reason to update your browser, though.  Recent improvements Apple, Google and Mozilla have been implementing are hardware acceleration, user preference and bookmark sync features, as well as faster rendering for the jQuery JavaScript library, which can be found on most websites.

                Here are a few other reasons you should update your browser:
                <ul>
                  <li><strong>Security updates</strong> – Most releases usually have some form of security updates, whether it’s dealing with SSL, HTTPS or other small operating system related fixes</li>
                  <li><strong>A better web experience</strong> – Take a look at <a href="http://www.dowebsitesneedtobeexperiencedexactlythesameineverybrowser.com/" target="_blank" rel="noopener">http://dowebsitesneedtobeexperiencedexactlythesameineverybrowser.com/ </a>Crazy URL, but hover over the word you see. Do you see a black background with white text?  How about a blue and purple backgrounds?  Do the words appear differently?</li>
                  <li><strong>Themes</strong> – Everyone likes a little personalization and customization, right?  Why not break away from the typical gray/sandy colors and jazz up your browser with a new theme?</li>
                  <li><strong>HTML5/CSS3</strong> – Animations are no longer confined to Flash.  With CSS3, animations and transitions are fully supported, speeding up webpage load times.</li>
                  <li><strong>I’m a happier person</strong> – Building a website to look aesthetically pleasing in a browser takes time.  Making it work in IE7 requires a lot more time.  In fact, it usually requires the use of its own stylesheet, just to make web pages appear correctly.</li>
                  <li><strong>Beautiful interfaces</strong> – Currently, everywhere you look, advertisements and pictures are using color gradients to make products more visually appealing.  With modern browsers, creating beautiful websites is much, much easier and doesn’t require the use of hundreds of images.</li>
                </ul>',
              'image' => '/assets/images/posts/update-browser.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'css3',
                  'data' => 'CSS3',
                ),
                1 =>
                array (
                  'permalink' => 'html5',
                  'data' => 'HTML5',
                ),
                2 =>
                array (
                  'permalink' => 'jquery',
                  'data' => 'jQuery',
                ),
                3 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            3 =>
            array (
              'title' => 'Three Reasons You Should Ditch Image Sliders',
              'link' => '/post/three-reasons-you-should-ditch-image-sliders.html',
              'pubDate' => 'Fri, 16 Jan 2015 19:47:52',
              'post_content' => '<a href="http://ux.stackexchange.com/questions/13951/what-is-the-difference-between-a-slider-a-gallery-and-a-carousel" target="_blank" rel="noopener">Carousels, sliders and rotating banners</a> – chances are you’ve heard one or more of these terms before. Image carousels can be found on nearly any news site, online store or informational site with one goal in mind: force-feed the user as much content as possible, as soon as they land on your site.

                The concept of image sliders dates back several years to when JavaScript started booming. Image sliders were a great way to show users multiple promotions or features while freeing up page space. Once they started gaining momentum, online retailers began using them to showcase their weekly promotions, similar to a weekly insert in the Sunday paper.

                Now, image sliders are overused and oftentimes ignored by the consumer. Here are a few reasons why customers aren’t paying attention:
                <ul>
                  <li><strong>Automatic rotation</strong>
                Most image sliders have multiple slides that automatically rotate when users land on the site. For example, <a href="http://www.ikea.com/us/en/" target="_blank" rel="noopener">IKEA</a> currently has four promotions in their image slider, which includes an auto-rotate feature. A recent study conducted on the <a href="http://www.nngroup.com/articles/auto-forwarding/" target="_blank" rel="noopener">usability</a> of image sliders by Neilson Norman group confirmed that auto-forwarding sliders annoy users and reduce visibility of your messages.</li>
                  <li><strong>Increased site load time</strong>
                Typically, users will need to load jQuery (and a slider script) in order to display a carousel, which will increase your page loading time. Additionally, sites may have large, high-resolution banners, which also add to the page-load time. Carousels add <a href="http://chrislema.com/comparing-premium-sliders-for-wordpress-by-performance/" target="_blank" rel="noopener">between .4  and five seconds</a> to your page-load time. Keep in mind, <a href="http://www.lauradhamilton.com/5-quick-and-easy-seo-tips" target="_blank" rel="noopener">Google incorporates page speeds into search engine rankings</a>, so if your site is slow, you’re going to be punished.</li>
                  <li><strong>Negative impacts on your SEO and conversion rates</strong>
                Basic SEO practices state that there should be only one h1 tag per page and it should appear before any other heading tag. The problem with using h1 or any heading tag in an image carousel is that every time the slide changes, the h1 tag changes. A page with five slides in the carousel will have five h1 tags, which greatly devalues keyword relevance.</li>
                </ul>
                ​A 2013 study at the University of Notre Dame was conducted on the <a href="http://weedygarden.net/2013/01/carousel-stats/" target="_blank" rel="noopener">efficiency of image carousels</a> and revealed that only one percent of three million site visitors clicked on a carousel’s featured image.

                Too many messages oftentimes equal no message to consumers. Sometimes, slides on image sliders are so fast that people are not able to finish reading them. Check out these sites below that allow the user to be in control of the content they are viewing:
                <ul>
                  <li><a href="https://www.mint.com/" target="_blank" rel="noopener">Mint</a> does a good job of breaking things down and hiding nothing.</li>
                  <li><a href="http://www.bensherman.com/" target="_blank" rel="noopener">Ben Sherman</a> has one promotion up front; that’s it.</li>
                  <li><a href="http://www.nike.com/us/en_us/?ref=https%3A%2F%2Fwww.google.com%2F" target="_blank" rel="noopener">Nike</a> does a good job of sticking to their upcoming events and focusing on one campaign at a time.</li>
                </ul>
                Keep your website timely without becoming a promotion hoarder. You don’t need to hold onto everything you’ve ever promoted; every campaign has a shelf life. When considering alternatives to image sliders, here are a few points to keep in mind:
                <ul>
                  <li>Maintain one message. Yes, it’s possible – focus!</li>
                  <li>Organize key points in the layout on level of importance.</li>
                  <li>Give the user more control by disabling auto rotate carousels.</li>
                  <li>Limit or simplify the amount of sliders if you use a slideshow.</li>
                </ul>
                Before you make a big decision on how to direct your users, consider your customer and the experience first, and do it right. Measure, adjust, rinse and repeat.',
              'image' => '/assets/images/posts/carousel.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'css3',
                  'data' => 'CSS3',
                ),
                1 =>
                array (
                  'permalink' => 'html5',
                  'data' => 'HTML5',
                ),
                2 =>
                array (
                  'permalink' => 'jquery',
                  'data' => 'jQuery',
                ),
                3 =>
                array (
                  'permalink' => 'random',
                  'data' => 'Random',
                ),
                4 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            4 =>
            array (
              'title' => 'My Git Workflow: Introduction to Version Control',
              'link' => '/post/my-git-workflow-introduction-to-version-control.html',
              'pubDate' => 'Wed, 09 Nov 2016 18:20:56',
              'post_content' => '<h2>Git: What is it?</h2>
                Git is a free and open source distributed version control system designed to handle everything from small to massive projects with speed and efficiency. In layman’s terms, it’s a way to store versions of code that can be managed easily and effortlessly.

                Git stores revision history in forms of hashes; it does not store files, rather hashes of files to save space and improve speed.
                <h2>How do I get started?</h2>
                Projects must be initialized by the following code:
                <blockquote>git init</blockquote>
                This creates a hidden folder “.git” in your working directory. This must not be removed!
                <h2>What are some commands?</h2>
                Whenever you want to make a change, there are a few commands that you’ll need to learn. They are:
                <blockquote>git pull</blockquote>
                This grabs the latest versions of the files in the repository.
                <blockquote>git status</blockquote>
                This gets the status of the files contained within your project and shows which files have been altered, or “unstaged.”
                <blockquote>git add .</blockquote>
                This adds all modified, or “unstaged,” files to the current commit.
                <blockquote>git commit –am “This is a message about the code I’m committing”</blockquote>
                This commits all changes to the repository with a descriptive message saying what’s been changed.
                <blockquote>git merge –no-ff “Fix merge conflicts”</blockquote>
                Used in branching, this will merge your branch into another trunk.
                <blockquote>git push</blockquote>
                This pushes the last commit into the repo for others to grab.
                <h3>That’s a ton. This looks like command line code...right?</h3>
                Yes! Although you can use Git with a GUI program, it’s faster and easier to use it though a command line program, Git Bash. <a href="https://git-scm.com/downloads" target="_blank"><strong><u>https://git-scm.com/downloads</u></strong></a>
                <h2>Getting Started – Cloning a Repo</h2>
                Getting started is simple. The first step is to clone the repository.
                <blockquote>git clone https://your_repo_url/your_project_name.git</blockquote>
                This will copy all files in the repo to your local machine so you can make changes.
                <h2>The Git Workflow</h2>
                <h3>“Branching” – What is that?</h3>
                Branching is a term that will clone the base “trunk” (or Master code version), allowing a developer to make changes. Once all changes have been made, the developer will then commit his code, then merge it into one of two branches: <strong>Master</strong> or <strong>Development</strong>.
                <h3>Why two branches?</h3>
                Most projects have two environments: <strong>Production</strong> and <strong>Staging</strong>. The <strong>Master</strong> branch reflects code that has been reviewed and is ready to be pushed to <strong>Production</strong>, while code that is ready to be reviewed is merged into <strong>Development</strong>.

                Developers should <strong>NEVER</strong> work from the Master branch. Instead, they should check out the branch, pull the latest changes, and then check out a new branch.

                You can name your branch whatever you’d like, however it should follow a naming convention and describe what you’re going to be modifying. For example:
                <blockquote><strong>hotfix-branch-name</strong></blockquote>
                This will describe a quick fix – like a spelling error, color change, link style, etc.
                <blockquote><strong>feature-branch-name</strong></blockquote>
                This should be used to describe a new module, feature or other large addition to the code. An example would be adding a new section or adding a new site search.
                <h3>What does a typical branching workflow look like?</h3>
                Simple! With branching, making an update couldn’t be easier.
                <blockquote>git checkout master

                git pull

                git checkout  -b feature-add-tracking-scripts

                <em>..make changes..</em>

                git status

                git add .

                git commit – am “Added tracking scripts to site”

                git checkout dev

                git pull

                git merge –no-ff feature-add-tracking-scripts

                git push

                Once this new addition has been approved, simply:

                git checkout master

                git pull

                git merge –no-ff feature-add-tracking-scripts

                git push</blockquote>
                <h3>I got a merge conflict. What do I do?</h3>
                These are fairly common when working with multiple branches. This just means there is newer code in the repository than what you have on your machine.

                Git is intelligent and will tell you which files have conflicts. In our new build lifecycle, most of the time conflicts will arise in the stylesheets or JavaScript files. Simply rebuild and you’re good!
                <h2>Next Steps</h2>
                <strong><em>No more coding on the fly. No more working directly off the FTP server.</em></strong>

                If changes are made on the fly or by working directly off the FTP server and are not stored in Git, they will be overwritten the next time a change is made using Git. It is important that once implemented, all changes be run through Git.',
              'image' => '/assets/images/posts/workflow.png',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
                1 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            5 =>
            array (
              'title' => 'Solution: wp_nav_menu Not Appearing on Category Template',
              'link' => '/post/wp_nav_menu-category-fix.html',
              'pubDate' => 'Wed, 08 Mar 2017 19:07:51',
              'post_content' => 'Today while working on a site I came across a problem that seemed weird to me. The <strong>wp_nav_menu()</strong> was working fine on all the pages except for my category page. When I took a detailed look, I found that it was caused by conflict of custom post type.  So how did I fix it?

                Here is a quick fix. Copy and paste the following code right above the place where you have called the <strong>wp_nav_menu()</strong> function.
                <blockquote>&lt;?php
                if(is_category()) {
                $wp_query = NULL;
                $wp_query = new WP_Query(array(\'post_type\' =&gt; \'post\',\'page\'));

                wp_nav_menu(array( \'menu\'=&gt;\'your_nav_menu\', \'fallback_cb\' =&gt; \'false\'));
                wp_reset_query();
                }
                ?&gt;</blockquote>',
              'image' => '/assets/images/posts/new-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
                2 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            6 =>
            array (
              'title' => 'How To: Use FontAwesome Fonts in Your CSS :before & :after',
              'link' => '/post/how-to-use-fontawesome-fonts-in-your-css-before-after.html',
              'pubDate' => 'Wed, 15 Mar 2017 12:00:19',
              'post_content' => 'I\'ve been a fan of <a href="http://fontawesome.io/" target="_blank" rel="noopener">FontAwesome </a>for a long time. I admire their work and appreciate everything they do for fonts, icons and making websites and web apps more user-friendly.

                Often, I come across instances where I need to use their icons in my CSS and I am constantly forgetting how to use them in CSS. Below are the steps in case you\'re as forgetful as I am. (Don\'t forget to include the fonts in your header!)
                <ol>
                  <li>Find the font you want on their collection</li>
                  <li>Copy the Unicode code (ie, f10d)</li>
                  <li>Use the following CSS:</li>
                </ol>
                <blockquote>:before {
                font-family: "FontAwesome";
                content: "\\f10d";
                }</blockquote>
                You may need to adjust other properties, such as color and position, but this is the process.

                And, in case you\'re wanting to incorporate them into a design, follow these steps:
                <ol>
                  <li>Download the font collection from <a href="https://github.com/FortAwesome/Font-Awesome" target="_blank" rel="noopener">GitHub</a></li>
                  <li>Find the font you want to use on the <a href="http://fontawesome.io/cheatsheet/" target="_blank" rel="noopener">FontAwesome Cheatsheet</a></li>
                  <li>Copy the icon character you wish and paste it into your design</li>
                  <li>Change the font to FontAwesome and voila!</li>
                </ol>',
              'image' => '/assets/images/posts/code.jpg',
              'category' =>
              array (
                'permalink' => 'css3',
                'data' => 'CSS3',
              ),
            ),
            7 =>
            array (
              'title' => 'How To: Remove Extra Tags from WordPress WYSIWYG Editor',
              'link' => '/post/how-to-remove-extra-tags-from-wordpress-wysiwyg-editor.html',
              'pubDate' => 'Thu, 30 Mar 2017 18:28:42',
              'post_content' => 'From time to time, I find WordPress\' built-in WYSIWYG editor annoying. If you\'ve dealt with it much, you know it adds formatting tags around every new line of text. Usually these don\'t bother me, as I want my text to be wrapped in paragraph tags or similar. However, for the times I want to extract ONLY the content and not the tags, here\'s an easy way to strip all tags from WordPress. Just a word of caution though, these will strip the tags from ALL of your templates.

                Add any of these lines to your <strong>functions.php</strong> file.

                The Excerpt:
                <blockquote>remove_filter (\'the_exceprt\', \'wpautop\');</blockquote>
                The Content:
                <blockquote>remove_filter (\'the_content\', \'wpautop\');</blockquote>
                All Paragraph tags:
                <blockquote>remove_filter(\'term_description\',\'wpautop\');</blockquote>
                Or, my personal favorite, use functions native to WordPress anywhere in your templates:

                The Excerpt:
                <blockquote>&lt;?php echo get_the_excerpt(); ?&gt;</blockquote>
                The Content:
                <blockquote>&lt;?php echo get_the_content(); ?&gt;</blockquote>',
              'image' => '/assets/images/posts/computer.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
                2 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
                3 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            8 =>
            array (
              'title' => 'Reference WordPress Dashicons in CSS',
              'link' => '/post/reference-wordpress-dashicons-css.html',
              'pubDate' => 'Thu, 20 Jul 2017 13:24:20',
              'post_content' => 'Recently I had an issue where I needed to remove a mega menu plugin in order to improve a site\'s PageSpeed score. In breaking it down, I realized the plugin was referencing the WordPress Dashicons, something I would need to add in when rebuilding the navigation menu.

                I looked online and finally found the solution: load the dashicons from the functions.php file.
                <blockquote>add_action( \'wp_enqueue_scripts\', \'load_dashicons_front_end\' );

                function load_dashicons_front_end() {
                wp_enqueue_style( \'dashicons\' );
                }</blockquote>
                Then, in your CSS, simply reference them as a new font:
                <blockquote>.item {
                content: \'\\f140\';
                display: inline-block;
                font-family: dashicons;
                }</blockquote>
                I found this snippet from <a href="https://wpsites.net/web-design/adding-dashicons-in-wordpress/" target="_blank" rel="noopener">WP Sites</a>. For the complete Dashicon library, look at the <a href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener">WordPress Dashicon Developer Resource</a>.',
              'image' => '/assets/images/posts/common-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'css3',
                  'data' => 'CSS3',
                ),
                1 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
                2 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            9 =>
            array (
              'title' => 'How to Fix Common WordPress Errors',
              'link' => '/post/fix-common-wordpress-errors.html',
              'pubDate' => 'Wed, 16 Aug 2017 00:00:46',
              'post_content' => 'WordPress sites are usually straight-forward and not too complicated to build. However, when you start building your own themes and really digging into the core, you\'re bound to run into a few issues. The most common issues are oftentimes the easiest to troubleshoot. This list should help you solve the most common WordPress errors.
                <ol>
                  <li><strong>WP_DEBUG</strong>
                By enabling WP_DEBUG in your wp-config.php file, you\'re able to see what WordPress is doing behind the scenes. This is my go-to solution for most issues I encounter. Is the footer suddenly missing? Maybe you\'ve forgotten to close a loop. Part of an included template missing? Maybe there\'s an error in the embedded template causing it to not display. To call this function, simply:
                <blockquote>&lt;?php define(\'WP_DEBUG\', true\'); ?&gt;</blockquote>
                </li>
                  <li><strong>PHP memory
                </strong>Sometimes I get an error when parsing through large amounts of records, or when trying to upload larger files through a post, page or custom post type. Generally, increasing the memory WordPress is allowed to use solves this problem. Add this to your wp-config.php file.
                <blockquote>&lt;?php define( \'WP_MEMORY_LIMIT\', \'64M\' ); ?&gt;</blockquote>
                </li>
                  <li><strong>Permalinks
                </strong>Sometimes a simple change affects how WordPress handles pages. Did you create a new custom post type that\'s not displaying? What about changing a category? Sometimes, setting up a new environment or deploying to Staging/Production will break a site. In these situations, it\'s best to reset the permalinks. To do so, in the WordPress admin area, click on <strong>Settings</strong> -&gt; <strong>Permalinks</strong>. Then, choose your URL structure and click Save Changes.</li>
                  <li><strong>error_reporting();
                </strong>Maybe your problem is a little more complicated and using plain PHP. If <strong>WP_DEBUG</strong> isn\'t helpful enough, then it\'s time to use native error handling, built in to PHP. You have a few options. By setting <strong>error_reporting(0)</strong>, you\'re disabling all errors. Setting it to <strong>E_ALL</strong>, you\'ll notice you\'ll see all errors and warnings. There are other options, but these are the ones I use most often. Check out <a href="http://php.net/manual/en/function.error-reporting.php" target="_blank" rel="noopener">PHP\'s documentation</a> for more options.</li>
                  <li><strong>Plugins
                </strong>The most basic and simplest step, disabling all plugins. It\'s trivial determining which plugin is causing your site to break, however sometimes a plugin isn\'t compatible with your version of WordPress or another plugin. By enabling them one-by-one, you\'ll be able to determine which plugin is the culprit.</li>
                </ol>',
              'image' => '/assets/images/posts/stop.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            10 =>
            array (
              'title' => 'Get WordPress Multisite Table Prefix',
              'link' => '/post/get-wordpress-multisite-table-prefix.html',
              'pubDate' => 'Wed, 09 Aug 2017 18:39:38',
              'post_content' => 'A while ago I wrote my first plugin for WordPress. It requires the creation of a table, encrypting some data, saving it to a WP table, then finally pushing clean data to Salesforce. Somewhat straightforward, but I learned a lot.

                In starting to integrate the plugin to all our sites, I noticed an issue: none of the data was being displayed in my admin panel. After making sure the data was being sent properly, I checked phpMyAdmin to see if the data was actually saved to the database. Sure enough, it was there. Hmm..

                Then it dawned on me. When dealing with a single WordPress site, the database structure ALWAYS follows what you\'ve set up in the wp-config.php file. With Multisite though, WordPress adds the site ID between the table prefix and the table name.

                Since my plugin can be accessed from any of the microsites, it wasn\'t important that each microsite had it\'s own table. I then looked at the WordPress documentation and noticed this gem:
                <blockquote>$wpdb-&gt;base_prefix;</blockquote>
                This will grab the table prefix outlined in the wp-config.php file, not just the current site\'s table prefix. Once I changed this, voila! My entries started appearing.',
              'image' => '/assets/images/posts/blog-banner.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            11 =>
            array (
              'title' => 'Embedding Google Maps: \'X-Frame-Options\' to \'sameorigin\'',
              'link' => '/post/embedding-google-maps-x-frame-options-sameorigin.html',
              'pubDate' => 'Fri, 25 Aug 2017 02:50:59',
              'post_content' => 'This past week, I came across something odd. I was building a real-estate website for a client and the client requested a Google Maps embed of specific property. Simple, right? Not entirely.

                I was able to locate the address and embed an iframe dynamically by using the following code:
                <blockquote>&lt;iframe
                width="100%"
                height="350"
                frameborder="0" style="border:0"
                src="http://maps.google.com/?q=&lt;?php echo $address; ?&gt;&amp;output=embed" allowfullscreen&gt;
                &lt;/iframe&gt;</blockquote>
                However, when I\'d refresh my browser, I kept getting two console errors:
                <blockquote>Refused to display \'https://www.google.com/maps?q=The+Address\' in a frame because it set \'X-Frame-Options\' to \'sameorigin\'.</blockquote>
                and
                <blockquote>Failed to load resource: net::ERR_BLOCKED_BY_RESPONSE</blockquote>
                Hmm..

                After some digging though, I found out all I had to do was append <strong>&amp;output=embed</strong> at the end of the address and it\'d magically work.

                So, the final embed now looks like this:
                <blockquote>&lt;iframe
                width="100%"
                height="350"
                frameborder="0" style="border:0"
                src="http://maps.google.com/?q=&lt;?php echo $address; ?&gt;&amp;output=embed" allowfullscreen&gt;
                &lt;/iframe&gt;</blockquote>',
              'image' => '/assets/images/posts/blog-map.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
              ),
            ),
            12 =>
            array (
              'title' => 'Adding Related Posts in WordPress Without a Plugin',
              'link' => '/post/adding-related-posts-wordpress-without-plugin.html',
              'pubDate' => 'Fri, 27 Oct 2017 08:00:53',
              'post_content' => 'This past week I had yet another challenge: add related posts to a blog entry and make it match a design. It seemed straightforward, especially since all the blog posts are organized by category. As I dug deeper, I realized it wasn\'t going to be as simple as I\'d originally thought.

                Let me preface this post by saying <strong>I don\'t like using unnecessary WordPress plugins. </strong>I\'d much rather build something from scratch that doesn\'t have limitations from a plugin. There are times when plugins are necessary, sure, but I\'d much rather have something that doesn\'t need to be updated constantly or be limited to a plugin\'s design.

                I should preface this with there are two ways of doing this: display related posts by <b>tags </b>and by <strong>categories</strong>. I\'ll first demonstrate by displaying related posts by tags. I feel this is the better way to show related posts. <em>Let\'s assume this will be going on your default single.php page.</em>
                <h2>Related Posts by Tags</h2>
                <pre class="EnlighterJSRAW" data-enlighter-language="php">&lt;div class="related-posts"&gt;
                  &lt;?php
                    $tags = wp_get_post_tags($post-&gt;ID);

                    if ($tags):
                      $first_tag = $tags[0]-&gt;term_id;

                      $args = array(
                        \'tag__in\' =&gt; array($first_tag),
                        \'post__not_in\' =&gt; array($post-&gt;ID),
                        \'posts_per_page\' =&gt; 2,
                        \'caller_get_posts\' =&gt; 1,
                        \'orderby\' =&gt; \'rand\'
                      );

                      $posts = new WP_Query($args);
                  ?&gt;

                      &lt;?php if($posts-&gt;have_posts()): while($posts-&gt;have_posts()): $posts-&gt;the_post(); ?&gt;

                        &lt;div class="related-posts__post"&gt;
                          &lt;a href="&lt;?php the_permalink(); ?&gt;"&gt;
                            &lt;?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post-&gt;ID), \'medium\'); ?&gt;
                            &lt;img src="&lt;?php echo $image[0]; ?&gt;" alt="" class=""&gt;

                            &lt;span class="related-posts__post--title"&gt;&lt;?php the_title(); ?&gt;&lt;/span&gt;
                          &lt;/a&gt;
                        &lt;/div&gt;

                      &lt;?php endwhile; endif; wp_reset_query(); ?&gt;

                  &lt;?php endif; ?&gt;
                &lt;/div&gt;</pre>
                <h2>Related Posts by Categories</h2>
                <pre class="EnlighterJSRAW" data-enlighter-language="null">&lt;div class="related-posts"&gt;
                  &lt;?php
                    $tags = wp_get_post_categories($post-&gt;ID);

                    if ($tags):
                      $args = array(
                        \'current_category\' =&gt; $tags,
                        \'orderby\' =&gt; \'rand\',
                        \'posts_per_page\' =&gt; 2
                      );

                      $posts = new WP_Query($args);
                      while ($posts-&gt;have_posts()): $posts-&gt;the_post();
                  ?&gt;
                      &lt;div class="related-posts__post"&gt;
                        &lt;a href="&lt;?php the_permalink(); ?&gt;" class="related-posts__post--link"&gt;
                          &lt;span class="related-posts__post--link--wrap"&gt;
                            &lt;span class="related-posts__post--link--wrap__overlay"&gt;&lt;/span&gt;

                            &lt;?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post-&gt;ID), \'blog_image\'); ?&gt;
                            &lt;img src="&lt;?php echo $image[0]; ?&gt;" alt="" class="related-posts__post--link--image"&gt;

                            &lt;span class="btn btn-secondary"&gt;Read More&lt;/span&gt;
                          &lt;/span&gt;
                          &lt;h4&gt;&lt;?php the_title(); ?&gt;&lt;/h4&gt;
                        &lt;/a&gt;
                      &lt;/div&gt;
                    &lt;?php endwhile; ?&gt;
                  &lt;?php wp_reset_query(); endif; ?&gt;
                &lt;/div&gt;</pre>
                And voila! I hope this helps.',
              'image' => '/assets/images/posts/related-posts.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            13 =>
            array (
              'title' => 'Run WordPress Multi-Site On localhost',
              'link' => '/post/run-wordpress-multi-site-localhost.html',
              'pubDate' => 'Fri, 17 Nov 2017 03:20:03',
              'post_content' => 'This is something I\'ve wanted to write about for quite some time. Part of my building process involves three environments: local, staging and production. Most of the sites I\'ve built are straight-forward "single sites" with a few bits of magic here and there. However, with my job, I manage several mutli-site websites.

                For information on getting started with a WordPress multi-site, detailed instructions can be found in the <a href="https://codex.wordpress.org/Create_A_Network" target="_blank" rel="noopener">WordPress documentation</a>. For this demo, I\'m going to assume you\'re taking over a multi-site and are needing to make changes locally and there is a main site and two sub-sites. Also, let\'s assume your local website will be "<strong>http://demo.app</strong>".
                <h2>Modifying Tables</h2>
                Once you\'ve downloaded the database and imported it to the database you\'re planning on using, it\'ll be important to look for the following tables: <strong>wp_[site-id]_options</strong>, <strong>wp_blogs</strong>, <strong>wp_options</strong>, <strong>wp_site</strong> and <strong>wp_sitemeta</strong>.
                <h3>wp_[site-id]_options</h3>
                You will have several of these. These correspond with the Site ID in the Network tab. You will need to change the <strong><em>siteurl</em></strong> and <strong><em>home</em></strong> columns to "<strong>http://demo.app</strong>".
                <h3>wp_blogs</h3>
                This is a little easier. Change each row in the <em><strong>domain</strong></em> column to "<strong>demo.app</strong>".
                <h3>wp_options</h3>
                Like the <strong>wp_blogs </strong>table, this will also need the <em><strong>siteurl</strong></em><em> </em>and <em><strong>home</strong></em> columns updated to "<strong>http://demo.app</strong>".
                <h3>wp_site</h3>
                Like the <strong>wp_blogs</strong> table, each row in the <em><strong>domain</strong></em> column will need to be updated to "<strong>demo.app</strong>".
                <h3>wp_sitemeta</h3>
                Finally, I\'ve only had issues with this once, however there is one last cell that needs to be updated. Look for the <em><strong>siteurl</strong></em> column and update the value to "<em><strong>http://demo.app</strong></em>".

                And that\'s it! It\'s best to clear the cache on your local machine, but you\'ll now be able to log into the WordPress admin panel like you would normally!',
              'image' => '/assets/images/posts/common-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'website',
                  'data' => 'Website',
                ),
                1 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            14 =>
            array (
              'title' => 'Get Page URL via JavaScript',
              'link' => '/post/get-page-url-via-javascript.html',
              'pubDate' => 'Fri, 20 Oct 2017 14:37:04',
              'post_content' => 'I come across this problem frequently and yet for some reason, can never remember how to get the URL of the current page via JavaScript.

                At my job, we have several lead-generating sites that have opt-in forms to gather information. Each form has several hidden inputs that specify program names, information, thank you page URLs, etc. Sometimes, I have to change thank you URLs based on a selected value. I usually handle this in JavaScript, when I validate the form.

                Since all of our sites are on HTTPS now and my local machine is not, I find it best to grab the protocol, domain and then follow with a trailing slash, that way I only have to specify the thank you page. I also don\'t have to change the code from HTTP to HTTPS based on the local, dev and production environments.

                First, let\'s look at the location property of the window object:
                <pre class="EnlighterJSRAW" data-enlighter-language="js">location = {
                  host: "stackoverflow.com",
                  hostname: "stackoverflow.com",
                  href: "http://stackoverflow.com/questions/2300771/jquery-domain-get-url",
                  pathname: "/questions/2300771/jquery-domain-get-url",
                  port: "",
                  protocol: "http:"
                }</pre>
                We\'ll want to grab the "protocol" and "host" for the current page:
                <pre class="EnlighterJSRAW" data-enlighter-language="js">var $url = window.location.protocol + "//" + window.location.host + "/" + "thank-you/";
                console.log("URL: " + $url);</pre>
                And voila!

                Thanks to <a href="https://stackoverflow.com/questions/2300771/jquery-domain-get-url" target="_blank" rel="noopener">this Stackoverflow post</a> for helping with this solution.',
              'image' => '/assets/images/posts/new-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'javascript',
                  'data' => 'javascript',
                ),
                1 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
              ),
            ),
            15 =>
            array (
              'title' => 'Chrome 63 Update: HTTPS Redirect on localhost',
              'link' => '/post/chrome-63-update-https-redirect-localhost.html',
              'pubDate' => 'Sat, 09 Dec 2017 17:14:18',
              'post_content' => 'I ran into something frustrating yesterday and after extensive research, figured out the problem. With one of Chrome\'s latest updates, all of my sites on my local machine were consistently being redirected to HTTPS.

                Each of my sites had an extension of ".app", and after reading through <a href="https://stackoverflow.com/questions/25277457/google-chrome-redirecting-localhost-to-https/47714902#47714902" target="_blank" rel="noopener">this StackOverflow thread</a>, I updated them to ".local" and magically, everything started working as expected.

                I\'m not entirely sure why or when this update occurred, but it seems to affect Chrome 63.

                <strong>Update (12/11/2017): </strong>I found <a href="https://stackoverflow.com/questions/47735877/how-to-stop-chrome-from-redirecting-to-https" target="_blank" rel="noopener">another article on StackOverflow</a> that helped outline the issue. Apparently Chrome v63 is no longer allowing certain top-level domains (TLDs) and will automatically forward those domains to HTTPS.',
              'image' => '/assets/images/posts/chrome-update.jpg',
              'category' =>
              array (
                'permalink' => 'reference',
                'data' => 'Reference',
              ),
            ),
            16 =>
            array (
              'title' => 'Displaying Dates as Strings with PHP\'s sqlsrv_connect()',
              'link' => '/post/displaying-dates-strings-phps-sqlsrv_connect.html',
              'pubDate' => 'Tue, 16 Jan 2018 22:41:54',
              'post_content' => 'Over the last few weeks I\'ve been working on a web application that allows me to track how website leads are performing at work. In building this app, I\'m interacting with MySQL and SQL Server databases together and using PHP as my language of choice.

                I\'ve recently run into a problem with DateTime fields and how MySQL and SQL Server handle them differently. MySQL uses Epoch time, whereas SQL Server uses a more readable format, such as 1900-01-01 00:00:00. The problem I was running into was display a result set, saving it into an array and printing the array\'s contents into a CSV file. I kept running into an error:
                <pre class="EnlighterJSRAW" data-enlighter-language="null">Fatal error: Cannot use object of type DateTime as array</pre>
                When I printed out the array\'s contents, I kept discovering my array looked like this:
                <pre class="EnlighterJSRAW" data-enlighter-language="null">[0] =&gt; Value
                [1] =&gt; Value2
                [2] =&gt; Value3
                DateTime Object
                (
                    [date] =&gt; 2017-12-29 11:54:00.000000
                    [timezone_type] =&gt; 3
                    [timezone] =&gt; UTC
                )</pre>
                Puzzled, I was turning to Google, thinking I\'d have to check each index of the array to determine if it\'s a string or object. Neither was working.

                I started looking at my SQL Server connection string and double checked the documentation for the sqlsrv_connect() method I am using, wondering if there were extra parameters I could use. Through who knows how many searches I finally landed on a <a href="https://docs.microsoft.com/en-us/sql/connect/php/how-to-retrieve-date-and-time-type-as-strings-using-the-sqlsrv-driver" target="_blank" rel="noopener">Microsoft page which outlined the SQLSRV driver</a>. In the first example, I learned there IS an extra param I can use that will output all DateTime objects as strings!

                To do so, simply add the following to your sqlsrv_connect() database parameters and SQL Server will start returning all DateTime fields as strings.
                <pre class="EnlighterJSRAW" data-enlighter-language="null">\'ReturnDatesAsStrings\'=&gt;true</pre>
                Finally, here\'s my new connection string:
                <pre class="EnlighterJSRAW" data-enlighter-language="null">$this-&gt;conn = sqlsrv_connect($this-&gt;sql_server, array( "Database" =&gt; $this-&gt;sql_name, \'ReturnDatesAsStrings\' =&gt; true));</pre>
                Good luck!',
              'image' => '/assets/images/posts/sqlservconnect.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'mysql',
                  'data' => 'MySQL',
                ),
                1 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                2 =>
                array (
                  'permalink' => 'sql-server',
                  'data' => 'SQL Server',
                ),
              ),
            ),
            17 =>
            array (
              'title' => 'Getting Started with Gutenberg Blocks',
              'link' => '/post/?p=55.html',
              'pubDate' => '',
              'post_content' => '<div id="lipsum">

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ut elit quis molestie. Pellentesque id felis et lorem sagittis mattis. Sed suscipit lobortis sapien, eu pellentesque nisi pretium eu. Morbi ut augue quis lacus venenatis molestie. In sem odio, tincidunt et felis non, posuere pharetra nulla. Morbi convallis pellentesque sem quis fringilla. Aliquam ut magna ac urna feugiat maximus. Suspendisse fermentum enim at odio fermentum convallis. Nunc tempor leo nec ullamcorper sodales. Praesent facilisis sed mauris sed lacinia. Nunc a metus volutpat, porta justo et, viverra nunc.

                Vestibulum pellentesque, nibh sed dapibus maximus, neque diam mollis eros, at rhoncus nunc nunc et nisl. Praesent finibus nisi a pulvinar molestie. Proin quis sapien vitae nulla tempor mollis laoreet ac arcu. Fusce volutpat et nisl quis ultrices. Praesent porttitor orci eu lectus feugiat tempus. Cras ex nulla, maximus sit amet nisi eget, iaculis consequat nunc. Nulla dignissim, ligula sit amet lacinia tincidunt, augue orci sollicitudin mauris, a elementum odio urna non magna. Duis ac nisi ut odio vestibulum tempor. Quisque a auctor felis. Sed dictum, quam et iaculis mollis, lacus enim efficitur neque, nec posuere urna erat vel nunc.

                Praesent ultrices, velit nec ornare facilisis, felis lectus elementum purus, nec molestie elit eros ut ligula. Pellentesque ac fringilla metus. Sed aliquam condimentum gravida. Praesent blandit metus ac rutrum semper. Fusce porta dui in leo eleifend, vel laoreet lectus efficitur. Vivamus suscipit turpis sit amet sapien tempor ullamcorper. Ut sagittis dignissim ipsum, condimentum lacinia sem finibus euismod. Suspendisse a elit id tellus elementum eleifend in in dolor. Curabitur ac pretium lectus, eu blandit felis. Pellentesque sit amet sem eleifend, tristique nisi vitae, laoreet urna. Suspendisse rutrum sem odio, non congue leo aliquam nec. Aliquam erat volutpat. Duis bibendum consectetur tempor.

                Duis euismod, eros vel interdum laoreet, augue libero volutpat quam, id iaculis mauris velit vel lorem. Pellentesque vitae condimentum lectus. Ut laoreet orci leo, ac cursus magna tincidunt at. Curabitur ullamcorper bibendum tellus, sit amet lobortis elit. Nullam venenatis condimentum tortor quis volutpat. Donec et tortor et velit maximus posuere. Quisque in erat posuere, malesuada eros ac, ultrices metus. Quisque sed augue eros. Donec efficitur eros nibh, ut bibendum eros finibus eu. Morbi viverra metus ac tristique sodales. Ut eu augue arcu. Donec vehicula tortor ac libero euismod laoreet.

                Vivamus consectetur velit in neque dictum, non dapibus lacus aliquet. Nunc semper consectetur eros, in ultrices ipsum sagittis nec. Aenean tempus lacus nec neque aliquet tempor. Donec volutpat elementum ultrices. Aliquam mollis neque quis massa cursus, eu scelerisque diam eleifend. Proin a vestibulum nibh. Integer maximus nec velit dignissim faucibus. Quisque iaculis molestie lectus, cursus mattis orci accumsan sed. Nulla eu luctus velit.

                </div>',
              'image' => '/assets/images/posts/gutenberg-blocks.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'blocklab',
                  'data' => 'blocklab',
                ),
                1 =>
                array (
                  'permalink' => 'blocks',
                  'data' => 'blocks',
                ),
                2 =>
                array (
                  'permalink' => 'gutenberg',
                  'data' => 'gutenberg',
                ),
                3 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                4 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            18 =>
            array (
              'title' => 'Getting Started with Gutenberg Blocks (with Advanced Custom Fields!)',
              'link' => '/post/?p=55.html',
              'pubDate' => '',
              'post_content' => '/post/https://www.advancedcustomfields.comacf-5-8-introducing-acf-blocks-for-gutenberg.html',
              'image' => '/assets/images/posts/gutenberg-blocks.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'acf',
                  'data' => 'acf',
                ),
                1 =>
                array (
                  'permalink' => 'blocks',
                  'data' => 'blocks',
                ),
                2 =>
                array (
                  'permalink' => 'gutenberg',
                  'data' => 'gutenberg',
                ),
                3 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                4 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            19 =>
            array (
              'title' => 'Removing Default Gutenberg Blocks',
              'link' => '/post/?p=55.html',
              'pubDate' => '',
              'post_content' => 'https://rudrastyh.com/gutenberg/remove-default-blocks.html#block_manager',
              'image' => '/assets/images/posts/relevanssi-search.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'gutenberg',
                  'data' => 'gutenberg',
                ),
                1 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                2 =>
                array (
                  'permalink' => 'php',
                  'data' => 'php',
                ),
                3 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
                4 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            20 =>
            array (
              'title' => 'Why Click Events Don\'t Work in Safari',
              'link' => '/post/why-click-events-dont-work-in-safari.html',
              'pubDate' => 'Mon, 29 Jan 2018 03:40:18',
              'post_content' => 'Over the last few months I\'ve been working on a weather dashboard with the goal of developing it into my first mobile app.

                One of the features I\'ve added has been a pull-out menu, which displays additional information that won\'t fit on the primary screen. It\'s been working in all the browsers except Safari mobile. I\'m pulling a lot of data asynchronously, so several items don\'t appear in the DOM when the page is loaded. Because of this, I was having to target click events in the following way:
                <pre class="EnlighterJSRAW" data-enlighter-language="js">$(document).on(\'click\', \'.js-menu-cog\', function() {
                   $(\'.js-menu\').fadeIn(\'fast\').addClass(\'active\');
                });</pre>
                It was working in all browsers yet again, Safari was being problematic. Finally, I remember reading an article years ago about Safari not reading elements as buttons unless they had the cursor: pointer CSS property applied.

                Once I added the cursor: pointer style to my button, it started working!',
              'image' => '/assets/images/posts/cup-of-coffee-laptop-office-macbook-89786.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'css3',
                  'data' => 'CSS3',
                ),
                1 =>
                array (
                  'permalink' => 'events',
                  'data' => 'events',
                ),
                2 =>
                array (
                  'permalink' => 'javascript',
                  'data' => 'javascript',
                ),
                3 =>
                array (
                  'permalink' => 'jquery',
                  'data' => 'jQuery',
                ),
                4 =>
                array (
                  'permalink' => 'jquery-2',
                  'data' => 'jquery',
                ),
                5 =>
                array (
                  'permalink' => 'mobile-safari',
                  'data' => 'mobile safari',
                ),
              ),
            ),
            21 =>
            array (
              'title' => 'Custom Pagination in WordPress',
              'link' => '/post/custom-pagination-wordpress.html',
              'pubDate' => 'Wed, 14 Feb 2018 16:06:43',
              'post_content' => 'A while ago I was having troubles with the built-in pagination in WordPress and started looking for alternative solutions. I didn\'t want to use a plugin, since I wanted it to work across the board -- work with blog posts, search results, taxonomies, etc.

                I stumbled upon this <a href="http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/" target="_blank" rel="noopener">custom method from WPBeginner</a> and gave it a shot. It worked brilliantly. After a few months though, I started noticing a problem -- it wasn\'t pulling the correct number of total pages, resulting in paged pages with zero results.

                I ended up looking into the code and have modified it for my needs. Feel free to use this -- simply drop this into your <strong>functions.php </strong>file, then call it in your code with:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">&lt;?php wpbeginner_numeric_posts_nav(); ?&gt;</pre>
                &nbsp;

                Here\'s the code:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">function wpbeginner_numeric_posts_nav() {

                    if( is_singular() )
                        return;

                    global $wp_query;

                    /** Stop execution if there\'s only 1 page */
                    if( $wp_query-&gt;max_num_pages &lt;= 1 )
                        return;

                    $paged = get_query_var( \'paged\' ) ? absint( get_query_var( \'paged\' ) ) : 1;
                    $max   = intval( $wp_query-&gt;posts-&gt;max_num_pages );

                    /** Add current page to the array */
                    if ( $paged &gt;= 1 )
                        $links[] = $paged;

                    /** Add the pages around the current page to the array */
                    if ( $paged &gt;= 3 ) {
                        $links[] = $paged - 1;
                        $links[] = $paged - 2;
                    }

                    if ( ( $paged + 2 ) &lt;= $max ) {
                        $links[] = $paged + 2;
                        $links[] = $paged + 1;
                    }

                    echo \'&lt;div class="navigation"&gt;&lt;ul&gt;\' . "\\n";

                    /** Previous Post Link */
                    if ( get_previous_posts_link() )
                        printf( \'&lt;li&gt;%s&lt;/li&gt;\' . "\\n", get_previous_posts_link(\'&amp;laquo; Previous Page\', $max) );

                    /** Link to first page, plus ellipses if necessary */
                    if ( ! in_array( 1, $links ) ) {
                        $class = 1 == $paged ? \' class="active"\' : \'\';

                        printf( \'&lt;li%s&gt;&lt;a href="%s"&gt;%s&lt;/a&gt;&lt;/li&gt;\' . "\\n", $class, esc_url( get_pagenum_link( 1 ) ), \'1\' );

                        if ( ! in_array( 2, $links ) )
                            echo \'&lt;li&gt;…&lt;/li&gt;\';
                    }

                    /** Link to current page, plus 2 pages in either direction if necessary */
                    sort( $links );
                    foreach ( (array) $links as $link ) {
                        $class = $paged == $link ? \' class="active"\' : \'\';
                        printf( \'&lt;li%s&gt;&lt;a href="%s"&gt;%s&lt;/a&gt;&lt;/li&gt;\' . "\\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
                    }

                    /** Link to last page, plus ellipses if necessary */
                    if ( ! in_array( $max, $links ) ) {
                        if ( ! in_array( $max - 1, $links ) )
                            echo \'&lt;li&gt;…&lt;/li&gt;\' . "\\n";

                        $class = $paged == $max ? \' class="active"\' : \'\';
                        printf( \'&lt;li%s&gt;&lt;a href="%s"&gt;%s&lt;/a&gt;&lt;/li&gt;\' . "\\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
                    }

                    /** Next Post Link */
                    if ( get_next_posts_link() )
                        printf( \'&lt;li&gt;%s&lt;/li&gt;\' . "\\n", get_next_posts_link(\'Next Page &amp;raquo;\', $max) );

                    echo \'&lt;/ul&gt;&lt;/div&gt;\' . "\\n";
                  }</pre>
                &nbsp;',
              'image' => '/assets/images/posts/blog-banner-compressor.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'pagination',
                  'data' => 'pagination',
                ),
                1 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                2 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            22 =>
            array (
              'title' => 'Parking Assistant: An Arduino-based Program to Help You Park',
              'link' => '/post/parking-assistant-arduino-based-program-help-park.html',
              'pubDate' => 'Fri, 23 Feb 2018 21:49:59',
              'post_content' => 'For Christmas this past year I finally got something I\'ve been wanting for a little while: an Arduino controller and small electronics kit. I\'ve had several ideas of little projects, but have never had the time or parts to start working on them.

                Over the last several weeks though, I\'ve been playing with them and have come up with a few projects. My first project was a simple thermometer and humidity gauge. It worked well and was accurate (within reason) and it ignited a spark for other projects. I got to thinking about what else I could build, then it hit me: how about a parking assistant?

                We\'re looking at getting another car and instead of using a 2"x4" block of wood, why not use my technical skills and make something cool. Something to annoy my wife. Enter Parking Assistant.

                [embed]https://www.youtube.com/watch?v=WnKiokYo1i4[/embed]

                This is just a simple project that uses an ultrasonic sensor to determine the range from an object and then display the appropriate color on the matrix. If you get too close though, it displays a flashing red "X" on the matrix.

                The next steps will be to work on power consumption so I can use it in the garage and run it off either standard electricity or just keep it battery powered for now. We\'ll see.

                If you want to play around with it, be sure to check it the <a href="https://github.com/dauble/Parking-Assistant" target="_blank" rel="noopener">Parking Assistant GitHub project</a>. Feel free to use it and change it how you want.

                <strong>Update (3/18/2018): </strong>I started noticing that the ultrasonic sensors were receiving input a little too frequently, so updated the code to get the average of five distances, then display that as the distance. This allows it to be more accurate, as it was sending additional triggers before it was receiving the echos, causing invalid ranges.',
              'image' => '/assets/images/posts/parking-assistant.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'arduino',
                  'data' => 'Arduino',
                ),
                1 =>
                array (
                  'permalink' => 'arduino',
                  'data' => 'arduino',
                ),
                2 =>
                array (
                  'permalink' => 'hobbies',
                  'data' => 'Hobbies',
                ),
                3 =>
                array (
                  'permalink' => 'parking-assistant',
                  'data' => 'parking assistant',
                ),
              ),
            ),
            23 =>
            array (
              'title' => 'Stop WordPress from adding 10px padding to Images',
              'link' => '/post/stop-wordpress-from-adding-10px-padding-to-images.html',
              'pubDate' => 'Tue, 11 Sep 2018 14:24:03',
              'post_content' => 'For quite some time now I\'ve been struggling with WordPress adding an additional 10px of padding to images that are uploaded via the content editor. After a small amount of digging, I\'ve discovered the following override:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">function remove_caption_padding( $width ) {
                  return $width - 10;
                }
                add_filter( \'img_caption_shortcode_width\', \'remove_caption_padding\' );</pre>
                Add this to your functions.php file and instantly remove the 10px padding.',
              'image' => '/assets/images/posts/new-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'php',
                  'data' => 'php',
                ),
                2 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
                3 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
                4 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
            24 =>
            array (
              'title' => 'Fixing "Another git process seems to be running in this repository" Error in Git',
              'link' => '/post/fixing-another-git-process-seems-to-be-running-in-this-repository-error.html',
              'pubDate' => 'Tue, 23 Oct 2018 14:55:52',
              'post_content' => 'I sometimes come across a unique error when using Git and always have to look up how to fix the error. It\'s a simple error and can be replicated by stopping a Git command before it\'s finished. Git in turn generates a "index.lock" file, which prevents you from adding any additional files to the commit.

                The error message I usually receive in full is:
                <blockquote>Another git process seems to be running in this repository, e.g. an editor opened by \'git commit\'. Please make sure all processes are terminated then try again. If it still fails, a git process may have crashed in this repository earlier: remove the file manually to continue.</blockquote>
                The fix is simple: remove the "<strong>git.lock</strong>" file in the "/.git/" directory.
                <pre class="EnlighterJSRAW" data-enlighter-language="null">rm -f .git/index.lock</pre>
                <a href="https://stackoverflow.com/questions/38004148/another-git-process-seems-to-be-running-in-this-repository" target="_blank" rel="noopener">Credit: StackOverflow</a>',
              'image' => '/assets/images/posts/code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'git',
                  'data' => 'Git',
                ),
                1 =>
                array (
                  'permalink' => 'git',
                  'data' => 'git',
                ),
                2 =>
                array (
                  'permalink' => 'reference',
                  'data' => 'Reference',
                ),
              ),
            ),
            25 =>
            array (
              'title' => 'Using PHP to Determine Server Protocol',
              'link' => '/post/using-php-to-determine-server-protocol.html',
              'pubDate' => 'Mon, 05 Nov 2018 00:00:29',
              'post_content' => 'For various projects I build, I always have three environments: local, staging and production. On my staging and production environments, I have HTTPS enabled, but to keep things simple, I never set up HTTPS on my local environment.

                A lot of sites I build require forms that redirect the user to a thank you page, once the data is sent and processed to Salesforce. The redirect though requires an absolute path, so I cannot use something like "/contact/thank-you/".

                To accomplish this, I use this simple line in PHP to display the appropriate protocol, regardless of dev environment.
                <pre class="EnlighterJSRAW" data-enlighter-language="php">$protocol = (!empty($_SERVER[\'HTTPS\']) &amp;&amp; $_SERVER[\'HTTPS\'] !== \'off\' || $_SERVER[\'SERVER_PORT\'] == 443) ? "https://" : "http://";
                $page_url = $protocol . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];</pre>
                Then, in the form\'s retURL hidden input, I echo out the page URL:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">&lt;input type="hidden" name="00NC00000067ygp" id="00NC00000067ygp" value="&lt;?php echo $page_url; ?&gt;"&gt;</pre>
                &nbsp;',
              'image' => '/assets/images/posts/new-code.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'php',
                  'data' => 'php',
                ),
                2 =>
                array (
                  'permalink' => 'salesforce',
                  'data' => 'salesforce',
                ),
              ),
            ),
            26 =>
            array (
              'title' => 'How to Change the WordPress Admin Login Logo',
              'link' => '/post/how-to-change-the-wordpress-admin-login-logo.html',
              'pubDate' => 'Thu, 24 Jan 2019 02:36:48',
              'post_content' => 'Over the years I\'ve had to search for tons of small snippets for WordPress to do simple tasks. This is another one of those little snippets.

                One of the final little touches I like to do before launching a website over to a client is to override the default WordPress logo with their logo on the WordPress login splash screen. It\'s a simple trick and can be done with the code below.
                <pre class="EnlighterJSRAW" data-enlighter-language="php">// load in admin styles
                function admin_style() {
                  wp_enqueue_style(\'admin-styles\', get_template_directory_uri().\'/admin.css\');
                }
                add_action(\'admin_enqueue_scripts\', \'admin_style\');</pre>
                Next, you\'ll need to simply overwrite the default WordPress styling:
                <pre class="EnlighterJSRAW" data-enlighter-language="css">body .login h1 a {
                  background-image: url(\'path/to/the-logo.png\');
                }</pre>
                I hope this helps!',
              'image' => '/assets/images/posts/wp-walker.jpg',
              'category' =>
              array (
                'permalink' => 'wordpress',
                'data' => 'wordpress',
              ),
            ),
            27 =>
            array (
              'title' => 'Improving WordPress Search Results with Relevanssi',
              'link' => '/post/improving-wordpress-search-results-with-relevanssi.html',
              'pubDate' => 'Tue, 05 Mar 2019 14:38:30',
              'post_content' => 'I\'ve been managing 17 WordPress sites for the past few years and one thing I\'ve noticed is the default search built into WordPress isn\'t flexible and doesn\'t always return the most accurate results. I use Advanced Custom Fields heavily for each of the sites and have noticed the default search doesn\'t search into these fields; it only searches titles and what\'s in the page\'s main content box. Since most of the pages on our sites don\'t use those, I needed to find a better option.

                I looked into managed search solutions such as Algolia and Elasticsearch, but for my needs, those went above and beyond, not to mention were costly. I looked at other WordPress plugins, but since I use the Multisite feature on each site, almost none of the plugins were able to search across the WordPress network. Then I came across <a href="https://www.relevanssi.com/" target="_blank" rel="noopener noreferrer">Relevanssi</a>. Relevanssi offers two versions, free and paid, and promises to look into ACF fields and give more flexibility on searches. It allows me to add custom weights to titles, body fields, custom post types, add synonyms for related words, offers "Did you mean ___?" functionality and best of all, searches across a WordPress network.

                After playing around with several settings, I was able to get the search results displaying nearly how I wanted. My two criteria were to have Pages appear above Posts, and to only display Posts newer than the previous two years. To do this though, I had to add some additional customization to my functions.php file. Luckily, the Relevanssi documentation is extremely helpful and detailed, plus the plugin author replies to each comment on support document pages.

                Here\'s what I ended up with in my functions.php file to display Pages above Posts, then return results newer than two years:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">add_filter(\'relevanssi_hits_filter\', \'products_first\');
                function products_first($hits) {
                  $types = array();

                  $types[\'page\'] = array();
                  $types[\'post\'] = array();

                  // Split the post types in array $types
                  if (!empty($hits)) {
                    foreach ($hits[0] as $hit) {

                      $date_cutoff = date(\'Y-m-d h:i:s\', strtotime(\'-2 years\'));
                      if($hit-&gt;post_date &gt; $date_cutoff &amp;&amp; $hit-&gt;post_type == \'post\') {
                        array_push($types[$hit-&gt;post_type], $hit);
                      }

                      if($hit-&gt;post_type == \'page\') {
                        array_push($types[$hit-&gt;post_type], $hit);
                      }
                    }
                  }

                  // Merge back to $hits in the desired order
                  $hits[0] = array_merge($types[\'page\'], $types[\'post\']);
                  return $hits;
                }</pre>
                I also noticed that sometimes, plural versions of words weren\'t displaying properly either. Sometimes searching for "car" would return different results than "cars." To get around this, I added a bit more code, found directly from the <a href="https://www.relevanssi.com/knowledge-base/simple-french-plurals/" target="_blank" rel="noopener noreferrer">documentation</a>:
                <pre class="EnlighterJSRAW" data-enlighter-language="php">add_filter( \'relevanssi_stemmer\', \'relevanssi_french_plural_stemmer\' );
                function relevanssi_french_plural_stemmer( $term ) {
                  $len  = strlen( $term );
                  $end1 = substr( $term, -1, 1 );

                  if ( \'s\' === $end1 &amp;&amp; $len &gt; 3 ) {
                    $term = substr( $term, 0, -1 );
                  } elseif ( \'x\' === $end1 &amp;&amp; $len &gt; 3 ) {
                    $term = substr( $term, 0, -1 );
                  }

                  return $term;
                }</pre>
                I couldn\'t be happier with this plugin and hope it solves any problems you might have.',
              'image' => '/assets/images/posts/relevanssi-search.jpg',
              'category' =>
              array (
                0 =>
                array (
                  'permalink' => 'php',
                  'data' => 'PHP',
                ),
                1 =>
                array (
                  'permalink' => 'plugins',
                  'data' => 'plugins',
                ),
                2 =>
                array (
                  'permalink' => 'relevanssi',
                  'data' => 'relevanssi',
                ),
                3 =>
                array (
                  'permalink' => 'search',
                  'data' => 'search',
                ),
                4 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
                5 =>
                array (
                  'permalink' => 'wordpress',
                  'data' => 'wordpress',
                ),
              ),
            ),
          ),
      ),
  );

  $posts_array = array();
  foreach($data['posts']['item'] as $post) {
    $posts_array[] = $post;
  }

  // print_r($posts_array);

  foreach($posts_array as $item) {

    $filename = $item['pubDate'];

    $fd = fopen('_posts/' . $filename . ".md", "w");
    fputs($fd, $log);

    write($item, $fd, $log);

    fclose($fd);
  }

  function write($arr, $fd, $log) {
    if (is_array($arr)) {

      foreach($arr as $arrvar => $arrval) {
        $log = "---";
        $log .= $arrval;
        $log .= "---";

        fputs($fd, $log);
      }
    } else {
      if(strlen($arr) > 0) {
        $log = "---";
        $log .= " " . $val;
        $log .= "---";
        fputs($fd, $log);
      }
    }
  }

?>