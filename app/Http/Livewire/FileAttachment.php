<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class FileAttachment extends Component
{
    use WithFileUploads;

    public $can_manage_files;
    public $attached_to_type;
    public $attached_to_id;

    public $file_title;
    public $file;
    public $attachments = [];
    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteAttachment'];

    public function mount($attached_to_type, $attached_to_id)
    {
        $this->attached_to_type = $attached_to_type;
        $this->attached_to_id = $attached_to_id;
    }

    public function render()
    {
        // Fetch the attachments from the database based on attached_to_type and attached_to_id
        $this->attachments = Attachment::where('attached_to_type', $this->attached_to_type)
            ->where('attached_to_id', $this->attached_to_id)
            ->get();

        return view('livewire.file-attachment')->with('attachments', $this->attachments);;
    }

    public function uploadFile()
    {
        $this->validate([
            'file_title' => 'required',
            'file' => 'required|file',
        ]);

        // Store the uploaded file
        $uploadedFile = $this->file->store('public/files');

        // Create a new attachment record in the database
        Attachment::create([
            'attached_to_type' => $this->attached_to_type,
            'attached_to_id' => $this->attached_to_id,
            'name' => $this->file_title,
            'file_path' => config('app.url') . Storage::url($uploadedFile),
            'file_size' => $this->file->getSize() / 1024,
        ]);

        $this->file_title = null;
        $this->file = null;

        // Refresh the attachments array to fetch the updated list from the database
        $this->attachments = Attachment::where('attached_to_type', $this->attached_to_type)
            ->where('attached_to_id', $this->attached_to_id)
            ->get();
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteAttachment()
    {
        $attachment = Attachment::findOrFail($this->delete_id);
        $attachment->delete();
        
        $this->attachments = Attachment::where('attached_to_type', $this->attached_to_type)
            ->where('attached_to_id', $this->attached_to_id)
            ->get();

        $this->delete_id = null;

        app('toast')->create("This account has been successfully deleted.", 'success');
    }
}
