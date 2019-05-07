<?php

/**
 * Ported from opentracing/opentracing
 * @see https://github.com/opentracing/opentracing-php/blob/master/src/OpenTracing/NoopTracer.php
 */

namespace DDTrace;

use DDTrace\Integrations\Integration;
use DDTrace\Contracts\Scope as ScopeInterface;
use DDTrace\Contracts\Span as SpanInterface;
use DDTrace\Contracts\SpanContext as SpanContextInterface;
use DDTrace\Contracts\Tracer as TracerInterface;

final class NoopTracer implements TracerInterface
{
    /**
     * {@inheritdoc}
     */
    public function limited()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getActiveSpan()
    {
        return NoopSpan::create();
    }

    /**
     * {@inheritdoc}
     */
    public function getScopeManager()
    {
        return new NoopScopeManager();
    }

    public static function create()
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    public function startSpan($operationName, $options = [])
    {
        return NoopSpan::create();
    }

    /**
     * {@inheritdoc}
     */
    public function startActiveSpan($operationName, $finishSpanOnClose = true, $options = [])
    {
        return NoopScope::create();
    }

    /**
     * {@inheritdoc}
     */
    public function inject(SpanContextInterface $spanContext, $format, &$carrier)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function extract($format, $carrier)
    {
        return NoopSpanContext::create();
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getPrioritySampling()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function setPrioritySampling($prioritySampling)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function startRootSpan($operationName, $options = [])
    {
        return NoopScope::create();
    }

    /**
     * {@inheritdoc}
     */
    public function getRootScope()
    {
        return NoopScope::create();
    }

    /**
     * Returns the root span or null and never throws an exception.
     *
     * @return SpanInterface|null
     */
    public function getSafeRootSpan()
    {
        return NoopSpan::create();
    }

    /**
     * Starts an active span for a supported integration and store the integration that originated the span in the
     * span itself.
     *
     * @param Integration $integration
     * @param string $operationName
     * @param array $options
     * @return ScopeInterface
     */
    public function startIntegrationScopeAndSpan(Integration $integration, $operationName, $options = [])
    {
        return NoopScope::create();
    }

    /**
     * {@inheritdoc}
     */
    public function getTracesAsArray()
    {
        return [];
    }
}
