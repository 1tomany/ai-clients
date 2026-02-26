<?php

namespace OneToMany\LlmSdk\Client\OpenAI\Type\Batch;

use OneToMany\LlmSdk\Client\OpenAI\Type\Batch\Enum\Status;

final readonly class Batch
{
    /**
     * @param non-empty-string $id
     * @param 'batch' $object
     * @param non-empty-string $endpoint
     * @param ?non-empty-string $output_file_id
     */
    public function __construct(
        public string $id,
        public string $object,
        public string $endpoint,
        public ?string $model,
        // public ?array $errors,
        public string $input_file_id,
        public string $completion_window,
        public Status $status,
        public ?string $output_file_id,
        public ?string $error_file_id,
        public int $created_at,
        public ?int $in_progress_at,
        public ?int $expires_at,
        public ?int $finalizing_at,
        public ?int $completed_at,
        public ?int $failed_at,
        public ?int $expired_at,
        public ?int $cancelling_at,
        public ?int $cancelled_at,
        public RequestCounts $request_counts,
    ) {
    }
}
