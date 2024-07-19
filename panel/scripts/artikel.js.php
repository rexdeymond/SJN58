<?php
if(isset($_GET['i']))
{
?>
<style>
.ck-editor__editable_inline {
    min-height: 500px;
	max-height: 500px;
	
}
</style>

        <!--
            The "super-build" of CKEditor 5 served via CDN contains a large set of plugins and multiple editor types.
            See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
        -->
        <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script>
        <!--
            Uncomment to load the Spanish translation
            <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/translations/es.js"></script>
        -->
        <script>
            // This sample still does not showcase all CKEditor 5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            var txtArtikel;

			CKEDITOR.ClassicEditor.create(document.getElementById("txtArtikel"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        //'exportPDF','exportWord', '|',
                        'undo', 'redo',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', '|',//'todoList', '|',
                        'outdent', 'indent', '|',
                        'findAndReplace', 'selectAll', '|',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        //'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: '',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@dispermasdes', '@kendal', '@kabkendal', '@kendalkab', '@dispermasdeskendal', '@pemkabkendal', '@handal', '@kendalhandal'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    'ExportPdf',
                    'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            }).then( editor => {
            //console.log( 'Editor was initialized', editor );
            txtArtikel = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
<?php }else{ ?>
<script>
<?php }?>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=artikel&l='+$("input[name=txtlimit]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
	        columns			: [
	            { "data": "ID" },
	            { "data": "Judul" },
	            { "data": "Category" },
                { "data": "Updated_By" },
                { "data": "Updated" },
	            { 
	            	"data": "ID",
	            	"targets": 0,
	                "render": function ( data, type, row, meta ) 
	                	{
	                		//return "<a class='btn btn-default' href='transkrip.php?id="+ data +"' target='_blank'>Cetak</a>";
	                		return '<div class="btn-group btn-group-sm"><button class="btn btn-warning" ' + ' ' + (row['akseslvl']<"2"?' disabled ':'') + 'title="'+ (row["Publik"]==1?"Publik":"Non-Publik") +'" onclick="ConfirmDialog(&quot;'+ (row["Publik"]==1?"Non-Publikasi":"Publikasi") +' Artikel?&quot;,&quot; Ingin '+ (row["Publik"]==1?"menon-publikasikan":"mempublikasikan") +' Artikel '+ row['ID'] +' - '+ row['Judul'] +'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-flag&quot;,&quot;waning&quot;,&quot;publikArtikel(\''+ row['ID'] +'\')&quot;)"><i class="'+ (row["Publik"]==1?"fa fa-check-square-o":"fa fa-square-o") +'"></i></button><button class="btn btn-success" title="Edit" onclick="window.location.href=&quot;.?p=artikel&i='+ row['ID'] +'&quot;"><i class="fa fa-pencil"></i></button>	<button class="btn btn-danger" ' + ' ' + (row['akseslvl']<"2"?' disabled ':'') + 'title="Delete" onclick="ConfirmDialog(&quot;Hapus Artikel?&quot;,&quot; Yakin ingin menghapus Artikel '+ row['ID'] +' - '+ row['Judul'] +'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delArtikel(\''+ row['ID'] +'\')&quot;)"><i class="fa fa-trash-o"></i></button></div>';
	                	}

	            },
	        ],
	    });
		
function previewData()
{
	url = 'jsonp.php?t=artikel&l='+$("input[name=txtlimit]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}


function SaveArt(){
	var txt="";

	if (document.frmarticle.txtJudul.value.length<3)
	{
		txt=txt+"Judul artikel harus diisi. ";
	}

	if(txt!="")
	{
		noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
		return false;
	}
	else
	{
		document.getElementById("txtArtikel").textContent=txtArtikel.getData();
		$.ajax({
		type 		: "POST",
		url			: "actions.php?a=artikelsave",
		chache		:	false,
		data		: $("#frmarticle").serialize(),
		beforeSend: function()
						{
							//UIkit.notify("<div class='uk-text-center'><h1>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h1></div>");
						},
		success		:	function(msg)
						{
							noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
							// previewData();
							// $('#ModalDaftar').modal('hide');
                            window.location.href=".?p=artikel";
						},
		datatype	:	"html"
	});
	}
	return false;
}

function delArtikel(arid){
    $.ajax({
        type        : "POST",
        url         : "actions.php?a=artikeldel",
        chache      :   false,
        data        :   {arid : arid},
        beforeSend: function()
                        {
                            //$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
                        },
        success     :   function(msg)
                        {
                             if (msg.substring(0,5)=="Error"){
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
                            }
                            else{
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
                                previewData();
                            }
                        },
        datatype    :   "html"
    });
    return false;
}
function publikArtikel(arid){
    $.ajax({
        type        : "POST",
        url         : "actions.php?a=artikelpub",
        chache      :   false,
        data        :   {arid : arid},
        beforeSend: function()
                        {
                            //$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
                        },
        success     :   function(msg)
                        {
                             if (msg.substring(0,5)=="Error"){
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
                            }
                            else{
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
                                previewData();
                            }
                        },
        datatype    :   "html"
    });
    return false;
}


</script>
