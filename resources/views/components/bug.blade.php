@if ($gtm = \App\Models\Config::gtm())
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={!! $gtm !!}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{!! $gtm !!}');
    </script>

    <!-- Google Analytics -->
    <script async>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '{!! $gtm !!}', 'auto');
        ga('send', 'pageview');
    </script>
@endif



@if ($yam = \App\Models\Config::yam())  
 <script async type=\"text/javascript\" >
    (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
                 w.yaCounter{!! $yam !!} = new Ya.Metrika({
                     id:{!! $yam !!},
                     clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true,
         webvisor:true,
         ecommerce:"dataLayer"
                 });
             } catch(e) { }
         });

         var n = d.getElementsByTagName(\"script\")[0],
             s = d.createElement(\"script\"),
             f = function () { n.parentNode.insertBefore(s, n); };
         s.type = \"text/javascript\";
         s.async = true;
         s.src = \"https://d31j93rd8oukbv.cloudfront.net/metrika/watch_ua.js\";

         if (w.opera == \"[object Opera]\") {
             d.addEventListener(\"DOMContentLoaded\", f, false);
         } else { f(); }
     })(document, window, \"yandex_metrika_callbacks\");
 </script>
 <noscript><div><img src=\"https://mc.yandex.ru/watch/{!! $yam !!}\" style=\"position:absolute; left:-9999px;\" alt=\"\" /></div></noscript> 
 @endif 



