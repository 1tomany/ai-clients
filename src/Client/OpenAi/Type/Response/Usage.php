<?php

namespace OneToMany\AI\Client\OpenAi\Type\Response;

use OneToMany\AI\Client\OpenAi\Type\Response\Usage\InputTokensDetails;
use OneToMany\AI\Client\OpenAi\Type\Response\Usage\OutputTokensDetails;

final readonly class Usage
{
    /**
     * @param non-negative-int $input_tokens
     * @param non-negative-int $output_tokens
     * @param non-negative-int $total_tokens
     */
    public function __construct(
        public int $input_tokens = 0,
        public InputTokensDetails $input_tokens_details = new InputTokensDetails(),
        public int $output_tokens = 0,
        public OutputTokensDetails $output_tokens_details = new OutputTokensDetails(),
        public int $total_tokens = 0,
    ) {
    }

    /**
     * @return non-negative-int
     */
    public function getInputTokens(): int
    {
        return $this->input_tokens;
    }

    /**
     * @return non-negative-int
     */
    public function getCachedTokens(): int
    {
        return $this->input_tokens_details->cached_tokens;
    }

    /**
     * @return non-negative-int
     */
    public function getOutputTokens(): int
    {
        return $this->output_tokens;
    }
}
