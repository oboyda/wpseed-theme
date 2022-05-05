jQuery(function($)
{
    /*
    * Trigger views loaded event
    * --------------------------------------------------
    */

    window.triggerViewLoadedEvents = function(view, triggerChildren=false)
    {
        view.each(function(){
            const _view = $(this);
            const viewName = _view.data("view");
            if(viewName)
            {
                const triggerName = "view_loaded_" + viewName;
                $(document.body).triggerHandler(triggerName, [_view]);
                
                if(triggerChildren)
                {
                    triggerViewLoadedEvents(_view.find(".view"));
                }
            }
        });
    };
    
    $(".view").each(function(){
        window.triggerViewLoadedEvents($(this));
    });
});