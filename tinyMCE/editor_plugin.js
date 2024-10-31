(function() {

    tinymce.create('tinymce.plugins.shabakemaplugin', {

        init : function(ed, url){
            ed.addButton('shabakemaplugin', {
                title : 'Embed ShabakeMa Video Using the Selected URL',
                onclick : function() {
                     ed.selection.setContent('[shabakema]' + ed.selection.getContent() + '[/shabakema]');
                },
                image: url + "/logo.png"
            });
        },

        getInfo : function() {
            return {
                longname : 'ShabakeMa Video Embedder',
                author : 'ShabakeMa',
                authorurl : 'http://shabakema.com/',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('shabakemaplugin', tinymce.plugins.shabakemaplugin);
    
})();
