<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    @livewireStyles
</head>
<div>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h3>Upload Files</h3>


                <form wire:submit.prevent="save">

                    <input type="file" wire:model="photo">

                    @error('photo') <span class="error">{{ $message }}</span> @enderror

                    <button type="submit">Save Photo</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
@livewireScripts
