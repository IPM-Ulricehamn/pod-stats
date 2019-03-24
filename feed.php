<?php 
header("Content-Type: application/rss+xml");

if (isset($_GET['source'])) {
    
    $source = trim($_GET['source']);

    $feed = "feed.{$source}.xml";

} else {

    $feed = 'feed.xml';

}

echo '<?xml version="1.0" encoding="utf-8"?>' . "\n"; ?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:itunesu="http://www.itunesu.com/feed" version="2.0">
    <channel>
        <link>https://www.ipmulricehamn.se</link>
        <language>sv-se</language>
        <copyright>Copyright &#xA9; <?php echo date('Y'); ?> IPM Ulricehamn</copyright>
        <webMaster>michael@ipmulricehamn.se (Michael Claesson)</webMaster>
        <managingEditor>henrik@ipmulricehamn.se (Henrik Erickson)</managingEditor>
        <image>
            <url>https://www.ipmulricehamn.se/podd/logo.jpg?v=2</url>
            <title>IPM-podden</title>
            <link>https://www.ipmulricehamn.se</link>
        </image>
        <itunes:owner>
            <itunes:name>Michael Claesson</itunes:name>
            <itunes:email>info@ipmulricehamn.se</itunes:email>
        </itunes:owner>
        <itunes:category text="Business">
            <itunes:category text="Management &amp; Marketing" />
        </itunes:category>
        <itunes:keywords>marknadsföring, reklam, kommunikation, strategi, digitalt, webb</itunes:keywords>
        <itunes:explicit>no</itunes:explicit>
        <itunes:image href="https://www.ipmulricehamn.se/podd/logo.jpg?v=2" />
        <atom:link href="https://www.ipmulricehamn.se/podd/<?php echo $feed; ?>" rel="self" type="application/rss+xml" />
        <pubDate><?php echo date('D, d M Y H:i:s', strtotime('2019-03-22 13:00')); ?> GMT</pubDate>
        <title>IPM-podden</title>
        <itunes:author>IPM Ulricehamn</itunes:author>
        <description>IPM Ulricehamn är en strategisk varumärkesbyrå. I podden pratar byråns medarbetare om aktuella trender och bjuder på små konkreta tips kring marknadsföring och varumärkesutveckling.</description>
        <itunes:summary>IPM Ulricehamn är en strategisk varumärkesbyrå. I podden pratar byråns medarbetare om aktuella trender och bjuder på små konkreta tips kring marknadsföring och varumärkesutveckling.</itunes:summary>
        <itunes:subtitle>IPM Ulricehamn är en strategisk varumärkesbyrå. I podden pratar byråns medarbetare om aktuella trender och bjuder på små konkreta tips kring marknadsföring och varumärkesutveckling.</itunes:subtitle>
        <lastBuildDate><?php echo date('D, d M Y H:i:s'); ?> GMT</lastBuildDate>

        <item>
            <title>Avsnitt #1 - Digital annonsering</title>
            <description>I vårt allra första avsnitt pratar vi 24 minuter om digital annonsering. Bakgrund och handfasta tips om annonsering via sociala kanaler och i Googles nätverk.</description>
            <itunes:summary>I vårt allra första avsnitt pratar vi 24 minuter om digital annonsering. Bakgrund och handfasta tips om annonsering via sociala kanaler och i Googles nätverk.</itunes:summary>
            <itunes:subtitle>I vårt allra första avsnitt pratar vi 24 minuter om digital annonsering. Bakgrund och handfasta tips om annonsering via sociala kanaler och i Googles nätverk.</itunes:subtitle>
            <itunesu:category itunesu:code="100104" />
<enclosure url="https://www.ipmulricehamn.se/podd/0001.mp3<?php if (isset($source)): ?>?source=<?php echo $source; ?><?php endif; ?>" type="audio/mpeg" length="58225858" />
            <guid>https://www.ipmulricehamn.se/podd/0001.mp3</guid>
            <itunes:duration>0:24:15</itunes:duration>
            <pubDate><?php echo date('D, d M Y H:i:s', strtotime('2019-03-22 13:00')); ?> GMT</pubDate>
        </item>

    </channel>
</rss>