// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dws_grid', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dws_grid':
                var c = cm.createSplitButton('dws_grid', {
                    title : 'Columns Shortcodes',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
					// Boxes & frames
					m.add({title : 'Columns Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
                    m.add({title : '1 Column', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span12"]Text[/col]<br class="nc"/>[/row]' );
                    }});
                    m.add({title : '2 Columns', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span6"]Column 1 Text[/col]<br class="nc"/>[col class="span6"]Column 2 Text[/col]<br class="nc"/>[/row]' );
                    }});
                    m.add({title : '3 Columns', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span4"]Column 1 Text[/col]<br class="nc"/>[col class="span4"]Column 2 Text[/col]<br class="nc"/>[col class="span4"]Column 3 Text[/col]<br class="nc"/>[/row]' );
                    }});
                    m.add({title : '4 Columns', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span3"]Column 1 Text[/col]<br class="nc"/>[col class="span3"]Column 2 Text[/col]<br class="nc"/>[col class="span3"]Column 3 Text[/col]<br class="nc"/>[col class="span3"]Column 4 Text[/col]<br class="nc"/>[/row]' );
                    }});
                    m.add({title : '6 Columns', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span2"]Column 1 Text[/col]<br class="nc"/>[col class="span2"]Column 2 Text[/col]<br class="nc"/>[col class="span2"]Column 3 Text[/col]<br class="nc"/>[col class="span2"]Column 4 Text[/col]<br class="nc"/>[col class="span2"]Column 5 Text[/col]<br class="nc"/>[col class="span2"]Column 6 Text[/col]<br class="nc"/>[/row]' );
                    }});
                    m.add({title : '12 Columns', onclick : function() {
                        tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, '[row class="row-fluid"]<br class="nc"/>[col class="span1"]Column 1 Text[/col]<br class="nc"/>[col class="span1"]Column 2 Text[/col]<br class="nc"/>[col class="span1"]Column 3 Text[/col]<br class="nc"/>[col class="span1"]Column 4 Text[/col]<br class="nc"/>[col class="span1"]Column 5 Text[/col]<br class="nc"/>[col class="span1"]Column 6 Text[/col]<br class="nc"/>[col class="span1"]Column 7 Text[/col]<br class="nc"/>[col class="span1"]Column 8 Text[/col]<br class="nc"/>[col class="span1"]Column 9 Text[/col]<br class="nc"/>[col class="span1"]Column 10 Text[/col]<br class="nc"/>[col class="span1"]Column 11 Text[/col]<br class="nc"/>[col class="span1"]Column 12 Text[/col]<br class="nc"/>[/row]' );
                    }});
                    
                     
                     
                    m.add({title : 'Custom Grid', onclick : function() {
                         tb_show('Custom Grid', themater_shortcodes_url+'/js/plugins/grid.html?TB_iframe=1');
                    }}); 

                });

                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dws_grid', tinymce.plugins.dws_grid);
})();