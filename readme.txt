=== Last Post Redirect ===
Contributors: eflyjason
Donate link: http://www.arefly.com/donate/
Tags: Redirect, Post
Requires at least: 3.0
Tested up to: 3.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirect you to the latest post of your blog by a direct link.

== Description ==

Do you want other people (From Facebook, Twitter, etc.) can visit the latest post of your blog just directly by a link?

Install this plugin now!

This plugin allow you to redirect you to the latest post of your blog by http://YOUR_BLOG_URL/?lastpost

You may also change "lastpost" to be your own word!

Live Demo: [Click Here](http://www.arefly.com/?lastpost) (You will go to the latest post of my blog)

中文介紹請看[這裏](http://www.arefly.com/last-post-redirect/)

= Translators =

* Chinese, Simplified (zh_CN) - [Arefly](http://www.arefly.com/)
* Chinese, Traditional (zh_TW) - [Arefly](http://www.arefly.com)
* English (en_US) - [Arefly](http://www.arefly.com)

If you have created your own language pack, or have an update of an existing one, you can send [gettext PO and MO files](http://codex.wordpress.org/Translating_WordPress) to [Arefly](http://www.arefly.com/about/) so that I can bundle it into Last Post Redirect. You can download the latest [POT file](http://plugins.svn.wordpress.org/last-post-redirect/trunk/lang/last-post-redirect.pot).

== Installation ==

###Updgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Installing The Plugin###

Extract all files from the ZIP file, making sure to keep the file structure intact, and then upload it to `/wp-content/plugins/`.

This should result in the following file structure:

`- wp-content
    - plugins
        - last-post-redirect
            - lang
                | last-post-redirect-zh_CN.mo
                | last-post-redirect-zh_CN.po
                | last-post-redirect-zh_TW.mo
                | last-post-redirect-zh_TW.po
                | last-post-redirect.pot
                | readme.txt
            | last-post-redirect.php
            | LICENSE
            | license.txt
            | options.php
            | readme.txt`

Then just visit your admin area and activate the plugin.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Frequently Asked Questions ==

= I cannot active this plugin, what can i do? =

You may post on the [support forum of this plugin](http://wordpress.org/support/plugin/last-post-redirect/) to ask for help.

= I love this plugin! Can I donate to you? =

YES! I do this in my free time and I appreciate all donations that I get. It makes me want to continue to update this plugin. You can find more details on [About Me Page](http://www.arefly.com/about/).

== Changelog == 

**Version 1.5.4**

* Update Translate.

**Version 1.5.3**

* Update Readme File.

**Version 1.5 to 1.5.2**

* Remove All Remote Load File.

**Version 1.4.9**

* Fix Bug of `define`. (Thanks to cmhello)

**Version 1.4.8**

* Add Banners.

**Version 1.4.7**

* Add Plugin Language Text Domain Information.

**Version 1.4.5 to 1.4.6**

* Update Readme File.

**Version 1.4.1 to 1.4.4**

* Fix Bugs.

**Version 1.4**

* Add Localize Support. (en_US, zh_CN and zh_TW)

* Fix Bugs.

**Version 1.3.1**

* Fix Bugs.

**Version 1.3**

* Get your last post URL by using function `get_last_post_redirect_url()`

* Fix Bugs.

**Version 1.2.3**

* Fix Bugs.

**Version 1.2.2**

* Add "My Plugins List".

**Version 1.2.1**

* Update readme file.

**Version 1.2**

* Add the options of post status and post type.

* Fix lots of Bugs.

**Version 1.1.1 to 1.1.3**

* Fix Bugs in some hosts. (Thanks to [fruityoaty](http://wordpress.org/support/topic/plugin-could-not-be-activated-because-it-triggered-a-fatal-error-120))

**Version 1.1**

* Add Option Page.

* Fix Bugs.

**Version 1.0**

* Initial release.

== Upgrade Notice ==

See Changelog.