<?php

namespace AdminDisqus\Components;

class DisqusComponent extends \Admin\Components\Component
{
    protected $element = 'center';

    /**
     * @param  array  $delegates
     * @throws Throwable
     */
    public function __construct(...$delegates)
    {
        \Admin\Components\Component::__construct(...$delegates);
        $this->addClass('disqus');
        $this->attr('style', 'width: 100%');
    }

    protected function mount()
    {
        if ($name = config('admin-disqus.disqus-name')) {

            $this->text(
                '<div id="disqus_thread"></div>'
            );
            $this->text("
            <script>
                (function() {
                    var d = document, s = d.createElement('script');
                    s.src = 'https://$name.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            ");
        }
        $this->callRenderEvents();
    }
}
