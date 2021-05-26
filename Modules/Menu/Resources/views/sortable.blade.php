<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>nestedSortable jQuery Plugin</title>
    <meta content="Demo page of the nestedSortable jQuery Plugin" name=
    "description">
    <meta content="Manuele J Sarfatti" name="author">
    <style type="text/css">
        html {
            background-color: #eee;
        }

        body {
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            color: #444;
            background-color: #fff;
            font-size: 13px;
            font-family: Freesans, sans-serif;
            padding: 2em 4em;
            width: 860px;
            margin: 15px auto;
            box-shadow: 1px 1px 8px #444;
            -mox-box-shadow: 1px 1px 8px #444;
            -webkit-box-shadow: 1px -1px 8px #444;
        }

        a,a:visited {
            color: #4183C4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        pre,code {
            font-size: 12px;
        }

        pre {
            width: 100%;
            overflow: auto;
        }

        small {
            font-size: 90%;
        }

        small code {
            font-size: 11px;
        }

        .placeholder {
            outline: 1px dashed #4183C4;
        }

        .mjs-nestedSortable-error {
            background: #fbe3e4;
            border-color: transparent;
        }

        #tree {
            width: 550px;
            margin: 0;
        }

        ol {
            max-width: 450px;
            padding-left: 25px;
        }

        ol.sortable,ol.sortable ol {
            list-style-type: none;
        }

        .sortable li div {
            border: 1px solid #d4d4d4;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            cursor: move;
            border-color: #D4D4D4 #D4D4D4 #BCBCBC;
            margin: 0;
            padding: 3px;
        }

        li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
            border-color: #999;
        }

        .disclose, .expandEditor {
            cursor: pointer;
            width: 20px;
            display: none;
        }

        .sortable li.mjs-nestedSortable-collapsed > ol {
            display: none;
        }

        .sortable li.mjs-nestedSortable-branch > div > .disclose {
            display: inline-block;
        }

        .sortable span.ui-icon {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .menuDiv {
            background: #EBEBEB;
        }

        .menuEdit {
            background: #FFF;
        }

        .itemTitle {
            vertical-align: middle;
            cursor: pointer;
        }

        .deleteMenu {
            float: right;
            cursor: pointer;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 0;
        }

        h2 {
            font-size: 1.2em;
            font-weight: 400;
            font-style: italic;
            margin-top: .2em;
            margin-bottom: 1.5em;
        }

        h3 {
            font-size: 1em;
            margin: 1em 0 .3em;
        }

        p,ol,ul,pre,form {
            margin-top: 0;
            margin-bottom: 1em;
        }

        dl {
            margin: 0;
        }

        dd {
            margin: 0;
            padding: 0 0 0 1.5em;
        }

        code {
            background: #e5e5e5;
        }

        input {
            vertical-align: text-bottom;
        }

        .notice {
            color: #c33;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />@endsection
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/nestedSortable/jquery.mjs.nestedSortable.js"></script>

    <script>
        $().ready(function(){
            var ns = $('ol.sortable').nestedSortable({
                forcePlaceholderSize: true,
                handle: 'div',
                helper:	'clone',
                items: 'li',
                opacity: .6,
                placeholder: 'placeholder',
                revert: 250,
                tabSize: 25,
                tolerance: 'pointer',
                toleranceElement: '> div',
                maxLevels: 4,
                isTree: true,
                expandOnHover: 700,
                startCollapsed: false,
                change: function(){
                    console.log('Relocated item');
                }
            });

            $('.expandEditor').attr('title','Click to show/hide item editor');
            $('.disclose').attr('title','Click to show/hide children');
            $('.deleteMenu').attr('title', 'Click to delete item.');

            $('.disclose').on('click', function() {
                $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
                $(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
            });

            $('.expandEditor, .itemTitle').click(function(){
                var id = $(this).attr('data-id');
                $('#menuEdit'+id).toggle();
                $(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
            });

            $('.deleteMenu').click(function(){
                var id = $(this).attr('data-id');
                $('#menuItem_'+id).remove();
            });

            $('#serialize').click(function(){
                serialized = $('ol.sortable').nestedSortable('serialize');
                $('#serializeOutput').text(serialized+'\n\n');
            })

            $('#toHierarchy').click(function(e){
                hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
                hiered = dump(hiered);
                (typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
                    $('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
            })

            $('#toArray').click(function(e){
                arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
                arraied = dump(arraied);
                (typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
                    $('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;
            });
        });

        function dump(arr,level) {
            var dumped_text = "";
            if(!level) level = 0;

            //The padding given at the beginning of the line.
            var level_padding = "";
            for(var j=0;j<level+1;j++) level_padding += "    ";

            if(typeof(arr) == 'object') { //Array/Hashes/Objects
                for(var item in arr) {
                    var value = arr[item];

                    if(typeof(value) == 'object') { //If it is an array,
                        dumped_text += level_padding + "'" + item + "' ...\n";
                        dumped_text += dump(value,level+1);
                    } else {
                        dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
                    }
                }
            } else { //Strings/Chars/Numbers etc.
                dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
            }
            return dumped_text;
        }
    </script>
</head>

<body>
<header>
    <h1>nestedSortable jQuery Plugin</h1>

    <h2>2.0</h2>
</header>

<section>
    <p>This is the demo page for the nestedSortable jQuery plugin.</p>

    <p><strong>Follow the development, read the docs and download the
            latest version directly from the <a href="https://github.com/ilikenwf/nestedSortable">GitHub
                page</a>.</strong></p>
</section><!-- END section -->

<section id="demo">
    <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
        <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_2" data-foo="bar">
            <div class="menuDiv">
			   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
			   <span></span>
			   </span>
                <span title="Click to show/hide item editor" data-id="2" class="expandEditor ui-icon ui-icon-triangle-1-n">
			   <span></span>
			   </span>
                <span>
			   <span data-id="2" class="itemTitle">a</span>
			   <span title="Click to delete item." data-id="2" class="deleteMenu ui-icon ui-icon-closethick">
			   <span></span>
			   </span>
			   </span>
                <div id="menuEdit2" class="menuEdit hidden">
                    <p>
                        Content or form, or nothing here. Whatever you want.
                    </p>
                </div>
            </div>
            <ol>
                <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_4" data-foo="baz">
                    <div class="menuDiv">
				   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
				   <span></span>
				   </span>
                        <span title="Click to show/hide item editor" data-id="4" class="expandEditor ui-icon ui-icon-triangle-1-n">
				   <span></span>
				   </span>
                        <span>
				   <span data-id="4" class="itemTitle">c</span>
				   <span title="Click to delete item." data-id="4" class="deleteMenu ui-icon ui-icon-closethick">
				   <span></span>
				   </span>
				   </span>
                        <div id="menuEdit4" class="menuEdit hidden">
                            <p>
                                Content or form, or nothing here. Whatever you want.
                            </p>
                        </div>
                    </div>
                    <ol>
                        <li class="mjs-nestedSortable-leaf" id="menuItem_6">
                            <div class="menuDiv">
					   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
					   <span></span>
					   </span>
                                <span title="Click to show/hide item editor" data-id="6" class="expandEditor ui-icon ui-icon-triangle-1-n">
					   <span></span>
					   </span>
                                <span>
					   <span data-id="6" class="itemTitle">e</span>
					   <span title="Click to delete item." data-id="6" class="deleteMenu ui-icon ui-icon-closethick">
					   <span></span>
					   </span>
					   </span>
                                <div id="menuEdit6" class="menuEdit hidden">
                                    <p>
                                        Content or form, or nothing here. Whatever you want.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </li>
                <li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_5">
                    <div class="menuDiv">
				   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
				   <span></span>
				   </span>
                        <span title="Click to show/hide item editor" data-id="5" class="expandEditor ui-icon ui-icon-triangle-1-n">
				   <span></span>
				   </span>
                        <span>
				   <span data-id="5" class="itemTitle">d</span>
				   <span title="Click to delete item." data-id="5" class="deleteMenu ui-icon ui-icon-closethick">
				   <span></span>
				   </span>
				   </span>
                        <div id="menuEdit5" class="menuEdit hidden">
                            <p>
                                Content or form, or nothing here. Whatever you want.
                            </p>
                        </div>
                    </div>
                </li>
            </ol>
        </li>
        <ol>
        </ol>
        <li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_7">
            <div class="menuDiv">
			   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
			   <span></span>
			   </span>
                <span title="Click to show/hide item editor" data-id="7" class="expandEditor ui-icon ui-icon-triangle-1-n">
			   <span></span>
			   </span>
                <span>
			   <span data-id="7" class="itemTitle">f</span>
			   <span title="Click to delete item." data-id="7" class="deleteMenu ui-icon ui-icon-closethick">
			   <span></span>
			   </span>
			   </span>
                <div id="menuEdit7" class="menuEdit hidden">
                    <p>
                        Content or form, or nothing here. Whatever you want.
                    </p>
                </div>
            </div>
        </li>
        <li class="mjs-nestedSortable-leaf" id="menuItem_3">
            <div class="menuDiv">
			   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
			   <span></span>
			   </span>
                <span title="Click to show/hide item editor" data-id="3" class="expandEditor ui-icon ui-icon-triangle-1-n">
			   <span></span>
			   </span>
                <span>
			   <span data-id="3" class="itemTitle">b</span>
			   <span title="Click to delete item." data-id="3" class="deleteMenu ui-icon ui-icon-closethick">
			   <span></span>
			   </span>
			   </span>
                <div id="menuEdit3" class="menuEdit hidden">
                    <p>
                        Content or form, or nothing here. Whatever you want.
                    </p>
                </div>
            </div>
        </li>
    </ol>

    <h3>Try the custom methods:</h3>

    <p><br>
        <input id="serialize" name="serialize" type="submit" value=
        "Serialize"></p>
    <pre id="serializeOutput">
		</pre>

    <p><input id="toArray" name="toArray" type="submit" value=
        "To array"></p>
    <pre id="toArrayOutput">
		</pre>

    <p><input id="toHierarchy" name="toHierarchy" type="submit" value=
        "To hierarchy"></p>
    <pre id="toHierarchyOutput">
		</pre>

    <p><em>Note: This demo has the <code>maxLevels</code> option set to '4'.</em></p>
</section><!-- END #demo -->

<section id="license">
    <h4>License</h4>

    <p>This work is licensed under the MIT License.<br>
        Which means you can do pretty much whatever you want with it.</p>

    <p>&copy; 2010&dash;2014 Manuele J Sarfatti</p>
</section><!-- END #documentation -->
</body>
</html>
