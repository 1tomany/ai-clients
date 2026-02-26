<?php

namespace OneToMany\LlmSdk\Client\Gemini\Type\Batch\Enum;

enum State: string
{
    case Unspecified = 'BATCH_STATE_UNSPECIFIED';
    case Pending = 'BATCH_STATE_PENDING';
    case Running = 'BATCH_STATE_RUNNING';
    case Succeeded = 'BATCH_STATE_SUCCEEDED';
    case Failed = 'BATCH_STATE_FAILED';
    case Cancelled = 'BATCH_STATE_CANCELLED';
    case Expired = 'BATCH_STATE_EXPIRED';

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-uppercase-string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @phpstan-assert-if-true self::Succeeded $this
     */
    public function isSucceeded(): bool
    {
        return self::Succeeded === $this;
    }

    /**
     * @phpstan-assert-if-true self::Failed $this
     */
    public function isFailed(): bool
    {
        return self::Failed === $this;
    }

    /**
     * @phpstan-assert-if-true self::Cancelled $this
     */
    public function isCancelled(): bool
    {
        return self::Cancelled === $this;
    }

    /**
     * @phpstan-assert-if-true self::Expired $this
     */
    public function isExpired(): bool
    {
        return self::Expired === $this;
    }
}
