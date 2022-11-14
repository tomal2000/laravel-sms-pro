<?php

namespace Tomal2000\LaravelSmsPro\Contact;

use Tomal2000\LaravelSmsPro\Concrete\Sms;


/**
 * Interface SmsServiceInterface.
 */
interface SmsServiceInterface
{
    /**
     * @param array|mixed $numbers
     * @return array
     */
    public function to($numbers): self;

    /**
     * @param $text
     * @return $this | string
     */
    public function text($text = null): self;

    /**
     * @param $from
     * @return string
     */
    public function from(string $from): self;

    /**
     * @return array
     */
    public function getResponse(): array;

    /**
     * @return \Exception|null
     */
    public function getException(): Sms;

    /**
     * @param null $text
     * @return bool
     */
    public function send($text = null): bool;
}
