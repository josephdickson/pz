//////////////////////////////////////////////////////////////////
// Newsblob shortcode button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.newsblob', {  
        init : function(ed, url) {  
            ed.addButton('newsblob', {  
                title : 'Insert a post from another part of the multisite',  
                image : url+'/button-newsblob.png',  
                onclick : function() {  
                     ed.selection.setContent('[newsblob site=siteID article=postID highlight=no]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('newsblob', tinymce.plugins.newsblob);  
})();
