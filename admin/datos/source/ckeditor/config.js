CKEDITOR.editorConfig = function( config ) {
 config.language = 'es';
 config.removePlugins = 'image';
 config.removeButtons = 'Save,Print,Paste,PasteText,PasteFromWord,Flash,Form,Checkbox,Language,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Iframe,NewPage,Preview,Templates,Cut,Copy,Undo,Redo,Seach,Find,Replace,SelectAll,Scayt,Anchor,Image,SpecialChar,PageBreak,Maximize,ShowBlocks,BidiLtr,BidiRtl,Subscript,Outdent,Indent,Blockquote';
 config.extraPlugins = 'autogrow,leaflet,widget,lineutils,clipboard,dialog,dialogui,notification,toolbar,button,widgetselection';
 config.removePlugins = 'about';

config.autoGrow_minHeight = 250;
config.autoGrow_maxHeight = 600;
config.autoGrow_onStartup = true;
config.autoGrow_bottomSpace = 50;
	// config.uiColor = '#AADC6E';
};