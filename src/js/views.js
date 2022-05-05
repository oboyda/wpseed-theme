jQuery(function($)
{
    /*
    * Helpers
    * --------------------------------------------------
    */

    const viewExists = function(view)
    {
        return $.contains(document.body, view.get(0));
    };

    const replaceView = function(view, html, triggerLoadedEvent=true, triggerChildren=false)
    {
        view.html(html);
        const _view = view.children();
        view.replaceWith(_view);
        
        if(triggerLoadedEvent && typeof window.triggerViewLoadedEvents !== 'undefined')
        {
            window.triggerViewLoadedEvents(_view, triggerChildren);
        }
    }

    /*
    * .view.frist-block
    * --------------------------------------------------
    */
    const initFirstBlock = function(e, view) 
    {
        if(!viewExists(view)) return;

        //...
    };
    $(document.body).on("view_first_block", initFirstBlock);

});
