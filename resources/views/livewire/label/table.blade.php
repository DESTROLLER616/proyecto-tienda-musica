<div>
    <livewire:label.createbutton />

    <x-table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labels as $label)
                <tr>
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->description }}</td>
                    <td>
                        <x-imagetable :src="$label->avatar" :alt="$label->name" />
                    </td>
                    <td>
                        <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-outline-warning" style="width: 4rem">Edit</a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 4rem"
                            data-id="{{ $label->id }}"
                            data-name="{{ $label->name }}"
                            wire:click="openDeleteModal({{ $label->id }}, '{{ $label->name }}')"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>

    {{ $labels->links('vendor.livewire.bootstrap') }}

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="delete-modal-title">Delete Label</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="delete-modal-body">
                <p>Are you sure you want to delete this label?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form wire:submit.prevent="delete" enctype="multipart/form-data" onsubmit="closeModal">
                <input type="hidden" id="delete-modal-input-id" wire:model.fill="deleteId" wire:model.live="deleteId">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
