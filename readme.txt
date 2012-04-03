=== Membee Login ===
Contributors: daleab
Donate link: http://example.com/
Tags: membership, login, members, membee
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 1.0.3

Plugin to add member authentication via Membee's Single Sign-On service.

== Description ==

This plug-in allows a WordPress developer to utilize the popular membership management system, [Membee](http://www.membee.com/) to control user access to a WordPress site. For a membership based organizations, this plug-in extends to WordPress the ability to manage access and roles within the member's record in Membee and then use the roles to permit access to content in a WordPress site. Since Membee allows for the creation of unlimited groups and committees, each with their own unlimited access roles, the WordPress developer has very granular control over access to content. For the client membership based organization, they gain the desired ability manage all aspects of their relationship with their member, including website content access in one place, Membee.

For example, the assignment a "BoardOnly" role to the "Board of Directors" committee in Membee would restrict access to website content secured in WordPress using the "BoardOnly" role. All roles created and managed in Membee are passed to WordPress via this plug-in so there are no additional steps to insure the roles are the same in Membee and the WordPress site. Since committee members inherit the access role from the committee, adding people to the committee or removing them instantly grants or removes the roll respectively. For the WordPress develop, this means one time only deployment of the functionality without the need to need to constantly revise their site as their client organization adds, drops, and revises groups and committees in Membee.

The plug-in also extends Membee's support for it's Social Login feature. This feature allows an organization to activate support for social network login in Membee to permit members to use their social network identity (Facebook, Twitter, Google, Yahoo, and LinkedIn) to access restricted website content and features. The plug-in allows the WordPress developer to permit the use of the social network identities by members to access content the developer has restricted access to. To extend the example above, a member serving on the Board of Directors could access the site content restricted with the "BoardOnly" access role using their Facebook username and password.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`