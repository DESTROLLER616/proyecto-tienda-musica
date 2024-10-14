<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <form action="{{ route('labels.destroy', $label->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>
