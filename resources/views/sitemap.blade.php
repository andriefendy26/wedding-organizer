<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->


<url>
  <loc>{{ url('/') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>{{ url('/tentang') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/layanan') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/galery') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/portofolio') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/team') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/artikel') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/faq') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/kalender') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/kontak') }}</loc>
  <lastmod>2025-08-11T19:44:54+00:0{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}0</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>htt{{ url('/layananwedding') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/layanandekorasi') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('/layanansewa') }}</loc>
  <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
  <priority>0.80</priority>
</url>



@foreach ($artikel as $item )
    <url>
    <loc>{{ url('/artikel/'. $item->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
    <priority>1.00</priority>
    </url>
@endforeach


</urlset>