<?php
namespace App\Jobs;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\SubmissionSaved;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        // Save the submission data to the database
        $submission = Submission::create($this->data);

        // Trigger the SubmissionSaved event
        event(new SubmissionSaved($submission));
    }
}
