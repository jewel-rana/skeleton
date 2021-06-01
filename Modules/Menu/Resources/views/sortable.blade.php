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
			   <span title="Click to delete item." data-url="{{ route('menuItem.destroy', $item->id) }}" data-id="{{ $item->id }}"
                     class="deleteMenu ui-icon ui-icon-closethick"><span></span></span></span>
                <div id="menuEdit{{ $item->id }}" class="menuEdit" style="display: none">
                    <form method="POST" action="{{ route('menuItem.update', $item->id) }}" class="menuUpdateForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="menu_id" value="{{ $item->menu_id }}">
                        <div class="form-group">
                            <label for="name{{ $item->id }}">Name</label>
                            <input type="text" id="name{{ $item->id }}" name="name" value="{{ $item->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="menu_url{{ $item->id }}">URL</label>
                            <input type="text" id="menu_url{{ $item->id }}" name="menu_url" value="{{ $item->menu_url }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="menu_class{{ $item->id }}">Menu class</label>
                            <input type="text" id="menu_class{{ $item->id }}" name="menu_class" value="{{ $item->menu_class }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="icon_class{{ $item->id }}">Menu Icon</label>
                            <input type="text" id="icon_class{{ $item->id }}" name="icon_class" value="{{ $item->icon_class }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
				   <span title="Click to delete item." data-id="{{ $child->id }}" data-url="{{ route('menuItem.destroy', $child->id) }}" class="deleteMenu ui-icon ui-icon-closethick">
				   <span></span>
				   </span>
				   </span>
                            <div id="menuEdit{{ $child->id }}" class="menuEdit" style="display:none">
                                <form method="POST" action="{{ route('menuItem.update', $child->id) }}" class="menuUpdateForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="menu_id" value="{{ $child->menu_id }}">
                                    <div class="form-group">
                                        <label for="name{{ $child->id }}">Name</label>
                                        <input type="text" id="name{{ $child->id }}" name="name" value="{{ $child->name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_url{{ $child->id }}">URL</label>
                                        <input type="text" id="menu_url{{ $child->id }}" name="menu_url" value="{{ $child->menu_url }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_class{{ $child->id }}">Menu class</label>
                                        <input type="text" id="menu_class{{ $child->id }}" name="menu_class" value="{{ $child->menu_class }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="icon_class{{ $child->id }}">Menu Icon</label>
                                        <input type="text" id="icon_class{{ $child->id }}" name="icon_class" value="{{ $child->icon_class }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
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
					   <span title="Click to delete item." data-id="{{ $ch->id }}" data-url="{{ route('menuItem.destroy', $ch->id) }}" class="deleteMenu ui-icon ui-icon-closethick">
					   <span></span>
					   </span>
					   </span>
                                        <div id="menuEdit{{ $ch->id }}" class="menuEdit" style="display:none">
                                            <form method="POST" action="{{ route('menuItem.update', $ch->id) }}" class="menuUpdateForm">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="menu_id" value="{{ $ch->menu_id }}">
                                                <div class="form-group">
                                                    <label for="name{{ $ch->id }}">Name</label>
                                                    <input type="text" id="name{{ $ch->id }}" name="name" value="{{ $ch->name }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="menu_url{{ $ch->id }}">URL</label>
                                                    <input type="text" id="menu_url{{ $ch->id }}" name="menu_url" value="{{ $ch->menu_url }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="menu_class{{ $ch->id }}">Menu class</label>
                                                    <input type="text" id="menu_class{{ $ch->id }}" name="menu_class" value="{{ $ch->menu_class }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="icon_class{{ $ch->id }}">Menu Icon</label>
                                                    <input type="text" id="icon_class{{ $ch->id }}" name="icon_class" value="{{ $ch->icon_class }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
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
