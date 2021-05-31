<ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
    @foreach($menu->items as $item)
        <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{$item->id}}"
            data-foo="bar">
            <div class="menuDiv">
                <span title="Click to show/hide children"
                      class="disclose ui-icon ui-icon-minusthick"><span></span></span>
                <span title="Click to show/hide item editor" data-id="{{ $item->id }}"
                      class="expandEditor ui-icon ui-icon-triangle-1-s"><span></span></span><span>

			   <span data-id="{{ $item->id }}" class="itemTitle">{{ $item->name }}</span>
			   <span title="Click to delete item." data-id="{{ $item->id }}"
                     class="deleteMenu ui-icon ui-icon-closethick"><span></span></span></span>
                <div id="menuEdit{{ $item->id }}" class="menuEdit" style="display: none">
                    <p>
                        Content or form, or nothing here. Whatever you want.
                    </p>
                </div>
            </div>
            <ol>
                @foreach($item->childs as $child)
                    <li style="display: list-item;"
                        class="mjs-nestedSortable-branch mjs-nestedSortable-expanded"
                        id="menuItem_{{ $child->id }}" data-foo="baz">
                        <div class="menuDiv">
				   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
				   <span></span>
				   </span>
                            <span title="Click to show/hide item editor" data-id="{{ $child->id }}"
                                  class="expandEditor ui-icon ui-icon-triangle-1-s">
				   <span></span>
				   </span>
                            <span>

				   <span data-id="{{ $child->id }}" class="itemTitle">{{ $child['name'] }}</span>
				   <span title="Click to delete item." data-id="{{ $child->id }}" class="deleteMenu ui-icon ui-icon-closethick">
				   <span></span>
				   </span>
				   </span>
                            <div id="menuEdit{{ $child->id }}" class="menuEdit" style="display:none">
                                <p>
                                    Content or form, or nothing here. Whatever you want.
                                </p>
                            </div>
                        </div>
                        <ol>
                            @foreach($child->childs as $ch)
                                <li class="mjs-nestedSortable-leaf" id="menuItem_{{ $ch->id }}">
                                    <div class="menuDiv">
					   <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
					   <span></span>
					   </span>
                                        <span title="Click to show/hide item editor" data-id="{{ $ch->id }}"
                                              class="expandEditor ui-icon ui-icon-triangle-1-s">
					   <span></span>
					   </span>
                                        <span>

					   <span data-id="{{ $ch->id }}" class="itemTitle">{{ $ch['name'] }}</span>
					   <span title="Click to delete item." data-id="{{ $ch->id }}" class="deleteMenu ui-icon ui-icon-closethick">
					   <span></span>
					   </span>
					   </span>
                                        <div id="menuEdit{{ $ch->id }}" class="menuEdit" style="display:none">
                                            <p>
                                                Content or form, or nothing here. Whatever you want.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </li>
                @endforeach
            </ol>
        </li>
    @endforeach
</ol>
<p><br>

<p>
    <button id="toArray" class="btn btn-primary pull-right" name="toArray"
            type="submit">{{ __('Save changes') }}</button>
</p>
<pre id="toArrayOutput">
		</pre>
