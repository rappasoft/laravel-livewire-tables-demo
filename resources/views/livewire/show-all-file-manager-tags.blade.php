<div>
    @forelse($tags as $tag)
        <a class="d-inline-block"
            wire:key="tag-links-{{ $tag->id }}"
            style="display: inline; width: fit-content; padding: 2px;"
            href="{{ route('user.tagmanager.show', $tag->id) }}">
            <span style="background-color:{{ '#' . $tag->color_hex }}; font-weight:200;"
                class="badge text-dark fs-6">
                {{ $tag->tag }}
            </span>
        </a>
    @empty 
      No Tags
    @endforelse
</div>
