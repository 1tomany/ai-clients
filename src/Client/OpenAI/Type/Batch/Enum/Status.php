<?php

namespace OneToMany\LlmSdk\Client\OpenAI\Type\Batch\Enum;

enum Status: string
{
    case Validating = 'validating';
    case Failed = 'failed';
    case InProgress = 'in_progress';
    case Finalizing = 'finalizing';
    case Completed = 'completed';
    case Expired = 'expired';
    case Cancelling = 'cancelling';
    case Cancelled = 'cancelled';

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-lowercase-string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @phpstan-assert-if-true self::Completed $this
     */
    public function isCompleted(): bool
    {
        return self::Completed === $this;
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
