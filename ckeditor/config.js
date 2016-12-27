/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.removeButtons = 'Source,Copy,Save,Preview,Print,Templates,NewPage,Find,Replace,SelectAll,Cut,Paste,Undo,Redo,Smiley,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Flash,Table,Iframe,Link,Unlink,CreateDiv,PasteFromWord,PasteText,RemoveFormat,BidiLtr,BidiRtl,HorizontalRule,SpecialChar,PageBreak,Maximize,ShowBlocks,About,Scayt,language';
        config.allowedContent = true;
        config.extraAllowedContent = '<header>';        
        config.extraAllowedContent = 'a';
};
