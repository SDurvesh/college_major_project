<?php

class CKEditorPrintPlugin {
    public static function addPlugin($editor, $languages, $icons) {
        $editor->addCommand('print', 'CKEditorPrintPlugin');
        if (method_exists($editor, 'ui') && method_exists($editor->ui, 'addButton')) {
            $editor->ui->addButton('Print', [
                'label' => $editor->lang['print']['toolbar'],
                'command' => 'print',
                'toolbar' => 'document,50',
            ]);
        }
    }

    public static function execute($editor) {
        if (CKEDITOR.env.gecko) {
            $editor->window->$.print();
        } else {
            $editor->document->$.execCommand('Print');
        }
    }
}

// Example usage
$editor = new CKEditor(); // Replace with your CKEditor initialization code
$languages = "af,ar,az,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,es-mx,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,oc,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn";
$icons = "print,";

CKEditorPrintPlugin::addPlugin($editor, $languages, $icons);
// To execute the print command, call CKEditorPrintPlugin::execute($editor);

?>
