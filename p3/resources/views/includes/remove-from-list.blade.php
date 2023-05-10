<form method='POST' action='/list/{{ $item->id }}/destroy'>
    {{ csrf_field() }}
    {{ method_field('delete') }}

    <button type='submit' test='remove-from-list-button-{{ $item->id }}'>
        Remove from the item's list
    </button>
</form>
