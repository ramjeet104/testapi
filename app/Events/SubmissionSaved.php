<?php
namespace App\Events;

use App\Models\Submission;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $submission;

    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
