// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dws_labels', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dws_labels':
                var c = cm.createSplitButton('dws_labels', {
                    title : 'Labels & Badges Shortcodes',
                    onclick : function() {

                    }
                    //'class':'mceListBoxMenu'
                });
                

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                        $menu.append('');
                        $menu.append('<div style="padding: 0 10px 10px"><label>Title<br />\
                        <input type="text" name="title" value="Enter Title" onclick="this.select()"  /></label>\
                        <label>Type<br/>\
                        <select name="type">\
                        <option value="label">Label</option>\
                        <option value="badge">Badge</option>\
                        </select></label>\
                        <label>Style<br/>\
                        <select name="style">\
                        <option value="Default"> Default</option>\
                        <option value="success"> Success</option>\
                        <option value="warning"> Warning</option>\
                        <option value="important"> Important</option>\
                        <option value="info"> Info</option>\
                        <option value="inverse"> Inverse</option>\
                        </select>\
                        </div>');

                        jQuery('<input type="button" class="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var title = $menu.find('input[name=title]').val();
                                    var type = $menu.find('select[name=type]').val();
                                    var style = $menu.find('select[name=style]').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[label type="'+type.toLowerCase()+'" style="'+style.toLowerCase()+'" title="'+title+'"]');
                                    c.hideMenu();
                                }).wrap('<div style="padding: 0 10px 10px"></div>')
                 
                        $menu.data('added',true); 

                    });

                   // XSmall
                    m.add({title : 'Labels & Badges Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dws_labels', tinymce.plugins.dws_labels);
})();