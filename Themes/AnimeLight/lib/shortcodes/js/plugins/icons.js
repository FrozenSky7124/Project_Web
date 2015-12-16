// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dws_icons', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dws_icons':
                var c = cm.createButton('dws_icons', {
                    title : 'Icons Shortcodes',
                    onclick : function() {
                        tb_show('Select icons', themater_shortcodes_url + '/js/plugins/icons.html?TB_iframe=1');
                    }
                });

        
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dws_icons', tinymce.plugins.dws_icons);
})();

