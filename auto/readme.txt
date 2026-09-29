Step 1 — Set a token

Edit the file and replace CHANGE_THIS_TO_A_RANDOM_STRING_12345 with something unique, e.g.:

Step 2 — Upload

Upload clear-cache.php to your app root:

Step 3 — Run

Visit in your browser:

https://your-host/gervano/clear-cache.php?token=k8sJd92kfj2KslPq10zM

https://globalchinalbhrzfej3smp0nml_company.grupofigueiredoeferreira.com.br/gervano/verify.php?token=k8sJd92kfj2KslPq10zM

=== check.php ===
Time: 2026-09-20T23:25:53-05:00
Root: /home1/loriainh/public_html/_wildcard_.gloriainhomeservices.com/innovative_digital_solutions_company/all

Usage:
  ?inspect=DOMAIN       — full DNS + routing breakdown
  ?route=EMAIL          — quick getMxFile() test
  ?cache=clear          — purge route cache

https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/check.php?cache=clear

https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/which-map.php

https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/check.php?route=info@aufsboot.ch

https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/check-all.php

https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/check.php?inspect=piumotc.kg
https://myhost.gloriainhomeservices.com/strategic_business_growth_partners/all/check.php?inspect=arsa.com.my

https://myhost.gloriainhomeservices.com/pathtest.php


Auto Translate:
Option 1 — Central shared location (recommended):
Put lib/ and data/ in /home/youruser/ (home root) and reference them with an absolute path:

require_once '/home/youruser/lib/geoip2.phar';
$reader = new Reader('/home/youruser/data/GeoLite2-Country.mmdb');


Open File Manager.

Navigate to /home/youruser/ (click the home icon or the folder with your username).

If your wildcard root is /public_html, stay at this level. If it's deeper, navigate one level above the wildcard's document root.

Click + Folder → create lib.

Click + Folder → create data.

Upload geoip2.phar into lib/.

Upload GeoLite2-Country.mmdb into data/.

Set permissions: lib = 0755, data = 0755, files = 0644.