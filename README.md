# Wordpress Hreflang plugin

Adds [Hreflang](https://en.wikipedia.org/wiki/Hreflang) link attributes to <head> based on local site syndication metadata save by Extendable Aggregator plugin.

## Setup

The plugin doesn't have settings, enable it.

Wordpress Hreflang plugin required active Extendable Aggregator plugin to work.

When we want replace existing site on global site by new we must change meta values on new sites: 'ea-syncable-post-synced-to- ' on global and 'ea-syncable-import-src-id-canonical' existing locals sites. We can create this meta keys by syndicate that site to local site (remember to delete 'draft' site from local sites!).

Also when we want replace local site to new we must change meta values on global and local site.


