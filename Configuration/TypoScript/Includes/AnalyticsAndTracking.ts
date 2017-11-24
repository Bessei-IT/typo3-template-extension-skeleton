# Possible usage:
# page.1511563255 < lib.googleAnalytics

# IMPORTANT: Replace GOOGLE_ANALYTICS_ID with your GA ID before use!
lib.googleAnalytics = TEXT
lib.googleAnalytics.value (
<script>
(function(i,s,o,g,r,a,m){i=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'GOOGLE_ANALYTICS_ID', 'auto');
ga('send', 'pageview');
ga('set', 'anonymizeIp', true);
</script>
)

# Possible usage:
# page.1511563271 < lib.facebookTracking

# IMPORTANT: Replace YOUR_FACEBOOK_TRACKING_ID with your Facebook tracking ID before use!
lib.facebookTracking = TEXT
lib.facebookTracking.value (
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', 'YOUR_FACEBOOK_TRACKING_ID'); // Insert your pixel ID here.
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=YOUR_FACEBOOK_TRACKING_ID&ev=PageView&noscript=1"
	/></noscript>
)