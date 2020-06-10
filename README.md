# Wordpress Hreflang plugin

Adds [Hreflang](https://en.wikipedia.org/wiki/Hreflang) link attributes to <head> based on local site syndication metadata save by Extendable Aggregator plugin.

## Setup

The plugin doesn't have settings, enable it.

In case of any hreflangs issues inspect ‘ea-syncable-post-synced-to-‘ meta on global and ‘ea-syncable-import-src-id-canonical’ on local sites. They should match for hreflang links to be created

If not:

When we want to reconnect existing page from global site with new one on local site (or new page on global with existing page on local) we must change meta values on both pages: 'ea-syncable-post-synced-to- ' on global and 'ea-syncable-import-src-id-canonical' existing locals sites. If proper 'ea-syncable-post-synced-to- ' doesn’t exist we can create this meta keys by syndicate that page to local site (remember to delete 'draft' site from local sites!).

Also when we want to replace local page to the new one we must change meta values on both global and local sites.


