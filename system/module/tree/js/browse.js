$(document).ready(function()
{
    /* Load the children of current category when page loaded. */
    var link = createLink('tree', 'children', 'type=' + v.type + '&root=' + v.root);
    $('#categoryBox').load(link, function(){if($.fn.placeholder) $('[placeholder]').placeholder();});
    $('#treeMenuBox li:has(ul)').each(function()
    {
        $(this).children('.deleter').remove();
    });

    $.setAjaxLoader('#treeMenuBox .ajax', '#categoryBox', function(){if($.fn.placeholder) $('[placeholder]').placeholder();});
    $.setAjaxLoader('#commitBtn', '#categoryBox', function(){if($.fn.placeholder) $('[placeholder]').placeholder();});

})
